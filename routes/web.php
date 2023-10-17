<?php


use Illuminate\Support\Facades\Route;
use App\Livewire\User\Dashboard;
use App\Livewire\User\Document;
use App\Livewire\User\Login;
use App\Livewire\User\Register;
use App\Http\Controllers\DocumentExportPDF;
use App\Http\Controllers\DocumentEportEXCEL;
use App\Http\Controllers\DocumentController;

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



Route::middleware(['guest'])->group(function () {
    Route::get('/', Register::class)->name('user.register');
    Route::get('/login', Login::class)->name('user.login');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', Dashboard::class)->name('user.dashboard');
    Route::get('/user/document', Document::class)->name('user.documents');
    Route::get('/pdf', [DocumentExportPDF::class, 'exportPDF'])->name('user.documentexportPDF');
    Route::get('document/export/', [DocumentController::class, 'export'])->name('user.export');
});






Route::get('/user/view{id}', [Document::class,'view'])->name('user.view');
