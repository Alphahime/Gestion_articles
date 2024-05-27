<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'image',
        'status',
        'date_creation',
    ];

    protected $dates = [
        'date_creation',
    ];

    // Optionnel : Si 'date_creation' n'est pas automatiquement converti
    public function getDateCreationAttribute($value)
    {
        return Carbon::parse($value);
    }
}
