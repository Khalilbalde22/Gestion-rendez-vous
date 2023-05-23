<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Medecin;
use App\Models\Patient;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medecin_patient', function (Blueprint $table) {
        $table->primary(['medecin_id', 'patient_id']);
        $table->foreignIdFor(Medecin::class);
        $table->foreignIdFor(Patient::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medecin_patient');
    }
};
