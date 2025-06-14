<?php

use App\Models\RuanganModels;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perangkat', function (Blueprint $table) {
            $table->id();
            $table->enum('kategori',['CCTV','ACCESS DOOR'])->default('CCTV');
            $table->string('model');
            $table->string('ip_address');
            $table->float('sumbu_x');
            $table->float('sumbu_y');
            $table->text('keterangan');
            $table->foreignIdFor(RuanganModels::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perangkat');
    }
};
