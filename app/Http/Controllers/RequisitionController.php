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

class RequisitionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$access = Req_users::where('user_id',auth()->user()->id)->count();
    	if($access > 0){
    		$user_role = Req_users::where('user_id',auth()->user()->id)->max('role_id');
    		if($user_role > 1){
    		    $data['requisition'] = Requisitions::all();
    		    $data['notification'] = Notifications::where([
    		    	['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
    		    ])->get();
    		    return view('requisitions.requisition',$data);
    	    }else{
    		    \Session::flash('msg','You have no access to this page.');
                return redirect()->route('err_access_denied');
    	    }
    	}else{
    		return redirect()->route('err_req_module');
    	}
    }

    public function myrequisitions(){
    	$access = Req_users::where('user_id',auth()->user()->id)->count();
    	if($access > 0){
    		$data['requisition'] = Requisitions::where('created_by',auth()->user()->id)->get();
    		$data['notification'] = Notifications::where([
    		    	['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
    		    ])->get();
    		return view('requisitions.requisition',$data);
    	}else{
    		return redirect()->route('err_req_module');
    	}
    }

    public function view($rid){
    	$access = Req_users::where('user_id',auth()->user()->id)->count();
    	if($access > 0){
    		$poster = Requisitions::where('rid',$rid)->value('created_by');
    	    $id = Requisitions::where('rid',$rid)->value('id');
    	    $supervisor = $this->getSupervisor($poster);
    	    $user_role = Req_users::where('user_id',auth()->user()->id)->max('role_id');
    	    if(auth()->user()->id == $poster || auth()->user()->id == $supervisor || $user_role > 1){
    		    $data['users'] = User::all();
    		    $data['req'] = Requisitions::find($id);
    		    $data['images'] = Req_documents::where('rid',$rid)->get();
    		    $data['history'] = Req_history::where('requistion_id',$id)->get();
    		    $data['notification'] = Notifications::where([
    		    	['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
    		    ])->get();
    		    return view('requisitions.view',$data);
    	    }else{
    		    \Session::flash('msg','You have no access to this page.');
                return redirect()->route('err_access_denied');
    	    }
    	}else{
    		return redirect()->route('err_req_module');
    	}
    	
    }

    public function new(){
    	$access = Req_users::where('user_id',auth()->user()->id)->count();
    	$budetController = Req_users::where('role_id', 3)->count();
    	$disbursement = Req_users::where('role_id', 5)->count();
    	if($access > 0){
    		if($budetController < 2){
    		    \Session::flash('msg','Two budget controller account need to be created before requisition can be made, contact service desk.');
                return redirect()->route('err_access_denied');
    	    }elseif($disbursement < 2){
    	    	\Session::flash('msg','Two Disbursement account need to be created before requisition can be made, contact service desk.');
                return redirect()->route('err_access_denied');
    	    }else{
    	    	$data['users'] = User::all();
    		    $data['notification'] = Notifications::where([
    		    	['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
    		    ])->get();
    		    return view('requisitions.new',$data);
    		}
    	}else{
    		return redirect()->route('err_req_module');
    	}
    }

    public function newFrame(){
    	$data['users'] = User::all();
    	$data['rid'] = $this->generateRid();
    	return view('requisitions.new1',$data);
    }

    public function insert(Request $req){
    	$sid = Req_users::where('user_id',auth()->user()->id)->value('supervisor_id');
    	$user_role = Req_users::where('user_id',auth()->user()->id)->value('role_id');
    	$requisition = new Requisitions;
    	$log = new Audit; 
    	$requisition->rid = $req->rid;
    	$requisition->created_by = auth()->user()->id;
    	$requisition->type = $req->type;
    	$requisition->status = "SENT";
    	$requisition->beneficiary = $req->beneficiary;
    	$requisition->reason = $req->reason;
    	$requisition->description = $req->description;
    	$requisition->quantity = $req->quantity;
    	$requisition->unit_price = $req->price;
    	$requisition->amount = ($req->quantity) * ($req->price);
    	$log->user_id = auth()->user()->id;
        $log->action = "Created a new requisition";
        $log->parameter = $req->reason;
        $requisition->save();
        $log->save();
        $requisition_id = $requisition->id;
        if($sid == NULL || $user_role == 6 || $sid == auth()->user()->id){
        	$this->sendToBudgetController($requisition_id);
        }else{
        	$this->sendToSupervisor($sid,$requisition_id);
        	\Session::flash('msg','Requisition made successfully'); //<--FLASH MESSAGE
            return redirect()->route('req_view',$requisition->rid);
        }
    }

    public function storeImage(Request $request, $rid){
        if(auth()->user()){
            $random = Str::random(5).''.now()->timestamp;
            $imageName = request()->file->getClientOriginalName();
            $newImage = $random."".$imageName;
            request()->file->move(public_path('upload'), $newImage);
            $image = new Req_documents();
            $image->rid = $rid;
            $image->file_name = $newImage;
            $image->save();
            return response()->json(['uploaded' => '/upload/'.$imageName]);
        }else{
            \Session::flash('msg','You need to login to continue'); //<--FLASH MESSAGE
            return redirect()->route('login');
        }
    }

    public function sendToSupervisor($sid,$rid){
    	$req = new Req_history();
    	$req->requistion_id = $rid;
    	$req->sender = auth()->user()->id;
    	$req->receiver = $sid;
    	$req->save();
    	$message = "pending requisition approval";
    	$type = 'Requisition';
    	$this->sendNotification(auth()->user()->id,$sid,$message,$type,$rid);
    }

    public function getSupervisor($uid){
    	$sid = Req_users::where('user_id',$uid)->value('supervisor_id');
    	return $sid;
    }

    public function sendNotification($sender,$receiver,$message,$type,$rid){
        $alert = new Notifications;
        $alert->mid = $rid;
        $alert->sender = $sender;
        $alert->receiver = $receiver;
        $alert->message = $message;
        $alert->type = $type;
        $alert->save();
    }

    public function status($id){
    	$access = Req_users::where('user_id',auth()->user()->id)->count();
    	if($access > 0){
    		$approval = $this->checkIfUserCanApprove($id,auth()->user()->id);
    		if($approval > 0){
    			$data['req'] = Requisitions::find($id);
    			$rid = Requisitions::where('id',$id)->value('rid');
    			$data['images'] = Req_documents::where('rid',$rid)->get();
    		    $data['history'] = Req_history::where('requistion_id',$id)->get();
    		    $data['can_approve'] = Req_history::where([
    		    	['requistion_id','=',$id],['receiver','=',auth()->user()->id],['status','!=','PENDING'],
    		    ])->count();
    		    $data['notification'] = Notifications::where([
    		    	['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
    		    ])->get();
    		    $latest_his = Req_history::where('requistion_id',$id)->orderBy('id','DESC')->first();
    		    $data['latest_his'] = $latest_his;
    		    $data['notification_id'] = Notifications::where([
    		    	['mid','=', $id],['sender','=', $latest_his->sender],['receiver', '=',auth()->user()->id],
    		    	['status', '=', 'SENT'],['type', '=' , 'Requisition'],
    		    ])->select('id')->pluck('id')->first();
    		    return view('requisitions.status',$data);
    		}else{
    			\Session::flash('msg','You have no access to this page.');
                return redirect()->route('err_access_denied');
    		}
    	}else{
    		return redirect()->route('err_req_module');
    	}
    }

    public function accept(Request $req){
    	$req_his = new Req_history();
    	$log = new Audit; 
    	$req_his->requistion_id = $req->rid;
    	$req_his->sender = $req->sender;
    	$req_his->receiver = auth()->user()->id;
    	$req_his->status = 'APPROVED';
    	$req_his->comment = $req->comment;  
    	$req_his->save();
    	$log->user_id = auth()->user()->id;
        $log->action = "Approved a requisition";
        $log->parameter = $req->rid;
        $log->save();
    	$nid = $req->nid;
    	$confirmBugetAccount = $this->checkIfAccountIsBudgetControl(auth()->user()->id);
    	$confirmDisburseAccount = $this->checkIfAccountIsDisbursement(auth()->user()->id);
    	//$count = Req_history::where('requistion_id',$req->rid)->count();
    	$latest_his = Req_history::where('requistion_id',$req->rid)->orderBy('id','DESC')->first();
    	if($confirmBugetAccount == true && $latest_his->receiver == auth()->user()->id){
    		$this->sendToDisbursement($req->rid);
    	}elseif($confirmDisburseAccount == true && $latest_his->receiver == auth()->user()->id){
    		DB::table('requisitions')->where('id', $req->rid)->update(array('status' => 'PAID'));
    	}else{
    		$this->sendToBudgetController($req->rid);
    	}
    	DB::table('notifications')->where('id', $nid)->update(array('status' => 'READ'));
    }

    public function reject(Request $req){
    	$req_his = new Req_history();
    	$log = new Audit; 
    	$req_his->requistion_id = $req->rid;
    	$req_his->sender = $req->sender;
    	$req_his->receiver = auth()->user()->id;
    	$req_his->status = 'REJECTED';
    	$req_his->comment = $req->comment;  
    	$req_his->save();
    	$log->user_id = auth()->user()->id;
        $log->action = "Rejected a requisition";
        $log->parameter = $req->rid;
        $log->save();
        $nid = $req->nid;
        DB::table('notifications')->where('id', $nid)->update(array('status' => 'READ'));
        DB::table('requisitions')->where('id', $req->rid)->update(array('status' => 'REJECTED'));
    }

    public function sendToBudgetController($rid){
    	$req = new Req_history();
    	$req->requistion_id = $rid;
    	$req->sender = auth()->user()->id;
    	$req->receiver = $this->getBudgetController();
    	$req->save();
    	$message = "pending requisition approval";
    	$type = 'Requisition';
    	$this->sendNotification(auth()->user()->id,$req->receiver,$message,$type,$rid);
    }

    public function sendToDisbursement($rid){
    	$req = new Req_history();
    	$req->requistion_id = $rid;
    	$req->sender = auth()->user()->id;
    	$req->receiver = $this->getDisbursementOfficer();
    	$req->save();
    	$message = "pending requisition approval";
    	$type = 'Requisition';
    	$this->sendNotification(auth()->user()->id,$req->receiver,$message,$type,$rid);
    }

    public function getBudgetController(){
    	do{
    		$budetController = Req_users::where('role_id', 3)->inRandomOrder()->limit(1)->value('user_id');
    		$isavailable = false;
    		if($budetController == auth()->user()->id){
    			$isavailable = false;
    		}else{
    			$isavailable = true;
    		}
    	}while ($isavailable == false);
    	return $budetController;
    }

    public function getDisbursementOfficer(){
    	do{
    		$officer = Req_users::where('role_id', 5)->inRandomOrder()->limit(1)->value('user_id');
    		$isavailable = false;
    		if($officer == auth()->user()->id){
    			$isavailable = false;
    		}else{
    			$isavailable = true;
    		}
    	}while ($isavailable == false);
    	return $officer;
    }

    public function checkIfAccountIsBudgetControl($uid){
    	$account = Req_users::where([
    		['user_id','=',$uid],['role_id','=',3],
    	])->count();
    	if($account > 0){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function checkIfAccountIsDisbursement($uid){
    	$account = Req_users::where([
    		['user_id','=',$uid],['role_id','=',5],
    	])->count();
    	if($account > 0){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function checkIfUserCanApprove($rid,$uid){
    	$approval = Req_history::where([
                ['receiver', '=' ,auth()->user()->id],['requistion_id', '=' ,$rid],
                ])->count();
    	return $approval;
    } 

    public function check_requisition_by_id($rid){
    	$id = Requisitions::where('rid',$rid)->get();
    	$wordCount = $id->count();
    	if($wordCount == 1){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function generateRid(){
    	do{
    		$rid = "rid".rand(100,100000);
    		$isavailable = false;
    		if($this->check_requisition_by_id($rid) == true){
				$isavailble = true;
			}else{
				$isavailble = false;
			}
    	}
    	while($isavailble == true);
		return $rid;
    }

    public function accounts(){
    	$admin_account = Req_users::where([
                ['user_id', '=' ,auth()->user()->id],['role_id', '=' ,4],
                ])->count();
    	if($admin_account > 0){
    		$data['user_details'] = DB::table('users')
                    ->whereRaw("id in(SELECT user_id FROM req_users GROUP By user_id)")
                    ->get();
    		$data['accounts'] = Req_users::all();
    	    $data['users'] = User::all();
    	    $data['roles'] = Req_roles::all();
    	    $data['notification'] = Notifications::where([
    		    	['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
    		    ])->get();
    	    return view('requisitions.accounts',$data);
    	}else{
    		\Session::flash('msg','You have no access to this page.');
            return redirect()->route('err_access_denied');
    	}
    	
    }

    public function insert_accounts(Request $req){
    	if($this->getUserRole($req->sid) == 3 || $this->getUserRole($req->sid) == 5){
    		\Session::flash('msg','Budget control officer or Disbursement officer cannot be assigned as supervisor');
             return redirect()->route('req_accounts');
    	}
    	$roles = $req->roles;
    	foreach ($roles as $str){
             $account = new Req_users;
    	     $account->user_id = $req->uid;
    	     $account->supervisor_id = $req->sid;
    	     $account->role_id = $str;
             $account->save();
         }
         \Session::flash('msg','Employee has been added to the requisition group successfully');
         return redirect()->route('req_accounts');
    }

    public function getUserRole($uid){
    	$user_id = Req_users::where('user_id',$uid)->value('role_id');
    	return $user_id;
    }

    public function getAccDetails(Request $req){
    	$user = User::find($req->id);
    	$user_exist = Req_users::where('user_id',$req->id)->count();
    	$html = "";
    	$html.='<p>Fullname : '.$user->fname." ".$user->lname.'</p>';
    	$html.='<p>Email : '.$user->email.'</p>';
    	if($user_exist > 0){
    		$html.='<p style="color:red">This user has access to this platform already, you need to edit user to add more access rights </p><br>';
    	}
    	echo $html;
    }

    public function getHodDetails(Request $req){
    	$user = User::find($req->id);
    	$html = "";
    	$html.='<p>Fullname : '.$user->fname." ".$user->lname.'</p>';
    	$html.='<p>Email : '.$user->email.'</p>';
    	echo $html;
    }

    public function edit_account($rid){

    }







}
