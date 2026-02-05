<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PartnerLogoController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\WebsiteLogoController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/clear', function () {
    Artisan::call('route:clear');
    Artisan::call('optimize');
    return 'Route cache cleared successfully!';
});

Route::get('/storage-link', function () {
    try {
        Artisan::call('storage:link');
        return 'Storage link created successfully!';
    } catch (\Exception $e) {
        return 'Error creating storage link: ' . $e->getMessage();
    }
});

Route::get('login', [FrontController::class, 'login'])->name('login');
Route::get('register', [FrontController::class, 'register'])->name('register');
Route::post('/register/save', [FrontController::class, 'save_register'])->name('register.save');
Route::post('/login-submit', [FrontController::class, 'login_submit'])->name('login.submit');
Route::get('logout', [FrontController::class, 'logout'])->name('logout');

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('about_us', [FrontController::class, 'about_us'])->name('about_us');
Route::get('all_products', [FrontController::class, 'products'])->name('products');
Route::get('product_details/{slug}', [FrontController::class, 'product_details'])->name('product_details');
// Route::get('service_details/{id}', [FrontController::class, 'service_details'])->name('service_details');
Route::get('price-list', [FrontController::class, 'price_list'])->name('price.list');
Route::get('contact_us', [FrontController::class, 'contact_us'])->name('contact_us');
Route::post('save_contact', [FrontController::class, 'save_contact'])->name('save_contact');
Route::get('/privacy_policy', [FrontController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/terms_&_conditions', [FrontController::class, 'terms_conditions'])->name('termsconditions');


Route::get('admin/login', [AdminController::class, 'Login'])->name('admin.login');
Route::post('Admin/checklogin', [AdminController::class, 'CheckLogin'])->name('admin.checklogin');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [FrontController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/user/products', [UserProductController::class, 'index'])->name('user.products');
    Route::get('/user/products/create', [UserProductController::class, 'create'])->name('user.products.create');
    Route::post('/user/products/store', [UserProductController::class, 'store'])->name('user.products.store');
});
Route::prefix('Admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'Logout'])->name('admin.logout');
    Route::get('/profile', [AdminController::class, 'Profile'])->name('admin.profile');
    Route::post('/update-profile', [AdminController::class, 'UpdateProfile'])->name('admin.update.profile');
    Route::post('/update-password', [AdminController::class, 'UpdatePassword'])->name('admin.update.password');

    Route::get('/inquiry', [AdminController::class, 'inquiry'])->name('admin.inquiry');
    Route::get('/Delete-inquiry/{id}', [AdminController::class, 'Delete_inquiry'])->name('admin.delete.inquiry');

    // About
    Route::get('/about', [AboutController::class, 'About'])->name('admin.about');
    Route::post('/update-about', [AboutController::class, 'Update_About'])->name('admin.update.about');

    // Contact Us
    Route::get('/contact-us', [ContactUsController::class, 'contactUS'])->name('admin.contactUS');
    Route::post('/update-contact-us', [ContactUsController::class, 'Update_contactUS'])->name('admin.update.contactUS');

    // Website Logo
    Route::get('/website-logo', [WebsiteLogoController::class, 'WebsiteLogo'])->name('admin.websiteLogo');
    Route::post('/update-website-logo', [WebsiteLogoController::class, 'UpdateWebsiteLogo'])->name('admin.update.websiteLogo');

    Route::get('/PrivacyPolicy', [AdminController::class, 'PrivacyPolicy'])->name('admin.PrivacyPolicy');
    Route::post('/Update-PrivacyPolicy', [AdminController::class, 'Update_PrivacyPolicy'])->name('admin.update.PrivacyPolicy');

    Route::get('/terms&conditions', [AdminController::class, 'terms_conditions'])->name('admin.termsconditions');
    Route::post('/Update-terms&conditions', [AdminController::class, 'Update_terms_conditions'])->name('admin.update.termsconditions');

    // slider
    Route::get('/slider', [SliderController::class, 'sliderlist'])->name('admin.slider');
    Route::get('/Add-slider', [SliderController::class, 'Add_slider'])->name('admin.add.slider');
    Route::post('/Store-slider', [SliderController::class, 'Store_slider'])->name('admin.store.slider');
    Route::get('/Edit-slider/{id}', [SliderController::class, 'Edit_slider'])->name('admin.edit.slider');
    Route::post('/Update-slider', [SliderController::class, 'Update_slider'])->name('admin.update.slider');
    Route::get('/Delete-slider/{id}', [SliderController::class, 'Delete_slider'])->name('admin.delete.slider');

    // product
    Route::get('/product', [ProductController::class, 'productList'])->name('admin.product');
    Route::get('/Add-product', [ProductController::class, 'Add_product'])->name('admin.add.product');
    Route::post('/Store-product', [ProductController::class, 'Store_product'])->name('admin.store.product');
    Route::get('/Edit-product/{id}', [ProductController::class, 'Edit_product'])->name('admin.edit.product');
    Route::post('/Update-product', [ProductController::class, 'Update_product'])->name('admin.update.product');
    Route::get('/Delete-product/{id}', [ProductController::class, 'Delete_product'])->name('admin.delete.product');

    // Service
    Route::get('/Service', [ServiceController::class, 'ServiceList'])->name('admin.service');
    Route::get('/Add-Service', [ServiceController::class, 'Add_Service'])->name('admin.add.service');
    Route::post('/Store-Service', [ServiceController::class, 'Store_Service'])->name('admin.store.service');
    Route::get('/Edit-Service/{id}', [ServiceController::class, 'Edit_Service'])->name('admin.edit.service');
    Route::post('/Update-Service', [ServiceController::class, 'Update_Service'])->name('admin.update.service');
    Route::get('/Delete-Service/{id}', [ServiceController::class, 'Delete_Service'])->name('admin.delete.service');

    // Partner Logo
    Route::get('/partner-logo', [PartnerLogoController::class, 'PartnerLogo'])->name('admin.partnerlogo');
    Route::get('/add-partner-logo', [PartnerLogoController::class, 'Add_PartnerLogo'])->name('admin.add.partnerlogo');
    Route::post('/store-partner-logo', [PartnerLogoController::class, 'Store_PartnerLogo'])->name('admin.store.partnerlogo');
    Route::get('/edit-partner-logo/{id}', [PartnerLogoController::class, 'Edit_PartnerLogo'])->name('admin.edit.partnerlogo');
    Route::post('/update-partner-logo', [PartnerLogoController::class, 'Update_PartnerLogo'])->name('admin.update.partnerlogo');
    Route::get('/delete-partner-logo/{id}', [PartnerLogoController::class, 'Delete_PartnerLogo'])->name('admin.delete.partnerlogo');

    Route::get('/Blog', [BlogController::class, 'BlogList'])->name('admin.blog');
    Route::get('/Add-Blog', [BlogController::class, 'Add_Blog'])->name('admin.add.blog');
    Route::post('/Store-Blog', [BlogController::class, 'Store_Blog'])->name('admin.store.blog');
    Route::get('/Edit-Blog/{id}', [BlogController::class, 'Edit_Blog'])->name('admin.edit.blog');
    Route::post('/Update-Blog', [BlogController::class, 'Update_Blog'])->name('admin.update.blog');
    Route::get('/Delete-Blog/{id}', [BlogController::class, 'Delete_Blog'])->name('admin.delete.blog');

    // Testimonial
    Route::get('/Testimonial', [TestimonialController::class, 'TestimonialList'])->name('admin.testimonial');
    Route::get('/Add-Testimonial', [TestimonialController::class, 'Add_Testimonial'])->name('admin.add.testimonial');
    Route::post('/Store-Testimonial', [TestimonialController::class, 'Store_Testimonial'])->name('admin.store.testimonial');
    Route::get('/Edit-Testimonial/{id}', [TestimonialController::class, 'Edit_Testimonial'])->name('admin.edit.testimonial');
    Route::post('/Update-Testimonial', [TestimonialController::class, 'Update_Testimonial'])->name('admin.update.testimonial');
    Route::get('/Delete-Testimonial/{id}', [TestimonialController::class, 'Delete_Testimonial'])->name('admin.delete.testimonial');
    
    // Plan
    Route::get('/Plan', [PlanController::class, 'PlanList'])->name('admin.plan');
    Route::get('/Add-Plan', [PlanController::class, 'Add_Plan'])->name('admin.add.plan');
    Route::post('/Store-Plan', [PlanController::class, 'Store_Plan'])->name('admin.store.plan');
    Route::get('/Edit-Plan/{id}', [PlanController::class, 'Edit_Plan'])->name('admin.edit.plan');
    Route::post('/Update-Plan', [PlanController::class, 'Update_Plan'])->name('admin.update.plan');
    Route::get('/Delete-Plan/{id}', [PlanController::class, 'Delete_Plan'])->name('admin.delete.plan');

    Route::get('/Users', [AdminController::class, 'user_list'])->name('admin.users');
    Route::get('/Edit-User/{id}', [AdminController::class, 'Edit_User'])->name('admin.edit.user');
    Route::post('/admin/users/update-status', [AdminController::class, 'updateStatus'])->name('admin.users.updateStatus');
    Route::get('/delete-User/{id}', [AdminController::class, 'delete_User'])->name('admin.user.delete');
});
