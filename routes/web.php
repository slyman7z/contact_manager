<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
DEFINING ROUTES

Route::get('/', function () {
    $html = "<h1> Contact App </h1>
    <div>

    <a href='/contacts'>All contacts</a>
    <a href='/contacts/create'>Add contact</a>
    <a href='/contacts/show'>show contact</a>

    </div>
    ";
    return $html;
});
Route::get('/contact', function () {
    return "<h1> All contacts<h1>";
});

Route::get('/contacts/create', function () {
    return "<h1> Add new contacts<h1>";
});

Route::get('/contacts/show', function () {
    return "<h1> show all contacts<h1>";
});

Route::get('/contacts/{id}', function ($id) {
    return "<h1>contact<h1> " . $id;
})->where('id', '[0-9]+');

Route::get('/company/{name?}', function ($name = null) {
    if ($name) {
        return "company" . $name;
    } else {
        return "All companies";
    }
})->where('name', '[a-zA-Z]+');
*/

//RENAMING ROUTES
/*
Route::get('/', function () {
    $html = "<h1> Contact App </h1>
    <div>

    <a href=' " . route('contact.index') . " '>All contacts</a>
    <a href=' " . route('contact.create') . " '>Add contact</a>
    <a href=' " . route('contact.show', 1) . " '>show contact</a> 

    </div>
    ";
    return $html;
});


Route::get('/contact', function () {
    return "<h1> All contacts<h1>";
})->name('contact.index');



Route::get('/contact/create', function () {
    return "<h1> Add new contacts<h1>";
})->name('contact.create');

Route::get('/contact/{id}', function ($id) {
    return "Contact" . $id;
})->name('contact.show');


Route::get('/', function () {
    $html = "<h1> Contact App </h1>
    <div>

    <a href=' " . route('contact.index') . " '>All contacts</a>
    <a href=' " . route('contact.create') . " '>Add contact</a>
    <a href=' " . route('contact.show', 1) . " '>show contact</a> 

    </div>
    ";
    return $html;
});


// GROUPING ROUTES



Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        $html = "<h1> Contact App </h1>
    <div>

    <a href=' " . route('contact.index') . " '>All contacts</a>
    <a href=' " . route('contact.create') . " '>Add contact</a>
    <a href=' " . route('contact.show', 1) . " '>show contact</a> 

    </div>
    ";
        return $html;
    });


    Route::get('/contact', function () {
        return "<h1> All contacts<h1>";
    })->name('contact.index');



    Route::get('/contact/create', function () {
        return "<h1> Add new contacts<h1>";
    })->name('contact.create');

    Route::get('/contact/{id}', function ($id) {
        return "Contact" . $id;
    })->name('contact.show');
});

Fall Back routes

Route::fallback(function () {
    return "<h1>Sorry, the page does not exist <h1>";
});
*/



//grouping route controllers
/*Route::controller(ContactController::class)->group(function () {

    Route::get('/contacts', 'index')->name('contacts.index');
    Route::get('/contacts/create', 'create')->name('contacts.create');
    Route::get('/contacts/status', 'status')->name('contacts.status');
    Route::get('/contacts/{id}', 'show')->name('contacts.show')->where('id', '[0-9]+');
}); */

Route::get('/', [WelcomeController::class, 'home']);
//Route::resource('/contacts', ContactController::class);
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit'); //edit a contact form
Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');  //update a contact form
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');  //delete a contact form

Route::resource('/companies', 'CompanyController');
Route::resources([
    '/tag' => 'TagController',
    'tasks' => 'TaskController'
]);
