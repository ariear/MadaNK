<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FoodMenu;
use App\Models\TransactionManual;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index',[
            'test' => 'testingggggg',
            'menus' => FoodMenu::all(),
            'categories' => Category::all(),
            'penjualans' => TransactionManual::all()
        ]);
    }
}
