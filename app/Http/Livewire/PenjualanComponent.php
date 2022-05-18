<?php

namespace App\Http\Livewire;

use App\Models\FoodMenu;
use App\Models\KeranjangManual;
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

        KeranjangManual::create([
            'foodmenu_id' => $id,
            'qty' => 1,
            'total' => $foodmenu->price
        ]);

        $foodmenu->update([
            'stock' => $foodmenu->stock - 1
        ]);
    }

    public function deleteToChart($keranjang){
        $foodmenu = FoodMenu::firstWhere('id', $keranjang['foodmenu']['id']);
        $foodmenu->update([
            'stock' => $foodmenu->stock + $keranjang['qty']
        ]);

        $deleteKeranjang = KeranjangManual::firstWhere('id', $keranjang['id']);
        $deleteKeranjang->delete();
    }

    public function render()
    {
        return view('livewire.penjualan-component',[
            'foodsmenu' => FoodMenu::where('name','like','%' . $this->search . '%')->latest()->paginate(4),
            'keranjangs' => KeranjangManual::all()
        ]);
    }
}
