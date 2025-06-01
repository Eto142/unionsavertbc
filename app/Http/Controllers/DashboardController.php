<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Nft;
use App\Models\Card;
use App\Models\Loan;
use App\Models\User;
use App\Models\Debit;
use App\Mail\nftEmail;
use App\Models\Credit;
use GuzzleHttp\Client;
use App\Models\Deposit;
use App\Models\Transfer;
use App\Mail\nftUserEmail;
use App\Mail\SendTokenEmail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class DashboardController extends Controller
{

    public function transferPage()
    {
        return view('dashboard.transfer');
    }
    
      public function userProfile()
    {

        return view('dashboard.profile');
 
    }

    public function skrill()
    {
        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        // $data['debit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_type','Debit')->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans'] - $data['debit_transfers']- $data['user_card'];
        
        return view('dashboard.skrill',$data);
 
    }

    public function crypto()
    {
        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        return view('dashboard.crypto',$data);
 
    }


    public function cryptoDeposit()
    {
        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        return view('dashboard.crypto_deposit',$data);
 
    }

    public function bank()
    {
        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        return view('dashboard.bank',$data);
 
    }

    public function paypal()
    {
        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        return view('dashboard.paypal', $data);
 
    }

    public function card()
    {
         
        $data['details'] = Card::where('user_id',Auth::user()->id)->get();
        
        return view('dashboard.card',$data);
 
    }

    public function token()
    {
         
        return view('dashboard.token');
 
    }
    
    
    
       public function Usertoken()
    {
         
        return view('dashboard.token');
 
    }
    


public function UserOtp(Request $request)
{
    // Validate and sanitize input
    $request->validate([
        'otp' => 'required|numeric', // Adjust validation rules as needed
    ]);

    $otp = $request->input('otp');

    // Check if OTP matches
    if ($otp != Auth::user()->otp) {
        return back()->with('error', 'Incorrect TAC Code!');
    }

    // Clear the OTP from the user's record as it's used
    Auth::user()->otp = null;
    Auth::user()->save();

    // Redirect to the withdrawal_completed page
    return redirect()->route('withdrawal_completed');
}

    
    
    
    public function Completed()
{
    return view('dashboard.withdrawal_completed');
}

    
    public function requestCard($user_id)
    {
        // $userData = User::where('id',$user_id)->first();
        // $user_id = $userData->id;

        $existingCard = Card::where('user_id', $user_id)->first();

        // Check if the user already has a card
        if ($existingCard) {
            return back()->with('error', 'You already have a card. You cannot request another one.');
        }


        $amount = 0;

        

   $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
       $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        
        
        if($amount > $data['balance'])
        {
            return back()->with('error', ' Your account balance is insufficient, contact our administrator for more info!!');
        }
               
        $card_number = rand(765039973798, 123449889412);       
        $cvc = rand(765, 123);        
        $ref = rand(76503737, 12344994);
        $startDate = date('Y-m-d');
        $expiryDate = date('Y-m-d', strtotime( $startDate.'+ 24 months'));

        $ref = rand(76503737, 12344994);   
       $card = new Card;
       $card->transaction_id = $ref;
       $card->user_id = Auth::user()->id;
        $card->card_number = $card_number;
        $card->card_cvc = $cvc;
        $card->card_expiry = $expiryDate;
        $card->email = Auth::user()->email;
        $card->status = 0;
        $card->save();

        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = $ref;
        $transaction->transaction_ref = "CD".$ref;
        $transaction->transaction_type = "Debit";
        $transaction->transaction = "Card";
        $transaction->transaction_amount = "10";
        $transaction->email = Auth::user()->email;
        $transaction->credit =  "0";
        $transaction->debit = "10";
        $transaction->transaction_description = "Virtual Card Purchase";
        $transaction->transaction_status = 0;
        $transaction->save();


        return view('dashboard.getting_card');
    }
    
                 
   
    

    
  

    public function notification()
    {
        return view('dashboard.notification');
    } 
    public function transactions()
    {
        $data['transaction'] = Transaction::where('user_id', Auth::user()->id)
                                        ->orderBy('created_at', 'desc')
                                        ->get();
        return view('dashboard.transactions',$data);
    } 

    public function viewInvoice(Request $request, $tid)
    {
        
            $data['invoice'] = DB::table('cards')
            ->join('transactions', 'cards.id', '=', 'transactions.transaction_id')
            ->select('cards.*', 'transactions.*')
            ->where('transaction_id',$tid)
            ->get();
    
            return view('dashboard.view_invoice',$data);
        
        if($request['type']=='Transfer')
        {
            $data['invoice'] = DB::table('transfers')
            ->join('transactions', 'transfers.id', '=', 'transactions.transaction_id')
            ->select('transfers.*', 'transactions.*')
            ->where('id',$tid)
            ->get();
            return view('dashboard.transfer_invoice',$data);
        }

    }
    
    public function pendingTransfer()
    {
        return view('dashboard.pending_transfer');
    }  
    public function settings()
    {
        return view('dashboard.settings');
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
             $data['message'] = 'old password not correct';
            return back()->with("error", "Old Password Doesn't match! Please input your correct old password");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
    Session::flush();
    Auth::guard('web')->logout();
    return redirect('login')->with('status', 'Password Updated Successfully, Please login with your new password');

}
    public function profile()
    {
        return view('dashboard.profile');
    } 
    
     public function CardWithdrawal(){
         
          $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
          $data['details'] = Card::where('user_id',Auth::user()->id)->get();
        return view('dashboard.card_withdrawal', $data);
    } 

    public function userChangePassword()
    {
        return view('dashboard.change_password');
    } 

    public function deposit()
    {
        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->sum('transaction_amount');
        $data['debit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        return view('dashboard.deposit',$data);
    }

    public function loan()
    { 
       $data['outstanding_loan']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
       $data['pending_loan']= Loan::where('user_id', Auth::user()->id)->where('status','0')->sum('amount');
       $data['transaction']= Transaction::where('user_id', Auth::user()->id)->where('transaction','Loan')->get();
        return view('dashboard.loan',$data);
    } 


  public function LoanUser()
    { 
    //    $data['outstanding_loan']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
    //    $data['pending_loan']= Loan::where('user_id', Auth::user()->id)->where('status','0')->sum('amount');
    //    $data['transaction']= Transaction::where('user_id', Auth::user()->id)->where('transaction','Loan')->get();
       $data['data'] = $request->session()->get('data');
        return view('dashboard.loanuser',$data);
    } 

    // public function thecard()
    // { 
    //    $data['outstanding_loan']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
    //    $data['pending_loan']= Loan::where('user_id', Auth::user()->id)->where('status','0')->sum('amount');
    //    $data['transaction']= Transaction::where('user_id', Auth::user()->id)->where('transaction','Loan')->get();
    //     return view('dashboard.card',$data);
    // } 
    

   
  






    
    public function uploadKyc(Request $request)
    {
        
        $kyc =  Auth::user();
        $kyc->kyc_status = 0;
        $file_id_card = $request->file('card');
        $file_passport = $request->file('pass');
        $ext_id_card = $file_id_card->getClientOriginalExtension();
        $ext_passport = $file_passport->getClientOriginalExtension();
        $filename_id_card = time() . '.' . $ext_id_card;
        $filename_passport = time() . '.' . $ext_passport;
        $file_id_card->move('uploads/kyc/', $filename_id_card);
        $file_passport->move('uploads/kyc/', $filename_passport);
        $kyc->id_card =  $filename_id_card;
        $kyc->passport =  $filename_passport;
        $kyc->save();
        return redirect('profile')->with('status', 'Document updated successfully, please wait for approval');
    }














    public function bankTransfer(Request $request)
    {
        
                
        $otp = $request->input('otp');
        $amount = $request->input('amount');
        $user = Auth::user();

        if ($user->user_status == 1) {
            return view('dashboard.frozen'); // Return a view indicating the account is frozen
        }

        if ($user->user_activity == 1) {
            return view('dashboard.moneylaundering'); // Return a view indicating the account is suspected for fraud
        }
    

        $otp = $request->input('otp');
        $amount = $request->input('amount');

    //      if($otp!=Auth::user()->otp)
    //      {
    //          return back()->with('error', ' incorrect Transfer Authorization Code!');
    //  }

        
        $transaction_pin = $request->input('transaction_pin');
        if ($transaction_pin != Auth::user()->account_pin) {
        return back()->with('error', ' Incorrect Transaction Pin number!');
        }


        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
       $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        
        if($amount > $data['balance'])
        {
            return back()->with('error', ' Your account balance is insufficient, contact our administrator for more info!!');
        }
        


        $ref = rand(76503737, 12344994);
        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = "TR".$ref;
        $transaction->transaction_ref = "TR".$ref;

        $transaction->transaction_amount =  $request['amount'];
        $transaction->credit =  "0";
        $transaction->debit =  $request['amount'];;

        $transaction->transaction_type = "Debit";
        $transaction->transaction = "Bank Transfer";
        $transaction->transaction_amount = $request['amount'];
        $transaction->credit =  "0";
        $transaction->debit = $request['amount'];
        $transaction->email = Auth::user()->email;
        $transaction->transaction_description = "Transfer to ".$request['account_name'];
        $transaction->account_name = $request['account_name'];
        $transaction->account_number = $request['account_number'];
        $transaction->account_type = $request['account_type'];
        $transaction->bank_name = $request['bank_name'];
        $transaction->transaction_status = 0;
        
        
        $email = Auth::user()->email;
        $first_name = Auth::user()->first_name;
        $token = rand(7650, 1234);
         $user = Auth::user();
        $user->otp = $token;
        $user->save();

        $data = [
        'first_name' => Auth::user()->first_name,
      'token' =>  $token];
    //    Mail::to($email)->send(new SendTokenEmail($token, $first_name));
        $transaction->save();

    
    return redirect()->route('token.page')->with('success', 'Token sent to your email. Please check your inbox.');
    }

    public function paypalTransfer(Request $request)
    {
                

        $user = Auth::user();

        if ($user->user_status == 1) {
            return view('dashboard.frozen'); // Return a view indicating the account is frozen
        }
    
        if ($user->user_activity == 1) {
            return view('dashboard.moneylaundering'); // Return a view indicating the account is suspected for fraud
        }

        $otp = $request->input('otp');
        $amount = $request->input('amount');

    //      if($otp!=Auth::user()->otp)
    //      {
    //          return back()->with('error', ' incorrect Transfer Authorization Code!');
    //  }


        
        $transaction_pin = $request->input('transaction_pin');
        if ($transaction_pin != Auth::user()->account_pin) {
        return back()->with('error', ' Incorrect Transaction Pin number!');
        }

   $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
       $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        
        
        if($amount > $data['balance'])
        {
            return back()->with('error', ' Your account balance is insufficient, contact our administrator for more info!!');
        }


        $ref = rand(76503737, 12344994);


        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = "PAY".$ref;
        $transaction->transaction_ref = "PAY".$ref;
        $transaction->transaction_type = "Debit";
        $transaction->email = Auth::user()->email;
        $transaction->transaction = "Paypal Withdrawal";
        $transaction->transaction_amount = $request['amount'];
        $transaction->transaction_description = "Paypal transaction";
        $transaction->transaction_status = 0;
        
        
        
         $email = Auth::user()->email;
        $first_name = Auth::user()->first_name;
        $token = rand(7650, 1234);
         $user = Auth::user();
        $user->otp = $token;
        $user->save();

    //     $data = [
    //     'first_name' => Auth::user()->first_name,
    //   'token' =>  $token];
    //    Mail::to($email)->send(new SendTokenEmail($token, $first_name));
        $transaction->save();

        
    //     $email = Auth::user()->email;
    //     $first_name = Auth::user()->first_name;
    //     $token = rand(7650, 1234);

    //     $data = [
    //   'first_name' => Auth::user()->first_name,
    //   'token' =>  $token,
    //    ];
    // Mail::to($email)->send(new SendTokenEmail($token, $first_name));

    return redirect()->route('token.page')->with('success', 'Token sent to your email. Please check your inbox.');
    }


    public function skrillTransfer(Request $request)
    {
                
        $otp = $request->input('otp');
        $amount = $request->input('amount');
        $user = Auth::user();

        if ($user->user_status == 1) {
            return view('dashboard.frozen'); // Return a view indicating the account is frozen
        }
        if ($user->user_activity == 1) {
            return view('dashboard.moneylaundering'); // Return a view indicating the account is suspected for fraud
        }

        $otp = $request->input('otp');
        $amount = $request->input('amount');

    //      if($otp!=Auth::user()->otp)
    //      {
    //          return back()->with('error', ' incorrect Transfer Authorization Code!');
    //  }


         
        $transaction_pin = $request->input('transaction_pin');
        if ($transaction_pin != Auth::user()->account_pin) {
        return back()->with('error', ' Incorrect Transaction Pin number!');
        }
         $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
       $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        
        if($amount > $data['balance'])
        {
            return back()->with('error', ' Your account balance is insufficient, contact our administrator for more info!!');
        }


        $ref = rand(76503737, 12344994);


        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = "SKR".$ref;
        $transaction->transaction_ref = "SKR".$ref;
        $transaction->transaction_type = "Debit";
        $transaction->transaction = "Skrill Withdrawal";
        $transaction->email = Auth::user()->email;
        $transaction->transaction_amount = $request['amount'];
        $transaction->transaction_description = "Skrill Withdrawal transaction";
        $transaction->transaction_status = 0;
        
         $email = Auth::user()->email;
        $first_name = Auth::user()->first_name;
        $token = rand(7650, 1234);
         $user = Auth::user();
        $user->otp = $token;
        $user->save();

        $data = [
        'first_name' => Auth::user()->first_name,
      'token' =>  $token];
    //    Mail::to($email)->send(new SendTokenEmail($token, $first_name));
        $transaction->save();

        
       
       

    return redirect()->route('token.page')->with('success', 'Token sent to your email. Please check your inbox.');
    }








    
    public function cryptoTransfer(Request $request)
    {
                
        $otp = $request->input('otp');
        $amount = $request->input('amount');
        
        $user = Auth::user();

        if ($user->user_status == 1) {
            return view('dashboard.frozen'); // Return a view indicating the account is frozen
        }
    
        if ($user->user_activity == 1) {
            return view('dashboard.moneylaundering'); // Return a view indicating the account is suspected for fraud
        }

        $otp = $request->input('otp');
        $amount = $request->input('amount');

    //      if($otp!=Auth::user()->otp)
    //      {
    //          return back()->with('error', ' incorrect Transfer Authorization Code!');
    //  }




        $transaction_pin = $request->input('transaction_pin');
        if ($transaction_pin != Auth::user()->account_pin) {
        return back()->with('error', ' Incorrect Transaction Pin number!');
        }



        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
       $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans']- $data['debit_transfers']- $data['user_card'];
        
        
         if($amount > $data['balance'])
         {
             return back()->with('error', ' Your account balance is insufficient, contact our administrator for more info!!');
     }


        $ref = rand(76503737, 12344994);


        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = "CRP".$ref;
        $transaction->transaction_ref = "CRP".$ref;


        $transaction->transaction_type = "Debit";
        $transaction->credit = "0";
        $transaction->transaction_amount = $request['amount'];
        $transaction->debit = $request['amount'];
        $transaction->transaction = "Crypto Withdrawal";
        $transaction->email = Auth::user()->email;
        $transaction->wallet_type = $request['wallet_type'];
        $transaction->wallet_address = $request['wallet_address'];
        $transaction->transaction_description = "Crypto Withdrawal transaction";
        $transaction->transaction_status = 0;


    
        
        $email = Auth::user()->email;
        $first_name = Auth::user()->first_name;
        $token = rand(7650, 1234);
         $user = Auth::user();
        $user->otp = $token;
        $user->save();

        $data = [
        'first_name' => Auth::user()->first_name,
      'token' =>  $token];
    //    Mail::to($email)->send(new SendTokenEmail($token, $first_name));

        $transaction->save();

        // return view('dashboard.token');
        return redirect()->route('token.page')->with('success', 'Token sent to your email. Please check your inbox.');
    }













public function cardTransfer(Request $request)
{
    $otp = $request->input('otp');
    $amount = $request->input('amount');
    $user = Auth::user();

    if ($user->user_status == 1) {
        return view('dashboard.frozen'); // Return a view indicating the account is frozen
    }

    if ($user->user_activity == 1) {
        return view('dashboard.moneylaundering'); // Return a view indicating the account is suspected for fraud
    }

    $otp = $request->input('otp');
    $amount = $request->input('amount');

//      if($otp!=Auth::user()->otp)
//      {
//          return back()->with('error', ' incorrect Transfer Authorization Code!');
//  }


    $transaction_pin = $request->input('transaction_pin');
    if ($transaction_pin != Auth::user()->account_pin) {
        return back()->with('error', 'Incorrect Transaction Pin number!');
    }

    $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)
        ->where('transaction_status', '1')
        ->where('transaction_type', 'Credit')
        ->sum('transaction_amount');
    $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)
        ->where('transaction_status', '1')
        ->where('transaction_type', 'Debit')
        ->sum('transaction_amount');
    $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)
        ->where('status', '1')
        ->sum('amount');
    $data['user_loans'] = Loan::where('user_id', Auth::user()->id)
        ->where('status', '1')
        ->sum('amount');
    $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');
    $data['user_credit'] = Credit::where('user_id', Auth::user()->id)
        ->where('status', '1')
        ->sum('amount');
    $data['user_debit'] = Debit::where('user_id', Auth::user()->id)
        ->where('status', '1')
        ->sum('amount');
    $data['balance'] = $data['user_deposits'] + $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];

    if ($amount > $data['balance']) {
        return back()->with('error', 'Your account balance is insufficient, contact our administrator for more info!!');
    }
    
    
    
     // Verify if user has a card associated with their account
    $userCard = Card::where('user_id', Auth::user()->id)->first();

    if (!$userCard) {
        return back()->with('error', 'Card not purchased yet. Please purchase a card first.');
    }
    
    

    // Verify if card details (number, CVV, expiry date) match
    $card = Card::where('user_id', Auth::user()->id)
        ->where('card_number', $request['card_number'])
        ->where('card_cvc', $request['cvv'])
        ->first();

    if (!$card) {
        return back()->with('error', 'Card details do not match. Please check your card information.');
    }

    // Generate a random reference number for the transaction
    $ref = rand(76503737, 12344994);

    // Create a new transaction record with the provided details
    $transaction = new Transaction;
    $transaction->user_id = Auth::user()->id;
    $transaction->transaction_id = "CRD" . $ref;
    $transaction->transaction_ref = "CRD" . $ref;
    $transaction->transaction_type = "Debit";
    $transaction->credit = "0";
    $transaction->transaction_amount = $request['amount'];
    $transaction->debit = $request['amount'];
    $transaction->transaction = " Virtual Card Withdrawal";
    $transaction->email = Auth::user()->email;
    $transaction->card_number = $request['card_number'];
    $transaction->cvv = $request['cvv'];
    $transaction->caccount_number = $request['caccount_number'];
    $transaction->caccount_name = $request['caccount_name'];
    $transaction->cbank_name = $request['cbank_name'];
    $transaction->transaction_description = "Card Withdrawal transaction";
    $transaction->transaction_status = 0;

    // Generate and send a token to the user's email for verification
    $token = rand(7650, 1234);
    $user = Auth::user();
    $user->otp = $token;
    $user->save();

    $data = [
        'first_name' => Auth::user()->first_name,
        'token' => $token
    ];
    // Mail::to(Auth::user()->email)->send(new SendTokenEmail($token, Auth::user()->first_name));

    // Save the transaction record
    $transaction->save();

    // Redirect the user to the token verification page
    return redirect()->route('token.page')->with('success', 'Token sent to your email. Please check your inbox.');
}




















































    public function personalDetails(Request $request)
    {
 
      
        $update = Auth::user();
        $update->first_name =$request['first_name'];
        $update->last_name =$request['last_name'];
        $update->phone_number=$request['user_phone'];
        $update->gender=$request['gender'];
        $update->dob=$request['dob'];
        $update->phone_number=$request['user_phone'];
        $update->address=$request['user_address'];
        $update->country=$request['country'];
    
       

        if($request->hasFile('image'))
        {
            $file= $request->file('image');
    
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/display',$filename);
            $update->display_picture =  $filename;
        }
        $update->update();
 
        return back()->with('status', 'Personal Details Updated Successfully');  
    }


    public function personalDp(Request $request)
    {
 
      
        $update = Auth::user();
 
    

        if($request->hasFile('image'))
        {
            $file= $request->file('image');
    
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/display',$filename);
            $update->display_picture =  $filename;
        }
        $update->update();
 
        return back()->with('status', 'Personal Details Updated Successfully');  
    }






    public function getDeposit(Request $request)
    {


        $transaction_pin = $request->input('transaction_pin');
        if ($transaction_pin != Auth::user()->account_pin) {
        return back()->with('error', ' Incorrect Transaction Pin number!');
        }
        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];


        // $response2 = $client->get('https://api.coingecko.com/api/v3/simple/price', [
        //     'query' => [
        //         'ids' => 'ethereum',
        //         'vs_currencies' => 'usd',
        //     ],
        // ]);
        // // Decode the JSON response
        // $data2 = json_decode($response2->getBody(), true);
        // $price2 = $data2['ethereum']['usd'];





        $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        // $data['debit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_type','Debit')->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans'] - $data['debit_transfers']- $data['user_card'];
        // $data['btc_balance'] = $data['balance'] / $price;
        $amount = $request->input('amount');
        $data['amount'] = $amount;
        // $data['btc_amount'] = $data['amount']  / $price;
        // $data['eth_amount'] = $data['amount']  / $price2;
        $item = $request->input('item');
        $data['item'] = $item;
        $data['payment'] = DB::table('users')->where('id', '4')->get();

        if ($item == 'Bank') {
            return view('dashboard.bank', $data);
        } else {
            return view('dashboard.payment', $data);
        }
    }



























    public function makeCryptoDeposit(Request $request)
    {
        $transaction_pin = $request->input('transaction_pin');
        if ($transaction_pin != Auth::user()->account_pin) {
        return back()->with('error', ' Incorrect Transaction Pin number!');
        }  
        

        $ref = rand(76503737, 12344994);   
        $deposit = new Deposit;
        $deposit->transaction_id = $ref;
        $deposit->user_id = Auth::user()->id;
        $deposit->amount = $request['amount'];
        $deposit->deposit_type = $request['deposit_type'];
        $deposit->email = $request['email'];
        $deposit->status = 0;
    
   
    
        $deposit->save();
    
        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = $ref;
        $transaction->transaction_ref = "LN".$ref;
        $transaction->transaction_type = " Credit";
        $transaction->transaction = "Deposit";
        $transaction->transaction_amount =  $request['amount'];
        $transaction->transaction_description = "Crypto Deposit of ".$request['amount'];
        $transaction->transaction_status = 0;
        $transaction->save();
        return back()->with('status', ' Crypto Deposit detected, please wait for approval by the administrator') ;
    }









    public function makeDeposit(Request $request)
    {
        $transaction_pin = $request->input('transaction_pin');
        if ($transaction_pin != Auth::user()->account_pin) {
        return back()->with('error', ' Incorrect Transaction Pin number!');
        }  
        

        $ref = rand(76503737, 12344994);   
        $deposit = new Deposit;
        $deposit->transaction_id = $ref;
        $deposit->user_id = Auth::user()->id;
        $deposit->amount = $request['amount'];
        $deposit->email = $request['email'];
        $deposit->status = 0;
    

    
    if($request->hasFile('front_cheque')){
        $chequeID = $request->file('front_cheque');
    
        $ext = $chequeID->getClientOriginalExtension();
        $filename = 'front_cheque' . time() . '.' . $ext; // Unique filename for photoID
        $chequeID->move('uploads/cheque', $filename);
        $deposit->front_cheque =  $filename;
    }


    // if($request->hasFile('license')){
    //     $licenseFile = $request->file('license');
    
    //     $ext = $licenseFile->getClientOriginalExtension();
    //     $filename = 'license_' . time() . '.' . $ext; // Unique filename for license
    //     $licenseFile->move('uploads/deposit', $filename);
    //     $deposit->front_cheque =  $filename;
    // }

   
    
        $deposit->save();
    
        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = $ref;
        $transaction->transaction_ref = "LN".$ref;
        $transaction->transaction_type = "Deposit";
        $transaction->transaction = "Deposit";
        $transaction->transaction_amount =  $request['amount'];
        $transaction->transaction_description = "Check Deposit of ".$request['amount'];
        $transaction->transaction_status = 0;
        $transaction->save();
        return back()->with('status', ' Mobile Check Deposit detected, please wait for approval by the administrator') ;
    }

    // public function makeLoan(Request $request)
    // {
    //     $amount = $request->input('amount');
    //     $reason = $request->input('reason');
    
    //     // Check if requested amount exceeds eligible loan limit
    //     if ($amount > Auth::user()->eligible_loan) {
    //         return back()->with('error', 'You are not eligible for this loan amount.');
    //     }
    
    //     // Check if adding the requested amount would exceed the eligible loan limit
    //     if (Auth::user()->requested_loan + $amount > Auth::user()->eligible_loan) {
    //         return back()->with('error', 'You have already reached your eligible loan amount.');
    //     }
    
    //     // Check if the user has already made a pending loan request
    //     $existingLoanRequest = Loan::where('user_id', Auth::user()->id)
    //         ->where('status', 'pending')
    //         ->first();
    
    //     if ($existingLoanRequest) {
    //         return back()->with('error', 'You already have a pending loan request.');
    //     }
    
    //     // Your existing code to calculate financial data and prepare the view
    //     $data['user_transfers'] = Transfer::where('user_id', Auth::user()->id)
    //         ->where('status', '1')->sum('amount');
    //     // Other calculations...
    
    //     // Increment the requested_loan field for the user
    //     Auth::user()->increment('requested_loan', $amount);
    
    //     $data['data'] = $request->all();
    //     $formData = $request->all();
    //     $request->session()->put('data', $formData);
    
    //     return view('dashboard.loanuser', $data);
    // }

    
     public function makeLoan(Request $request)
      { 
         $amount = $request->input('amount');
         $reason = $request->input('reason');

         



        // Check if the user has already made a pending loan request
         $existingLoanRequest = Loan::where('user_id', Auth::user()->id)
             ->where('status', 'pending')
             ->first();
    
         if ($existingLoanRequest) {
             return back()->with('error', 'You already have a pending loan request.');
         }

         

       
         if($amount > Auth::user()->eligible_loan)
         {
             return back()->with('error', ' You are not eligible, please check your Eligibility or contact our administrator for more info!!');
         }

         $data['user_transfers']= Transfer::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
         $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
         $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
         $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
         $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
          $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
         $data['balance'] = $data['user_deposits']+  $data['user_credit'] + $data['user_loans']- $data['user_debit'] - $data['user_card'];

         $data['data'] =  $request->all();
       $formData =  $request->all();
         $request->session()->put('data', $formData);

           return view('dashboard.loanuser',$data);
     }














