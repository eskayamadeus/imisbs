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



// ADMIN SECTION
//Route::prefix('admin')->group(function() {
    // Show Admin Login Form
    //Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    // Submit Admin Login
    //Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    // Logged in admin sees Dashboard
    //Route::get('/', 'AdminController@index')->name('admin.dashboard');
    // Admin Logout
    //Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    // Academic > Student
    //Route::get('/academic/student', 'AdminController@showAcademicStudent')->name('admin.academic.student');
    //Route::get('/academic/student/add', 'AdminController@showAddStudent')->name('admin.academic.showAddStudent');
//}); 
// checks if request is either get or post
// Route::match(['get', 'post'], '/admin', 'AdminController@login');


// Loading the admin dashboard upon login
 //Route::get('/admin/dashboard', 'AdminController@dashboard');
// Loading the admin settings from dashboard
// Route::get('/admin/settings', 'AdminController@settings');
// The current password validation under settings. defined in matrix.form_validation.js
// Route::get('/admin/check-pwd', 'AdminController@chkPassword');
// update admin password
// Route::match(['get', 'post'], '/admin/update-pwd', 'AdminController@updatePassword');

// // Admin Logout
// Route::get('/logout', 'AdminController@logout');

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
  // Academic > Student
  Route::get('/academic/student', 'AdminController@showAcademicStudent')->name('admin.academic.student');
  // User > Staff
  // show all staff
  Route::get('/users/staff', 'AdminController@showUserStaff')->name('admin.user.staff');
  // show form to add a new staff
  Route::get('/users/staff/add', 'AdminController@showAddStaff')->name('admin.user.staff.add');
  // submit new staff details
  Route::post('/users/staff/add', 'AdminController@createStaff');
  // delete a staff
  Route::delete('/users/staff/{staff}', 'AdminController@destroyStaff');
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