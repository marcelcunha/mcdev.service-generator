<?php

namespace MCDev\ServiceGenerator\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class RepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name} {--model=} {--extends=AbstractRepositoryWithSortable}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $model = $this->option('model');
        $extends = $this->option('extends');
        $file = file_get_contents(__DIR__ . '/stubs/repository.stub');
        $result = str_replace(
            ['[[name]]', '[[model]]', '[[model-lowercase]]', '[[extends]]'],
            [$name, $model, Str::lower($name), $extends],
            $file
        );

        file_put_contents(app_path("Repositories/$name.php"), $result);
        return 0;
    }
}
