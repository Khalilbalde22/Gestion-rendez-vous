<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Patient extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        
        'nom',
        'prenom',
        'email',
        'adresse',
        'lieu',
        'telephone',
        'image',
        'user_id',
    ];


    public function medecins():BelongsToMany{
        return $this->belongsToMany(Medecin::class, 'medecin_patient', 'medecin_id', 'patient_id');
    }

    public function creneaux():HasMany{
        return $this->hasMany(Creneau::class);
    }

    public function imageUrl():string{
        return Storage::url($this->image);
    }
}
