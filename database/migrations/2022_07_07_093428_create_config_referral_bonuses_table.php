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
        Schema::create('config_referral_bonuses', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_rank_id')->nullable();
            $table->integer('achild_rank_id')->nullable();
            $table->integer('bonus_percentage')->nullable();
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
        Schema::dropIfExists('config_referral_bonuses');
    }
};
