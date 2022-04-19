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
        Schema::create('testcases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id'); //ini foreign key untuk menghubungkan ke tabel user
            $table->timestamps();
            $table->integer('surah');
            $table->string('nama_surah');
            $table->integer('ayat_surah');
            $table->integer('ayat')->nullable(); 
            $table->integer('juz')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testcases');
    }
};
