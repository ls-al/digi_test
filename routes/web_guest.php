<?php

use App\Http\Controllers\guest\GuestController;
use App\Http\Controllers\guest\QuestionController;
use App\Http\Controllers\guest\QuestionnaireController;

Route::get('/', [GuestController::class, 'index'])->name('guest.guest.index');
Route::post('/questionnaire', [QuestionnaireController::class, 'store'])->name('guest.questionnaire.store');
Route::get('/questionnaire/{questionnaireID}/question', [QuestionController::class, 'show'])->name('guest.question.show');
Route::post('/questionnaire/{questionnaireID}/question', [QuestionController::class, 'store'])->name('guest.question.store');