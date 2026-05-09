<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chicken;

class Breed extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'average_monthly_eggs',
        'average_weight',
        'diet_number',
        'description',
    ];

    public function chickens()
    {
        return $this->hasMany(Chicken::class);
    }
}
