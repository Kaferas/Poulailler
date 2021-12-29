<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fabrication extends Model
{
    use HasFactory;
    protected $fillable = ['produitId', 'prixFab', 'prixvente', 'quantite', 'clientId'];

    public function clients()
    {
        return $this->belongsTo(Clients::class, "clientId", 'id');
    }
    public function produits()
    {
        return $this->belongsTo(Devis::class, "produitId", 'id');
    }

    public function devis()
    {
        return $this->belongsTo(Devis::class, "produitId", "id");
    }
}
