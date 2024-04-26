<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "price",
        "dateStart",
        "timeStart",
        "dateEnd",
        "timeEnd",
        'localisation',
        'image', 
        'categorie', 
        'description',
        'user_id'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'user_events');
    }
}
