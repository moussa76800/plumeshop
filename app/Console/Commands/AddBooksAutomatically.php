<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Backend\BookController;

class AddBooksAutomatically extends Command
{


    protected $signature = 'books:add';
    protected $description = 'Ajouter automatiquement des livres';
    
    public function handle()
    {
        $controller = new BookController();
        $controller->addBooksAutomatically();
    }


    
    // /**
    //  * The name and signature of the console command.
    //  *
    //  * @var string
    //  */
    // protected $signature = 'command:name';

    // /**
    //  * The console command description.
    //  *
    //  * @var string
    //  */
    // protected $description = 'Command description';

    // /**
    //  * Create a new command instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     parent::__construct();
    // }

    /**
     * Execute the console command.
     *
     * @return int
     */
    // public function handle()
    // {
    //     return 0;
    // }
}
