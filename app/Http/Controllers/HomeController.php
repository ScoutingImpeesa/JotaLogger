<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use TCG\Voyager\Models\Menu;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $page = Page::whereSlug('homepage')->firstOrFail();
        return view('home', compact('page'));
    }
}
