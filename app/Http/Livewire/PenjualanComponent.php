<?php

namespace App\Http\Livewire;

use App\Models\FoodMenu;
use App\Models\KeranjangManual;
use App\Models\TransactionManual;
use App\Models\TransactionManualFood;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class PenjualanComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    protected $queryString = ['search'];
    public $bayar;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function addToChart($id){
        $keranjangManual = KeranjangManual::all();
        foreach ($keranjangManual as $key => $value) {
            if ($value->foodmenu->id == $id) {
                return false;
            }
        }

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

    public function incrementQty ($keranjang){
        $addQtyKeranjang = KeranjangManual::with('foodmenu')->find($keranjang['id']);
        $addQtyKeranjang->update([
            'qty' => $addQtyKeranjang->qty + 1,
            'total' => $addQtyKeranjang->foodmenu->price * ($addQtyKeranjang->qty + 1)
        ]);

        $addQtyKeranjang->foodmenu->update([
            'stock' => $addQtyKeranjang->foodmenu->stock - 1
        ]);
    }
    public function decrementQty ($keranjang){
        $decreQtyKeranjang = KeranjangManual::with('foodmenu')->find($keranjang['id']);
        $decreQtyKeranjang->update([
            'qty' => $decreQtyKeranjang->qty - 1,
            'total' => $decreQtyKeranjang->total - $decreQtyKeranjang->foodmenu->price
        ]);

        $decreQtyKeranjang->foodmenu->update([
            'stock' => $decreQtyKeranjang->foodmenu->stock + 1
        ]);
    }

    public function bayar(){
        $keranjang = KeranjangManual::with('foodmenu');

        $transaction = TransactionManual::create([
            'no_order' => '00'. date('Ymd'). rand(1111,9999),
            'nama_kasir' => auth()->user()->name,
            'grand_total' => $keranjang->sum('total'),
            'pembayaran' => $this->bayar,
            'kembalian' => $this->bayar - $keranjang->sum('total')
        ]);

        foreach ($keranjang as $key => $value) {
            TransactionManualFood::create([
                'transaction_id' => $transaction->id,
                'foodmenu_id' => $keranjang->foodmenu_id,
                'qty' => $value->qty,
                'total' => $value->total,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        KeranjangManual::truncate();
    }

    public function render()
    {
        return view('livewire.penjualan-component',[
            'foodsmenu' => FoodMenu::where('name','like','%' . $this->search . '%')->latest()->paginate(4),
            'keranjangs' => KeranjangManual::all()
        ]);
    }
}
