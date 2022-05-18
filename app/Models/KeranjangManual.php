<?php

namespace App\Models;

use App\Models\FoodMenu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KeranjangManual extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function foodmenu(){
        return $this->belongsTo(FoodMenu::class);
    }
}
