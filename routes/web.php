<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\HomeController;
use App\Http\controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomAuthController;
use App\Http\controllers\UserManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('home.homepage');
});
Route::get('/about', function () {
    return view('home.about');
});
Route::get('/contact', function () {
    return view('home.contact');
});



Route::get('/terms', function () {
    return view('home.terms');
});


Route::get('/faq', function () {
    return view('home.faq');
});



Route::get('/ultimate', function () {
    return view('home.ultimate');
});

Route::get('/health-saving', function () {
    return view('home.health-saving');
});

Route::get('/individual-retirement', function () {
    return view('home.individual-retirement');
});

Route::get('/overdraft-protection', function () {
    return view('home.overdraft-protection');
});

Route::get('/business-essential', function () {
    return view('home.business-essential');
});

Route::get('/business-savings', function () {
    return view('home.business-savings');
});

Route::get('/home-mortgage', function () {
    return view('home.home-mortgage');
});

Route::get('/personal-loan', function () {
    return view('home.personal-loan');
});


Route::get('/investment-property', function () {
    return view('home.investment-property');
});


Route::get('/commercial-real', function () {
    return view('home.commercial-real');
});

Route::get('/business-term', function () {
    return view('home.business-term');
});

Route::get('/online-banking', function () {
    return view('home.online-banking');
});

Route::get('/wire-transfer', function () {
    return view('home.wire-transfer');
});

Route::get('/lost-card', function () {
    return view('home.lost-card');
});

Route::get('/services', function () {
    return view('home.services');
});








