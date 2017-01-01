<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class mymongoDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'my:mongo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lanseaza mongodb';

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
     * @return mixed
     */
    public function handle()
    {
		\App\User::create(['name' => 'John']);
      
    }
}
