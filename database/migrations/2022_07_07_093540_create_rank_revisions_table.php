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
        Schema::create('rank_revisions', function (Blueprint $table) {
            $table->id();
            $table->integer('advisor_id')->nullable();
            $table->integer('old_rank_id')->nullable();
            $table->integer('new_rank_id')->nullable();
            $table->float('amount', 255, 0)->nullable();
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
        Schema::dropIfExists('rank_revisions');
    }
};
