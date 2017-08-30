<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveIsConfirmedAddHasGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('is_confirmed');
            $table->boolean('has_group')->default(0);
            $table->text('extra_details')->nullable();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('has_group');
        Schema::dropIfExists('extra_details');
        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('is_confirmed')->default(0);  
        });

    }
}
