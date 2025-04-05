<?php

use App\Http\Controllers\Community\CommunityController;
use App\Http\Controllers\Community\EventController;
use App\Http\Controllers\Community_Leader\CommunityLeaderDashboard;
use App\Http\Controllers\Community_Leader\TermsAndConditionController;
use App\Http\Controllers\Community_staff\CommunityRequestController;
use App\Http\Controllers\Community_Staff\CommunityStaffDashboard;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\User\GuestUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/events', [EventController::class, 'list'])->name('event-list');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/Community/{id}', [CommunityController::class, 'show'])->name('community.show');
Route::get('/TermAndCondition', [TermsAndConditionController::class, 'TermAndCondition'])->name('TermAndCondition');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('Community_Leader')->group(function () {
        Route::get('/dashboard', [CommunityLeaderDashboard::class, 'index'])->name('community-leader.dashboard');
        Route::get('/Community-Profile', [CommunityController::class, 'index'])->name('community-profile');
        Route::get('/Event-Profile', [EventController::class, 'index'])->name('event-profile');
    });

    Route::prefix('Community_Staff')->group(function () {
        Route::get('/dashboard', [CommunityStaffDashboard::class, 'index'])->name('community-staff.dashboard');
        Route::get('/TermsAndCondition', [TermsAndConditionController::class, 'index'])->name('TermsAndCondition');

        Route::post('/terms-and-conditions/store', [TermsAndConditionController::class, 'store'])->name('terms.store');
        Route::put('/terms-and-conditions/update/{id}', [TermsAndConditionController::class, 'update'])->name('terms.update');

        Route::get('/communities', [TermsAndConditionController::class, 'Community'])->name('communities.index');
        Route::put('/communities/{id}/update-status', [TermsAndConditionController::class, 'updateStatus'])->name('communities.update-status');

        Route::get('/community-requests', [CommunityRequestController::class, 'index'])->name('community-requests.index');
        Route::get('/community-requests/{id}', [CommunityRequestController::class, 'show'])->name('community-requests.show');
        Route::post('/community-requests/{id}/approve', [CommunityRequestController::class, 'approve'])->name('community-requests.approve');
        Route::post('/community-requests/{id}/reject', [CommunityRequestController::class, 'reject'])->name('community-requests.reject');
    });


    Route::prefix('User')->group(function () {
        Route::get('/dashboard', [GuestUserController::class, 'index'])->name('guestuser.dashboard');
        Route::post('/community/register/request', [GuestUserController::class, 'registerRequest'])->name('community.register.request');

    });
});
