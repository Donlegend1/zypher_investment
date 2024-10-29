<?php

use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Route::get('/about', [App\Http\Controllers\MainController::class, 'about']);
Route::get('/contact', [App\Http\Controllers\MainController::class, 'contact']);
Route::get('/faq', [App\Http\Controllers\MainController::class, 'faq']);
Route::get('/affiliate', [App\Http\Controllers\MainController::class, 'affiliate']);
Route::get('/plan', [App\Http\Controllers\MainController::class, 'plan']);



Auth::routes();
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirect to home or login page
})->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/send-mail', [App\Http\Controllers\EmailController::class, 'create'])->middleware('admin');
Route::get('/sent-mails', [App\Http\Controllers\EmailController::class, 'index'])->middleware('admin');
Route::post('/send-emails', [App\Http\Controllers\EmailController::class, 'store'])->middleware('admin');

//
Route::get('/deposit', [App\Http\Controllers\PaymentController::class, 'create']);
Route::post('/deposit-payment', [App\Http\Controllers\PaymentController::class, 'createAndHandleInvoice']);
Route::post('/deposit-callback', [App\Http\Controllers\PaymentController::class, 'handleIpn']);
Route::get('/generate-profits', [App\Http\Controllers\TransactionController::class, 'generateProfits'])->name('generate.profits')->middleware('admin');


Route::get('/operations', [App\Http\Controllers\OperationController::class, 'index']);
Route::get('/withdraw', [App\Http\Controllers\OperationController::class, 'withdraw']);
Route::post('/withdraw-request', [App\Http\Controllers\OperationController::class, 'withdrawRequest']);

Route::get('/referral', [App\Http\Controllers\OperationController::class, 'referal']);
Route::get('/user-profile', [App\Http\Controllers\UserController::class, 'userProfile']);


//users
Route::post('/update-user', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('/user-list', [App\Http\Controllers\UserController::class, 'index'])->middleware('admin');
Route::get('/admin-list', [App\Http\Controllers\UserController::class, 'admin'])->middleware('admin');
Route::post('/admin-create', [App\Http\Controllers\UserController::class, 'createAdmin'])->name('create.admin')->middleware('admin');


Route::post('/user/profile/{id}', [App\Http\Controllers\UserController::class,  'updateProfile'])->name('user.updateProfile');
Route::post('/edit-me', [App\Http\Controllers\UserController::class,  'userUpdateProfile']);








Route::get('/deposit-list', [App\Http\Controllers\TransactionController::class, 'index'])->middleware('admin');
Route::get('/referral-list', [App\Http\Controllers\TransactionController::class, 'create'])->middleware('admin');

Route::get('/withdrawal-list', [App\Http\Controllers\TransactionController::class, 'withdrawals'])->middleware('admin');
Route::get('/investment-plans/list', [App\Http\Controllers\PlanController::class, 'index'])->middleware('admin');


//profile
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->middleware('admin');;
Route::post('/admin/unlink-referral',[App\Http\Controllers\UserController::class, 'unlinkReferral'])->name('admin.unlinkReferral')->middleware('admin');
Route::delete('/admin/delete-user', [App\Http\Controllers\UserController::class, 'deleteUser'])->name('admin.deleteUser')->middleware('admin');



Route::post('/admin/fund-account', [App\Http\Controllers\TransactionController::class, 'fundAccount'])->name('admin.fundAccount')->middleware('admin');
Route::post('/admin/deduct-amount', [App\Http\Controllers\TransactionController::class, 'deductAmount'])->name('admin.deductAmount')->middleware('admin');
Route::post('/admin/update-withdrawal-status', [App\Http\Controllers\TransactionController::class, 'updateWithdrawalStatus'])->name('admin.updateWithdrawalStatus')->middleware('admin');


//plans
Route::post('/plans/create', [App\Http\Controllers\PlanController::class, 'store'])->name('plan.store')->middleware('admin');
Route::delete('/plans', [App\Http\Controllers\PlanController::class, 'destroy'])->name('plan.delete')->middleware('admin');
Route::post('/plan/edit/{id}', [App\Http\Controllers\PlanController::class, 'update'])->name('plan.edit')->middleware('admin');


Route::post('/send-payment', [App\Http\Controllers\PaymentAPIController::class, 'sendPayment']);
Route::get('/create-payment', [App\Http\Controllers\PaymentAPIController::class, 'payment']);
Route::post('/main-deposit', [App\Http\Controllers\PaymentAPIController::class, 'mainDeposit']);