<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte;
class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:website';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape a website for data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url = 'https://khamsat.com/community/stories';
        
        $crawler = Goutte::request('GET', $url);

    $crawler->filter('.details-td')->each(function ($node) {
        $this->info($node->text());
    });

        return 0;
    }
}
