<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('emp_id')->nullable()->comment('Employee ID');
            $table->string('avatar')->nullable()->comment('Display Picture');
            $table->string('gender');
            $table->date('start_date')->nullable()->comment('Join Date');
            $table->string('nhf_no')->nullable();
            $table->bigInteger('pfa_id')->unsigned()->index()->nullable();
            $table->string('rsa_pin_no')->nullable();

            //Personal Information
            $table->string('grade')->nullable();
            $table->string('r_address')->nullable();
            $table->string('p_address')->nullable();
            $table->string('title')->nullable();
            $table->string('phone')->nullable();
            $table->date('d_o_b')->nullable();
            $table->string('p_o_b')->nullable();
            $table->string('nationality')->nullable();
            $table->string('state_of_origin')->nullable();
            $table->string('home_town')->nullable();
            $table->string('local_govt')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('religion')->nullable();
            $table->string('name_of_spouse')->nullable();
            $table->string('maiden_name')->nullable();
            $table->string('spouse_phone')->nullable();
            $table->string('address_of_spouse')->nullable();
            $table->string('next_of_kin_ben')->nullable();
            $table->string('relationship_ben')->nullable();
            $table->string('address_ben')->nullable();
            $table->string('tel_ben')->nullable();
            $table->string('next_of_kin_em')->nullable();
            $table->string('relationship_em')->nullable();
            $table->string('address_em')->nullable();
            $table->string('tel_em')->nullable();
            $table->string('disability')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('genotype')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('languages')->nullable();
            $table->boolean('indebted')->default(0);
            $table->string('debt_details')->nullable();
            $table->string('intention')->nullable();
            $table->boolean('convict')->default(0);
            $table->string('crime_details')->nullable();

            //Banking details
            $table->string('bank_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('sort_code')->nullable();

            //Salary details
            $table->string('salary_basis')->nullable();
            $table->decimal('salary',15,2)->default(0.0000);
            $table->string('payment_type')->nullable();

            // Cerifications
            $table->string('cv')->nullable()->comment('Curriculum Vitae');
            $table->string('mid')->nullable()->comment('means of Identification');
            $table->string('aca_cert')->nullable()->comment('Academic Certificate');
            $table->string('sa')->nullable()->comment('Skill Aquisition');
            $table->string('contract_letter')->nullable();
            $table->string('coc')->nullable()->comment('Certificate of Competency');
            $table->string('med_cert')->nullable()->comment('Medical Certificate');
            $table->string('stcw')->nullable();
            $table->string('paffp')->nullable()->comment('Proficiency in Advanced Fire Fighting and Prevention');
            $table->string('parpo')->nullable()->comment('Proficiency in ARP (Operational)');
            $table->string('pecdis')->nullable()->comment('Proficiency in Electronic Chart Display System');
            $table->string('pefa')->nullable()->comment('Proficiency in Elementary First Aid');
            $table->string('ism')->nullable()->comment('Certificate in International Safety Management');
            $table->string('pscrb')->nullable()->comment('Proficiency Survival Craft and Rescue Boat');
            $table->string('pssr')->nullable()->comment('Proficiency in Personal Safety and Social Responsibilities');
            $table->string('pst')->nullable()->comment('Proficiency in Survival Techniques');
            $table->string('psso')->nullable()->comment('Proficiency as Ship Security Officer');
            $table->string('gdmss')->nullable()->comment('GDMSS - General Operators Certificate');
            $table->softDeletes();
            $table->timestamps();

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
        Schema::dropIfExists('profiles');
    }
}
