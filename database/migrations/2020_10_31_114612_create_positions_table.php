<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->bigInteger('department_id')->unsigned()->index()->comment('Each position belongs to a department');
            //$table->bigInteger('category_id')->unsigned()->index()->comment('Each position belongs to a category');
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            //$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
