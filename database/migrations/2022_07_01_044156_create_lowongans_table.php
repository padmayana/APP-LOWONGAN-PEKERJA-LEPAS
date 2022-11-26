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

        Schema::create('lowongans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bidang_id')->nullable();
            $table->unsignedInteger('daerah_id')->nullable();
            $table->string('nama');
            $table->text('deskripsi');
            $table->BigInteger('upah');
            $table->string('jenis_upah');
            $table->integer('kuota');
            $table->integer('terima')->nullable();
            $table->string('status');

            $table->timestamps();
        });
        Schema::table('lowongans', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreign('bidang_id')->references('id')->on('bidangs')->onDelete('set null');
            $table->foreign('daerah_id')->references('id')->on('daerahs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lowongans');
    }
};