// Route::get('/register',[UserController::class,'registerPage']);
// Route::post('/register-user',[UserController::class,'create']);
// Route::get('/login',[UserController::class,'loginPage']);
// Route::post('/login-user',[UserController::class,'loginUser']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

 //Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
 

});


 
 
 
 
 
 
 Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard'); 
 Route::get('login', [CustomAuthController::class, 'index'])->name('login');
 Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
 Route::get('verify/{id}', [CustomAuthController::class, 'verify'])->name('verify');
 Route::post('email-verify', [CustomAuthController::class, 'emailVerify'])->name('code'); 
 Route::get('resend-code/{id}', [CustomAuthController::class, 'resendCode'])->name('resendCode'); 
 Route::get('register', [CustomAuthController::class, 'registration'])->name('register-user');
 Route::get('register', [CustomAuthController::class, 'registration'])->name('register');
 Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
 Route::get('log_out', [CustomAuthController::class, 'signOut'])->name('logout');
 Route::get('/logout', [CustomAuthController::class, 'logOut'])->name('logOut');
 
 
 
 //User Dashboard routes


 Route::get('withdrawal-completed', [DashboardController::class, 'Completed'])->name('withdrawal_completed');
 Route::get('card', [DashboardController::class, 'card'])->name('card');
 Route::post('upload-kyc', [DashboardController::class, 'uploadKyc'])->name('upload.kyc');
 Route::post('make-deposit', [DashboardController::class, 'makeDeposit'])->name('make.deposit');
 Route::post('make-payment', [DashboardController::class, 'makePayment'])->name('make.payment');
 Route::get('transfer', [DashboardController::class, 'transferPage'])->name('transfer.page');
 Route::get('user-profile', [DashboardController::class, 'userProfile'])->name('user.profile');
 Route::post('save_nft', [DashboardController::class, 'saveNft'])->name('save.nft');
 Route::get('request-card/{user_id}', [DashboardController::class, 'requestCard'])->name('request.card');
 Route::get('change-password', [DashboardController::class, 'userChangePassword'])->name('user.change.password');
 Route::get('deposit', [DashboardController::class, 'deposit'])->name('deposit');
 Route::post('get-deposit', [DashboardController::class, 'getDeposit'])->name('get.deposit');
 Route::post('make-cryptodeposit', [DashboardController::class, 'makeCryptoDeposit'])->name('make.cryptodeposit');
 Route::get('make-deposit', [DashboardController::class, 'makeDeposit'])->name('make.deposit');
 Route::get('loan', [DashboardController::class, 'loan'])->name('loan');
 Route::get('loan-user', [DashboardController::class, 'LoanUser'])->name('loan-user');
 Route::post('make-loan', [DashboardController::class, 'makeLoan'])->name('make.loan');
 Route::post('continue-loan', [DashboardController::class, 'ContinueLoan'])->name('continue.loan');
 Route::get('notification', [DashboardController::class, 'notification'])->name('notification');
 Route::get('transactions', [DashboardController::class, 'transactions'])->name('transactions');
 Route::get('pending-transfer', [DashboardController::class, 'pendingTransfer'])->name('pending-transfer');
 Route::get('settings', [DashboardController::class, 'settings'])->name('settings');
 Route::get('make_withdrawal', [DashboardController::class, 'getWithdrawal'])->name('withdrawal');
 Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
 Route::get('transaction-history', [DashboardController::class, 'transactionHistory'])->name('transaction.history');
 Route::get('view_invoice/{user_id}', [DashboardController::class, 'viewInvoice'])->name('view.invoice');
 Route::get('ticket', [DashboardController::class, 'ticket'])->name('ticket');
 Route::get('international-transfer', [DashboardController::class, 'internationalTransfer'])->name('international-transfer');
 Route::get('domestic-transfer', [DashboardController::class, 'domesticTransfer'])->name('domestic-transfer');
 Route::get('skrill', [DashboardController::class, 'skrill'])->name('skrill');
 Route::get('paypal', [DashboardController::class, 'paypal'])->name('paypal');
 Route::get('bank', [DashboardController::class, 'bank'])->name('bank');
 Route::get('crypto', [DashboardController::class, 'crypto'])->name('crypto');
 Route::get('crypto_deposit', [DashboardController::class, 'cryptoDeposit'])->name('crypto_deposit');
 Route::get('card', [DashboardController::class, 'card'])->name('card');
 Route::get('card_withdrawal', [DashboardController::class, 'CardWithdrawal'])->name('card_withdrawal');
 Route::get('token', [DashboardController::class, 'token'])->name('token.page');
 Route::post('crypto-deposit', [DashboardController::class, 'cryptoDeposit'])->name('crypto.deposit');
 Route::post('transfer', [DashboardController::class, 'transferFunds'])->name('transfer-fund');
 Route::post('personal-details', [DashboardController::class, 'personalDetails'])->name('personal.details');
 Route::post('personal-dp', [DashboardController::class, 'personalDp'])->name('personal.dp');
 Route::post('transfer_funds', [DashboardController::class, 'transferFunds'])->name('transfer.funds');
 Route::post('paypal-transfer', [DashboardController::class, 'paypalTransfer'])->name('paypal.transfer');
 Route::post('skrill-transfer', [DashboardController::class, 'skrillTransfer'])->name('skrill.transfer');
 Route::post('crypto-transfer', [DashboardController::class, 'cryptoTransfer'])->name('crypto.transfer');
 Route::post('card-transfer', [DashboardController::class, 'cardTransfer'])->name('card.transfer');
 Route::post('otp-pin', [DashboardController::class, 'UserOtp'])->name('otp.pin');
 Route::post('bank-transfer', [DashboardController::class, 'bankTransfer'])->name('bank.transfer');
 Route::post('/change-password', [DashboardController::class, 'updatePassword'])->name('update-password');












 // Admin Controller

 Route::get('users', [AdminController::class, 'users'])->name('view.users');
 Route::get('update_wallet', [AdminController::class, 'eth'])->name('update.wallet');
 Route::get('admin_upload_nft', [AdminController::class, 'uploadNft'])->name('admin.upload.nft');
 Route::get('uploaded-nfts', [AdminController::class, 'allNfts'])->name('users.uploaded.nft');
  Route::post('admin_save_nft', [AdminController::class, 'adminSaveNft'])->name('admin.save.nft');
 Route::get('user_transactions', [AdminController::class, 'usersTransaction'])->name('user.transaction');
  Route::get('user_loans', [AdminController::class, 'usersLoans'])->name('user.loans');
 Route::get('admin_nft_market', [AdminController::class, 'nftMarket'])->name('admin.buy.nft');
 Route::post('admin_update_wallet', [AdminController::class, 'updateWallet'])->name('admin.save.wallet');
 Route::post('transfer', [AdminController::class, 'transferFunds'])->name('transfer-fund');
 Route::post('reflection-pin', [AdminController::class, 'reflectionPin'])->name('reflection');
 Route::get('/profile/{id}/', [AdminController::class, 'userProfile']);
 Route::get('/delete/{id}', [AdminController::class, 'deleteUser']);
 Route::get('admin-change-password', [AdminController::class, 'adminChangePassword'])->name('admin.change.password');
 Route::match(['get', 'post'],'admin-update-password', [AdminController::class, 'adminUpdatePassword'])->name('admin.update.password');
 Route::match(['get', 'post'], 'approve-id_card/{id}/', [AdminController::class, 'ApproveId'])->name('approve.id');
 Route::match(['get', 'post'], 'credit-user', [AdminController::class, 'creditUser'])->name('credit.user');
 Route::match(['get', 'post'], 'debit-user', [AdminController::class, 'debitUser'])->name('debit.user');
 Route::match(['get', 'post'], 'verify_user/{id}/', [AdminController::class, 'verifyUser'])->name('verify_user');
 Route::match(['get', 'post'], 'unfreeze_user/{id}/', [AdminController::class, 'unfreezeUser'])->name('unfreeze_user');
 Route::match(['get', 'post'], 'user_activity/{id}/', [AdminController::class, 'UserActivity'])->name('user_activity');
 Route::match(['get', 'post'], 'iuser_activity/{id}/', [AdminController::class, 'iUserActivity'])->name('iuser_activity');
 Route::match(['get', 'post'], 'update_otp/{id}/', [AdminController::class, 'updateOtp'])->name('update.otp');
 Route::match(['get', 'post'], 'update_eligible/{id}/', [AdminController::class, 'updateEligibleLoan'])->name('update.eligible');
 Route::match(['get', 'post'], 'update_ssn/{id}/', [AdminController::class, 'updateSsn'])->name('update.ssn');



