<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $teams = Team::query()->withCount('players')->get();
        return view('index' , [
            'firstTeam' => $teams[0],
            'secondTeam' => $teams[1],
        ]);
    }
}
