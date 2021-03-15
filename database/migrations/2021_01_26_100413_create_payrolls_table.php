<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned()->index();
            $table->string('ref');
            $table->string('days_worked');
            $table->decimal('day_rate',15,2);
            $table->decimal('basic',15,2);
            $table->decimal('housing',15,2);
            $table->decimal('transport',15,2);
            $table->decimal('entertainment',15,2);
            $table->decimal('meal_allowance',15,2);
            $table->decimal('utility_allowance',15,2);
            $table->decimal('gross_income',15,2);
            $table->decimal('gross_pay',15,2);
            $table->decimal('total_tax_relief',15,2);
            $table->decimal('taxable_pay',15,2);
            $table->decimal('total_statutory_deductions',15,2);
            $table->decimal('employer_pension_contribution',15,2);
            $table->decimal('total_pension_contribution',15,2);
            $table->decimal('paye_tax',15,2);
            $table->decimal('pension_contribution',15,2);
            $table->decimal('net_pay',15,2);
            $table->decimal('loan_deduction',15,2)->default(0.0000);
            $table->decimal('salary_overpayment',15,2)->default(0.0000);
            $table->decimal('total_deductions',15,2)->default(0.0000);
            $table->decimal('reimbursements',15,2)->default(0.0000);
            $table->decimal('loan_addition',15,2)->default(0.0000);

            $table->decimal('net_salary',15,2);

            $table->date('month_of');
            $table->bigInteger('category_id')->unsigned()->index()->comment('1 - office staff; 2 - Crew');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('employee_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('category_id')
            ->references('id')->on('categories')
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
        Schema::dropIfExists('payrolls');
    }
}
