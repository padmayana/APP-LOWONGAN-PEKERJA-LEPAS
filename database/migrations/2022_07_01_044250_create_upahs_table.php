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
        Schema::create('upahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('upah');
            $table->string('jenis_upah');
            $table->date('mulai')->nullable();
            $table->date('selesai')->nullable();
            $table->string('status');
            $table->timestamps();
        });
        Schema::table('upahs', function (Blueprint $table) {
            $table->foreignId('permintaan_id')->nullable()->constrained('permintaans')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upahs');
    }
};
