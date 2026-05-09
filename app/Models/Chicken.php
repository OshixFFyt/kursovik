<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Breed;
use App\Models\Cage;

class Chicken extends Model
{
    use HasFactory;

    protected $fillable = [
        'weight',
        'age',
        'breed_id',
        'monthly_eggs',
        'cage_id',
    ];

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    public function cage()
    {
        return $this->belongsTo(Cage::class);
    }
}
