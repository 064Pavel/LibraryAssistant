 <?php

 use App\Http\Controllers\AppController;
 use App\Http\Controllers\Book\Filter\BooksByAuthorController;
 use App\Http\Controllers\Book\Filter\BooksByTitleController;
 use App\Http\Controllers\Book\Filter\UserBooksController;
 use App\Http\Controllers\Book\IndexController;
 use App\Http\Controllers\Book\ShowController;
 use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function (){

    Route::get('/books', [IndexController::class, 'index']);
    Route::get('/books/{book}',[ShowController::class, 'show']);

    Route::get('/books/by/author/{author}', [BooksByAuthorController::class, 'get_books']);
    Route::get('/get_authors', [BooksByAuthorController::class, 'get_authors']);

    Route::get('/books/by/title/{title}', [BooksByTitleController::class, 'get_books']);
    Route::get('/user', [AppController::class, 'getUser']);
    Route::get('/books/user/{id}', [UserBooksController::class, 'get_books']);

});
