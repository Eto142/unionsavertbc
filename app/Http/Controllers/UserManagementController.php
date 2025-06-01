<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Deposit;
use App\Mail\profitEmail;
use App\Models\Withdrawal;
use App\Models\Earning;
use App\Models\User;
use App\Models\Refferal;
use App\Models\Profit;
use App\Models\Debitprofit;
use App\Models\Plan;
use DB;
use Session;



class UserManagementController extends Controller
{   
    
   
    
    public function viewUser(){

        if(Auth::user()->usertype=='1')
        {
            $result      = DB::table('users')->where('usertype','0')->get();
            return view('admin.users',compact('result'));
        }
        else
        {
            return redirect()->route('home'); 
        }


    }



    public function usersDeposit(){

        
            // $profile = Session::get('user_id');
            // // $employees = DB::table('profile_information')->where('user_id',$profile)->first();
            // $result      = DB::table('users')->get();
            $user      = DB::table('users')->get();
            $deposit      = DB::table('deposits')->get();
            $totalDeposit      = DB::table('deposits')->count();
            $activeDeposit      = DB::table('deposits')->where('status','1')->sum('amount');
            $inactiveDeposit      = DB::table('deposits')->where('status','0')->sum('amount');
            return view('admin.users_deposits',compact('deposit','user','totalDeposit','activeDeposit','inactiveDeposit'));
    
          }

          public function usersWithdrawals(){

            $user      = DB::table('users')->get();
            $withdrawal      = DB::table('withdrawals')->get();
            $totalWithdrawal      = DB::table('withdrawals')->count();
            $activeWithdrawal      = DB::table('withdrawals')->where('status','1')->sum('amount');
            $inactiveWithdrawal      = DB::table('withdrawals')->where('status','0')->sum('amount');
            return view('admin.users_withdrawals',compact('withdrawal','user','totalWithdrawal','activeWithdrawal','inactiveWithdrawal'));
    
          }


    public function userProfile($id)
    {   
           

    
            
            $userProfile      = User::findOrFail($id);
            $userDeposit      = DB::table('deposits')->where('user_id',$id)->orderBy('id','desc')->get();
            $userWithdrawal    = DB::table('withdrawals')->where('user_id',$id)->orderBy('id','desc')->get();
          
          

            // sum transactions
            $totalDeposit      = DB::table('deposits')->where('user_id',$id)->where('status', '1')->sum('amount');
            $totalWithdrawal      = DB::table('withdrawals')->where('user_id',$id)->sum('amount');
            $totalProfit =   $totalWithdrawal;

            
            
            return view('admin.profile',compact('userProfile', 'userDeposit','totalDeposit','userWithdrawal'));
     
    }

    public function approveDeposit(Request $request, $id){
        $deposit = array();
        $deposit['status'] = $request->status;
        $update = DB::table('deposits')->where('id',$id)->update($deposit);
        return redirect()->back()->with('message', 'Deposit Has Been Approved Successfully');
    }

    public function DeclineDeposit(Request $request, $id){
        $deposit = array();
        $deposit['status'] = $request->status;
        $update = DB::table('deposits')->where('id',$id)->update($deposit);
        return redirect()->back()->with('message', 'Deposit Declined');
    }

    public function ApproveKyc(Request $request, $id){
        $kyc = array();
        $kyc['kyc_status'] = $request->kyc_status;
        $update = DB::table('users')->where('id',$id)->update($kyc);
        return redirect()->back()->with('message', 'KYC Has Been Approved Successfully');
    }




    public function getUserProfit($id)
    {               
           
        $userProfile   = DB::table('users')->where('id',$id)->first();
         return view('admin.add_profit',compact('userProfile'));
     
    }

    public function deleteUser($id)
    {
  
        $user  = User::findOrFail($id);
        $user->delete();
        return back()->with('message', 'User deleted Successfully');  
    }


    // public function getDebitProfit($id)
    // {   
   

    
            
    //         $userProfile   = DB::table('users')->where('id',$id)->first();
            
    //         return view('admin.debit_profit',compact('userProfile'));
     
    // }

    // public function debitUserProfit(Request $request)
    // {
    //     // $validate->validate($request,[
    //     //     'subject' => 'required',
    //     //     'message' => 'required'
    //     // ]);

    //     $topUp = new Debitprofit;
    //     $topUp->user_id = $request['user_id'];
    //     $topUp->amount=$request['amount'];

    //       $topUp->save();
    //       return redirect()->back()->with('message', 'User Profit Debited Successfully');  
    // }

    // public function getUserDeposit($id)
    // {   
   

    
            
    //         $userProfile   = DB::table('users')->where('id',$id)->first();
            
    //         return view('admin.add_deposit',compact('userProfile'));
     
    // }


    // public function addUserDeposit(Request $request)
    // {
    //     // $validate->validate($request,[
    //     //     'subject' => 'required',
    //     //     'message' => 'required'
    //     // ]);

    //     $topUp = new Deposit;
    //     $topUp->user_id = $request['user_id'];
    //     $topUp->payment_method = $request['payment_method'];
    //     $topUp->amount=$request['amount'];
    //     $topUp->status=1;
    //     $topUp->created_at=$request['deposit_date'];

    //       $topUp->save();
    //       return redirect()->back()->with('message', 'User Deposit Added Successfully');  
    // }

    // public function getUserReferral($id)
    // {   
   

    
            
    //         $userProfile   = DB::table('users')->where('id',$id)->first();
            
    //         return view('admin.add_referral',compact('userProfile'));
     
    // }

    // public function addUserReferral(Request $request)
    // {
    //     // $validate->validate($request,[
    //     //     'subject' => 'required',
    //     //     'message' => 'required'
    //     // ]);

    //     $topUp = new Refferal;
    //     $topUp->user_id = $request['user_id'];
    //     $topUp->amount=$request['amount'];

    //       $topUp->save();
    //       return redirect()->back()->with('message', 'User Referral Bonus Added Successfully');  
    // }



    public function updateDetails(Request $request, $id)
    {
        
        $update = User::findOrFail($id);
        $update->balance = $request['balance'];
        $email = $request->input('email');
    

          $update->save();
          $data = [
            'balance' =>$request->balance,
          ];
          Mail::to($email)->send(new profitEmail($data));
          return redirect()->back()->with('message', 'User Details Updated Successfully');  
    }

    public function updateProgress(Request $request, $id)
    {
        
        $update = User::findOrFail($id);
        $update->trading_progress=$request['trading_progress'];
        $update->save();

          return redirect()->back()->with('message', 'User Details Updated Successfully');  
    }

    
    public function updateLevel(Request $request, $id)
    {
        
        $update = User::findOrFail($id);
        $update->trading_level=$request['trading_level'];
        $update->save();
          
        return redirect()->back()->with('message', 'User Details Updated Successfully');  
    }

  
 

}
