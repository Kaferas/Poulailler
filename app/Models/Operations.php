<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operations extends Model
{
    use HasFactory;

    protected $fillable = ['motif', 'montant', 'depenseId','etat','nomDemandeur'];

    public function depenses()
    {
        return $this->belongsTo(Depenses::class, 'depenseId', 'id');
    }
}
