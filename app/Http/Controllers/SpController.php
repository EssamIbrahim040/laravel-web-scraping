<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;
class SpController extends Controller
{
    
    public function showForm()
    {
        return view('scrape-form');
    }

    public function scrape(Request $request)
    {
        $url = $request->input('url');

        // Validate the URL
        $request->validate([
            'url' => 'required|url'
        ]);

        $crawler = Goutte::request('GET', $url);

        $data = [];
        $crawler->filter('.post-title')->each(function ($node) use (&$data) {
            $data[] = $node->text();
        });

        return view('scrape-result', ['data' => $data]);
    }
}
