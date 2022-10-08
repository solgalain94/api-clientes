<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
---------
CAMPOS
---------
nombre
apellido
cuil
nacimiento
email
domicilio
telefono

----------------------------------------------------------------------
RUTAS
----------------------------------------------------------------------
OPCIÓN: GETALL   URL: 127.0.0.1:8000/api/clientes                  METHOD: GET
OPCIÓN: GETID    URL: 127.0.0.1:8000/api/clientes/{id}             METHOD: GET
OPCIÓN: SEARCH   URL: 127.0.0.1:8000/api/clientes/serch/{nombre}   METHOD: GET
OPCIÓN: UPDATE   URL: 127.0.0.1:8000/api/clientes                  METHOD: PUT
OPCIÓN: INSERT   URL: 127.0.0.1:8000/api/clientes                  METHOD: POST

*/


Route::resource('clientes', ClienteController::class);
Route::get('clientes/search/{nombre}', [ClienteController::class, 'search']);
