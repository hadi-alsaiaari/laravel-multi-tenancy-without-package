<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

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
// Route::get('/', [HomeController::class, 'index']);
Route::get('/', function (Request $request) {
    // $array = [
    //     'app1.new-app-breeze.test' => 'ajyal_store',
    //     'app2.new-app-breeze.test' => 'askcafe',
    // ];
    // $keys = array_keys($array);
    // $host = $request->getHost();

    // if (in_array($host, $keys)) {
    //     $db = $array[$host];
    //     DB::purge('system');
    //     Config::set('database.connections.mysql.database' , $db);
    //     // DB::reconnect('mysql');
    //     DB::connection('mysql')->reconnect();
    //     DB::setDefaultConnection('mysql');
    // }
    // dd(DB::table('categories')->get()->toArray());

    
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
