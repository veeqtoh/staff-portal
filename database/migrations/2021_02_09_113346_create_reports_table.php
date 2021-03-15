<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index()->comment('report was created by this user');
            $table->date('report_date')->comment('report due date');
            $table->string('report')->nullable()->comment('Report File');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')
            ->references('id')->on('categories')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
