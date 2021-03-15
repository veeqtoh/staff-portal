<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportstosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports_tos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index()->comment('This user reports to');
            $table->bigInteger('reports_to')->unsigned()->index()->nullable()->comment('This user');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('reports_to')
            ->references('id')->on('users')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportstos');
    }
}
