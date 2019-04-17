<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Auth;
// if you run into some funny error later, try..
// use Illuminate\Support\Facades\Auth;
use Session;
use App\Pupil;
use App\Staff;
// add user model
//use App\Admin;
// enable passsword hash checking
//use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // only allow people with the admin guard
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index()
     {
         //our default is view(home)
         return view('admin.dashboard');
     }
    // public function login(Request $request)
    // {
    //     if($request->isMethod('post')){
    //         $data = $request->input();
    //         if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
    //             // create a session for the admin when they login, and then we will compare the variable in every admin function to prevent unauthorised access to pages like the admin dashboard
    //             Session::put('adminSession',$data['email']);
    //             // redirect to admin dashboard
    //             return redirect('/admin/dashboard');
    //         }
    //         else{
    //             return redirect('/admin')->with('flash_message_error', 'Invalid Username or Password');
    //         }
    //     }
    //     return view('admin.admin_login');
    // }

    // load the admin dashboard
    // public function dashboard()
    // {
    //     // let's compare the session we created in the login function here. if they aren't logged in, force them to
    //     if(Session::has('adminSession')){
    //         // allow access
    //     }else{
    //         return redirect('/admin')->with('flash_message_error', 'Please log in first');
    //     }
    //     return view('admin.dashboard');
    // }
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // academic > student
    public function showAcademicStudent() 
    {
        $pupils = Pupil::orderBy('created_at', 'desc')->paginate();
        return view('admin.academic.student')->with('pupils', $pupils);
    }

    // academic > student > add
    public function showAddStudent()
    {
        return view('admin.academic.addStudent');
    }

    // load the admin settings page
    // public function settings()
    // {
    //     // let's compare the session we created in the login function here. if they aren't logged in, force them to
    //     if(Session::has('adminSession')){
    //         // allow access
    //     }else{
    //         return redirect('/admin')->with('flash_message_error', 'Please log in first');
    //     }
    //     return view('admin.settings');
    // }

    // check user's password in the settings page
    // modify this code to allow for multiple admins. check original youtube video comments for the code
    // public function chkPassword(Request $request){
    //     $data = $request->all();
    //     $current_password = $data['current_pwd'];
    //     // for single admin
    //     // $check_password = User::where(['admin'=>'1'])->first();
    //     // for multiple admins
    //     $check_password = User::where(['email'=>Auth::user()->email])->first();
    //     if(Hash::check($current_password,$check_password->password)){
    //         echo "true"; die;
    //     }else {
    //         echo "false"; die;
    //     }
    // }

    // public function updatePassword(Request $request){
    //     if($request->isMethod('post')){
    //         $data = $request->all();
    //         $check_password = User::where(['email' => Auth::user()->email])->first();
    //         $current_password = $data['current_pwd'];
    //         if(Hash::check($current_password,$check_password->password)){
    //             $password = bcrypt($data['new_pwd']);
    //             //for single admin
    //             // User::where('id','1')->update(['password'=>$password]);
    //             //for multiple admins
    //             User::where('email',Auth::user()->email)->update(['password'=>$password]);
    //             // for above line, you can also try User::where('id',$check_password->id)->update(['password'=>$password]); because id changes with every successive admin
    //             return redirect('/admin/settings')->with('flash_message_success','Password updated Successfully!');
    //         }else {
    //             return redirect('/admin/settings')->with('flash_message_error','Incorrect Current Password!');
    //         }
    //     }
    // }
    // configure the admin logout. requires use session. 
    // upon logging out, redirect to admin login page with a success message.
    // public function logout()
    // {
    //     // Session::flush();
    //     // you can get rid of session flush and use following line instead
    //     Auth::guard('admin')->logout();
    //     //return redirect('/admin')->with('flash_message_success', 'You have logged out');
    //     return redirect('/admin/login');
    // }

    function showUserStaff(){
        $staff = Staff::orderBy('created_at', 'desc')->paginate();
        return view('admin.users.staff.view')->with('staff', $staff);
    }

    function showAddStaff(){
        return view('admin.users.staff.add');
    }

    // equivalent to the Resourceful Store function
    function createStaff(Request $request){
        // just going to validate a few inputs from the form we made. not everything is needed. role is nullable.
        $validatedRequest = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'class' => 'required'
        ]);

        // get all inputs, both required and non-required
        $staff = Staff::create($request->all());
        if ($staff) {
            return back()->with('success', 'Staff Added Successfully');
        } else {
            return back()->withInput($request->input())->withErrors($validatedRequest);
        }
    }

    // equivalent to the Resourceful destroy function
    public function destroyStaff($id)
    {
        $staff = Staff::find($id);

        $staff->delete();

        return back()->with('success', 'Staff Removed');
    }
}
