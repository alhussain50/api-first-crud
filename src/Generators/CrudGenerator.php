<?php

namespace Jatri\ApiFirstCrud\Generators;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CrudGenerator
{
    protected $name;

    public function __construct($name)
    {
        $this->name = ucfirst($name);
    }

    public function generate()
    {
        $this->generateModel();
        $this->generateController();
        $this->generateRequest();
        $this->generateMigration();
        $this->generateRoutes();
    }

    protected function generateModel()
    {
        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$this->name],
            $this->getStub('Model')
        );

        File::put(app_path("/Models/{$this->name}.php"), $modelTemplate);
    }

    protected function generateController()
    {
        $controllerTemplate = str_replace(
            ['{{modelName}}', '{{modelNamePluralLowerCase}}'],
            [$this->name, Str::plural(strtolower($this->name))],
            $this->getStub('Controller')
        );
    
        File::put(app_path("/Http/Controllers/{$this->name}Controller.php"), $controllerTemplate);
    }

    protected function generateRequest()
    {
        // Ensure the directory exists
        $directory = app_path('Http/Requests');
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }
    
        $requestTemplate = str_replace(
            ['{{modelName}}'],
            [$this->name],
            $this->getStub('Request')
        );
    
        File::put(app_path("Http/Requests/{$this->name}Request.php"), $requestTemplate);
    }
    
    protected function generateMigration()
    {
        $tableName = Str::plural(strtolower($this->name));
        $migrationTemplate = str_replace(
            ['{{tableName}}'],
            [$tableName],
            $this->getStub('Migration')
        );

        $datePrefix = date('Y_m_d_His');
        File::put(database_path("/migrations/{$datePrefix}_create_{$tableName}_table.php"), $migrationTemplate);
    }

    protected function generateRoutes()
    {
        $routeTemplate = str_replace(
            ['{{modelNamePluralLowerCase}}', '{{modelName}}'],
            [Str::plural(strtolower($this->name)), $this->name],
            $this->getStub('Routes')
        );

        File::append(base_path('routes/api.php'), $routeTemplate);
    }

    protected function getStub($type)
    {
        return file_get_contents(__DIR__ . "/stubs/$type.stub");
    }
}
