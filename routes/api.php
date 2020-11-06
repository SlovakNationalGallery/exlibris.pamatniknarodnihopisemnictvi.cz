<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Scout\Builder;
use App\Models\Item;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('authors', function () {
    $items = Item::boolSearch()
        ->filter('term', ['related_work' => 'XVI. Trienále českého ex libris 2020'])
        ->aggregate('author', [
            'terms' => [
                'field' => 'author',
                'size' => 50, // ¯\_(ツ)_/¯
            ]
        ])
        ->execute();

    return response()->json($items->aggregations()['author']['buckets']);
});

Route::get('items', function (Request $request) {
    $author = $request->get('author');
    $page = $request->get('page');

    $items = Item::search()
        ->where('related_work', 'XVI. Trienále českého ex libris 2020')
        ->when($author !== null, function (Builder $builder) use ($author) {
            return $builder->where('author', $author);
        })
        ->paginate(1, 'page', $page);

    return response()->json($items);
});
