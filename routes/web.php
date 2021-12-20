<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
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
    $user = DB::table('users')->get();        
    $adminData = DB::table('users')->get();
    if(Auth::check()) {
        return view('backend.admin.dashboard.mainIndex')->with(['user' => $user , 'adminData' => $adminData]);
    }
    else{
        return view('auth.login')->with('adminData' , $adminData);
    }
})->block($lockSeconds = 10, $waitSeconds = 10);

Auth::routes();
Route::post('dashboard', 'App\Http\Controllers\AdminController@userPostLogin');

//++++++++++++++++++++++ For Login ++++++++++++++++++++++++
Route::get('/home', 'App\Http\Controllers\AdminController@userPostLogin')->name('home');
// -=-========================------------['Show Dashboard] ---=-========-===--------------=
Route::get('/analytics', 'App\Http\Controllers\AdminController@analytics')->name('analytics');
Route::get('/editAdmin', 'App\Http\Controllers\AdminController@editAdmin')->name('editAdmin');
// +++++++++++++++++ Add Admin ++++++++++++++++++
Route::get('org', 'App\Http\Controllers\AdminController@subAdmin')->name('org');
Route::get('userrole', 'App\Http\Controllers\AdminController@userRole')->name('userrole');
Route::post('updateAdmin', 'App\Http\Controllers\AdminController@updateAdmin')->name('updateAdmin');
// +++++++++++++++++ Add SubAdmin ++++++++++++++++++
Route::get('/roleEdit', 'App\Http\Controllers\AdminController@userRoleAdd')->name('roleEdit');
// =-=-------------------[' Get Data into Datatable '] -----------------=--------------=
 Route::get('get-userRole', 'App\Http\Controllers\AdminController@getUserRole')->name('get-userRole');






