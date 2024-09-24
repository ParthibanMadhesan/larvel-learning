<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;


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

Route::get('/', HomeController::class);

Route::get('/newww', function () {
    return ['foo'=>'bar'];
});

// // Route::get('/home', function () {

// //     // $jobs =job::all();
// //     //     dd($jobs[0]->title);

// //     return view('home');
        
// // });

// //home

// Route::view('/home','home');
// //index
// Route::get('/jobs',[JobController::class,'index']);

// //create
// Route::get('/jobs/create',[JobController::class,'create']);


// //show
// Route::get('/jobs/{job}', [JobController::class,'show'] );


// //store
// Route::post('/jobs',[JobController::class,'store'] );


// //edit
// Route::get('/jobs/{job}/edit', [JobController::class,'edit'] );

// //update
// Route::patch('/jobs/{job}', [JobController::class,'update'] );


//  //destroy
//  Route::delete('/jobs/{job}',[JobController::class,'destroy'] );

// Route::get('/home', function () {

//     // $jobs =job::all();
//     //     dd($jobs[0]->title);

//     return view('home');
        
// });

//home

Route::view('/home','home');

// Route::controller(JobController::class)->group(function(){
// Route::get('/jobs',[JobController::class,'index']);

// Route::get('/jobs/create','create');

// Route::get('/jobs/{job}','show' );

// Route::post('/jobs','store');

// Route::get('/jobs/{job}/edit', 'edit' );

// Route::patch('/jobs/{job}', 'update' );

// Route::delete('/jobs/{job}','destroy');
// });   


// Route::resource('/jobs',JobController::class)->only(['index','show']);

// Route::resource('/jobs',JobController::class)->except(['index','show'])->middleware('auth');

Route::get('test', function () {
    $job=Job::first();
    TranslateJob::dispatch($job);
    return 'done';
});

Route::get('/jobs',[JobController::class,'index']);

Route::get('/jobs/create',[JobController::class,'create']);

Route::get('/jobs/{job}', [JobController::class,'show'] )->middleware('auth');

Route::post('/jobs',[JobController::class,'store'] );

Route::get('/jobs/{job}/edit', [JobController::class,'edit'] )
      ->middleware('auth')
      ->can('edit','job'); //edit for policy , job for job //middleware(['auth','can:edit-job,job']);

Route::patch('/jobs/{job}', [JobController::class,'update'] );

Route::delete('/jobs/{job}',[JobController::class,'destroy'] );

Route::view('/contact','/contact');

//Auth
Route::get('/register',[RegisterUserController::class,'create']);
Route::post('/register',[RegisterUserController::class,'store']);

Route::get('/login',[SessionController::class,'create'])->name('login');
Route::post('/login',[SessionController::class,'store']);
Route::post('/logout',[SessionController::class,'destroy']);
