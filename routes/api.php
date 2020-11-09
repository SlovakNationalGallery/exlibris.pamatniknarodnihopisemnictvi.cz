<?php

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
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

Route::get('authors', function (Request $request) {
    $size = $request->get('size', 50);

    $items = Item::boolSearch()
        ->filter('term', ['related_work' => 'XVI. Trienále českého ex libris 2020'])
        ->aggregate('author', [
            'terms' => [
                'field' => 'author',
                'size' => $size,
            ]
        ])
        ->execute();

    return response()->json($items->aggregations()['author']['buckets']);
});

Route::get('items', function (Request $request) {
    $collapse = $request->get('collapse');
    $author = $request->get('author');
    $sort = $request->get('sort', 'additionals.order');
    $perPage = $request->get('size', 1);

    $builder = Item::boolSearch()
        ->filter('term', ['related_work' => 'XVI. Trienále českého ex libris 2020']);

    if ($collapse !== null) {
        $builder
            ->collapse($collapse)
            ->aggregate('total', ['cardinality' => ['field' => $collapse]]);
    }

    if ($author !== null) {
        $builder->filter('term', ['author' => $author]);
    }

    if ($sort !== null) {
        $builder->sort($sort);
    }

    $page = Paginator::resolveCurrentPage();

    $builder->from(($page - 1) * $perPage);
    $builder->size($perPage);

    $searchResult = $builder->execute();

    $total = $collapse === null ?
        $searchResult->total() :
        $searchResult->aggregations()['total']['value'];

    $items = new LengthAwarePaginator(
        $searchResult->matches()->all(),
        $total,
        $perPage,
        $page,
        ['path' => Paginator::resolveCurrentPath()]
    );

    return response()->json($items);
});
