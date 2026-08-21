<?php

namespace App\Http\Controllers;

use App\Services\PortfolioService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Strongest work first, projects with a shipped mobile app ahead of the rest.
        $showcase = PortfolioService::showcase(12);

        return view('pages.home', compact('showcase'));
    }
}
