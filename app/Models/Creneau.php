<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Creneau extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_debut',
        'date_fin',
        'heur_debut',
        'heur_fin',
        'duree',
        'lieu',
        'user_id',
        'patients_id',
    ];

    public function medecin():BelongsTo{
        return $this->belongsTo(Medecin::class, 'user_id');
    }
    public function users():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function patient():BelongsTo{
        return $this->belongsTo(Patient::class);
    }
}
