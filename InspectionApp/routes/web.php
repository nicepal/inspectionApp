<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/properties', function () {
    return view('properties');
});

Route::get('/properties/add', function () {
    return view('property-add');
});

Route::get('/properties/{id}', function ($id) {
    return view('property-details');
});

Route::get('/inspections', function () {
    return view('inspections');
});

Route::get('/inspections/schedule', function () {
    return view('inspection-schedule');
});

Route::get('/inspections/{id}', function ($id) {
    return view('inspection-details');
});
