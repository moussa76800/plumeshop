<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\AuthorController;
use App\Http\Controllers\Backend\BookAuthorController;
use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PublisherController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\IndexController;


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
    return view('welcome');
});

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


// Admin All Routes :

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');

// Admin Category All Routes :

Route::prefix('category')->group(function() {
    Route::get('/view' , [CategoryController::class,'CategoryView'])->name('all.category');
    Route::get('/add' , [CategoryController::class,'CategoryAdd'])->name('add.category');
    Route::post('/store' , [CategoryController::class,'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}' , [CategoryController::class,'CategoryEdit'])->name('edit.category');
    Route::post('/update' , [CategoryController::class,'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}' , [CategoryController::class,'CategoryDelete'])->name('delete.category');
});

// Admin SubCategory All Routes :

Route::prefix('subcategory')->group(function() {
    Route::get('/view' , [SubCategoryController::class,'SubCategoryView'])->name('all.subcategory');
    Route::get('/ajax/{category_id}' , [SubCategoryController::class,'GetSubCategory']);
    Route::get('/add' , [SubCategoryController::class,'SubCategoryAdd'])->name('add.subcategory');
    Route::post('/store' , [SubCategoryController::class,'SubCategoryStore'])->name('subcategory.store');
    Route::get('/edit/{id}' , [SubCategoryController::class,'SubCategoryEdit'])->name('edit.subcategory');
    Route::post('/update' , [SubCategoryController::class,'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('/delete/{id}' , [SubCategoryController::class,'SubCategoryDelete'])->name('delete.subcategory');

});

// Admin Publisher All Routes :

Route::prefix('publisher')->group(function() {
    Route::get('/view' , [PublisherController::class,'publisherView'])->name('all.publishers');
    Route::get('/add' , [PublisherController::class,'publisherAdd'])->name('add.publisher');
    Route::post('/store' , [PublisherController::class,'publisherStore'])->name('publisher.store');
    Route::get('/edit/{id}' , [PublisherController::class,'publisherEdit'])->name('edit.publisher');
    Route::post('/update' , [PublisherController::class,'publisherUpdate'])->name('publisher.update');
    Route::get('/delete/{id}' , [PublisherController::class,'publisherDelete'])->name('delete.publisher');
});


// Admin Books All Routes :

Route::prefix('book')->group(function() {
   
    Route::get('/view' , [BookController::class,'bookView'])->name('all.books');
    Route::get('/add' , [BookController::class,'bookAdd'])->name('add.book');
    Route::post('/store' , [BookController::class,'bookStore'])->name('book.store');
    Route::get('/edit/{id}' , [BookController::class,'bookEdit'])->name('edit.book');
    Route::post('/update' , [BookController::class,'bookUpdate'])->name('book.update');
    Route::get('/ajax/{book_id}' , [BookController::class,'GetBook']);
    Route::get('/delete/{id}' , [BookController::class,'bookDelete'])->name('delete.book');
    Route::get('/multiImg/delete/{id}' , [BookController::class,'bookDeleteMulti'])->name('book.multiImg.delete');
    Route::post('/image/update' , [BookController::class,'MultiImageUpdate'])->name('update-bookMultiImage');
    Route::post('/thambnail/update' , [BookController::class,'thambnailUpdate'])->name('update-bookThambnail');
    Route::get('/inactive/{id}' , [BookController::class,'inactiveBook'])->name('bookInactiveNow');
    Route::get('/active/{id}' , [BookController::class,'activeBook'])->name('bookActiveNow');
});

// Admin Author All Routes :

Route::prefix('author')->group(function() {
    Route::get('/view' , [AuthorController::class,'authorView'])->name('all.authors');
    Route::get('/add' , [AuthorController::class,'authorAdd'])->name('add.author');
    Route::post('/store' , [AuthorController::class,'authorStore'])->name('author.store');
    Route::get('/edit/{id}' , [AuthorController::class,'authorEdit'])->name('edit.author');
    Route::post('/update' , [AuthorController::class,'authorUpdate'])->name('author.update');
    Route::get('/delete/{id}' , [AuthorController::class,'authorDelete'])->name('delete.author');
});

// Admin Book_Author All Routes :

Route::prefix('bookAuthor')->group(function() {
    Route::get('/view' , [BookAuthorController::class,'bookAuthorView'])->name('all.bookAuthor');
    Route::get('/add' , [BookAuthorController::class,'bookAuthorAdd'])->name('add.bookAuthor');
    Route::post('/store' , [BookAuthorController::class,'bookAuthorStore'])->name('bookAuthor.store');
    Route::get('/edit/{id}' , [BookAuthorController::class,'bookAuthorEdit'])->name('edit.bookAuthor');
    Route::post('/update' , [BookAuthorController::class,'bookAuthorUpdate'])->name('bookAuthor.update');
    Route::get('/delete/{id}' , [BookAuthorController::class,'bookAuthorDelete'])->name('delete.bookAuthor');
});

// Admin Slider All Routes :

Route::prefix('slider')->group(function() {
    Route::get('/view' , [SliderController::class,'sliderView'])->name('all.sliders');
    Route::get('/add' , [SliderController::class,'sliderAdd'])->name('add.slider');
    Route::post('/store' , [SliderController::class,'sliderStore'])->name('slider.store');
    Route::get('/edit/{id}' , [SliderController::class,'sliderEdit'])->name('edit.slider');
    Route::post('/update' , [SliderController::class,'sliderUpdate'])->name('slider.update');
    Route::get('/delete/{id}' , [SliderController::class,'sliderDelete'])->name('delete.slider');
    Route::get('/inactive/{id}' , [SliderController::class,'inactiveSlider'])->name('sliderInactiveNow');
    Route::get('/active/{id}' , [SliderController::class,'activeSlider'])->name('sliderActiveNow');
});




Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//User All Routes :

Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/password/update', [IndexController::class, 'UserUpdatePassword'])->name('user.password.update');

