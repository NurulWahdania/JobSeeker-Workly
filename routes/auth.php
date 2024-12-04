<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Models\jobPost;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\AdminController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

//     Route::middleware('employer')->group(function () {
//         Route::resource('employer', EmployerController::class)
//             ->names([
//                 'create' => 'employer.create',
//                 'store' => 'employer.store',
//                 'edit' => 'employer.edit',
//                 'update' => 'employer.update', 
//                 'destroy' => 'employer.destroy',
//             ]);
//         Route::resource('jobPost', JobPostController::class)
//             ->names([
//                 'index' => 'jobPost',
//                 'create' => 'jobPost.create',
//                 'store' => 'jobPost.store',
//                 'edit' => 'jobPost.edit',
//                 'update' => 'jobPost.update',
//                 'destroy' => 'jobPost.destroy',
//                 'show' => 'jobPost.show',
//             ]);
//     });

//     Route::middleware('job_seeker')->group(function () {
//         Route::resource('jobSeeker', JobSeekerController::class)
//             ->names([
//                 'create' => 'jobSeeker.create',
//                 'store' => 'jobSeeker.store',
//                 'edit' => 'jobSeeker.edit',
//                 'update' => 'jobSeeker.update',
//                 'destroy' => 'jobSeeker.destroy',
                
//             ]);
//         Route::get('jobSeeker/dashboard', [JobSeekerController::class, 'userDashboard'])
//             ->name('jobSeeker.userDashboard');
//     });
// });

// Route::middleware('admin')->group(function () {
//     Route::resource('admin', AdminController::class)
//         ->names([
//             'index' => 'admin.index',
//             'create' => 'admin.create',
//             'store' => 'admin.store',
//             'show' => 'admin.show',
//             'edit' => 'admin.edit',
//             'update' => 'admin.update',
//             'destroy' => 'admin.destroy',
//         ]);
});
