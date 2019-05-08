<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// USER SECTION
// first thing is to return the user's view. the first page they will see is the welcome page.
// the welcome page will have a log in form.
// on the login, users should be able to select their role, shown as radio buttons
// using JS and CSS, change login form depending on radio buttons 
// if PUPIL.LOGIN, redirect to /pupil/dashboard
// staff table will have different roles based on staff position



// welcome 'INDEX' view
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// authentication for routes
Auth::routes();

// this is the default page that we are redirected to upon login.
// once the multi-auth login is done, we will split up the redirects into each of the different user types' respective dashboard
Route::get('/home', 'HomeController@index')->name('home');


// Pupil's dashboard
Route::get('/pupil/dashboard', 'Auth\LoginController@pupilLogin')->name('pupil.login');
// User Logout
// set the route to POST otherwise you get a MethodNotFoundException because the form uses a POST
    Route::post('user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/', 'AdminAuth\LoginController@showLoginForm');
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  // Logged in admin sees Dashboard
  //Route::get('/', 'AdminAuth\AdminController@index')->name('admin.dashboard');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');
  //Route::match(['get','post'], '/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

  // SCHOOL > SETTINGS 
  // show form to change school settings
  Route::get('/school/settings', 'AdminController@showSchoolSettings')->name('admin.school.settings');
  Route::patch('/school/settings/{id}', 'AdminController@updateSchool');

  // FACILITIES > Administration
  Route::get('/facilities/administration', 'AdminController@showAdminFacilities')->name('admin.facilities.administration');

  // FACILITIES > Teaching Facilities
  Route::get('/facilities/teaching', 'AdminController@showTeachingFacilities') ->name('admin.facilities.teaching_facilities');
  Route::get('/facilities/teaching/classrooms', 'AdminController@showClassrooms') ->name('admin.facilities.teaching_facilities.classrooms');
  Route::get('/facilities/teaching/classrooms/add', 'AdminController@showAddClassroom') ->name('admin.facilities.teaching_facilities.classroom.add');
  Route::post('/facilities/teaching/classrooms/add', 'AdminController@createClassroom');
  // delete a classroom
  Route::delete('/facilities/teaching/classrooms/{classroom}', 'AdminController@destroyClassroom');
  
  // FACILITIES > Recreational Facilities
  Route::get('/facilities/recreational', 'AdminController@showRecreationalFacilities')->name('admin.facilities.recreational_facilities');

  // FACILITIES > Places of convenience
  Route::get('/facilities/convenience', 'AdminController@showPlacesOfConvenience')->name('admin.facilities.places_of_convenience');

  // USER > Pupil
  // show all pupils
  Route::get('/users/pupils', 'AdminController@showUserPupil')->name('admin.users.pupils');
  // show form to add a new pupil
  Route::get('/users/pupils/add', 'AdminController@showAddPupil')->name('admin.users.pupils.add');
  // submit new pupil details
  Route::post('/users/pupils/add', 'AdminController@createPupil');
  // delete a pupil
  Route::delete('/users/pupils/{pupil}', 'AdminController@destroyPupil');
  
  // USER > Staff
  // show all staff
  Route::get('/users/staff', 'AdminController@showUserStaff')->name('admin.users.staff');
  // show form to add a new staff
  Route::get('/users/staff/add', 'AdminController@showAddStaff')->name('admin.users.staff.add');
  // submit new staff details
  Route::post('/users/staff/add', 'AdminController@createStaff');
  // delete a staff
  Route::delete('/users/staff/{staff}', 'AdminController@destroyStaff');

  // USER > Pupilparent
  // show all pupilparents
  Route::get('/users/pupilparents', 'AdminController@showUserPupilParent')->name('admin.users.pupilparents');
  // show form to add a new pupil
  Route::get('/users/pupilparents/add', 'AdminController@showAddPupilParent')->name('admin.users.pupilparents.add');
  // submit new pupil details
  Route::post('/users/pupilparents/add', 'AdminController@createPupilParent');
  // delete a pupil
  Route::delete('/users/pupilparents/{pupil}', 'AdminController@destroyPupilParent');
});

Route::group(['prefix' => 'pupil'], function () {
  Route::get('/login', 'PupilAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'PupilAuth\LoginController@login');
  Route::post('/logout', 'PupilAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'PupilAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'PupilAuth\RegisterController@register');

  Route::post('/password/email', 'PupilAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'PupilAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'PupilAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'PupilAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'staff'], function () {
  Route::get('/login', 'StaffAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'StaffAuth\LoginController@login');
  Route::post('/logout', 'StaffAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'StaffAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'StaffAuth\RegisterController@register');

  Route::post('/password/email', 'StaffAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'StaffAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'StaffAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'StaffAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'visitor'], function () {
  Route::get('/login', 'VisitorAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'VisitorAuth\LoginController@login');
  Route::post('/logout', 'VisitorAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'VisitorAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'VisitorAuth\RegisterController@register');

  Route::post('/password/email', 'VisitorAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'VisitorAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'VisitorAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'VisitorAuth\ResetPasswordController@showResetForm');
});


Route::group(['prefix' => 'pupilparent'], function () {
  Route::get('/login', 'PupilparentAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'PupilparentAuth\LoginController@login');
  Route::post('/logout', 'PupilparentAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'PupilparentAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'PupilparentAuth\RegisterController@register');

  Route::post('/password/email', 'PupilparentAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'PupilparentAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'PupilparentAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'PupilparentAuth\ResetPasswordController@showResetForm');
});
