<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;

class ScrapeController extends Controller
{
    public function index()
    {
        $url = 'https://www.eqraa-culture.com/search/label/%D8%A7%D9%84%D8%A3%D8%AF%D8%A8%20%D9%88%D8%A7%D9%84%D9%84%D8%BA%D8%A9?max-results=10';
        
        $crawler = Goutte::request('GET', $url);

        $posts = [];

        $crawler->filter('.post-outer')->each(function ($node) use (&$posts) {
            $title = $node->filter('.post-title')->text();
            $date = $node->filter('.post-date ')->text();
            $description = $node->filter('.Snippet')->text();
            $posts[] = [
                'title' => $title,
                'date' => $date,
                'description' => $description,
            ];
        });

        return view('scrape', ['posts' => $posts]);
    }
}