//  Route::match(['get', 'post'], 'approve-loan/{id}', [AdminController::class, 'ApproveLoan'])->name('approve-loan');


 Route::match(['get', 'post'], 'decline-loan/{id}', [AdminController::class, 'DeclineLoan'])->name('decline-loan');
  Route::get('/approve-loan/{id}/', [AdminController::class, 'ApproveLoan']);
  Route::get('/decline-loan/{id}/', [AdminController::class, 'DeclineLoan']);
  Route::get('/approve-deposit/{id}/', [AdminController::class, 'ApproveDeposit']);
  Route::get('/decline-deposit/{id}/', [AdminController::class, 'DeclineDeposit']);
  Route::get('/approve-card/{id}/', [AdminController::class, 'ApproveCard']);
  Route::get('/approve-transaction/{id}/', [AdminController::class, 'ApproveTransaction']);
  Route::get('/update-transaction-date/{id}/', [AdminController::class, 'updateTransactionDate']);
  Route::get('/decline-transaction/{id}/', [AdminController::class, 'DeclineTransaction']);
  Route::get('/decline-card/{id}/', [AdminController::class, 'DeclineCard']);


  Route::get('/accept-kyc/{id}/', [AdminController::class, 'acceptKyc']);
  Route::get('/decline-kyc/{id}/', [AdminController::class, 'rejectKyc']);




  
  Route::get('/send-mail/{id}/', [AdminController::class, 'sendMail']);
  Route::get('/send-user-mail/{id}/', [AdminController::class, 'sendUserMail']);
  Route::get('send_mail', [AdminController::class, 'sendTestMail'])->name('user.mail');
  
  Route::post('/send-user-email', 'App\Http\Controllers\AdminController@sendUserEmail');
  
  
  Route::post('send-mail', [AdminController::class, 'sendMail'])->name('send.mail');
  
    // Route::get('send_mail', [AdminController::class, 'sendTestMail'])->name('user.mail');



