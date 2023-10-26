<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sejour extends Model
{
    use HasFactory;

    protected $fillable = [
        'debut',
        'fin',
        'voyageur_id',
        'logement_id',
    ];

    public function voyageur(): BelongsTo
    {
        return $this->belongsTo(Voyageur::class);
    }

    public function logement(): BelongsTo
    {
        return $this->belongsTo(Logement::class);
    }
}
