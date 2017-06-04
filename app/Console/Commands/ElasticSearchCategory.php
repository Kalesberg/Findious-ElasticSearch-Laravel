<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Cat;
use Elasticsearch;

class ElasticSearchCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'es:index-category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set index of categories to elastic search server';

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
        //
        $this->line('Indexing categories..');
        $categories = Cat::all();

        foreach($categories as $category)
        {
          $data = $category->toArray();
          Elasticsearch::index([
            'index' => 'findious',
            'type' => 'category',
            'id' => $category->id,
            'body' => $data
          ]);
        }
        $this->info('Done!');
    }
}
