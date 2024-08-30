<?php

namespace Jatri\ApiFirstCrud;

use Illuminate\Support\ServiceProvider;
use Jatri\ApiFirstCrud\Commands\CrudGeneratorCommand;

class ApiFirstCrudServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            CrudGeneratorCommand::class,
        ]);
    }

    public function boot()
    {
        // Publish the configuration file if needed
    }
}
