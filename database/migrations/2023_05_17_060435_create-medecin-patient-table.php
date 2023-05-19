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
           $table->unsignedBigInteger('medecin_id')->nullable();
           $table->unsignedBigInteger('patient_id')->nullable();

           $table->foreign('medecin_id')->references('id')->on('medecins')->onDelete('cascade');
           $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
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
