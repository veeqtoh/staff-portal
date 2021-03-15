<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('f_name')->comment('first name');
            $table->string('l_name')->comment('last name');
            $table->string('o_name')->nullable()->comment('other name');
            $table->string('slug')->comment('first_name-other_name-last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            $table->unsignedInteger('supervisor_id')->default(0)->comment('line manager ID | 0 - Supervisor');
            $table->tinyInteger('role')->default(0)->comment('0 - staff; 1 - HR; 2 - Procurement Manager; 3 - IT Support; 4 - MD; 5 - Crew');
            $table->bigInteger('category_id')->unsigned()->index()->comment('1 - office staff; 2 - Crew');
            $table->unsignedInteger('department_id')->nullable()->comment('employee department');
            $table->bigInteger('position_id')->unsigned()->index()->comment('employee position');

            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')
            ->references('id')->on('categories')
            ->onDelete('cascade');
            $table->foreign('position_id')
            ->references('id')->on('positions')
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
        Schema::dropIfExists('users');
    }
}
