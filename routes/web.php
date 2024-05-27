<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/articles', [ArticleController::class, 'liste_article']);
Route::get('/ajouter', [ArticleController::class, 'ajouter_article']);
Route::post('/ajouter/traitement', [ArticleController::class, 'ajouter_article_traitement']);
Route::get('/modifier/{id}', [ArticleController::class, 'modifier_article']);
Route::put('/modifier/{id}', [ArticleController::class, 'modifier_article_traitement']);
