<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
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

// Route::get('/', function () {
//     return view('home.index', []);
// })->name('home.index');

Route::get('/', [HomeController::class, 'home'])->name('home.index');

// Route::get('/contact', function () {
//     return view('home.contact');
// })->name('home.contact') ;

Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

Route::get('/single', AboutController::class)->name('home.single');

$posts = [
    1 => [
        'title' => 'Intro to Laravel',
        'content' => 'This is a short intro to Laravel',
        'is_new' => true,
        'has_comments' => true,
    ],
    2 => [
        'title' => 'Intro to PHP',
        'content' => 'This is a short intro to PHP',
        'is_new' => false
    ],
    3 => [
        'title' => 'Intro to Blade',
        'content' => 'This is a short intro to using Blade',
        'is_new' => false
    ],
    4 => [
        'title' => 'Intro to CSS',
        'content' => 'This is a short intro to CSS',
        'is_new' => true
    ],
    5 => [
        'title' => 'Intro to Laravel',
        'content' => 'This is a short intro to Laravel',
        'is_new' => true,
        'has_comments' => true,
    ],
    6 => [
        'title' => 'Intro to PHP',
        'content' => 'This is a short intro to PHP',
        'is_new' => false
    ],
    7 => [
        'title' => 'Intro to Blade',
        'content' => 'This is a short intro to using Blade',
        'is_new' => false
    ],
    8 => [
        'title' => 'Intro to CSS',
        'content' => 'This is a short intro to CSS',
        'is_new' => true
    ]
];

Route::resource('posts', PostsController::class);
// ->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);

// Route::get('/posts', function () use ($posts) {
//     // dd(request()->all());
//     // dd((int)request()->input('page', 1));
//     dd((int)request()->query('page', 1));
//     return view('posts.index', ['posts' => $posts]);
// });

// // route with regex validation for id
// Route::get('/posts/{id}', function ($id) use ($posts) {

//     abort_if(!isset($posts[$id]), 404);

//     return view('posts.show', ['post' => $posts[$id] ?? 'Nothing here yet']
//     );
// })
// ->name('home.posts');

// Route::get('/recent-posts/{days_ago?}', function ($days_ago = 20) {
//     return "Recent posts from " . $days_ago . " days ago";
// })->name('posts.recent.index')->middleware('auth');

Route::prefix('/fun')->name('fun.')->group(function () use ($posts) {
    Route::get('/responses', function () use ($posts) {
        return response($posts, 201)
            ->header('Content-Type', 'application/json')
            ->cookie('MY_COOKIE', 'Pancakes', 3600);
    })->name('responses');
    Route::get('/redirect', function () {
        return redirect('/responses');
    })->name('redirect');

    Route::get('/posts', function () {
        return redirect()->route('home.posts', ['id' => 1]);
    })->name('posts');

    Route::get('/back', function () {
        return back();
    })->name('back');

    Route::get('/away', function () {
        return redirect()->away('https://www.google.com');
    })->name('away');

    Route::get('/json', function () use ($posts) {
        return response()->json($posts);
    })->name('json');

    Route::get('/download', function () {
        return response()->download(public_path('/mando.jpg'), 'Mandolorian.jpg', [
            'Content-Type' => 'image/jpeg',
        ]);
    })->name('download');
});
