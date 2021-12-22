<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $items = Item::all();
        $teams = Team::all();
        return view('index')->with([
            'items' => $items,
            'teams' => $teams
        ]);
    }
}
