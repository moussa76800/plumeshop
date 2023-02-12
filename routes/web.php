<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\AuthorController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BookAuthorController;
use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\backend\CouponController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PublisherController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ShippingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeBlogController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\wishlistController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    return view('frontend.index');
});

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function(){

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard')->middleware('auth:admin');


///////////////////////////////////////////////////////////////////////////////  BACK_END  ////////////////////////////////////////////////////////////////////////////////////////

// Admin All Routes :
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');
});

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
    Route::get('/books/search', 'BookController@search')->name('books.search');
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

// Admin Coupon All Routes :
Route::prefix('coupons')->group(function() {
    Route::get('/view' , [CouponController::class,'CouponView'])->name('all.coupons');
    Route::get('/add' , [CouponController::class,'couponAdd'])->name('add.coupon');
     Route::post('/store' , [CouponController::class,'couponStore'])->name('coupon.store');
     Route::get('/edit/{id}' , [CouponController::class,'couponEdit'])->name('edit.coupon');
     Route::post('/update' , [CouponController::class,'couponUpdate'])->name('coupon.update');
     Route::get('/delete/{id}' , [CouponController::class,'couponDelete']);
     Route::get('/inactive/{id}' , [CouponController::class,'inactiveCoupon'])->name('couponInactiveNow');
     Route::get('/active/{id}' , [CouponController::class,'activeCoupon'])->name('couponActiveNow');
});

// Admin Shipping All Routes :
Route::prefix('shipping')->group(function() {

    // Common
    Route::get('/common/view' , [ShippingController::class,'CommonView'])->name('shippingCommon');
    Route::get('/common/add' , [ShippingController::class,'addCommon'])->name('add.common');
    Route::post('/common/store' , [ShippingController::class,'commonStore'])->name('common.store');
     Route::get('/common/edit/{id}' , [ShippingController::class,'commonEdit'])->name('edit.common');
     Route::post('/common/update' , [ShippingController::class,'commonUpdate'])->name('update.common');
     Route::get('/common/delete/{id}' , [ShippingController::class,'commonDelete'])->name('delete.common');;

    // Town
    Route::get('/town/view' , [ShippingController::class,'townView'])->name('shippingTown');
    Route::get('/town/add' , [ShippingController::class,'addTown'])->name('add.town');
    Route::post('/town/store' , [ShippingController::class,'townStore'])->name('town.store');
    Route::get('/town/edit/{id}' , [ShippingController::class,'townEdit'])->name('edit.town');
    Route::post('/town/update' , [ShippingController::class,'townUpdate'])->name('update.town');
     Route::get('/town/delete/{id}' , [ShippingController::class,'townDelete'])->name('delete.town');

    // Country
    Route::get('/country/view' , [ShippingController::class,'CountryView'])->name('shippingCountry');
    Route::get('/country/add' , [ShippingController::class,'addCountry'])->name('add.country');
    Route::post('/country/store' , [ShippingController::class,'countryStore'])->name('country.store');
});

// Admin Orders All Routes :
Route::prefix('orders')->group(function() {
    Route::get('/pending/order' , [OrderController::class,'PendingOrders'])->name('pending');
    Route::get('/pending/order/detail/{order_id}' , [OrderController::class,'PendingOrderDetail'])->name('pending.detail');
    Route::get('/confirmed/order' , [OrderController::class,'confirmedOrders'])->name('confirmed');
    Route::get('/processing/order' , [OrderController::class,'processingOrders'])->name('processing');
    Route::get('/picked/order' , [OrderController::class,'pickedOrders'])->name('picked');
    Route::get('/shipped/order' , [OrderController::class,'shippedOrders'])->name('shipped');
    Route::get('/delivered/order' , [OrderController::class,'deliveredOrders'])->name('delivered');
    Route::get('/cancel/order' , [OrderController::class,'cancelOrders'])->name('cancel');
   
// Admin Update Status Orders
    Route::get('/pending/confirmed/{order_id}' , [OrderController::class,'pendingToConfirmOrder'])->name('pendingToConfirmed');
    Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessingOrder'])->name('confirmToProcessing');
    Route::get('/processing/picked/{order_id}', [OrderController::class, 'ProcessingToPickedOrder'])->name('processing.picked');
    Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShippedOrder'])->name('picked.shipped');
    Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDeliveredOrder'])->name('shipped.delivered');
    Route::get('/invoice/download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');
});

// Admin Reports Orders All Routes :
Route::prefix('reports')->group(function() {
    Route::get('/view' , [ReportController::class,'allReports'])->name('all_Reports');
    Route::post('/search/date' , [ReportController::class,'reportByDate'])->name('search-by-date');
    Route::post('/search/month' , [ReportController::class,'reportByMonth'])->name('search-by-month');
    Route::post('/search/year' , [ReportController::class,'reportByYear'])->name('search-by-year');
});

// All Users All Routes :
Route::prefix('allUsers')->group(function() {
    Route::get('/view' , [AdminProfileController::class,'allUsers'])->name('all_Users');
});

