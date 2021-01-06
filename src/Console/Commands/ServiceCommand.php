<?php

namespace MCDev\ServiceGenerator\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name} {--model=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adiciona um novo Serviço ao diretório App\Services';

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
        $file = file_get_contents(__DIR__ . '/stubs/service.stub');
        $result = str_replace(
            ['[[name]]', '[[model]]', '[[model-lowercase]]'],
            [$name, $model, Str::lower($name)],
            $file
        );

        file_put_contents(app_path("Services/$name" . 'Service.php'), $result);
        return 0;
    }
}
