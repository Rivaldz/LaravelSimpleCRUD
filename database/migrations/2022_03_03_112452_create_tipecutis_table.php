<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipecutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipecutis', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_karyawan')
                ->references('id')->on('karyawans')
                ->onDelete('cascade');
            // $table->foreignId('id_karyawan')->constrained('karyawans');
            $table->date('tanggal_cuti');
            $table->integer('lama_cuti');
            $table->string('keterangan');
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
        Schema::dropIfExists('tipecutis');
    }
}
