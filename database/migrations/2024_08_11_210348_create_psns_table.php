<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psns', function (Blueprint $table) {
            $table->id();
            $table->string('pelapor');
            $table->string('nama');
            $table->string('rt');
            $table->string('rw');
            $table->string('jentik_nyamuk');
            $table->string('penyakit')->nullable();
            $table->integer('jumlah')->nullable(); // Nullable jika jumlah tidak selalu ada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('psns');
    }
};
