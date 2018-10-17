<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Club;
use App\QSO;

class StatsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {
        $group_count = Club::count();
        $qso_count = QSO::count();
        return view("stats",[
            "qsos"=> $qso_count,
            "groups"=>$group_count
        ]);
    }
}
