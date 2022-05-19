<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionManual extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function manualfoodtransaction(){
        return $this->hasMany(TransactionManualFood::class);
    }
}
