<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('pupilparent')->user();

    //dd($users);

    return view('pupilparent.home');
})->name('home');

