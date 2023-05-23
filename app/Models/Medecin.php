<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Medecin extends Authenticatable
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
    ];

    public function patients(){
        return $this->belongsToMany(Patient::class,'medecin_patient');
    }

    public function creneaux():HasMany{
        return $this->hasMany(Creneau::class);
    }
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function imageUrl():string{
        return Storage::url($this->image);
    }

    
}
