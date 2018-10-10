<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Weidner\Goutte\GoutteFacade as Goutte;
use App\Club;

class csv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import CSV from resources/import/';

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
        //set the path for the csv files
        $path = base_path("resources/import/*.csv"); 
        
        //run 2 loops at a time 
        foreach (array_slice(glob($path),0,2) as $file) {
            
            //read the data into an array
            $data = array_map('str_getcsv', file($file));

            //loop over the data
            foreach($data as $row) {
                print_r($row);
                if ($row[0] == "name") continue;
                $club = Club::firstOrNew(['name'=> $row[0]]);
                $club->name=$row[0];
                $club->city=$row[1];
                $club->callsign=$row[2];
                $club->locator=$row[3];
                $club->country='NL';
                $club->save();
                //insert the record or update if the email already exists
                //Contact::updateOrCreate([
                //    'email' => $row[6],
                //], ['email' => $row[6]]); 
            }

            //delete the file
            //unlink($file);
        }
    }
}
