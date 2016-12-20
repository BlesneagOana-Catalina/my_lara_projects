<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


use App\Order;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
class MyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'my:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Aceasta comanda va trimite un email in fiecare zi';

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
	$titlu="Titlu";
	$mesaj="My msg";
	Mail::to('oanablesneag@gmail.com')
    ->send(new \App\Mail\OrderShipped($titlu,$mesaj));   
  
    }
}
