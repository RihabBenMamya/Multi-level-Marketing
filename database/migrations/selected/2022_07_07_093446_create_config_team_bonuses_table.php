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
        Schema::create('config_team_bonuses', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_rank_id')->nullable();
            $table->integer('advisor_rank_id')->nullable();
            $table->float('bonus_percentage', 3, 0)->nullable();
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
        Schema::dropIfExists('config_team_bonuses');
    }
};
