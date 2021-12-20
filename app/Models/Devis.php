<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    use HasFactory;

    protected $fillable = ['nom_devis',  'codeDevis', 'ClId', 'etat'];

    public function clients()
    {
        return $this->belongsTo(Clients::class, 'ClId', 'id');
    }
}
