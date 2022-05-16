<?php

namespace App\Http\Livewire;

use App\Models\FoodMenu;
use Livewire\Component;

class Foodsmenu extends Component
{
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.foodsmenu',[
            'foods' => FoodMenu::where('name','like','%' . $this->search . '%')->latest()->get()
        ]);
    }
}
