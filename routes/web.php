<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Controllers\Auth\CustomRegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\CartController;

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

// Test route
Route::get('/test-api', function() {
    return response()->json(['message' => 'API is working']);
});


Route::get('/', [HomeController::class, 'index'])->name('home');

// Additional Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/services-clone', [PageController::class, 'servicesClone'])->name('services-clone');
Route::get('/services-detail', [PageController::class, 'servicesDetail'])->name('services-detail');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog-details', [PageController::class, 'blogDetails'])->name('blog-details');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');

// Form Submission Routes
Route::post('/contact/submit', [FormController::class, 'submitContact'])->name('contact.submit');
Route::post('/appointment/submit', [FormController::class, 'submitAppointment'])->name('appointment.submit');
Route::post('/registration/submit', [FormController::class, 'submitRegistration'])->name('registration.submit');
Route::post('/newsletter/subscribe', [FormController::class, 'subscribeNewsletter'])->name('newsletter.subscribe');

// Authentication Routes
Auth::routes(['register' => false, 'login' => false]);

// Custom Authentication Routes
Route::post('/login', [CustomLoginController::class, 'login'])->name('login');
Route::post('/register', [CustomRegisterController::class, 'register'])->name('register');
Route::post('/logout', [CustomLoginController::class, 'logout'])->name('logout')->middleware('auth');

// Forgot Password Routes
Route::post('/forgot-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('password.update');

// Cart Routes (allow guests to add items and see count)
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/count', [CartController::class, 'count'])->name('cart.count');

// Booking Routes (Protected by authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/payment/{id}', [BookingController::class, 'payment'])->name('booking.payment');
    Route::get('/booking/upload-payment/{id}', [BookingController::class, 'payment'])->name('booking.upload.payment');
    Route::post('/booking/upload-payment/{id}', [BookingController::class, 'uploadPayment'])->name('booking.upload.payment.post');
    Route::get('/booking/success/{booking_number}', [BookingController::class, 'success'])->name('booking.success');
    Route::get('/booking/my', [BookingController::class, 'myBookings'])->name('booking.my');
    
    // Cart Routes (require auth)
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    
    // Checkout Route (requires authentication)
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});

// Admin Routes (Protected by admin middleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/bookings', [AdminController::class, 'bookings'])->name('bookings');
    Route::post('/booking/{id}/status', [AdminController::class, 'updateBookingStatus'])->name('booking.status');
    Route::post('/booking/{id}/payment-verify', [AdminController::class, 'verifyPayment'])->name('booking.payment.verify');
    
    // Category Management Routes
    Route::resource('categories', CategoryController::class);
    
    // Service Management Routes
    Route::resource('services', ServiceController::class);
    Route::get('/services/get-subcategories', [ServiceController::class, 'getSubcategories'])->name('services.get-subcategories');
});
