<?php

use App\Http\Controllers\PageController;
use App\Models\Voitures;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    $cars = Voitures::take(6)->get();
    return view('welcome1', compact('cars'));
})->name('acceuil');

Route::get('/inscription', function () {
    return view('inscription1');
})->name('log');

Route::get('/connexion', function () {
    return view('connexion1');
})->name('connexion');


Route::get('/dashboard', [PageController::class,'dashboard'])->name('dashboard');
Route::get('/voitures', [PageController::class,'allCars'])->name('allCars');
Route::get('/formulaireLoc/{id}', [PageController::class,'formulaireLoc'])->whereNumber('id')->name('formulaireLocation');
Route::get('/allClients', [PageController::class,'allclients'])->name('clientele');
Route::get('/allLocations', [PageController::class,'allLocations'])->name('locations');
Route::get('/myLocations', [PageController::class,'myLocations'])->name('myLocations');

Route::get('/myCars', [PageController::class,'myCars'])->name('myCars');
Route::get('/update/{id}', [PageController::class,'update'])->whereNumber('id')->name('update');
Route::get('/add', [PageController::class,'add'])->name('add');
Route::get('/deconnexion', [PageController::class, 'deconnexion'])->name('deconnexion');
Route::get('/delete/{id}', [PageController::class, 'delete'])->whereNumber('id')->name('delete');
Route::get('/search',[PageController::class,'search'])->name('search');
Route::get('/update-status/{id}', [PageController::class,'updateStatus'])->name('updateStatus');
Route::get('/rollback/{id}', [PageController::class,'rollback'])->name('rollback');



Route::post('/inscription',[PageController::class,'inscription'])->name('inscription');
Route::post('/connexion',[PageController::class,'connexion'])->name('connexion');
Route::post('/create_car',[PageController::class,'create_car'])->name('create_car');
Route::post('/update_car',[PageController::class,'update_car'])->name('update_car');
Route::post('/location',[PageController::class,'myLocations'])->name('location');

// Route::post('/search',[PageController::class,'search'])->name('search');



