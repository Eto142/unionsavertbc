<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\User;
use App\Models\Plan;
use App\Models\Refferal;
use App\Models\Earning;
use App\Models\Profit;
use App\Models\Debitprofit;
use App\Mail\supportEmail;
use App\Mail\welcomeEmail;
use App\Mail\otpEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use DB;

class UserController extends Controller
{

  public function redirect()
    {
       if (Auth::id())
       {


          if(Auth::user()->usertype=='0')
          {

    
           $client = new Client();
            $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
            $data = json_decode($response->getBody(), true);
            $price = $data['bpi']['USD']['rate_float'];
            
    
            
            $data['deposit'] = User::where('id',Auth::user()->id)->sum('balance');
            $data['withdrawal'] = Withdrawal::where('user_id',Auth::user()->id)->sum('amount');
            $data['balance'] = $data['deposit']-$data['withdrawal'];
            $data['btc'] = $data['balance']/ $price;
            return view('dashboard.home',$data);
          }
          
    

          else {
            $result    = DB::table('users')->where('usertype','0')->get();
            return view('admin.home',compact('result'));
           
               }
       }
          else 
          {
                  return redirect()->back();
          }
    }





    public function dashboard()
    {
        if (Auth::id())
        {
 
 
           if(Auth::user()->usertype=='0')
           {
 
        
             
            $client = new Client();
            $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
            $data = json_decode($response->getBody(), true);
            $price = $data['bpi']['USD']['rate_float'];
            
    
            
            $data['deposit'] = User::where('id',Auth::user()->id)->sum('balance');
            $data['withdrawal'] = Withdrawal::where('user_id',Auth::user()->id)->sum('amount');
            $data['balance'] = $data['deposit']-$data['withdrawal'];
            $data['btc'] = $data['balance']/ $price;
             return view('dashboard.home',$data);
           }
           
     
 
           else {
             $result    = DB::table('users')->get();
             return view('admin.home',compact('result'));
            
                }
        }
           else 
           {
                   return redirect()->back();
           }
 
    }
    public function exchange(){
        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];
        

        
        $data['deposit'] = User::where('id',Auth::user()->id)->sum('balance');
        $data['withdrawal'] = Withdrawal::where('user_id',Auth::user()->id)->sum('amount');
        $data['balance'] = $data['deposit']-$data['withdrawal'];
        $data['btc'] = $data['balance']/ $price;
        return view('dashboard.exchange',$data);
    }
    public function markets(){

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];
        

        
        $data['deposit'] = User::where('id',Auth::user()->id)->sum('balance');
        $data['withdrawal'] = Withdrawal::where('user_id',Auth::user()->id)->sum('amount');
        $data['balance'] = $data['deposit']-$data['withdrawal'];
        $data['btc'] = $data['balance']/ $price;
        return view('dashboard.markets',$data);
    }
    

    public function pay(){
        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];
        

        
        $data['deposit'] = User::where('id',Auth::user()->id)->sum('balance');
        $data['withdrawal'] = Withdrawal::where('user_id',Auth::user()->id)->sum('amount');
        $data['balance'] = $data['deposit']-$data['withdrawal'];
        $data['btc'] = $data['balance']/ $price;
        return view('dashboard.pay',$data);

    }
    public function screener(){
        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];
        

        
        $data['deposit'] = User::where('id',Auth::user()->id)->sum('balance');
        $data['withdrawal'] = Withdrawal::where('user_id',Auth::user()->id)->sum('amount');
        $data['balance'] = $data['deposit']-$data['withdrawal'];
        $data['btc'] = $data['balance']/ $price;
        return view('dashboard.screener',$data);
    }

    public function account(){
       
        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];
        

        
        $data['deposit'] = User::where('id',Auth::user()->id)->sum('balance');
        $data['withdrawal'] = Withdrawal::where('user_id',Auth::user()->id)->sum('amount');
        $data['balance'] = $data['deposit']-$data['withdrawal'];
        $data['btc'] = $data['balance']/ $price;
        return view('dashboard.account',$data);
      
    }


    public function getDeposit(Request $request)
    {
   
        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];
        

        
        $data['deposit'] = User::where('id',Auth::user()->id)->sum('balance');
        $data['withdrawal'] = Withdrawal::where('user_id',Auth::user()->id)->sum('amount');
        $data['balance'] = $data['deposit']-$data['withdrawal'];
        $data['btc'] = $data['balance']/ $price;
      

        $deposit = new Deposit;
        $deposit->user_id = Auth::user()->id;
        $deposit->amount=$request['amount'];
        $deposit->payment_method=$request['method'];
        $deposit->status=0;
        $deposit->save();

        return view('dashboard.pay',$data);
    }







public function updatePassword(Request $request)
{
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
}



public function profileUpdate(Request $request){
    //validation rules

    $request->validate([
        'name' =>'string',
        'phone' =>'string',
        'address' =>'string'
  
    ]);
    $user = Auth::user();
    $user->name = $request['name'];
    $user->phone = $request['phone'];
    $user->dob = $get['dob'];
    $user->address = $request['address'];
  
 
    $user->update();
    return back()->with('status','Profile Updated');
}


public function supportEmail(Request $request){
        
      $data = [
        'name' =>$request->name,
        'email' =>$request->email, 
        'message' =>$request->message,
      ];
      Mail::to('blueswayne133@gmail.com')->send(new supportEmail($data));

      return back()->with('status','Email Successfully sent');

}





public function makeWithdrawal(Request $request)
{


    
    $data['deposit'] = User::where('id',Auth::user()->id)->sum('balance');
    $data['withdrawal'] = Withdrawal::where('user_id',Auth::user()->id)->sum('amount');
    $data['balance'] = $data['deposit']-$data['withdrawal'];
   

    $with = new Withdrawal;
    $with->user_id = Auth::user()->id;
    $with->amount=$request['amount'];
    $amount =  $with->amount=$request['amount'];
    $data['amount']=$amount;
    $with->mode=$request['method'];
    $with->save();

    return view('dashboard.confirmation',$data);
    
}




public function changePassword(Request $request)
{
    return view('users.change-password');
}

public function changePasswordSave(Request $request)
{
    
    $this->validate($request, [
        'current_password' => 'required|string',
        'new_password' => 'required|confirmed|min:8|string'
    ]);
    $auth = Auth::user();

// The passwords matches
    if (!Hash::check($request->get('current_password'), $auth->password)) 
    {
        return back()->with('error', "Current Password is Invalid");
    }

// Current password and new password same
    if (strcmp($request->get('current_password'), $request->new_password) == 0) 
    {
        return redirect()->back()->with("error", "New Password cannot be same as your current password.");
    }

    $user =  User::find($auth->id);
    $user->password =  Hash::make($request->new_password);
    $user->save();
    return back()->with('success', "Password Changed Successfully");
}






public function perform()
{
    Session::flush();
    Auth::guard('web')->logout();
    return redirect('login');
}


}
