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
        Schema::create('permintaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('deskripsi');
            $table->string('status');
            $table->string('status_pekerjaan')->nullable();
            $table->unsignedBigInteger('klien_id')->nullable();
            $table->unsignedBigInteger('pekerja_id')->nullable();
            $table->unsignedBigInteger('skil_id')->nullable();
            $table->timestamps();
        });

        Schema::table('permintaans', function (Blueprint $table) {
            $table->foreign('klien_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('pekerja_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('skil_id')->references('id')->on('skils')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permintaans');
    }
};
