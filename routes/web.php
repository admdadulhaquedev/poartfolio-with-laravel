<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CategoryController,
    ContactInfoController,
    EmailController,
    FrontendController,
    HomeController,
    PostController,
    ProfileController,
    SettingController,
    SocialLinkController,
    TrashController,
};

/*
|--------------------------------------------------------------------------
| Web Routes , FrontendController & BackendController
|--------------------------------------------------------------------------
*/

// Home Controller
// Authantication
Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/register/requested', [HomeController::class, 'registerrequested'])->name('register.requested');
Route::get('register/requested/destroy{id}', [HomeController::class, 'destroy'])->name('registerrequested.destroy');


// Profile Controller
Route::resource('profile', ProfileController::class);
Route::post('profile/photo/update{id}', [ProfileController::class, 'profilephotoupdate'])->name('profilephoto.update');
Route::post('password/change', [ProfileController::class, 'passwordChange'])->name('password.change');

// Category Controller
Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/update', [CategoryController::class, 'update'])->name('category.update');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
Route::post('category/status/update', [CategoryController::class, 'statusupdate'])->name('status.update');
Route::get('category/destroy{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

// Settings Controller
Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
Route::post('/settings/update', [SettingController::class, 'settingsupdate'])->name('settings.update');

// Post Controller
Route::get('post', [PostController::class, 'index'])->name('post.index')->middleware('rolecheck');
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::get('post/show{slug}', [PostController::class, 'show'])->name('post.show');
Route::get('post/edit{slug}', [PostController::class, 'edit'])->name('post.edit');
Route::post('post/store', [PostController::class, 'store'])->name('post.store');
Route::get('post/update{slug}', [PostController::class, 'update'])->name('post.update');
Route::get('post/destroy{slug}', [PostController::class, 'destroy'])->name('post.destroy');


// SocialLink Controller
Route::get('social', [SocialLinkController::class, 'index'])->name('social.index')->middleware('rolecheck');
Route::get('social/edit', [SocialLinkController::class, 'edit'])->name('social.edit')->middleware('rolecheck');
Route::get('social/create', [SocialLinkController::class, 'create'])->name('social.create')->middleware('rolecheck');
Route::post('social/update', [SocialLinkController::class, 'update'])->name('social.update')->middleware('rolecheck');
Route::post('social/store', [SocialLinkController::class, 'store'])->name('social.store')->middleware('rolecheck');
Route::post('social/status/update', [SocialLinkController::class, 'statusupdate'])->name('socialstatus.update')->middleware('rolecheck');
Route::get('social/destroy{id}', [SocialLinkController::class, 'destroy'])->name('social.destroy')->middleware('rolecheck');

// ContactInfo Controller
Route::resource('contactinfo', ContactInfoController::class)->middleware('rolecheck');


// Emial Controller
Route::get('email', [EmailController::class, 'index'])->name('email.index')->middleware('rolecheck');
Route::get('single/email{id}', [EmailController::class, 'singleemail'])->name('single.email')->middleware('rolecheck');
Route::get('inbox/email/destroy{id}', [EmailController::class, 'inboxemaildestroy'])->name('inboxemail.destroy')->middleware('rolecheck');


// Trash Controller
    // ->Trash View
Route::get('requestedRegister/trash', [TrashController::class, 'requestedRegisterTrashView'])->name('requestedRegister.trash')->middleware('rolecheck');
Route::get('category/trash', [TrashController::class, 'categoryTreashView'])->name('category.trash')->middleware('rolecheck');
Route::get('inboxEmail/trash', [TrashController::class, 'inboxEmailTreashView'])->name('inboxEmail.trash')->middleware('rolecheck');
Route::get('post/trash', [TrashController::class, 'postTreashView'])->name('post.trash');
Route::get('socialLink/trash', [TrashController::class, 'socialLinkTreashView'])->name('socialLink.trash')->middleware('rolecheck');

// ->Trash Restore
Route::get('requestedRegister/restore{id}', [TrashController::class, 'requestedRegisterRestore'])->name('requestedRegister.restore')->middleware('rolecheck');
Route::get('category/restore{id}', [TrashController::class, 'categoryRestore'])->name('category.restore')->middleware('rolecheck');
Route::get('inboxEmail/restore{id}', [TrashController::class, 'inboxEmailRestore'])->name('inboxEmail.restore')->middleware('rolecheck');
Route::get('post/restore{id}', [TrashController::class, 'postRestore'])->name('post.restore');
Route::get('socialLink/restore{id}', [TrashController::class, 'socialLinkRestore'])->name('socialLink.restore')->middleware('rolecheck');

// ->Trash Force Delete
Route::get('requestedRegister/force/delete{id}', [TrashController::class, 'requestedRegisterForceDelete'])->name('requestedRegister.forcedelete')->middleware('rolecheck');
Route::get('category/force/delete{id}', [TrashController::class, 'categoryForceDelete'])->name('category.forcedelete')->middleware('rolecheck');
Route::get('inboxEmail/force/delete{id}', [TrashController::class, 'inboxEmailForceDelete'])->name('inboxEmail.forcedelete')->middleware('rolecheck');
Route::get('post/force/delete{id}', [TrashController::class, 'postForceDelete'])->name('post.forcedelete');
Route::get('socialLink/force/delete{id}', [TrashController::class, 'socialLinkForceDelete'])->name('socialLink.forcedelete')->middleware('rolecheck');



// FrontEndController

Route::get('/', [FrontendController::class, 'index'])->name('/');
Route::get('/portfolio/{slug}', [FrontendController::class, 'portfolio'])->name('portfolio');
Route::get('/portfolios', [FrontendController::class, 'portfolios'])->name('portfolios');



Route::post('inbox/email/recived', [FrontendController::class, 'inboxemailrecived'])->name('inboxemail.recived');



