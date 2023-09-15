<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Il s'agit de l'endroit où vous pouvez enregistrer les routes web pour votre application.
| Ces routes sont chargées par le RouteServiceProvider et toutes seront assignées
| au groupe de middleware "web". Faites quelque chose de génial !
|
*/

// Cette route affiche la vue du tableau de bord de l'administration.
Route::view('/administration/dashboard', 'admin/dashboard');

// Cette route permet d'afficher la vue du tableau de bord de l'administration avec un paramètre "any" qui peut être n'importe quoi (d'où la regex '.*').
// Cela est utile pour gérer les routes côté client (par exemple, avec Vue Router) pour une application à page unique (SPA).
Route::view('/administration/dashboard/{any}', 'admin/dashboard')
    ->where('any', '.*');

// Cette route affiche la vue de la page de connexion de l'administration.
Route::view('/administration', 'admin/login')
    ->where('any', '.*');

// Cette route permet d'afficher la vue de la page de connexion de l'administration avec un paramètre "any" pour une gestion similaire aux routes SPA.
Route::view('/administration/{any}', 'admin/login')
    ->where('any', '.*');

// Cette route affiche la vue principale de l'application publique.
Route::view('/{any}', 'index')
    ->where('any', '.*');

