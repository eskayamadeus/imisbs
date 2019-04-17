<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('visitor')->user();

    //dd($users);

    return view('visitor.home');
})->name('home');

