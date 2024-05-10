<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

Route::get('/', function () 
{
    return view('listings',[
        'heading'=>'latest listing',
        'listings'=>Listing::all()
         ]);
});
Route::get('/listings/{id}', function ($id) {
    return view('listings', [
        'heading' => 'Listing Details',
        'listing' => Listing::find($id)
    ]);
});




