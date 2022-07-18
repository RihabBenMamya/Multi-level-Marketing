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
        Schema::create('advisors_tree', function (Blueprint $table) {
            $table->id();
            $table->integer('advisor_id')->nullable();
            $table->integer('child_id')->nullable()->index('child_id_index');
            $table->integer('direct')->default('1');
            $table->timestamps();
            $table->index(['advisor_id', 'child_id', 'direct']);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advisors_tree');
    }
};
