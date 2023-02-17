<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::namespace('App\Http\Controllers')->middleware(['auth'])->group(function () {
    Route::get('0022', 'UsersController@del');

    // Route::get('/run',);


    // Route::get('reports-visa', 'ReportController@visa')->name('reports.visa')->middleware('report_status');
    // Route::post('reports-visa', 'ReportController@visa_post')->name('reports.visa.post')->middleware('report_status');

    Route::get('reports-process', 'ReportController@process')->name('reports.process')->middleware('report_status');
    Route::post('reports-process', 'ReportController@process_post')->name('reports.process.post')->middleware('report_status');


    Route::resource('users', 'UsersController')->middleware('users_status');

    Route::resource('agents', 'AgentsController')->middleware('agent_status');

    Route::resource('regiment', 'RegimentController');

    // Route::resource('beneficiary', 'BeneficiaryController');

    Route::resource('type_process', 'TypeProcessController')->middleware('process_status');

    // حالات المعاملات و التاشبرات
    Route::resource('status', 'StatusController')->middleware('process_status');

    Route::resource('process', 'ProcesController')->middleware('process_status');
    // Route::get('show/process/{id}', 'ProcesController')->middleware('process_status');
    // Route::resource('visas', 'VisasController')->middleware('visa_status');
    Route::resource('tree1', 'Tree1Controller')->middleware('trees_status');
    Route::resource('tree2', 'Tree2Controller')->middleware('trees_status');
    Route::resource('tree3', 'Tree3Controller')->middleware('trees_status');
    Route::resource('tree4', 'Tree4Controller')->middleware('trees_status');

    Route::resource('daily_restrictions', 'DailyRestrictionController')->middleware('accounts_status');
    Route::resource('final_delivery', 'FinalDeliveryController')->middleware('final_delivery_status');
    Route::resource('Account_statement', 'AccountStatementController')->middleware('accounts_status');
    Route::resource('bonds', 'BondController')->middleware('accounts_status');
    Route::resource('agent_payment', 'AgentPaymentController')->middleware('accounts_status');

    // Route::get('agent_payment/show/{id}', 'AgentPaymentController@show')->middleware('accounts_status')->name('agent_payment.');

    Route::get('receipt', 'BondController@receipt')->name('receipt')->middleware('accounts_status');
    Route::post('receipt', 'BondController@receipt_save')->name('receipt_save')->middleware('accounts_status');
    Route::get('receipt/show/{id}', 'BondController@receipt_show')->name('receipt_show')->middleware('accounts_status');

    Route::get('exchange', 'BondController@exchange')->name('exchange')->middleware('accounts_status');
    Route::post('exchange', 'BondController@exchange_save')->name('exchange_save')->middleware('accounts_status');
    Route::get('exchange/show/{id}', 'BondController@exchange_show')->name('exchange_show')->middleware('accounts_status');



    Route::get('dollar_price', 'SettingController@dollar_price')->name('dollar_price')->middleware('dollar_price_status');
    Route::put('dollar_price', 'SettingController@dollar_price_edit')->name('dollar_price_edit')->middleware('dollar_price_status');

    Route::get('settings', 'SettingController@settings')->name('settings')->middleware('setting_status');
    Route::put('settings', 'SettingController@settings_edit')->name('settings_edit')->middleware('setting_status');




    Route::get('profile', 'SettingController@profile')->name('profile');
    Route::put('profile', 'SettingController@profile_edit')->name('profile_edit');


    Route::get('statement', 'StatementAllController@index')->name('statement')->middleware('check_account_status');
    Route::post('statement', 'StatementAllController@show')->name('statement.show')->middleware('check_account_status');

    // Venas Last Version
    Route::resource('requirement', 'RequirementController')->middleware('requirement_status');
    // Route::resource('jobs', 'JobController');
    Route::get('requests', 'JobController@job_requests')->name('job.requests')->middleware('requirement_status');


    // umrah
    Route::resource('company', 'CompanyController')->middleware('company_status');
    Route::resource('ticket', 'TicketController')->middleware('ticket_status');
    Route::get('ticket/create/{id}', 'TicketController@cut_ticket')->name('cut.ticket')->middleware('ticket_status');;
});

// Just For Agent
Route::get('agnet/reports', [App\Http\Controllers\ForAgentController::class, 'index'])->name('agent.report');
Route::post('agnet/reports', [App\Http\Controllers\ForAgentController::class, 'login'])->name('agent.login');
// Just For Agent

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
