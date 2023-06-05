<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $teams = Team::query()->with('players')->get();

        return view('index' , [
            'team_1' => $teams[0],
            'team_2' => $teams[1],
        ]);
    }
}
