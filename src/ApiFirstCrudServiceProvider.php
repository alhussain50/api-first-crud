<?php

namespace Jatri\ApiFirstCrud;

use Illuminate\Support\ServiceProvider;
use Jatri\ApiFirstCrud\Commands\CrudGeneratorCommand;

class ApiFirstCrudServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register the command
        $this->commands([
            CrudGeneratorCommand::class,
        ]);
    }

    public function boot()
    {
        // Publish the configuration file if needed
    }
}
