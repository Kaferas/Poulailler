<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_devis extends Model
{
    use HasFactory;

    protected $fillable = ['nomMateriel', 'montantMateriel', 'devisId'];
}
