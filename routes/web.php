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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

\Illuminate\Support\Facades\Route::get('/vue',[
    'as'=>'vue',
    'uses'=>'hController@vue '
]);

Route::resource('api/users','UsersController');
\Illuminate\Support\Facades\Route::resource('api/gerant','GerantController')->middleware('cors');

Route::get('api/loginGerant',[
    'as'=>'login',
    'uses'=>'LoginGerant@login'

])->middleware('cors');

Route::get('api/getDataGerant',[
    'as'=>'getData',
    'uses'=>'LoginGerant@getData'
]);
