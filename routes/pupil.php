<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('pupil')->user();

    //dd($users);

    return view('pupil.home');
})->name('home');

