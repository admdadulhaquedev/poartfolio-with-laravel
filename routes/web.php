<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CategoryController,
    ContactInfoController,
    EmailController,
    FrontendController,
    HomeController,
    PortfolioController,
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
Route::get('portfolio', [PortfolioController::class, 'index'])->name('portfolio.index')->middleware('rolecheck');
Route::get('portfolio/create', [PortfolioController::class, 'create'])->name('portfolio.create');
Route::get('portfolio/show{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('portfolio/edit{slug}', [PortfolioController::class, 'edit'])->name('portfolio.edit');
Route::post('portfolio/store', [PortfolioController::class, 'store'])->name('portfolio.store');
Route::get('portfolio/update{slug}', [PortfolioController::class, 'update'])->name('portfolio.update');
Route::get('portfolio/destroy{slug}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');












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
Route::get('portfolio/trash', [TrashController::class, 'portfolioTreashView'])->name('portfolio.trash');
Route::get('socialLink/trash', [TrashController::class, 'socialLinkTreashView'])->name('socialLink.trash')->middleware('rolecheck');

// ->Trash Restore
Route::get('requestedRegister/restore{id}', [TrashController::class, 'requestedRegisterRestore'])->name('requestedRegister.restore')->middleware('rolecheck');
Route::get('category/restore{id}', [TrashController::class, 'categoryRestore'])->name('category.restore')->middleware('rolecheck');
Route::get('inboxEmail/restore{id}', [TrashController::class, 'inboxEmailRestore'])->name('inboxEmail.restore')->middleware('rolecheck');
Route::get('portfolio/restore{id}', [TrashController::class, 'portfolioRestore'])->name('portfolio.restore');
Route::get('socialLink/restore{id}', [TrashController::class, 'socialLinkRestore'])->name('socialLink.restore')->middleware('rolecheck');

// ->Trash Force Delete
Route::get('requestedRegister/force/delete{id}', [TrashController::class, 'requestedRegisterForceDelete'])->name('requestedRegister.forcedelete')->middleware('rolecheck');
Route::get('category/force/delete{id}', [TrashController::class, 'categoryForceDelete'])->name('category.forcedelete')->middleware('rolecheck');
Route::get('inboxEmail/force/delete{id}', [TrashController::class, 'inboxEmailForceDelete'])->name('inboxEmail.forcedelete')->middleware('rolecheck');
Route::get('portfolio/force/delete{id}', [TrashController::class, 'portfolioForceDelete'])->name('portfolio.forcedelete');
Route::get('socialLink/force/delete{id}', [TrashController::class, 'socialLinkForceDelete'])->name('socialLink.forcedelete')->middleware('rolecheck');



// FrontEndController

Route::get('/', [FrontendController::class, 'index'])->name('/');
Route::get('/all/portfolios', [FrontendController::class, 'allportfolios'])->name('allportfolios');


Route::get('/single/portfolio{slug}', [FrontendController::class, 'singleportfolio'])->name('singleportfolio');



Route::post('inbox/email/recived', [FrontendController::class, 'inboxemailrecived'])->name('inboxemail.recived');



