<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;


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
//     return view('welcome');
// });

Route::get("/shop",[ProductController::class,'first_page']);

Route::get("products/create", [ProductController::class, 'create_page']);

Route::post("products/store", [ProductController::class, 'store_page']);

Route::get("products/{id}/show", [ProductController::class, 'show_page']);

Route::get("products/{id}/edit", [ProductController::class, 'edit_page']);

Route::put("products/{id}/update", [ProductController::class, 'update_page']);

Route::get("products/{id}/delete", [ProductController::class, 'delete_page']);

Route::get("/", [ProductController::class, 'home_page'])->middleware('auth');

Route::post("/contact", [ProductController::class, 'contact_page']);

Route::get("/about", [ProductController::class, 'about_page']);

//Authentication Controller Paths 

Route::get("/register", [AuthController::class, 'register_page'])->middleware('guest'); //middle ware redirect url change panna app > Provider > RouteServiceProvider

Route::post("/registerpost",[AuthController::class,'registerpost_page']);

Route::get("/login",[AuthController::class,'login_page'])->middleware('guest')->name('login');

Route::post("/loginpost",[AuthController::class,'loginpost_page']);

Route::get("/logout",[AuthController::class,'logout_page']);
