<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->date("birthday")->nullable();
            $table->boolean('gender')->nullable()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('persons');
    }
};
