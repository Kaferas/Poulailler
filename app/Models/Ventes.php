<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ventes extends Model
{
    use HasFactory;

    protected $fillable = ['prodId', 'montantUnit', 'qty', 'totalAmount', 'rabais', 'ClientId', 'paymethod'];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id');
    }
}
