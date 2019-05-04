<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    $school = App\School::find(1);
    return view('admin.home')->with('school', $school);
})->name('home');