// Blog Category All Routes :
Route::prefix('blog')->group(function() {
    Route::get('/view' , [BlogController::class,'blogCategory'])->name('blogCategory');
    Route::get('/add' , [BlogController::class,'addBlogCategory'])->name('add.blogCategory');
    Route::post('/store' , [BlogController::class,'storeBlogCategory'])->name('store.blogCategory');
    Route::get('/edit/{id}' , [BlogController::class,'editBlogCategory'])->name('edit.blogCategory');
    Route::post('/update' , [BlogController::class,'updateBlogCategory'])->name('update.blogCategory');
    Route::get('/delete/{id}' , [BlogController::class,'deleteBlogCategory'])->name('delete.blogCategory');

// Blog Post All Routes :
    Route::get('/post/view' , [BlogController::class,'viewBlogPost'])->name('view.Post');
    Route::get('/post/add' , [BlogController::class,'addBlogPost'])->name('add.Post');
    Route::post('/post/store' , [BlogController::class,'storeBlogPost'])->name('store.Post');
    Route::get('/post/edit/{id}' , [BlogController::class,'editBlogPost'])->name('edit.Post');
    Route::post('/post/update' , [BlogController::class,'updateBlogPost'])->name('update.Post');
     Route::get('/post/delete/{id}' , [BlogController::class,'deleteBlogPost'])->name('delete.Post');

});

////////////////////////////////////////////////////////////////////////////////  FRONT_END  //////////////////////////////////////////////////////////////////////////////////////////


// User All Routes :
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
	$id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/password/update', [IndexController::class, 'UserUpdatePassword'])->name('user.password.update');


// Multi Language All Routes :
Route::get('/language/english' , [LanguageController::class,'languageEnglish'])->name('english');
Route::get('/language/french' , [LanguageController::class,'languageFrench'])->name('french');

// Book Détail All Routes :
Route::get('/book/detail/{id}/{slug}' , [IndexController::class,'bookDetail']);

// SubCategory Wise Data All Routes :
Route::get('/subCategory/book/{subCat_id}/{slug}' , [IndexController::class,'subCatWiseBook']);

// Book View with AJAX All Routes :
Route::get('/book/view/modal/{id}' , [IndexController::class,'bookViewModalAJAX']);

// Book Add to Cart with AJAX All Routes :
Route::post('/book/cart/{id}' , [CartController::class,'bookAddCartAJAX']);

// Book Add to Mini-Cart with AJAX All Routes :
Route::get('/book/mini/cart/' , [CartController::class,'bookAddMiniCartAJAX']);

// Remove Book from Mini-Cart with AJAX All Routes :
Route::get('/minicart/removeBook/{rowId}' , [CartController::class,'deleteBookMiniCartAJAX']);

Route::post('/addToWishList/{book_id}' , [CartController::class,'AddBookToWishListAJAX']);   // CREATE Book to WishList with AJAX.

// Page WishList All Routes :
Route::group(['prefix'=>'user','middleware' =>['user' , 'auth'],'namespace'=>'User'],function(){  
Route::get('/WishList' , [wishlistController::class,'wishList'])->name('wishList');
Route::get('/getWishList' , [wishlistController::class,'wishListRead']);  //  READ Book data
Route::get('/removeWishList/{id}' , [wishlistController::class,'wishListDelete']);

//stripe ALL Routes :
Route::post('/stripe/order',[StripeController::class, 'stripeOrder'])->name('stripe.order');

// Cash ALL Routes :
Route::post('/cash/order',[CashController::class, 'cashOrder'])->name('cash.order');

//Order All Routes :
Route::get('/myOrder',[AllUserController::class, 'myOrder'])->name('my_Order');
Route::get('/order_detail/{order_id}',[AllUserController::class, 'OrderDetail']);
Route::get('/invoice_download/{order_id}',[AllUserController::class, 'InvoiceDownload']);
Route::post('/return/order/{order_id}',[AllUserController::class, 'returnOrder'])->name('return.order');
Route::get('/return/order/list/',[AllUserController::class, 'returnOrderList'])->name('return.order.list');
Route::get('/cancel/orders',[AllUserController::class, 'cancelOrders'])->name('cancel.orders');

});



// Cart Page All Routes :
Route::get('/myCart' , [CartPageController::class,'myCart'])->name('myCart');
Route::get('/user/getCart' , [CartPageController::class,'cartRead']);  //  READ Book data
Route::get('/user/removeCart/{rowId}' , [cartPageController::class,'cartDelete']);
Route::get('/cartIncrement/{rowId}' , [cartPageController::class,'cartIncremente']);
Route::get('/cartDecrement/{rowId}' , [cartPageController::class,'cartDecremente']);

// Checkout All Routes :
Route::get('/checkout',[CartController::class, 'checkoutCreate'])->name('checkout');
Route::get('/common/ajax/{town_id}',[CheckoutController::class, 'commonGetAjax']);
Route::post('/checkout/store',[CheckoutController::class, 'checkoutStore'])->name('checkout.store');


// Coupon All Routes :
Route::post('/couponApply' , [CartController::class,'couponApply']);
Route::get('/couponCalculation',[CartController::class, 'calculationTotal']);
Route::get('/couponRemove',[CartController::class, 'couponRemove']);

// Blog All Routes :
 Route::get('/blog' , [HomeBlogController::class,'viewHomeBlog'])->name('view.HomeBlog');
 Route::get('/blog/post/detail/{id}' , [HomeBlogController::class,'HomeBlogDetail'])->name('post.details');
 Route::get('/blog/category/post/{category_id}' , [HomeBlogController::class,'HomeBlogCatPost']);