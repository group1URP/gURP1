<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevelopersSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_skill', function (Blueprint $table) {    
            $table->integer('developer_id')->unsigned();
            $table->foreign('developer_id')->references('id')->on('developers');
            $table->integer('skill_id')->unsigned();
            $table->foreign('skill_id')->references('id')->on('skills');
            $table->primary(['developer_id', 'skill_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('developer_skill');
    }
}
