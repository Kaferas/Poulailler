<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['codeProduit', 'nomProduit', 'prixUnitaire', 'catId', 'FournisseurId', 'Quantite'];

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'catId', 'id');
    }
    public function fournisseurs()
    {
        return $this->belongsTo(Fournisseurs::class, 'FournisseurId', 'id');
    }
}
