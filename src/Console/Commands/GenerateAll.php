<?php

namespace MCDev\ServiceGenerator\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:all {--model=} {--path=} {--title=} {--resource=}';

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
        $model = $this->option('model');
        $path = $this->option('path');
        $title = $this->option('title');
        $resource = $this->option('resource') ?? Str::lower($model);

        $this->call('make:repository', ['name' => $model . 'Repository', '--model' => $model]);
        $this->call('make:service', ['name' => $model, '--model' => $model]);
        $this->call('make:crud', ['path' => $path, '--title' => $title, '--resource' => $resource]);
        return 0;
    }
}
