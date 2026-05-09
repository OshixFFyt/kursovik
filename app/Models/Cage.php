<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chicken;
use App\Models\Workshop;
use App\Models\User;

class Cage extends Model
{
    use HasFactory;

    protected $fillable = [
        'workshop_id',
        'row',
        'number',
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function chicken()
    {
        return $this->hasOne(Chicken::class);
    }

    public function workers()
    {
        return $this->belongsToMany(User::class);
    }
}
