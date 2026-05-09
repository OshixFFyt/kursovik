<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cage;

class Workshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    public function cages()
    {
        return $this->hasMany(Cage::class);
    }
}
