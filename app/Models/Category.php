<?php

namespace App\Models;

use App\Models\FoodMenu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function foodmenus(){
        return $this->hasMany(FoodMenu::class);
    }
}
