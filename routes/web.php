<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StyleGuideController;
use App\Models\Item;

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
    return view('home');
});

Route::get('index', function () {
    $items = Item::search()
        ->where('related_work', 'XVI. Trienále českého ex libris 2020')
        ->get()
        ->shuffle()
        ->take(3);

    return view('index', compact('items'));
})->name('index');

Route::get('pro-sbirku', function () {
   return Item::search()
       ->where('related_work', 'XVI. Trienále českého ex libris 2020')
       ->get()
       ->count();
})->name('catalog');

Route::get('pro-radost', function () {
    return view('info');
})->name('info');

Route::get('styleguide', [StyleGuideController::class, 'index'])->name('styleguide');