public function ContinueLoan(Request $request)
{


    $ref = rand(76503737, 12344994);   
    $loan = new Loan;
    $loan->transaction_id = $ref;
    $loan->user_id = Auth::user()->id;
    $loan->amount = $request['amount'];
    $loan->reason = $request['reason'];
    $loan->ssn = $request['ssn'];
    $loan->credit_score = $request['credit_score'];
     $loan->email = $request['email'];
    $loan->status = 0;


  if($request->hasFile('license')){
    $licenseFile = $request->file('license');

    $ext = $licenseFile->getClientOriginalExtension();
    $filename = 'license_' . time() . '.' . $ext; // Unique filename for license
    $licenseFile->move('uploads/loan', $filename);
    $loan->license =  $filename;
}

if($request->hasFile('photoID')){
    $photoIDFile = $request->file('photoID');

    $ext = $photoIDFile->getClientOriginalExtension();
    $filename = 'photoID_' . time() . '.' . $ext; // Unique filename for photoID
    $photoIDFile->move('uploads/loan', $filename);
    $loan->photoID =  $filename;
}

if($request->hasFile('selfie')){
    $selfieFile = $request->file('selfie');

    $ext = $selfieFile->getClientOriginalExtension();
    $filename = 'selfie_' . time() . '.' . $ext; // Unique filename for selfie
    $selfieFile->move('uploads/loan', $filename);
    $loan->selfie =  $filename;
}


    $loan->save();

    $transaction = new Transaction;
    $transaction->user_id = Auth::user()->id;
    $transaction->transaction_id = $ref;
    $transaction->transaction_ref = "LN".$ref;
    $transaction->transaction_type = "Loan";
    $transaction->transaction = "Loan";
    $transaction->transaction_amount =  $request['amount'];
    $transaction->transaction_description = "Requested for a loan of ".$request['amount'];
    $transaction->transaction_status = 0;
    $transaction->save();

    

    $data['data'] = $request->session()->get('data');
    return view('dashboard.loan_completed',$data);
   }






   
   
}
