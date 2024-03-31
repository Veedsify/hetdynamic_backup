<?php

use App\Models\Service;
use App\Models\GlobalSetting;
use App\Models\ImmigrationService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\CoachingController;
use App\Http\Controllers\ResidencyController;
use App\Http\Controllers\WorkPermitController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Account\NotificationController;

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

//Admin Routes
require_once  __DIR__ . '/admin/admin.php';

Route::middleware(["tracker"])->group(function () {

    Route::get('/', [IndexController::class, 'showIndexPage'])->name("home");

    //Pages
    Route::get("/about", [AboutController::class, 'showAboutPage'])->name("about");


    Route::get("/login", [AuthController::class, 'showLoginPage'])->name("login");
    Route::get("/register", [AuthController::class, 'showRegisterPage'])->name("register");
    Route::post("/register/new", [AuthController::class, 'register'])->name("register.new");
    Route::get("/forgot-password", [AuthController::class, 'showForgotPasswordPage'])->name("forgot.password");
    Route::post("/admin/send_reset_code", [AuthController::class, 'sendResetCode'])->name("reset.password.token");
    Route::post("/admin/verify_reset_password", [AuthController::class, 'resetPassword'])->name("verify.password.reset");
    Route::get("/validate/email/{token}", [AuthController::class, 'validateEmail'])->name("validate.email");
    Route::get("/verify/email/{token}", [AuthController::class, 'verifyEmail'])->name("verify.email");
    Route::post("/login/submit", [AuthController::class, 'login'])->name("login.submit");
    Route::get("/logout", [AuthController::class, 'logout'])->name("logout");

    Route::prefix('contact')->group(function () {
        Route::get("/", [ContactController::class, 'showContactPage'])->name("contact");
        Route::post("/new", [ContactController::class, 'submitContactForm'])->name("contact.submit");
    });

    //Residency
    Route::get("/service/{serviceId}/{pageId}", [ResidencyController::class, 'showServicesPagesDetails'])->name("services.details");
    Route::get("/services/list", [ResidencyController::class, 'showServliceListPage'])->name("services.list");
    Route::get("/services/{serviceId}", [ResidencyController::class, 'showServicePage'])->name("services.list.service");

    // WorkPermit
    Route::get("/work-permit/{pageId}", [WorkPermitController::class, 'showWorkPermitPagesDetails'])->name("workpermit.details");
    Route::get("/work-permit", [WorkPermitController::class, 'showWorkPermitPage'])->name("workpermit");
    //Blog
    Route::get("/blog", [BlogController::class, 'showBlogPage'])->name("blog");
    Route::get("/blog/{postId}", [BlogController::class, 'showBlogPagesDetails'])->name("blog.details");
    Route::post('/blog/block/', [BlogController::class, 'getBlogDetailsBlock'])->name("blog.block");
    Route::post("/comment/{id}/comment", [CommentController::class, 'newComments'])->name("comment.new");
    Route::get("/tags/{tag}", [TagsController::class, 'showTagsPage'])->name("tags");

    //Faq
    Route::get("/faq", [PagesController::class, 'showFaqPage'])->name("faq");

    //Coaching
    Route::get("/coaching", [CoachingController::class, 'showCoachingPage'])->name("coaching");
    Route::get("/coaching/{pageId}", [CoachingController::class, 'showCoachingPagesDetails'])->name("coaching.details");

    // terms and condition
    Route::get("/terms-conditions", [TermsController::class, 'showTermsPage'])->name("terms.condition");

    //privacy-policy
    Route::get("/privacy-policy", [PrivacyController::class, 'showPrivacyPage'])->name("privacy.policy");

    // Write a Review

    Route::get("/write-review", [ReviewController::class, 'showReviewPage'])->name("write.review");


// Certificate
Route::get("/certificate", [CertificateController::class, 'certificate'])->name("certificate");


    // account settings
    Route::get("/account", [SettingsController::class, 'setting'])->name("account.setting")->middleware('auth');
    Route::put("/account", [SettingsController::class, 'updateProfile'])->name("account.setting")->middleware('auth');

    // account notification
    Route::get("/notification", [NotificationController::class, 'notification'])->name("account.notification");
    Route::get("/mark-all-read", [NotificationController::class, "markAllRead"])->name("account.notification.mark.all.read");
});
