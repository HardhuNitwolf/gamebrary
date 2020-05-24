<?php

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
use App\product;
Route::get('/', function () {
    
    $product = product::all();
    foreach ($product as $products){
       echo $products ->name."<br>";
       echo $products ->typus."<br>";
       
    }
     die();
    
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/libros/{search?}', 'BooksController@index')->name('books');
Route::get('/image_books/{filename}', 'BooksController@getImage')->name('image.book');
Route::get('/juegos/{search?}', 'GamesController@index')->name('games');
Route::get('/image/{filename}', 'GamesController@getImage')->name('image.file');
Route::get('libros/detalles/{id}', 'DetailsController@index')->name('book.detail');
Route::get('juegos/detalles/{id}', 'DetailsController@index')->name('game.detail');
Route::get('/donaciones', 'DonationController@index')->name('donation');
Route::get('/perfil', 'UserController@profile')->name('profile');
Route::get('perfil/configuracion', 'UserController@config')->name('config');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::get('/admin_board', 'AdminController@showUsers')->name('admin.board');
Route::get('/admin_boardGames', 'AdminController@showGames')->name('admin.boardg');
Route::get('/admin_boardBooks', 'AdminController@showBooks')->name('admin.boardb');
Route::get('/crear', 'AdminController@addProduct')->name('admin.create');
Route::post('/crear/add', 'AdminController@saveProduct');
Route::get('/delete/{id}/{typus}', 'AdminController@deleteProduct');
Route::get('/crearUser', 'AdminController@addMember')->name('admin.createMember');
Route::post('/crearUser/add', 'AdminController@saveMember');
Route::get('/edit/{id}', 'AdminController@editProduct')->name('admin.updateProduct');;
Route::post('updateProduct/{typus}','AdminController@updateProduct');
Route::get('/deleteUser/{id}', 'AdminController@deleteMember');
Route::get('renting/{id}','DetailsController@renting')->name('renting.product');
Route::get('recovery/{id}','DetailsController@recovery')->name('recovery');
Route::get('/recovery/{product_id}/{user_id}', 'AdminController@returnProduct')->name('details.recovery');
Route::get('/admin_board/history/{id}', 'AdminController@history')->name('admin.history');
Route::get('/donation', 'DonationController@donation')->name('donation');
Route::get('/faqs','HomeController@faqs')->name('faqs');
Route::get('/contact','HomeController@contact')->name('contact');
Route::get('/us','HomeController@us')->name('us');
