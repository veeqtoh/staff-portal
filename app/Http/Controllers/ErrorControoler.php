<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Req_users;
use App\Requisitions;
use App\Req_roles;
use App\Audit;
use App\Req_history;
use App\Notifications;
use App\Req_documents;

class ErrorControoler extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$data['notification'] = Notifications::where([
    		['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
    	])->get();
    	return view('errors.req_module',$data);
    }

    public function access(){
    	$data['notification'] = Notifications::where([
    		['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
    	])->get();
    	return view('errors.access_denied',$data);
    }




}
