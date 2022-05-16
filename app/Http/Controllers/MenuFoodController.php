<?php

namespace App\Http\Controllers;

use App\Models\FoodMenu;
use Illuminate\Http\Request;

class MenuFoodController extends Controller
{
    public function index () {
        return view('foodmenu',[
            'foods' => FoodMenu::latest()->get()
        ]);
    }
}
