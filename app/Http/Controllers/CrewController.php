<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Category;
use App\Department;
use App\Position;
use App\Payroll;
use App\Pfa;
use App\Notifications;
use Session;
use App\ReportsTo;
use Carbon\Carbon;
use Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CrewController extends Controller
{
    public function index()
    {
        $data['notification'] = Notifications::where([
            ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
        ])->get();
            return view('crew.index',$data);
    }

    public function profile()
    {
        $user = User::find(AUTH::user()->id);
        $categories = Category::all();
        $departments = Department::all();
        $positions = Position::all();
        $pfas = Pfa::all();

        $data['notification'] = Notifications::where([
            ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
        ])->get();
//dd($user);
        return view('crew.profile', [
            'user' => $user,
            'departments' => $departments,
            'categories' => $categories,
            'positions' => $positions,
            'pfas' => $pfas,
        ], $data);
    }

    public function update_profile(Request $request)
    {
        dd($request->all());
        $employee = User::find(AUTH::user()->id);

        if($request->hasFile('dp'))
        {
            // get file
            $filenameWithExt = $request->file('dp')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '', $filename);
            $ext = $request->file('dp')->getClientOriginalExtension();
            $storedname = $filename.'_'.time().'.'.$ext;
            $store = $request->file('dp')->storeAs('public/uploads/employees/' . $employee->id .'/dp/', $storedname);
            if($store)
            {
                $path = Storage::url($storedname);
                $imgfile = str_replace('/storage/', 'storage/uploads/employees/' . $employee->id . '/dp/', $path);
                $employee->profile->avatar = $imgfile;
                $employee->profile->save();
            }
        }

        if($request->hasFile('contract_letter'))
        {
            // get file
            $filenameWithExt = $request->file('contract_letter')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '', $filename);
            $ext = $request->file('contract_letter')->getClientOriginalExtension();
            $storedname = $filename.'_'.time().'.'.$ext;
            $store = $request->file('contract_letter')->storeAs('public/uploads/employees/' . $employee->id .'/documents/', $storedname);
            if($store)
            {
                $path = Storage::url($storedname);
                $imgfile = str_replace('/storage/', 'storage/uploads/employees/' . $employee->id . '/documents/', $path);
                $employee->profile->contract_letter = $imgfile;
                $employee->profile->save();
            }
        }

        if($request->has('password'))
        {
            if(!empty($request->password) || !is_null($request->password))
            {
                $employee->password = bcrypt($request->password);
                $employee->save();
            }
        }

        if($request->has('f_name') && !empty($request->f_name))
        {
            $employee->f_name = $request->f_name;
        }
        
        if($request->has('o_name') && !empty($request->o_name))
        {
            $employee->o_name = $request->o_name;
        }
        
        if($request->has('l_name') && !empty($request->l_name))
        {
            $employee->l_name = $request->l_name;
        }

        if($request->has('role') && !empty($request->role))
        {
            $employee->role = $request->role;
        }

        if($request->has('email') && !empty($request->email))
        {
            $employee->email = $request->email;
        }

        if($request->has('category') && !empty($request->category))
        {
            $employee->category_id = $request->category;
        }

        if($request->has('department') && !empty($request->department))
        {
            $employee->department_id = $request->department;
        }

        if($request->has('position') && !empty($request->position))
        {
            $employee->position_id = $request->position;
        }

        if($request->has('start_date') && !is_null($request->start_date))
        {
            $employee->profile->start_date = $request->start_date;
            $employee->profile->save();
        }

        if($request->has('phone') && !empty($request->phone))
        {
            $employee->profile->phone = $request->phone;
            $employee->profile->save();
        }

        if($request->has('emp_id') && !empty($request->emp_id))
        {
            $employee->profile->emp_id = $request->emp_id;
            $employee->profile->save();
        }

        if($request->has('gender') && !empty($request->gender))
        {
            $employee->profile->gender = $request->gender;
            $employee->profile->save();
        }

        if($request->has('d_o_b') && !empty($request->d_o_b))
        {
            $employee->profile->d_o_b = $request->d_o_b;
            $employee->profile->save();
        }

        if($request->has('r_address') && !empty($request->r_address))
        {
            $employee->profile->r_address = $request->r_address;
            $employee->profile->save();
        }

        if($request->has('p_address') && !empty($request->p_address))
        {
            $employee->profile->p_address = $request->p_address;
            $employee->profile->save();
        }

        if($request->has('nhf_no') && !empty($request->nhf_no))
        {
            $employee->profile->nhf_no = $request->nhf_no;
            $employee->profile->save();
        }

        if($request->has('nhf_no') && !empty($request->nhf_no))
        {
            $employee->profile->nhf_no = $request->nhf_no;
            $employee->profile->save();
        }

        if($request->has('rsa_pin_no') && !empty($request->rsa_pin_no))
        {
            $employee->profile->rsa_pin_no = $request->rsa_pin_no;
            $employee->profile->save();
        }

        if($request->has('grade') && !empty($request->grade))
        {
            $employee->profile->grade = $request->grade;
            $employee->profile->save();
        }

        if($request->has('pfa') && !empty($request->pfa))
        {
            $employee->profile->pfa->name = $request->pfa;
            $employee->profile->save();
        }

        if($request->has('title') && !empty($request->title))
        {
            $employee->profile->title = $request->title;
            $employee->profile->save();
        }

        if($request->has('p_address') && !empty($request->p_address))
        {
            $employee->profile->p_address = $request->p_address;
            $employee->profile->save();
        }

        if($request->has('p_o_b') && !empty($request->p_o_b))
        {
            $employee->profile->p_o_b = $request->p_o_b;
            $employee->profile->save();
        }

        if($request->has('nationality') && !empty($request->nationality))
        {
            $employee->profile->nationality = $request->nationality;
            $employee->profile->save();
        }

        if($request->has('state_of_origin') && !empty($request->state_of_origin))
        {
            $employee->profile->state_of_origin = $request->state_of_origin;
            $employee->profile->save();
        }

        if($request->has('home_town') && !empty($request->home_town))
        {
            $employee->profile->home_town = $request->home_town;
            $employee->profile->save();
        }

        if($request->has('local_govt') && !empty($request->local_govt))
        {
            $employee->profile->local_govt = $request->local_govt;
            $employee->profile->save();
        }

        if($request->has('marital_status') && !empty($request->marital_status))
        {
            $employee->profile->marital_status = $request->marital_status;
            $employee->profile->save();
        }

        if($request->has('religion') && !empty($request->religion))
        {
            $employee->profile->religion = $request->religion;
            $employee->profile->save();
        }

        if($request->has('name_of_spouse') && !empty($request->name_of_spouse))
        {
            $employee->profile->name_of_spouse = $request->name_of_spouse;
            $employee->profile->save();
        }

        if($request->has('maiden_name') && !empty($request->maiden_name))
        {
            $employee->profile->maiden_name = $request->maiden_name;
            $employee->profile->save();
        }

        if($request->has('spouse_phone') && !empty($request->spouse_phone))
        {
            $employee->profile->spouse_phone = $request->spouse_phone;
            $employee->profile->save();
        }

        if($request->has('address_of_spouse') && !empty($request->address_of_spouse))
        {
            $employee->profile->address_of_spouse = $request->address_of_spouse;
            $employee->profile->save();
        }

        if($request->has('next_of_kin_ben') && !empty($request->next_of_kin_ben))
        {
            $employee->profile->next_of_kin_ben = $request->next_of_kin_ben;
            $employee->profile->save();
        }

        if($request->has('relationship_ben') && !empty($request->relationship_ben))
        {
            $employee->profile->relationship_ben = $request->relationship_ben;
            $employee->profile->save();
        }

        if($request->has('address_ben') && !empty($request->address_ben))
        {
            $employee->profile->address_ben = $request->address_ben;
            $employee->profile->save();
        }

        if($request->has('tel_ben') && !empty($request->tel_ben))
        {
            $employee->profile->tel_ben = $request->tel_ben;
            $employee->profile->save();
        }

        if($request->has('next_of_kin_em') && !empty($request->next_of_kin_em))
        {
            $employee->profile->next_of_kin_em = $request->next_of_kin_em;
            $employee->profile->save();
        }

        if($request->has('relationship_em') && !empty($request->relationship_em))
        {
            $employee->profile->relationship_em = $request->relationship_em;
            $employee->profile->save();
        }

        if($request->has('address_em') && !empty($request->address_em))
        {
            $employee->profile->address_em = $request->address_em;
            $employee->profile->save();
        }

        if($request->has('tel_em') && !empty($request->tel_em))
        {
            $employee->profile->tel_em = $request->tel_em;
            $employee->profile->save();
        }

        if($request->has('disability') && !empty($request->disability))
        {
            $employee->profile->disability = $request->disability;
            $employee->profile->save();
        }

        if($request->has('height') && !empty($request->height))
        {
            $employee->profile->height = $request->height;
            $employee->profile->save();
        }

        if($request->has('weight') && !empty($request->weight))
        {
            $employee->profile->weight = $request->weight;
            $employee->profile->save();
        }

        if($request->has('blood_group') && !empty($request->blood_group))
        {
            $employee->profile->blood_group = $request->blood_group;
            $employee->profile->save();
        }

        if($request->has('genotype') && !empty($request->genotype))
        {
            $employee->profile->genotype = $request->genotype;
            $employee->profile->save();
        }

        if($request->has('hobbies') && !empty($request->hobbies))
        {
            $employee->profile->hobbies = $request->hobbies;
            $employee->profile->save();
        }

        if($request->has('indebted') && !empty($request->indebted))
        {
            $employee->profile->indebted = $request->indebted;
            $employee->profile->save();
        }

        if($request->has('languages') && !empty($request->languages))
        {
            $employee->profile->languages = $request->languages;
            $employee->profile->save();
        }

        if($request->has('debt_details') && !empty($request->debt_details))
        {
            $employee->profile->debt_details = $request->debt_details;
            $employee->profile->save();
        }

        if($request->has('intention') && !empty($request->intention))
        {
            $employee->profile->intention = $request->intention;
            $employee->profile->save();
        }

        if($request->has('convict') && !empty($request->convict))
        {
            $employee->profile->convict = $request->convict;
            $employee->profile->save();
        }

        if($request->has('crime_details') && !empty($request->crime_details))
        {
            $employee->profile->crime_details = $request->crime_details;
            $employee->profile->save();
        }

        if($request->has('bank_name') && !empty($request->bank_name))
        {
            $employee->profile->bank_name = $request->bank_name;
            $employee->profile->save();
        }

        if($request->has('account_no') && !empty($request->account_no))
        {
            $employee->profile->account_no = $request->account_no;
            $employee->profile->save();
        }

        if($request->has('sort_code') && !empty($request->sort_code))
        {
            $employee->profile->sort_code = $request->sort_code;
            $employee->profile->save();
        }

        if($request->has('reports_to') && !empty($request->reports_to))
        {
            //dd($request->reports_to);
            if(ReportsTo::where('user_id', $employee->id )->exists())
            {
                $rep = ReportsTo::where('user_id',$employee->id)->first();
                $rep->reports_to = $request->reports_to;
                $rep->save();
            }else
            {
                $rep = new ReportsTo;
                $rep->user_id = $employee->id;
                $rep->reports_to = $request->reports_to;
                $rep->save();
            }
                
        }

        if($request->has('f_name') && !empty($request->f_name) && $request->has('o_name') && !empty($request->o_name) && $request->has('l_name') && !empty($request->l_name))
        {
            $employee->slug = str_slug($request->f_name.' '.$request->o_name.' '.$request->l_name);
            $employee->save();
        }

        Session::flash('success', 'You have successfully updated an Employee.');
        return redirect()->back();
    }

    public function salary()
    {
        $salaries = Payroll::where('employee_id', Auth::user()->id)->get();

        $data['notification'] = Notifications::where([
            ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
        ])->get();

        return view('crew.salary',[
            'salaries' => $salaries,
        ], $data);
    }

    public function mypayslip($id)
    {
        $payslip = Payroll::find($id);
        
        $data['notification'] = Notifications::where([
            ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
        ])->get();

        return view('crew.mypayslip', [
            'payslip' => $payslip,
        ],$data);
    }
}
