<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FoodMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.foodmenu.index',[
            'foodmenus' => FoodMenu::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.foodmenu.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'img' => 'image|file',
            'name' => 'required|max:50',
            'type' => 'required',
            'category_id' => 'required',
            'desc' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        $validasi['slug'] = str()->slug($validasi['name']);

        if($request->file('img')){
            $validasi['img'] = $request->file('img')->store('image-menu');
        }
        FoodMenu::create($validasi);

        return redirect('/dashboard/foodmenu')->with('success','Makanan Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodMenu  $foodMenu
     * @return \Illuminate\Http\Response
     */
    public function show(FoodMenu $foodMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodMenu  $foodMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foodMenu = FoodMenu::firstWhere('id',$id);

        return view('dashboard.foodmenu.edit',[
            'categories' => Category::all(),
            'foodmenu' => $foodMenu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodMenu  $foodMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'name' => 'required|max:50',
            'type' => 'required',
            'category_id' => 'required',
            'desc' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        $validasi['slug'] = str()->slug($request->name);

        if ($request->file('img')) {
            if ($request->oldImg) {
                Storage::delete($request->oldImg);
            }
            $validasi['img'] = $request->file('img')->store('image-menu');
        }

        $foodMenu = FoodMenu::firstWhere('id', $id);
        $foodMenu->update($validasi);

        return redirect('/dashboard/foodmenu')->with('success','Menu Berhasil Dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodMenu  $foodMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foodMenu = FoodMenu::where('id', $id)->first();
        if ($foodMenu->img) {
            Storage::delete($foodMenu->img);
        }
        $foodMenu->delete();

        return back()->with('success','Menu Berhasil DiHapus');
    }
}
