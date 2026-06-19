<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin;

// ─── COMING SOON (bypasses coming-soon middleware) ───────────────────────────
Route::get('/coming-soon', fn () => view('front.coming-soon'))->name('coming-soon');

// ─── PUBLIC ROUTES (redirected to coming-soon when enabled) ──────────────────
Route::middleware('coming-soon')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    // About & static pages
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/infrastructure', [PageController::class, 'infrastructure'])->name('infrastructure');
    Route::get('/affiliation', [PageController::class, 'affiliation'])->name('affiliation');
    Route::get('/anti-ragging', [PageController::class, 'antiRagging'])->name('anti-ragging');
    Route::get('/rti', [PageController::class, 'rti'])->name('rti');
    Route::get('/legal-aid', [PageController::class, 'legalAid'])->name('legal-aid');
    Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
    Route::get('/terms-conditions', [PageController::class, 'terms'])->name('terms');

    // KTSP Mandal
    Route::get('/ktsp-mandal', [PageController::class, 'mandal'])->name('mandal');
    Route::get('/ktsp-mandal/governing-body', [PageController::class, 'governingBody'])->name('mandal.governing-body');
    Route::get('/ktsp-mandal/chairman-message', [PageController::class, 'chairmanMessage'])->name('mandal.chairman');
    Route::get('/ktsp-mandal/vice-chairman-message', [PageController::class, 'viceChairmanMessage'])->name('mandal.vice-chairman');
    Route::get('/ktsp-mandal/secretary-message', [PageController::class, 'secretaryMessage'])->name('mandal.secretary');
    Route::get('/principal-message', [PageController::class, 'principalMessage'])->name('mandal.principal');

    // Courses
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{slug}', [CourseController::class, 'show'])->name('courses.show');

    // Faculty
    Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty.index');

    // Admissions
    Route::get('/admissions', [AdmissionController::class, 'index'])->name('admissions.index');
    Route::post('/admissions/apply', [AdmissionController::class, 'store'])->name('admissions.store');
    Route::get('/admissions/success/{appNo}', [AdmissionController::class, 'success'])->name('admissions.success');

    // Notices
    Route::get('/notices', [NoticeController::class, 'index'])->name('notices.index');
    Route::get('/notices/{notice}/download', [NoticeController::class, 'download'])->name('notices.download');

    // News & Events
    Route::get('/news-events', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news-events/{slug}', [NewsController::class, 'show'])->name('news.show');

    // Gallery
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/{slug}', [GalleryController::class, 'show'])->name('gallery.show');

    // Downloads
    Route::get('/downloads', [DownloadController::class, 'index'])->name('downloads.index');
    Route::get('/downloads/{download}/file', [DownloadController::class, 'download'])->name('downloads.file');

    // Contact
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
});

// ─── ADMIN ROUTES ─────────────────────────────────────────────────────────────

Route::prefix('admin')->name('admin.')->group(function () {

    // Auth
    Route::get('/login', [Admin\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [Admin\AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [Admin\AuthController::class, 'logout'])->name('logout');

    // Protected routes
    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

        // Courses
        Route::resource('courses', Admin\CourseController::class);

        // Faculty
        Route::resource('faculty', Admin\FacultyController::class);

        // Admissions
        Route::get('admissions', [Admin\AdmissionController::class, 'index'])->name('admissions.index');
        Route::get('admissions/export', [Admin\AdmissionController::class, 'export'])->name('admissions.export');
        Route::get('admissions/{admission}', [Admin\AdmissionController::class, 'show'])->name('admissions.show');
        Route::patch('admissions/{admission}/status', [Admin\AdmissionController::class, 'updateStatus'])->name('admissions.status');
        Route::delete('admissions/{admission}', [Admin\AdmissionController::class, 'destroy'])->name('admissions.destroy');

        // Notices
        Route::resource('notices', Admin\NoticeController::class);

        // News
        Route::resource('news', Admin\NewsController::class);

        // Gallery
        Route::resource('gallery', Admin\GalleryController::class);
        Route::post('gallery/{gallery}/images', [Admin\GalleryController::class, 'uploadImages'])->name('gallery.upload-images');
        Route::delete('gallery-images/{image}', [Admin\GalleryController::class, 'destroyImage'])->name('gallery.destroy-image');

        // Downloads
        Route::resource('downloads', Admin\DownloadController::class);

        // Messages
        Route::get('messages', [Admin\MessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{message}', [Admin\MessageController::class, 'show'])->name('messages.show');
        Route::delete('messages/{message}', [Admin\MessageController::class, 'destroy'])->name('messages.destroy');

        // SEO
        Route::get('seo', [Admin\SeoController::class, 'index'])->name('seo.index');
        Route::get('seo/{page}/edit', [Admin\SeoController::class, 'edit'])->name('seo.edit');
        Route::put('seo/{page}', [Admin\SeoController::class, 'update'])->name('seo.update');

        // Users
        Route::resource('users', Admin\UserController::class);
        Route::get('activity-logs', [Admin\UserController::class, 'activityLogs'])->name('activity-logs');

        // Settings
        Route::get('settings', [Admin\SettingsController::class, 'index'])->name('settings.index');
        Route::post('settings', [Admin\SettingsController::class, 'update'])->name('settings.update');
        Route::get('settings/sliders', [Admin\SettingsController::class, 'sliders'])->name('settings.sliders');
        Route::post('settings/sliders', [Admin\SettingsController::class, 'storeSlider'])->name('settings.sliders.store');
        Route::delete('settings/sliders/{slider}', [Admin\SettingsController::class, 'destroySlider'])->name('settings.sliders.destroy');
        Route::get('settings/testimonials', [Admin\SettingsController::class, 'testimonials'])->name('settings.testimonials');
        Route::post('settings/testimonials', [Admin\SettingsController::class, 'storeTestimonial'])->name('settings.testimonials.store');
        Route::delete('settings/testimonials/{testimonial}', [Admin\SettingsController::class, 'destroyTestimonial'])->name('settings.testimonials.destroy');
    });
});
