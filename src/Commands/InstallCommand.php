<?php

namespace \Gitmagox\Identifier\Commands;


use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'Identifier:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Identifier package';

    /**
     * Install directory.
     *
     * @var string
     */
    protected $directory = '';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->publishDatabase();

    }

    /**
     * Create tables and seed it.
     *
     * @return void
     */
    public function publishDatabase()
    {

        $this->call('migrate', ['--path' => str_replace(base_path(), '', __DIR__).'/../../migrations/']);

    }

}
