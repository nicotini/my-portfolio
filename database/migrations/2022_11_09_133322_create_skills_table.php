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
        Schema::create('skills', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->id();
            $table->string('title', 255);
            $table->bigInteger('proficiency')->unsigned()->nullable();
            $table->bigInteger('service_id')->unsigned()->nullable();
            $table->timestamps();

            $table->index('service_id', 'skill_service_idx');
            $table->foreign('service_id', 'skill_service_fk')->on('services')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
};
