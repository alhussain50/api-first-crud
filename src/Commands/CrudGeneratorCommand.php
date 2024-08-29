<?php

namespace Jatri\ApiFirstCrud\Commands;

use Illuminate\Console\Command;
use Jatri\ApiFirstCrud\Generators\CrudGenerator;

class CrudGeneratorCommand extends Command
{
    protected $signature = 'make:crud {name}';
    protected $description = 'Generate a complete CRUD for a model';

    public function handle()
    {
        $name = $this->argument('name');
        $generator = new CrudGenerator($name);
        $generator->generate();

        $this->info('CRUD for ' . $name . ' generated successfully.');
    }
}
