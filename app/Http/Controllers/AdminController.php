<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Nft;
use App\Models\Card;
use App\Models\Loan;
use App\Models\User;
use App\Models\Debit;
use App\Models\Credit;
use GuzzleHttp\Client;
use App\Models\Deposit;
use App\Mail\DebitEmail;
use App\Models\Transfer;
use App\Mail\CreditEmail;
use App\Mail\approveLoanEmail;
use App\Mail\approveTransactionEmail;
use App\Mail\declineTransactionEmail;
use App\Mail\declineLoanEmail;
use App\Mail\approveCardEmail;
use App\Mail\declineCardEmail;
use App\Mail\sendUserEmail;
use App\Mail\nftUserEmail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function users()
    {  if (Auth::user()->user_type == '1') {
            $result      = DB::table('users')->where('usertype', '0')->get();
            return view('admin.users', compact('result'));
        } else {
            return redirect()->route('home');
        }
    }
    
  
       public function updateWallet(Request $request)
    {


        $update = Auth::user();
        $update->wallet_address=$request['wallet_address'];
        if($request->hasFile('image')){
            $file= $request->file('image');
    
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('admin/uploads/admin',$filename);
            $update->bar_code =  $filename;
          }

          $update->save();
          return back()->with('status', 'Wallet Details Updated Successfully');  
    }
    
 
    


    
    public function usersTransaction()
    {
        $user_transactions = Transaction::orderBy('id','desc')->get();
        return view('admin.transactions', compact('user_transactions'));
    }
    
    
    
    
    
        public function usersLoans()
    {
        $user_loans = Loan::orderBy('id','desc')->get();
        return view('admin.loans', compact('user_loans'));
    }
    
    
    
    
    
        public function deleteUser($id)
    {
  
        $user  = User::findOrFail($id);
        $user->delete();
        return back()->with('status', 'User deleted Successfully');  
    }
    
    

    
        public function userProfile($id)
    {   
             
 

       // $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->sum('transaction_amount');
        // $data['debit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->sum('transaction_amount');
         $userProfile      = DB::table('users')->where('id', $id)->first();
         $data['credit_transfers']= Transaction::where('user_id',$id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
        $data['debit_transfers'] = Transaction::where('user_id',$id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
        $data['user_deposits']= Deposit::where('user_id',$id)->where('status','1')->sum('amount');
        $data['user_loans']= Loan::where('user_id',$id)->where('status','1')->sum('amount');
        $data['loan'] =  Loan::where('user_id', $id)->orderBy('id', 'desc')->get();
        $data['usercards'] =  Card::where('user_id', $id)->orderBy('id', 'desc')->get();
        $data['user_card']= Card::where('user_id',$id)->sum('amount');
        $data['user_credit']= Credit::where('user_id',$id)->where('status','1')->sum('amount');
        $data['user_debit']= Debit::where('user_id',$id)->where('status','1')->sum('amount');
        $userProfile = DB::table('users')->where('id',$id)->first();
        $userdeposits = Deposit::where('user_id',$id)->orderBy('id','desc')->get();
        $userloans = Loan::where('user_id',$id)->orderBy('id','desc')->get();
        $usercards = Card::where('user_id',$id)->orderBy('id','desc')->get();
        $user_transactions = Transaction::where('user_id',$id)->orderBy('id','desc')->get();
       
   
        $data['balance'] = $data['user_deposits'] + $data['credit_transfers']+ $data['user_loans'] - $data['debit_transfers']- $data['user_card'];         
         return view('admin.user', $data, compact('userProfile','user_transactions','userloans', 'userdeposits'));
     
    }
    
   
    
        public function adminChangePassword()
    {
        return view('admin.change_password');
    }
    
     public function adminUpdatePassword(Request $request)
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

public function ApproveId(Request $request, $id)
{
    


    
    $user = array();
    $user['id_card_status'] = $request->status;
    $update = DB::table('users')->where('id',$id)->update($user);

   
   
    return back()->with('status', 'Kyc Details Updated Successfully');  
    
}

public function creditUser(Request $request)
{
    
    $ref = rand(76503737, 12344994);
    $credit = new Credit;
    $credit->user_id = $request['id'];
    $credit->amount =  $request['amount'];
    $credit->description =  $request['description'];
    $credit->status = 1;
    $credit->save();

    $transaction = new Transaction;
    $transaction->user_id = $request['id'];
    $transaction->transaction_id = $credit->id;
    $ref = $transaction->transaction_ref = "CD".$ref;
    $transaction->transaction_type = "Credit";
    $transaction->transaction = "Credit";
    $transaction->transaction_amount = $request['amount'];
    $transaction->transaction_description = "Credit transaction";
    $transaction->transaction_status = 1;
    $transaction->save();

    $full_name = $request['name'];  
    $email =  $request['email'];
    $amount = $request->input('amount');
    $date = Carbon::now();  
    $balance =  $request['balance'] + $request['amount'];
    $description =  $request['description'];
    $a_number =  $request['a_number'];
    $currency =  $request['currency'];
      
    $user = [

      'account_number' => $a_number,
      'account_name' => $full_name,
      'full_name' => $full_name,
      'description' => $description,
      'amount' => $amount,
      'date' => $date,
      'balance' => $balance,
      'currency' => $currency,
      'ref' => $ref,
     ];
    
    Mail::to($email)->send(new CreditEmail ($user));

    

    return back()->with('status', 'User account credit successfully');
}


public function debitUser(Request $request)
{
    


   
    $ref = rand(76503737, 12344994);
    $debit = new Debit;
    $debit->user_id = $request['id'];
    $debit->amount =  $request['amount'];
    $debit->description =  $request['description'];
    $debit->status = 1;
    $debit->save();

    $transaction = new Transaction;
    $transaction->user_id = $request['id'];
    $transaction->transaction_id = $debit->id;
    $ref = $transaction->transaction_ref = "DB".$ref;
    $transaction->transaction_type = "Debit";
    $transaction->transaction = "Debit";
    $transaction->transaction_amount = $request['amount'];
    $transaction->transaction_description = "Debit Transaction";
    $transaction->transaction_status = 1;
    $transaction->save();



    $full_name = $request['name'];  
    $email =  $request['email'];
    $amount = $request->input('amount');
    $date = Carbon::now();  
    $balance =  $request['balance'] - $request['amount'];
    $description =  $request['description'];
    $a_number =  $request['a_number'];
    $currency =  $request['currency'];
      
    $user = [

      'account_number' => $a_number,
      'account_name' => $full_name,
      'full_name' => $full_name,
      'description' => $description,
      'amount' => $amount,
      'date' => $date,
      'balance' => $balance,
      'currency' => $currency,
      'ref' => $ref,
     ];
    
    Mail::to($email)->send(new DebitEmail ($user));

    return back()->with('status', 'User account debit successfully');
}

public function verifyUser($id)
{
    
 
    $user = array();
    $user['user_status'] = 1;
    $update = DB::table('users')->where('id',$id)->update($user);
   
    return back()->with('status', 'Account Freezed Successfully');  
    
}

public function UnfreezeUser($id)
{
    
 
    $user = array();
    $user['user_status'] = 0;
    $update = DB::table('users')->where('id',$id)->update($user);
   
    return back()->with('status', 'Account Unfreezed Successfully');  
    
}



public function UserActivity($id)
{
    
 
    $user = array();
    $user['user_activity'] = 1;
    $update = DB::table('users')->where('id',$id)->update($user);
   
    return back()->with('status', 'Money Laundering Activated');  
    
}



public function iUserActivity($id)
{
    
 
    $user = array();
    $user['user_activity'] = 0;
    $update = DB::table('users')->where('id',$id)->update($user);
   
    return back()->with('status', 'Money Laundering Deactivated');  
    
}





public function updateOtp(Request $request, $id)
{
    


    
    $user = array();
    $user['otp'] = $request->otp;
    $update = DB::table('users')->where('id',$id)->update($user);

   
   
    return back()->with('status', 'user TAC Code Updated Successfully');  
    
}





public function updateEligibleLoan(Request $request, $id)
{
    


    
    $user = array();
    $user['eligible_loan'] = $request->eligible_loan;
    $update = DB::table('users')->where('id',$id)->update($user);

   
   
    return back()->with('status', 'user Loan Eligible Amount Updated Successfully');  
    
}







public function updateSsn(Request $request, $id)
{
    


    
    $user = array();
    $user['ssn'] = $request->ssn;
    $update = DB::table('users')->where('id',$id)->update($user);
   
    return back()->with('status', 'user SSN Updated Successfully');  
    
}



// public function approveLoan(Request $request, $id)
// {
//     $user_id = $request->user_id;
//     $transaction = Loan::where('user_id', $user_id)->first();
//     $transaction_id = $transaction->transaction_id;

//     $loanUpdateData = ['status' => 1]; // Update loan status to approved

//     // Update loan status in 'loans' table
//     $loanUpdate = DB::table('loans')->where('id', $id)->update($loanUpdateData);

//     // Update transaction status in 'transactions' table
//     $transactionUpdate = DB::table('transactions')
//         ->where('transaction_id', $transaction_id)
//         ->update(['transaction_status' => 1]); // Set transaction_status to 1 (approved)

//     $email = $request->email;
//     $amount = $request->amount;
//     $reason = $request->reason;

//     $data = "Your $" . $amount . " " . $reason . " Loan has been approved successfully";

//     return redirect()->back()->with('message', 'Loan Has Been Approved Successfully');
// }


   public function sendTestMail()
    {
     return view('admin.send_test_mail');
    }



public function sendUserMail($userId)
{
    // Retrieve the user's email based on the provided ID
    $userEmail = DB::table('users')->where('id', $userId)->value('email');

    if (!$userEmail) {
        // Handle the case where the user with the provided ID doesn't exist
        abort(404, 'User not found');
    }

    $data = ['userEmail' => $userEmail];

    return view('admin.send_user_mail', $data);
}

    
    
    
     public function sendUserEmail(Request $request)

    {

        $email = $request->input('email');
        //$subject = $request->input('subject');
        $data = [
            'subject' => $request->subject,
            'message' => $request->message,
        ];




        Mail::to($email)->send(new sendUserEmail($data));

        return back()->with('status', 'Email Successfully sent');
    }
    

    public function sendMail(Request $request)

    {

        

            $email = $request->input('email');
            //$subject = $request->input('subject');
            $data = [
                'message' => $request->message,
                'subject' => $request->subject,
            ];


            Mail::to($email)->send(new sendUserEmail($data));

            return back()->with('status', 'Email Successfully sent');
        
    }





    public function acceptKyc($id)
    {

        $user  = User::findOrFail($id);
        $user->kyc_status = '1';
        $user->save();
        return back()->with('message', 'Kyc Approved Successfully');
    }


    public function rejectKyc($id)
    {

        $user  = User::findOrFail($id);
        $user->kyc_status = '2';
        $user->save();
        return back()->with('message', 'Kyc Rejected Successfully');;
    }







    public function approveDeposit(Request $request, $id)
{
    // Get the deposit with the given ID
    $deposit = Deposit::findOrFail($id);

    // Update the status of the deposit
    $deposit->status = 1;
    $deposit->save();

    // Update the status of the corresponding transaction
    Transaction::where('transaction_id', $deposit->transaction_id)->update(['transaction_status' => 1]);

     $email = $deposit->email; 
     $amount = $deposit->amount;
     $deposit_type = $deposit->deposit_type;

    $data = "Your $" . $amount ." Deposit has been approved successfully!";

    // Mail::to($email)->send(new approveLoanEmail($data));
    return redirect()->back()->with('message', 'Deposit Has Been Approved Successfully');
}




public function DeclineDeposit(Request $request, $id)
{
    // Get the deposit with the given ID
    $deposit = Deposit::findOrFail($id);

    // Update the status of the deposit
    $deposit->status = 2;
    $deposit->save();

    // Update the status of the corresponding transaction
    Transaction::where('transaction_id', $deposit->transaction_id)->update(['transaction_status' => 2]);
     $email = $deposit->email; 
     $amount = $deposit->amount;
     $reason = $deposit->reason;
    

    $data = "Your $" . $amount ." Loan request has been declined!";

    // Mail::to($email)->send(new declineLoanEmail($data));
    return redirect()->back()->with('message', 'Deposit Has Been Declined Successfully');
}
















public function approveLoan(Request $request, $id)
{
    // Get the deposit with the given ID
    $loan = Loan::findOrFail($id);

    // Update the status of the deposit
    $loan->status = 1;
    $loan->save();

    // Update the status of the corresponding transaction
    Transaction::where('transaction_id', $loan->transaction_id)->update(['transaction_status' => 1]);

     $email = $loan->email; 
     $amount = $loan->amount;
     $reason = $loan->reason;
    

    $data = "Your $" . $amount ." Loan has been approved successfully!";

    Mail::to($email)->send(new approveLoanEmail($data));
    return redirect()->back()->with('message', 'Loan Has Been Approved Successfully');
}







public function DeclineLoan(Request $request, $id)
{
    // Get the deposit with the given ID
    $loan = Loan::findOrFail($id);

    // Update the status of the deposit
    $loan->status = 2;
    $loan->save();

    // Update the status of the corresponding transaction
    Transaction::where('transaction_id', $loan->transaction_id)->update(['transaction_status' => 2]);
     $email = $loan->email; 
     $amount = $loan->amount;
     $reason = $loan->reason;
    

    $data = "Your $" . $amount ." Loan request has been declined!";

    Mail::to($email)->send(new declineLoanEmail($data));
    return redirect()->back()->with('message', 'Loan Has Been Declined Successfully');
}







public function approveCard(Request $request, $id)
{
    // Get the deposit with the given ID
    $card = Card::findOrFail($id);

    // Update the status of the deposit
    $card->status = 1;
    $card->save();

    // Update the status of the corresponding transaction
    Transaction::where('transaction_id', $card->transaction_id)->update(['transaction_status' => 1]);

     $email = $card->email; // Assuming there's a user relationship in Deposit model
     $amount = $card->amount;
     $card_no = $card->card_number;

     $data = "Your Card has been approved successfully";

     Mail::to($email)->send(new approveCardEmail($data));
    return redirect()->back()->with('message', 'Card Has Been Approved Successfully');
}





public function DeclineCard(Request $request, $id)
{
      // Get the deposit with the given ID
      $card = Card::findOrFail($id);

      // Update the status of the deposit
      $card->status = 2;
      $card->save();
  
      // Update the status of the corresponding transaction
      Transaction::where('transaction_id', $card->transaction_id)->update(['transaction_status' => 2]);
  
   
     $email = $card->email; // Assuming there's a user relationship in Deposit model
     $amount = $card->amount;
     $card_no = $card->card_number;

     $data = "Your Card has been delined successfully";

     Mail::to($email)->send(new declineCardEmail($data));
      return redirect()->back()->with('message', 'Card Has Been Declined Successfully');
  }
  












   public function approveTransaction(Request $request, $id){
    // Fetch the transaction from the database
    $transaction = DB::table('transactions')->where('id', $id)->first();

    // Check if the transaction exists
    if (!$transaction) {
        return redirect()->back()->with('error', 'Transaction not found');
    }

    // Update the transaction status
    $update = DB::table('transactions')->where('id', $id)->update(['transaction_status' => $request->transaction_status]);

    if (!$update) {
        return redirect()->back()->with('error', 'Failed to update transaction status');
    }

    // Get the user's email, transaction amount, and transaction type
    $email = $transaction->email; // Assuming there's a user relationship in the transactions table
    $amount = $transaction->transaction_amount;
    $transactionType = $transaction->transaction; // Assuming this is the correct property name
    $transactionId = $transaction->transaction_id; // Assuming this is the correct property name

    // Compose the email message
    $data = "Your $" . $amount . " for " . $transactionType . " with the transaction ID " . $transactionId . " has been approved successfully!";

    // Send the email notification
    Mail::to($email)->send(new approveTransactionEmail($data));

    return redirect()->back()->with('message', 'Transaction has been approved successfully');
}






    
 public function DeclineTransaction(Request $request, $id){
   // Fetch the transaction from the database
    $transaction = DB::table('transactions')->where('id', $id)->first();

    // Check if the transaction exists
    if (!$transaction) {
        return redirect()->back()->with('error', 'Transaction not found');
    }

    // Update the transaction status
    $update = DB::table('transactions')->where('id', $id)->update(['transaction_status' => $request->transaction_status]);

    // Get the user's email, transaction amount, and transaction type
   $email = $transaction->email; // Assuming there's a user relationship in the transactions table
    $amount = $transaction->transaction_amount;
    $transactionType = $transaction->transaction; // Assuming this is the correct property name
    $transactionId = $transaction->transaction_id; // Assuming this is the correct property name

    // Compose the email message
    $data = "Your $" . $amount . " for " . $transactionType . " with the transaction ID " . $transactionId . " has been declined!";


    // Send the email notification
    Mail::to($email)->send(new declineTransactionEmail($data));
    return redirect()->back()->with('message', 'Transaction Has Been Declined Successfully');
}

    // public function DeclineDeposit(Request $request, $id){
    //     $deposit = array();
    //     $deposit['status'] = $request->status;
    //     $update = DB::table('deposits')->where('id',$id)->update($deposit);
    //     return redirect()->back()->with('message', 'Deposit Declined');
    // }



public function updateTransactionDate(Request $request, $id)
{
    $transaction = Transaction::find($id);
    if (!$transaction) {
        return redirect()->back()->with('error', 'Transaction not found.');
    }

    $newDate = $request->input('new_date');
    $transaction->created_at = $newDate;
    $transaction->save();

    return redirect()->back()->with('message', 'Transaction date updated successfully.');
}











}
