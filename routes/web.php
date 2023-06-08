<?php

use App\Http\Controllers\DesignerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ColourController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\NewslistingController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\QuotationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Signature_ProductsController;
use App\Http\Controllers\Admin\TechniqueController;
use App\Http\Controllers\Admin\AmbienceController;
use App\Http\Controllers\Admin\DesignController;
use Illuminate\Http\Request;
use App\Models\Utm;

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

Route::get('/', function (Request $request) {

    //set default page meta details
    $title = "Brand of choice for Curtains & Blinds since 3 decades  | Tulio";
    $description = "Bespoke Services for Curtains & Blinds since 1990. Tulio's textile solutions are design-led & made-to-measure, focusing on servicing the needs of architect & interior designers worldwide";
    $keywords = "curtains, blinds, curtain supplier and maker, luxury curtain manufacturer, blinds manufacturer, curtain dealers, curtain supplier, blind manufacturers, curtain fabric supplier, curtain fabric manufacturers";

    if(!empty($request->query('utm_source'))){
        Utm::create([
            'utm_source' => $request->query('utm_source'),
            'utm_campaign' => $request->query('utm_campaign'),
            'utm_medium' => $request->query('utm_medium'),
            'utm_content' => $request->query('utm_content'),
            'utm_term' => $request->query('utm_term'),
            'utm_device' => $request->query('utm_device'),
        ]);
    }

    return view('index', compact('title', 'description', 'keywords'));
})->name('home');

Route::redirect('/index.php/hotelier/ritz-carlton-pune', '/hotelier/the-ritz-carlton-pune', 301);
Route::redirect('/hotelier/ritz-carlton-pune', '/hotelier/the-ritz-carlton-pune', 301);
Route::redirect('/terms-conditions.html', 'terms-and-conditions', 301);
Route::redirect('/index.php/hotelier/ritz-carlton-pune', '/hotelier/the-ritz-carlton-pune', 301);
Route::redirect('/index.html', '/', 301);
Route::redirect('/product-categories.html', '/product', 301);
Route::redirect('/hotelier/ritz-carlton-pune', '/hotelier/the-ritz-carlton-pune', 301);
Route::redirect('/hotelier/ritz-carlton-pune', '/hotelier/the-ritz-carlton-pune', 301);
Route::redirect('/hotelier/ritz-carlton-pune', '/hotelier/the-ritz-carlton-pune', 301);
Route::redirect('/contact-us.html', '/contact', 301);
Route::redirect('/login-page.html', '/login', 301);
Route::redirect('/about-us.html', '/about-us', 301);
Route::redirect('/hotelier/ritz-carlton-pune', '/hotelier/the-ritz-carlton-pune', 301);
Route::redirect('/hotelier/le-meridien-mahabaleshwar', '/hotelier/le-meridien-mahabaleshwar-resort-spa', 301);
Route::redirect('/care-program.html', '/tulio-care', 301);
Route::redirect('/signup-page.html', '/register', 301);
Route::redirect('/hotelier/le-meridien-mahabaleshwar', '/hotelier/le-meridien-mahabaleshwar-resort-spa', 301);
Route::redirect('/hotelier/le-meridien-mahabaleshwar', '/hotelier/le-meridien-mahabaleshwar-resort-spa', 301);
Route::redirect('/hotelier/the-niraamaya-retreats-kerela', '/hotelier/le-meridien-mahabaleshwar-resort-spa', 301);
Route::redirect('/hotelier/le-meridien-mahabaleshwar', '/hotelier/le-meridien-mahabaleshwar-resort-spa', 301);
Route::redirect('/hotelier.html', '/hotelier', 301);
Route::redirect('/hotelier/le-meridien-mahabaleshwar', '/hotelier/le-meridien-mahabaleshwar-resort-spa', 301);
Route::redirect('/hotelier/le-meridien-mahabaleshwar', '/hotelier/le-meridien-mahabaleshwar-resort-spa', 301);
Route::redirect('/index.php/hotelier/le-meridien-mahabaleshwar', '/hotelier/le-meridien-mahabaleshwar-resort-spa', 301);
Route::redirect('/contact-mail', '/contact', 301);


Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('dashboard');
Route::get('process', [HomeController::class, 'process'])->name('process');
Route::get('designer', [HomeController::class, 'designer'])->name('designer');
Route::get('contact', [HomeController::class, 'contacts'])->name('contact');
Route::get('hotelier', [HomeController::class, 'hotelier'])->name('hotelier');
Route::get('hotelier/{hotel:slug}', [HomeController::class, 'hotel'])->name('hotel');
Route::get('about-us', [HomeController::class, 'aboutUs'])->name('about-us');
Route::get('faq', [HomeController::class, 'faq'])->name('faq');
Route::get('privacy-policy', [HomeController::class, 'privacy_policy'])->name('privacy-policy');
Route::get('tulio-care', [HomeController::class, 'tulio_care'])->name('tulio-care');
Route::get('terms-and-conditions', [HomeController::class, 'terms_conditions'])->name('terms-and-conditions');
// Route::post('magazine', [HomeController::class, 'magazine'])->name('logout');
// Route::get('magazine-details', [HomeController::class, 'magazineDetails'])->name('magazineDetails');

