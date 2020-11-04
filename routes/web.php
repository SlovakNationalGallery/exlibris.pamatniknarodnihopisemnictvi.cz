<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StyleGuideController;
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

Route::get('/sbirka', function () {
    $items = \App\Models\Item::search()
//        ->where('related_work', 'XVI. Trienále českého ex libris 2020')
        ->take(3)
        ->get();

    dump($items);

//    return \App\Models\Item::search('*')->where('related_work', 'XVI. Trienále českého ex libris 2020')->count();
});

Route::get('styleguide', [StyleGuideController::class, 'index'])->name('styleguide');
