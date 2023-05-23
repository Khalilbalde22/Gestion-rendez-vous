<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CreuneauResource;
use App\Models\Creneau;
use Illuminate\Http\Request;

class CreneauController extends Controller
{
    public function index(){
        return CreuneauResource::collection( Creneau::limit(2)->get());
    }
}
