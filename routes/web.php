<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', function () {
    if (Auth::user()->isAdmin()) {
        return redirect(route('dashboard'));
    }
    if (Auth::user()->isPapersetter()) {
        return redirect(route('dashboard'));
    }
   
})->name('dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::resource('subject',\App\Http\Controllers\resource\subject::class);
Route::resource('topic',\App\Http\Controllers\resource\topic::class);
Route::resource('question',\App\Http\Controllers\resource\question::class);
Route::get('/topics/{subject}', [\App\Http\Controllers\resource\topic::class, 'getTopics']);
Route::get('/questionconfig', [App\Http\Controllers\resource\question::class, 'questionconfig'])->name('question.configure');

Route::get('/questionconfig/edit/{id}', [App\Http\Controllers\resource\question::class, 'questionConfigEdit'])->name('question.questionconfigedit');
Route::post('/questionconfig/update/{id}', [App\Http\Controllers\resource\question::class, 'questionConfigUpdate'])->name('questionconfig.update');

Route::post('/question/config', [App\Http\Controllers\resource\question::class, 'storeQuestions'])->name('question.config');
Route::get('/configiration', [App\Http\Controllers\resource\question::class, 'configirationlist'])->name('question.configiration');
Route::get('/qspgeneration', [App\Http\Controllers\resource\question::class, 'qspgeneration'])->name('question.qspgeneration');

Route::post('/check-paper-title-unique', [App\Http\Controllers\resource\question::class, 'checkPaperTitleUnique']);
Route::post('/generate-question-paper', [App\Http\Controllers\resource\question::class, 'generateQuestionPaper'])->name('question.generateQuestionPaper');
Route::get('/questionpaper', [App\Http\Controllers\resource\question::class, 'questionpaper'])->name('question.questionpaper');
Route::get('/download/question-paper/{filename}', function ($filename) {
    $path = storage_path('app/question_papers/' . $filename);

    if (!file_exists($path)) {
        abort(404, 'File not found');
    }

    return response()->download($path);
});

Route::post('/bulk-download', [App\Http\Controllers\resource\question::class, 'bulkDownload'])->name('bulk-download');

Route::resource('user',\App\Http\Controllers\resource\user::class);
Route::post('/user/deleteUser', [\App\Http\Controllers\resource\user::class, 'deleteUser'])->name('user.deleteUser');
Route::post('/question/deleteQuestionPaper', [\App\Http\Controllers\resource\question::class, 'deleteQuestionPaper'])->name('question.deleteQuestionPaper');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::put('/profileupdate', [App\Http\Controllers\HomeController::class, 'profileupdate'])->name('profileupdate');

