<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use App\Models\Staff;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
    //return "Hello";
})->name('main-page');

Route::get('/test/{value}', function ($value) {
    //return "Test";
    return view('test', compact('value'));  ///['value => $value]
});

// Route::get('/staff/{id}', function  ($id){ 
//     // $staffs = Staff::orderBy('tag','asc')-> take (2) ->get();  // () dia amik 2 raw saja panggil data daripada db kita populate td //select all from staffs
//     // $staffs = Staff::all(); //akan display semua yg ada dalamm database
//     // $staffs = Staff::find($id); // find apa yg kita nak
//     //$staffs = Staff::where('user_id','=',$id)->firstOrFail(); ///dia akan display satu je walaupun data lain sama
//     //$staffs = Staff::where('user_id','=',$id)->count();    //akan ikut berapa kita nak
//     //$staffs = Staff::max('tag') ; ///dia akan tunjuk last value ontoh skrng 3 depend boleh tag ke id ke 
//     //$staffs = Staff::max('tag') ; //akan tnjuk paling awal
//     //$staffs = Staff::select('id','tag')->get(); //dia akan papar apa yg kita nak cnth skrng guna id tag
//     //$staffs = Staff::with('users')->get();  //nk joinkan dua table nnt 
//     //$staffs = Staff::whereHas('users')->get(); //display data2 yg relate ngan table users // akan paparkan maklumat yg ada dalam table
//     $staffs = Staff::whereNotNull('user_id')->get(); //select all from table staff when user id when not null
//     return view('staff',compact('staffs'));   //logical laravel

// });

Route::get('/staff', [StaffController::class, 'index'])->name('staff'); //name tu untuk create satu link rather then kita letk / panjang2 tu kita guna ni je


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/item', [ItemController::class, 'index'])->name('item');
Route::get('/report', [ReportController::class, 'index'])->name('report');
Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');
Route::post('/item/store', [ItemController::class, 'store'])->name('item.store');
Route::get('/item/show/{id}', [ItemController::class, 'show'])->name('item.show');
Route::get('/item/edit/{id}', [ItemController::class, 'edit'])->name('item.edit');
Route::post('/item/update/{id}', [ItemController::class, 'update'])->name('item.update');
Route::post('/item/destroy/{id}', [ItemController::class, 'destroy'])->name('item.destroy');
Route::post('/item/restore/{id}', [ItemController::class, 'restore'])->name('item.restore');
Route::get('/report', [ReportController::class, 'index'])->name('report');
