<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabrication extends Model
{
    use HasFactory;
    protected $fillable = ['produitId', 'prixFab', 'prixvente', 'quantite', 'clientId'];

    public function clients()
    {
        return $this->belongsTo(Clients::class, "clientId", 'id');
    }

    public function devis()
    {
        return $this->belongsTo(Devis::class, "produitId", "id");
    }
}
