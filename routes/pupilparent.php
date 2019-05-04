<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('pupilparent')->user();

    //dd($users);

    // select * from pupils where the parent_id is the same as the id of the parent logging in
    //$pupils = App\Pupil::all();
    //$parents = App\Pupilparent::all();
    //$pupilparents = App\Pupilparent::find(1)->phone;
    //$pupilparents = App\Pupilparent::find(1);

    // find Authorised parent's associated tables
    $id = Auth::user()->id;
    $pupilparents = Auth::user()->find($id);
    return view('pupilparent.home')->with('pupilparents', $pupilparents);
})->name('home');