Route::get('login', [DesignerController::class, 'login'])->middleware('guest:designer')->name('login');
Route::post('login', [DesignerController::class, 'authenticate']);
Route::get('register', [DesignerController::class, 'register'])->middleware('guest:designer')->name('register');
Route::post('register', [DesignerController::class, 'store'])->middleware('guest:designer')->name('register');
Route::group(['prefix' => 'designer', 'as' => 'designer.'], function () {
    Route::post('register', [DesignerController::class, 'store']);
    Route::group(['middleware' => 'auth:designer'], function () {
        Route::get('profile', [DesignerController::class, 'profile'])->name('profile');
        Route::post('profile', [DesignerController::class, 'profileUpdate']);
        Route::get('dashboard', [DesignerController::class, 'dashboard'])->name('dashboard');
        Route::get('shortlist', [DesignerController::class, 'shortlist'])->name('shortlist');
        Route::post('assistant', [DesignerController::class, 'assistant'])->name('assistant');
        Route::get('shortlist/{shortlist}', [DesignerController::class, 'shortlistDestroy'])->name('shortlist.destroy');
        Route::get('project/{project}', [DesignerController::class, 'projectDestroy'])->name('project.destroy');
        Route::get('project', [DesignerController::class, 'project'])->name('project');
        Route::post('project-share', [DesignerController::class, 'projectShare'])->name('project-share');
        Route::get('project-completed', [DesignerController::class, 'projectCompleted'])->name('project-completed');
        Route::get('project-board', [DesignerController::class, 'projectBoard'])->name('project-board');
        Route::post('project-board/order-place', [DesignerController::class, 'placeOrder'])->name('project-board.order-place');
        Route::get('logout', [DesignerController::class, 'logout'])->name('logout');
    });
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::redirect('', 'admin/login', 301);
    Route::get('login', [AdminController::class, 'login'])->middleware('guest:admin')->name('login');
    Route::post('login', [AdminController::class, 'authenticate']);


    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('profile', [AdminController::class, 'adminProfile'])->name('profile');
        Route::post('updateprofile', [AdminController::class, 'updateProfile'])->name('updateprofile');
        Route::get('project', [ProjectController::class, 'index'])->name('project.index');
        Route::get('project/{project}', [ProjectController::class, 'show'])->name('project.show');
        Route::delete('project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');
        Route::put('project/{project}', [ProjectController::class, 'update'])->name('project.update');
        Route::get('project-export/{project}', [ProjectController::class, 'export'])->name('project.export');
        Route::put('hotelier/{hotelier}', [HotelController::class, 'show'])->name('hotelier.show');
        Route::get('changeSequence', [HotelController::class, 'changeSequence']);
        Route::resource('product', ProductController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('colour', ColourController::class);
        Route::resource('user', UserController::class);
        Route::resource('newslisting', NewslistingController::class);
        Route::resource('hotelier', HotelController::class);
        Route::resource('slides', SliderController::class);
        Route::resource('signature_products', Signature_ProductsController::class);
        Route::resource('technique', TechniqueController::class);
        Route::resource('ambience', AmbienceController::class);
        Route::resource('design', DesignController::class);
        Route::get('logout', [AdminController::class, 'logout'])->name('logout');

        Route::get('approve/{project}', [UserController::class, 'approve'])->name('user.approve');
    });
});
Route::get('quotation-download/project-{project}', [QuotationController::class, 'download'])->middleware('signed')->name('quotation.download');
Route::get('share/project-{project}', [DesignerController::class, 'shareProject'])->middleware('signed')->name('project.share');
Route::post('project-update', [DesignerController::class, 'projectUpdate'])->name('project-update');
Route::post('project-approval', [DesignerController::class, 'projectApproval'])->name('project-approval');

Route::get('product', [HomeController::class, 'productList'])->name('product-list');
Route::get('product/{product:slug}', [HomeController::class, 'product'])->name('product');
Route::get('{category:slug}/all', [HomeController::class, 'category'])->name('category');
Route::post('project-room-comment', [HomeController::class, 'projectRoomComment'])->name('project-room-comment');
Route::post('contact-mail', [HomeController::class, 'contactMail'])->name('contactMail');

Route::get('{category:slug}', [HomeController::class, 'viewProductType'])->name('product.type');
Route::get('type/all', [HomeController::class, 'viewAllProductType'])->name('product.all.type');

Route::get('{category:slug}/{subcategory}', [HomeController::class, 'viewProductCategory'])->name('product.category');
Route::get('{category:slug}/{subcategory}/{technique_slug}', [HomeController::class, 'viewAllProductCategory'])->name('product.all.category');
Route::get('{category:slug}/{ambience_slug}', [HomeController::class, 'viewAllProductAmbience'])->name('product.all.ambience');

Route::post('admin/updateFeaturedStatus', [ProductController::class, 'updateFeaturedStatus'])->name('admin.product.updateFeaturedStatus');

Route::get('clear_cache', function () {

	\Artisan::call('config:clear');
	\Artisan::call('config:cache');

	echo "Cache is cleared";
});
