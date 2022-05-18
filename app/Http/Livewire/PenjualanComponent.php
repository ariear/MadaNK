<?php

namespace App\Http\Livewire;

use App\Models\FoodMenu;
use Livewire\Component;
use Livewire\WithPagination;

class PenjualanComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function addToChart($id){
        $foodmenu = FoodMenu::firstWhere('id', $id);

        $foodmenu->update([
            'stock' => $foodmenu->stock - 1
        ]);
    }

    public function render()
    {
        return view('livewire.penjualan-component',[
            'foodsmenu' => FoodMenu::where('name','like','%' . $this->search . '%')->latest()->paginate(4)
        ]);
    }
}
