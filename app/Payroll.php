<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payroll extends Model
{
	use SoftDeletes;

    protected $fillable = [
        'employee_id', 'days_worked', 'basic', 'housing', 'transport', 'entertainment', 'meal_allowance', 'utility_allowance', 
        'monthly_gross_income', 'gross_pay', 'monthly_pension_employee', 'total_tax_relief', 'reimburseables', 'taxable_pay',
        'total_statutory_deductions', 'employer_monthly_contribution','total_pension_contribution','staff_expense', 
        'loan_deduction', 'salary_overpayment', 'total_deductions', 'reimbursements', 'loan_addition', 'net_salary', 'month_of'
    ];

    protected $dates = ['deleted_at', 'month_of'];
	
    public function employee()
    {
    	return $this->belongsTo('App\User');
    }	
}
