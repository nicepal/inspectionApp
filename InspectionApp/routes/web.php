<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\InspectionTypeController;
use App\Http\Controllers\InspectorAvailabilityController;
use App\Http\Controllers\InspectorController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('companies', CompanyController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('properties', PropertyController::class);
    Route::resource('areas', AreaController::class);
    Route::resource('assets', AssetController::class);
    Route::resource('inspections', InspectionController::class);
    Route::resource('follow-ups', FollowUpController::class);
    Route::resource('templates', TemplateController::class);
    Route::get('/template-center', [TemplateController::class, 'templateCenter'])->name('template-center.index');
    Route::post('/template-center/{template}/save', [TemplateController::class, 'saveToMyTemplates'])->name('template-center.save');
    Route::resource('reports', ReportController::class);
    Route::resource('inspection-types', InspectionTypeController::class);
    Route::resource('subscriptions', SubscriptionController::class);
    Route::resource('staff', StaffController::class);
    Route::resource('inspectors', InspectorController::class);
    Route::get('/inspectors/{inspector}/availability', [InspectorController::class, 'availability'])->name('inspectors.availability');
    Route::post('/inspectors/{inspector}/availability', [InspectorController::class, 'storeAvailability'])->name('inspectors.availability.store');
    Route::get('/api/available-inspectors', [InspectorAvailabilityController::class, 'getAvailableInspectors'])->name('api.available-inspectors');
    
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.read-all');
    
    Route::get('/audit-logs', [AuditLogController::class, 'index'])->name('audit-logs.index');
    
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
    
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
