@extends('layouts/hr')

    @section('title')
		<title>Payroll - N.U.E Offshore Staff Portal</title>
  @endsection
  
  @section('style')
    	<!-- Select2 CSS -->
        <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">   
        <!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
		<!-- Calendar CSS -->
		<link rel="stylesheet" href="{{asset('css/fullcalendar.min.css')}}">
        <!-- Tagsinput CSS -->
		<link rel="stylesheet" href="{{asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
		<!-- Datatable CSS -->
		<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">    
		<!-- Summernote CSS -->
		<link rel="stylesheet" href="{{asset('plugins/summernote/dist/summernote-bs4.css')}}">
    @endsection

  @section('body')
      <!-- Page Wrapper -->
      <div class="page-wrapper">
          <!-- Page Content -->
          <div class="content container-fluid">          
              <!-- Page Header -->
              <div class="page-header">
                  <div class="row align-items-center">
                      <div class="col">
                          <h3 class="page-title">{{$title}} Payroll</h3>
                          <ul class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{route('hr.home')}}">Dashboard</a></li>
                              <li class="breadcrumb-item active">{{$title}} Payroll</li>
                          </ul>
                      </div>
                      <div class="col-auto float-right ml-auto">
                          <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_salary"><i class="fa fa-plus"></i> Pay Salary</a>
                          
                      </div>
                  </div>
              </div>
              <!-- /Page Header -->

              @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                      <li> <strong>{{ $error }}</strong> </li>
                  </div>                  
              @endforeach               

              <!-- Search Filter -->
              {{--<div class="row filter-row">
                  <div class="col-sm-6 col-md-3">  
                      <div class="form-group form-focus">
                          <input type="text" class="form-control floating">
                          <label class="focus-label">Month</label>
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-3">  
                      <div class="form-group form-focus">
                          <input type="text" class="form-control floating">
                          <label class="focus-label">Year</label>
                      </div>
                  </div>
                  
                  <div class="col-sm-6 col-md-3">  
                      <a href="#" class="btn btn-success btn-block"> Search </a>  
                  </div>
              </div>--}}
              <!-- Search Filter -->             

              <div class="row staff-grid-row">
                @foreach($months as $num => $month)
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                        <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{route('hr.payroll.details', ['cat'=>$cat, 'month'=>$month] )}}">{{str_replace('-', ', ', $month)}}</a></h4>
                            
                        </div>
                    </div>

                @endforeach
              </div>
          </div>

          <!-- /Page Content -->

          <!-- Add Salary Modal -->
          <div id="add_salary" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pay {{$title}} Salary</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if($employees->count() > 0)
                          <form action="{{route('hr.employee.payroll.store')}}" method="POST">
                              @csrf
                            <h4 class="text-primary">{{$title}} Details</h4>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Select {{$title}}</label>
                                            <select class="select" name="employee" required>
                                              <option selected="selected" disabled>-- Select a staff member --</option>
                                              @foreach($employees as $employee)
                                                <option value="{{$employee->id}}">{{$employee->f_name}} {{$employee->l_name}}</option>
                                              @endforeach
                                              </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2"> 
                                        <label>Days Worked</label>
                                        <input class="form-control" type="number" id="days_worked" name="days_worked" required>
                                    </div>
                                    <div class="col-sm-2"> 
                                        <label>Month of</label>
                                        <input class="form-control" type="date" id="month_of" name="month_of" required>
                                    </div>
                                    <div class="form-group mb-0 col-sm-4">
                                        <label class="col-form-label col-md-12">Monthly Gross</label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">₦</span>
                                                </div>
                                                <input class="form-control" type="text" id="gross_income" name="gross_income" required>
                                            </div>
                                            {{--<p id="result"></p>--}}
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row hide" id="breakdown"> 
                                    <div class="col-sm-6"> 
                                        <h4 class="text-primary">Earned Allowances</h4>
                                        <div class="form-group">
                                            <label>Basic Pay (₦)</label>
                                            <input class="form-control" type="text" id="basic" name="basic">
                                        </div>
                                        <div class="form-group">
                                            <label>Housing (₦)</label>
                                            <input class="form-control" type="text" id="housing" name="housing">
                                        </div>
                                        <div class="form-group">
                                            <label>Transport (₦)</label>
                                            <input class="form-control" type="text" id="transport" name="transport" >
                                        </div>
                                        <div class="form-group">
                                            <label>Entertainment (₦)</label>
                                            <input class="form-control" type="text" id="entertainment" name="entertainment" >
                                        </div>
                                        <div class="form-group">
                                            <label>Meal Allowance (₦)</label>
                                            <input class="form-control" type="text" id="meal_allowance" name="meal_allowance" >
                                        </div>
                                        <div class="form-group">
                                            <label>Utility Allowance (₦)</label>
                                            <input class="form-control" type="text" id="utility_allowance" name="utility_allowance" >
                                        </div>
                                        <div class="form-group">
                                            <label>Gross Pay (₦)</label>
                                            <input class="form-control" type="text" id="gross_pay" name="gross_pay">
                                        </div>
                                        <div class="form-group">
                                            <label>LESS: Total Tax Reliefs (₦)</label>
                                            <input class="form-control" type="text" id="total_tax_relief" name="total_tax_relief">
                                        </div>
                                        <div class="form-group">
                                            <label>Taxable Pay (₦)</label>
                                            <input class="form-control" type="text" id="taxable_pay" name="taxable_pay">
                                        </div>
                                        <div class="form-group">
                                            <label>Total Statutory Deductions (₦)</label>
                                            <input class="form-control" type="text" id="total_statutory_deductions" name="total_statutory_deductions">
                                            <input class="form-control" type="hidden" id="paye_tax" name="paye_tax">
                                            <input class="form-control" type="hidden" id="pension_contribution" name="pension_contribution">
                                        </div>
                                        <div class="form-group">
                                            <label>Employer Pension Contribution (₦)</label>
                                            <input class="form-control" type="text" id="employer_pension_contribution" name="employer_pension_contribution">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Net Salary (₦)</label>
                                            <input class="form-control" type="text" id="net_salary" name="net_salary">
                                        </div>
                                        <div class="form-group">
                                            <label>Staff Expense / Offshore Call Card (₦)</label>
                                            <input class="form-control" type="text" id="net_pay" name="net_pay">
                                        </div>

                                    </div>
                                    <div class="col-sm-6">  
                                        <h4 class="text-primary">Deductions</h4>
                                        <div class="form-group">
                                            <label>Total Pension Contribution (₦)</label>
                                            <input class="form-control" type="text" id="total_pension_contribution" name="total_pension_contribution">
                                        </div>
                                        <div class="form-group">
                                            <label>Loan Deduction</label>
                                            <input class="form-control" type="text" id="loan_deduction" name="loan_deduction">
                                        </div> 
                                        <div class="form-group">
                                            <label>Salary Overpayment</label>
                                            <input class="form-control" type="text" id="salary_overpayment" name="salary_overpayment">
                                        </div>
                                        <div class="form-group">
                                            <label>Reimbursements</label>
                                            <input class="form-control" type="text" id="reimbursements" name="reimbursements">
                                        </div>
                                        <div class="form-group">
                                            <label>Loan Addition</label>
                                            <input class="form-control" type="text" id="loan_addition" name="loan_addition">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Pay</button>
                                </div>
                            </form>
                            @else<p>There are no employees created for this category at the moment. you may click <a href="{{route('hr.employees')}}">here</a> to create employees account</p>
                            @endif
                        
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Salary Modal -->
         
      </div>
      <!-- /Page Wrapper -->
  @endsection

  @section('js')
	
    <!-- Select2 JS -->
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/jquery.ui.touch-punch.min.js')}}"></script>
    
    <!-- Datetimepicker JS -->
    <script src="{{asset('js/moment.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
    
    <!-- Calendar JS -->
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('js/fullcalendar.min.js')}}"></script>
        <script src="{{asset('js/jquery.fullcalendar.js')}}"></script>

    <!-- Multiselect JS -->
    <script src="{{asset('js/multiselect.min.js')}}"></script>

    <!-- Datatable JS -->
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Summernote JS -->
    <script src="{{asset('plugins/summernote/dist/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>

    <!-- Task JS -->
    <script src="{{asset('js/task.js')}}"></script>

    <!-- Dropfiles JS
    <script src="js/dropfiles.js"></script> -->

    <!-- Custom JS -->
    <script>

        function financial(x) {
            return Number.parseFloat(x).toFixed(2);
        }

      var userInput = document.getElementById('gross_income');
        userInput.addEventListener('keyup', function(e) {
            if (isNumeric(this.value) == true) {

                /** Every staff salary is divided into two parts as follows. (35% and 65%) **/
                var first_part = Math.round((this.value * 0.35)* 1e2) / 1e2; //or Gross Pay
                var second_part = Math.round((this.value * 0.65)* 1e2) / 1e2; //or Net Pay
                
                /** Items on the first part **/
                var basic = Math.round((first_part * 0.25)* 1e2) / 1e2;
                var housing = Math.round((first_part * 0.10)* 1e2) / 1e2;
                var transport = Math.round((first_part * 0.10)* 1e2) / 1e2;
                var entertainment = Math.round((first_part * 0.15)* 1e2) / 1e2;
                var meal_allowance = Math.round((first_part * 0.20)* 1e2) / 1e2;
                var utility_allowance = Math.round((first_part * 0.20)* 1e2) / 1e2;
                var pension_contribution = Math.round((((basic + housing + transport) * 0.08))* 1e2) / 1e2 ;

                /** Total tax relief = 20% of Gross Pay 
                 *                      + Higher of (200,000/12) or (1% of Gross Pay)/12
                 *                      + Employee Pension Contribution (8% Basic+Housing+Transport)
                 *                      + HMO Contribution (if any)
                 */

                var A =  Math.round((200000 / 12)* 1e2) / 1e2;
                var B = Math.round(((first_part * 0.01) / 12) * 1e2) / 1e2;
                
                if(A >= B){
                    var C = A;
                }else{
                    var C = B;
                }

                //console.log(4900 + 16666.67 + 882)
                var total_tax_relief = Math.round(((first_part * 0.20) + C + ((basic + housing + transport) * 0.08))* 1e2) / 1e2 ;
                var taxable_pay = Math.round((first_part - total_tax_relief) * 1e2) / 1e2;
                var employer_pension_contribution = Math.round(((basic + housing + transport) * 0.10) * 1e2) / 1e2;
                var total_pension_contribution = Math.round((employer_pension_contribution + pension_contribution) * 1e2) / 1e2;

                /**Tax Compilation 
                 * var taxable_gross = Math.round((first_part * 12)* 1e2) / 1e2;
                 * var pension_and_hmo = Math.round((((basic + housing + transport) * 0.08) * 12)* 1e2) / 1e2;
                 * var cra = 200000;
                */

                var taxable_net = Math.round(((first_part * 12) - (total_tax_relief * 12)) * 1e2) / 1e2;

                if(taxable_net <= 300000){
                    var first_300 = taxable_net;
                    var first_bal = 0;
                    var first_tax = Math.round((first_300 * 0.07)* 1e2) / 1e2;
                }else{
                    var first_300 = 300000;
                    var first_bal = Math.round((taxable_net - 300000)* 1e2) / 1e2;
                    var first_tax = Math.round((first_300 * 0.07)* 1e2) / 1e2;
                }

                if(first_bal <= 300000){
                    var second_300 = first_bal;
                    var second_bal = 0;
                    var second_tax = Math.round((second_300 * 0.11)* 1e2) / 1e2;
                }else{
                    var second_300 = 300000;
                    var second_bal = Math.round((first_bal - 300000)* 1e2) / 1e2;
                    var second_tax = Math.round((second_300 * 0.11)* 1e2) / 1e2;
                }

                if(second_bal <= 500000){
                    var third_500 = second_bal;
                    var third_bal = 0;
                    var third_tax = Math.round((third_500 * 0.15)* 1e2) / 1e2;
                }else{
                    var third_500 = 500000;
                    var third_bal = Math.round((second_bal - 500000)* 1e2) / 1e2;
                    var third_tax = Math.round((third_500 * 0.15)* 1e2) / 1e2;
                }

                if(third_bal <= 500000){
                    var fourth_500 = third_bal;
                    var fourth_bal = 0;
                    var fourth_tax = Math.round((fourth_500 * 0.19)* 1e2) / 1e2;
                }else{
                    var fourth_500 = 500000;
                    var fourth_bal = Math.round((third_bal - 500000)* 1e2) / 1e2;
                    var fourth_tax = Math.round((fourth_500 * 0.19)* 1e2) / 1e2;
                }

                if(fourth_bal <= 1600000){
                    var fifth_16 = fourth_bal;
                    var fifth_bal = 0;
                    var fifth_tax = Math.round((fifth_16 * 0.21)* 1e2) / 1e2;
                }else{
                    var fifth_16 = 1600000;
                    var fifth_bal = Math.round((fourth_bal - 1600000)* 1e2) / 1e2;
                    var fifth_tax = Math.round((fifth_16 * 0.21)* 1e2) / 1e2;
                }

                var yearly_tax = Math.round((first_tax + second_tax + third_tax + fourth_tax + fifth_tax)* 1e2) / 1e2;
                var monthly_tax = Math.round((yearly_tax / 12)* 1e2) / 1e2; //PAYE Tax

                var total_statutory_deductions = Math.round((monthly_tax + pension_contribution)* 1e2) / 1e2;
                var net_salary = Math.round(((taxable_pay - total_statutory_deductions) + total_tax_relief)* 1e2) / 1e2;


                //console.log(total_statutory_deductions);
                
              document.getElementById('basic').innerHTML = basic;

              $('#basic').val(financial(basic))
              $('#housing').val(financial(housing))
              $('#transport').val(financial(transport))
              $('#entertainment').val(financial(entertainment))
              $('#meal_allowance').val(financial(meal_allowance))
              $('#utility_allowance').val(financial(utility_allowance))
              $('#total_tax_relief').val(financial(total_tax_relief))
              $('#taxable_pay').val(financial(taxable_pay))
              $('#employer_pension_contribution').val(financial(employer_pension_contribution))
              $('#total_pension_contribution').val(financial(total_pension_contribution))
              $('#net_salary').val(financial(net_salary))
              $('#total_statutory_deductions').val(financial(total_statutory_deductions))
              $('#paye_tax').val(financial(monthly_tax))
              $('#pension_contribution').val(financial(pension_contribution))

              $('#gross_pay').val(financial(first_part))
              $('#net_pay').val(financial(second_part))

              
            } else {
              document.getElementById('basic').innerHTML = 'please enter number';
              $('#basic').val('please enter number for Monthly Gross Salary');
              $('#housing').val('please enter number for Monthly Gross Salary');
              $('#transport').val('please enter number for Monthly Gross Salary');
              $('#entertainment').val('please enter number for Monthly Gross Salary');
              $('#meal_allowance').val('please enter number for Monthly Gross Salary');
              $('#utility_allowance').val('please enter number for Monthly Gross Salary');
              $('#total_tax_relief').val('please enter number for Monthly Gross Salary');
              $('#taxable_pay').val('please enter number for Monthly Gross Salary');
              $('#employer_pension_contribution').val('please enter number for Monthly Gross Salary');
              $('#net_salary').val('please enter number for Monthly Gross Salary');
              $('#total_statutory_deductions').val('please enter number for Monthly Gross Salary');
              $('#pension_contribution').val('please enter number for Monthly Gross Salary');
              $('#paye_tax').val('please enter number for Monthly Gross Salary');
              $('#gross_pay').val('please enter number for Monthly Gross Salary');
              $('#net_pay').val('please enter number for Monthly Gross Salary');

            }

        })

        function isNumeric(n) {
          return !isNaN(parseFloat(n)) && isFinite(n);
        }

    </script>
    <script>
        $(document).ready(function(){

        // Read value on page load
        $("#result b").html($("#customRange").val());

        // Read value on change
        $("#customRange").change(function(){
            $("#result b").html($(this).val());
        });
      });        
          $(".header").stick_in_parent({
          });

          // This is for the sticky sidebar    
          $(".stickyside").stick_in_parent({
              offset_top: 60
          });
          $('.stickyside a').click(function() {
              $('html, body').animate({
                  scrollTop: $($(this).attr('href')).offset().top - 60
              }, 500);
              return false;
          });

          // This is auto select left sidebar
          
          // Cache selectors

          // Cache selectors

          var lastId,
              topMenu = $(".stickyside"),
              topMenuHeight = topMenu.outerHeight(),

              // All list items
              menuItems = topMenu.find("a"),

              // Anchors corresponding to menu items
              scrollItems = menuItems.map(function() {
                  var item = $($(this).attr("href"));
                  if (item.length) {
                      return item;
                  }
              });

          // Bind click handler to menu items

          // Bind to scroll
          $(window).scroll(function() {

              // Get container scroll position
              var fromTop = $(this).scrollTop() + topMenuHeight - 250;

              // Get id of current scroll item
              var cur = scrollItems.map(function() {
                  if ($(this).offset().top < fromTop)
                      return this;
              });

              // Get the id of the current element
              cur = cur[cur.length - 1];
              var id = cur && cur.length ? cur[0].id : "";

              if (lastId !== id) {
                  lastId = id;

                  // Set/remove active class
                  menuItems
                      .removeClass("active")
                      .filter("[href='#" + id + "']").addClass("active");
              }
          });

          $(function () {
              $(document).on("click", '.btn-add-row', function () {
                  var id = $(this).closest("table.table-review").attr('id');  // Id of particular table
                  console.log(id);
                  var div = $("<tr />");
                  div.html(GetDynamicTextBox(id));
                  $("#"+id+"_tbody").append(div);
              });

              $(document).on("click", "#comments_remove", function () {
                  $(this).closest("tr").prev().find('td:last-child').html('<button type="button" class="btn btn-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button>');
                  $(this).closest("tr").remove();
              });

              function GetDynamicTextBox(table_id) {
                  $('#comments_remove').remove();
                  var rowsLength = document.getElementById(table_id).getElementsByTagName("tbody")[0].getElementsByTagName("tr").length+1;
                  return '<td>'+rowsLength+'</td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><button type="button" class="btn btn-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button></td>'
              }
          });
    </script>

  @endsection