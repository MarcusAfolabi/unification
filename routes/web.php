<?php

use App\Exports\SubconventionsExport;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PrayerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\WelcomeController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ExecutiveController;
use App\Http\Controllers\ConventionController;
use App\Http\Controllers\FellowshipController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SubconventionController;


Route::get('/create-storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage link created!';
});

Route::get('/idcard', function () {
    $string = "subconvention";
    $qrcode = QrCode::generate($string);
    return view('card')->with('qrcode', $qrcode);
})->name('id.card');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/policy', function () {
    return view('policy');
})->name('policy');

Route::get('/donation', [DonationController::class, 'index'])->name('donation.index');
Route::get('/donation/list', [DonationController::class, 'list'])->name('donation.list');
Route::post('/fundraise', [DonationController::class, 'fund'])->name('fundraise.store');
Route::get('/redirect', [DonationController::class, 'success'])->name('fundraise.redirect');
Route::get('/fundraise/{fundraise:slug}', [DonationController::class, 'show'])->name('fundraise.show');

//Redirect Admin
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.index');

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Send Notification through Email
Route::post('send', [NotificationController::class, "sendnotification"])->middleware('auth');

// All User
Route::resource('/user', UserController::class);
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user-presidents', [UserController::class, 'president'])->name('user.president');
Route::get('/user-pro', [UserController::class, 'pro'])->name('user.pro');
Route::get('/profile/{user}/edit', [UserController::class, 'editMember'])->name('user.editMember');
Route::put('/profile/{user}', [UserController::class, 'updateMember'])->name('user.updateMember');
Route::put('/profile-pass/{user}', [UserController::class, 'updatePassword'])->name('user.updatePassword');
// Route::delete('/user-delete/{user}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// All Post
Route::get('/post', [PostController::class, 'index'])->name('posts.index');
Route::get('/post/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::post('/post/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/post/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/status/{id}', [PostController::class, 'status'])->name('status.status');

Route::get('/post/deleteimage/{posts}/delete', [PostController::class, 'deleteimage'])->name('post.deleteimage');
Route::post('/posts/{post:slug}/like', [PostController::class, 'like'])->name('posts.like');
Route::delete('/posts/{post:slug}/unlike', [PostController::class, 'unlike'])->name('posts.unlike');

Route::post('/posts/{post:slug}/comment', [PostController::class, 'comment'])->name('comments.add');
Route::delete('/posts/{post:slug}/comment/{comment}', [PostController::class, 'uncomment'])->name('comments.remove');

// All Video
Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
Route::get('/videos/{video:slug}', [VideoController::class, 'show'])->name('videos.show');
Route::post('/video', [VideoController::class, 'store'])->name('videos.store');
Route::get('/videos/{video}/edit', [VideoController::class, 'edit'])->name('videos.edit');
Route::put('/video/{video}', [VideoController::class, 'update'])->name('videos.update');
Route::delete('/video/{video}', [VideoController::class, 'destroy'])->name('videos.destroy');
Route::get('/status/{id}', [VideoController::class, 'status'])->name('status.status');

// All Audio
Route::get('/audios', [AudioController::class, 'index'])->name('audios.index');
Route::get('/audios/create', [AudioController::class, 'create'])->name('audios.create');
Route::get('/audios/{audio:slug}', [AudioController::class, 'show'])->name('audios.show');
Route::post('/audio', [AudioController::class, 'store'])->name('audios.store');
Route::get('/audios/{audio}/edit', [AudioController::class, 'edit'])->name('audios.edit');
Route::put('/audio/{audio}', [AudioController::class, 'update'])->name('audios.update');
Route::delete('/audio/{audio}', [AudioController::class, 'destroy'])->name('audios.destroy');
Route::get('/status/{id}', [AudioController::class, 'status'])->name('status.status');
Route::get('/audio-messages', [AudioController::class, 'list'])->name('audios.list');

// All vacancies
Route::get('/vacancies', [VacancyController::class, 'index'])->name('vacancies.index');
Route::get('/vacancies/create', [VacancyController::class, 'create'])->name('vacancies.create');
Route::get('/vacancies/{vacancy:slug}', [VacancyController::class, 'show'])->name('vacancies.show');
Route::post('/vacancy', [VacancyController::class, 'store'])->name('vacancies.store');
Route::get('/vacancies/{vacancy}/edit', [VacancyController::class, 'edit'])->name('vacancies.edit');
Route::put('/vacancy/{vacancy}', [VacancyController::class, 'update'])->name('vacancies.update');
Route::delete('/vacancy/{vacancy}', [VacancyController::class, 'destroy'])->name('vacancies.destroy');
Route::get('/status/{id}', [VacancyController::class, 'status'])->name('status.status');

// All Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::post('/product', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/product/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


//Books
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::any('/books/create', [BookController::class, 'create'])->name('books.create');
Route::get('/books/{book:slug}', [BookController::class, 'show'])->name('books.show');
Route::post('/book', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/book/{book}', [BookController::class, 'update'])->name('books.update');
Route::delete('/book/{book}', [BookController::class, 'destroy'])->name('books.destroy');

//Prayer
Route::get('/prayers', [PrayerController::class, 'index'])->name('prayers.index');
Route::any('/prayers/create', [PrayerController::class, 'create'])->name('prayers.create');
Route::get('/prayers/{prayer:slug}', [PrayerController::class, 'show'])->name('prayers.show');
Route::post('/prayer', [PrayerController::class, 'store'])->name('prayers.store');
Route::get('/prayers/{prayer}/edit', [PrayerController::class, 'edit'])->name('prayers.edit');
Route::put('/prayer/{prayer}', [PrayerController::class, 'update'])->name('prayers.update');
Route::delete('/prayer/{prayer}', [PrayerController::class, 'destroy'])->name('prayers.destroy');
Route::get('/status/{id}', [PrayerController::class, 'status'])->name('status.status');

// All Executives
Route::resource('/executives', ExecutiveController::class);
Route::get('/council-executives', [ExecutiveController::class, 'list'])->name('executives.list');

//Convention
// Route::resource('convention', ConventionController::class);
Route::get('/convention', [ConventionController::class, 'index'])->name('convention.index');

Route::get('/convention-list', [ConventionController::class, 'list'])->name('convention.list');

Route::get('/id-card', [ConventionController::class, 'card'])->name('convention.idcard');

Route::post('/convention/store', [ConventionController::class, 'store'])->name('convention.store');

Route::get('/convention/payment', [ConventionController::class, 'payment'])->name('convention.payment');

Route::delete('/convention/{convention}', [ConventionController::class, 'destroy'])->name('convention.destroy');



//SubConvention
Route::resource('subconvention', SubconventionController::class);
Route::get('/subconvention', [SubconventionController::class, 'index'])->name('subconvention');
Route::get('/subconvention/payment', [SubconventionController::class, 'subpayment'])->name('subconvention.payment');
Route::get('/subconvention/id-card', [SubconventionController::class, 'subcard'])->name('subconvention.idcard');
Route::get('/subconvention-list', [SubconventionController::class, 'list'])->name('subconvention.list');
Route::get('/subconventions/export', function () {
    return (new SubconventionsExport)->export();
})->name('subconventions.export');





//Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::resource('resource', ResourceController::class);
Route::get('/resource/{resource:slug}', [ResourceController::class, 'show'])->name('resource.show');
Route::get('/download-central-resources', [ResourceController::class, 'list'])->name('resource.list');

Route::resource('fellowship', FellowshipController::class);
Route::get('/fellowship/{fellowship:slug}', [FellowshipController::class, 'show'])->name('fellowship.show');
Route::get('/fellowships', [FellowshipController::class, 'list'])->name('fellowship.list');

Route::resource('house', HouseController::class);

Route::resource('unit', UnitController::class);
Route::get('/unit/{unit:slug}', [UnitController::class, 'show'])->name('unit.show');
