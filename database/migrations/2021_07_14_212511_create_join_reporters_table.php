<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinReportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_reporters', function (Blueprint $table) {
            $table->id();
            $table->string('gender');
            $table->date('birth_Date');
            $table->text('college');
            $table->double('average');
            $table->longText('reason');
            $table->string('certificate_photo');
            $table->string('photograph');
            $table->integer('status');
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
        Schema::dropIfExists('join_reporters');
    }
}
