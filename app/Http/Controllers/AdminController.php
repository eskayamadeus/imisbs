<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Pupil;
use App\Staff;
use App\Pupilparent;
use App\Classroom;
use App\School;
use App\Classteacher;
// enable passsword hash checking
use Illuminate\Support\Facades\Hash;

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

    // CRUD for School
    function showSchoolSettings(){
        $school = School::find(1);
        return view('admin.school.settings')->with('school', $school);
    }

    // similar to Resourceful update/patch
    function updateSchool(Request $request, $id){
        // $this->validate($request, [
        //     'title' => 'required',
        //     'body' => 'required',
        // ]);

        // Create Post using Tinker format
        $school = School::find($id);

        $school->name = request('name');
        $school->location = request('location');
        $school->region = request('region');
        $school->academic_year = request('year');
        
        
        

        if ($school->save()) {
            return back()->with('success', 'School Updated Successfully');
        } else {
            return back()->withInput($request->input())->withErrors($validatedRequest);
        }

        //dd(request()->all());
    }

  


    // facilities > administration
    function showAdminFacilities(){
        return view('admin.facilities.administration.view');
    }

    // facilities > recreational
    function showRecreationalFacilities(){
        return view('admin.facilities.recreational_facilities.view');
    }

    // facilities > convienience
    function showPlacesOfConvenience(){
        return view('admin.facilities.places_of_convenience.view');
    }


  // CRUD for Facilities
    // subjects
    function showSubjects(){
        return view('admin.academic.subjects.view');
    }
    function showAddSubject(){
        return view('admin.academic.subjects.add');
    }


    // CRUD for Facilities
    function showTeachingFacilities(){
        return view('admin.facilities.teaching_facilities.view');
    }


>>>>>>> 853020efdd9225b15965c35a6e084868bccaf937
    // facilities > classrooms
    function showClassrooms(){
        $classrooms = Classroom::all();
        return view('admin.facilities.teaching_facilities.classrooms')->with('classrooms', $classrooms);
    }

    function showAddClassroom(){
        // we should return the teachers in the system here. so that we can assign class teacher straight from the classroom adder form
        // toArray returns the staff names as a list.
        // pluck removes the default array numbering and leaves us with a pure list
        //$staffName = Staff::all('name')->pluck('name')->toArray();
        $staffName = Staff::pluck('name', 'id');
        return view('admin.facilities.teaching_facilities.add')->with('staffName', $staffName);
    }

    // equivalent to the Resourceful Store function
    function createClassroom(Request $request){
        // just going to validate a few inputs from the form we made. not everything is needed. role is nullable.
        // $validatedRequest = $request->validate([
        //     'name' => 'required',
        // ]);

        // get all inputs, both required and non-required
        // $classrooms = Classroom::create($request->all());
        // if ($classrooms) {
        //     return back()->with('success', 'Classroom Added Successfully');
        // } else {
        //     return back()->withInput($request->input())->withErrors($validatedRequest);
        // }

        // request all details given

        // use staff name to match staff id
        // input staff id
        // dd result
        // dd([
        //     'name' => $request->input('name'),
        //     'id' => $request->input('staff'),
        // ]);

        // get ALL inputs, both required and non-required
        //$staff = Staff::create($request->all());

        //$staff = $request('staff');
        //$staff = $request->query('staff');     
        //$staff = $request->staff->name;
        //$staff = $request->input('staff.*.name');

        $classroom = Classroom::create([
            'name' => $request->input('name'),
            //'id' => $request->input('staff'),
        ]);

        // insert the staff's id into the class teacher table
        $classteacher = Classteacher::create([
            'staff_id' => $request->input('staff'),
            // get the id of the classroom just created
            'classroom_id' => Classroom::latest()->pluck('id')->first(),
        ]);
        //$staff->classroom_id = request('name');


        if ($classroom && $classteacher) {
            return back()->with('success', 'Classroom Added Successfully');
            // dd([
            //     request()->all(),
            //     Classroom::latest()->pluck('id')->first(),
            //     ]);
        } else {
            return back()->withInput($request->input())->withErrors($validatedRequest);
        }

        // now i'm getting second thoughts. why not submit classroom name to classroom table 
        // and then for the staff functionality, we can just add cllassroom id to staff table and use ibverse relatinship somewhere?
    }

    // equivalent to the Resourceful destroy function
    public function destroyClassroom($id)
    {
        $classrooms = Classroom::find($id);

        $classrooms->delete();

        return back()->with('success', 'Classroom Removed');
    }



    // CRUD for Pupil

    function showUserPupil(){
        $pupils = Pupil::orderBy('created_at', 'desc')->paginate();
        return view('admin.users.pupils.view')->with('pupils', $pupils);
    }

    function showAddPupil(){
        return view('admin.users.pupils.add');
    }

    // equivalent to the Resourceful Store function
    function createPupil(Request $request){
        // just going to validate a few inputs from the form we made. not everything is needed. role is nullable.
        $validatedRequest = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'class' => 'required'
        ]);

        // get all inputs, both required and non-required
        $pupils = Pupil::create($request->all());
        if ($pupils) {
            return back()->with('success', 'Pupil Added Successfully');
        } else {
            return back()->withInput($request->input())->withErrors($validatedRequest);
        }
    }

    // equivalent to the Resourceful destroy function
    public function destroyPupil($id)
    {
        $pupils = Pupil::find($id);

        $pupils->delete();

        return back()->with('success', 'Pupil Removed');
    }

    // CRUD for Staff

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
        // configure the inputs that are absolutely necessary ONLY
        $validatedRequest = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'class' => 'required'
        ]);

        // get ALL inputs, both required and non-required
        //$staff = Staff::create($request->all());
        $staff = Staff::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'subject' => $request['subject'],
            'role' => $request['role'],
            'class' => $request['class'],
            // can also use bcrypt instead of hash::make
            'password' => Hash::make($request['password']),
        ]);
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

    // CRUD for PupilParent

    function showUserPupilParent(){
        $pupilparents = Pupilparent::orderBy('created_at', 'desc')->paginate();
        return view('admin.users.pupilparents.view')->with('pupilparents', $pupilparents);
    }

    function showAddPupilParent(){
        return view('admin.users.pupilparents.add');
    }

    // equivalent to the Resourceful Store function
    function createPupilParent(Request $request){
        // just going to validate a few inputs from the form we made. not everything is needed. role is nullable.
        $validatedRequest = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        // get all inputs, both required and non-required
        $pupilparents = Pupilparent::create($request->all());
        if ($pupilparents) {
            return back()->with('success', 'Parent Added Successfully');
        } else {
            return back()->withInput($request->input())->withErrors($validatedRequest);
        }
    }

    // equivalent to the Resourceful destroy function
    public function destroyPupilParent($id)
    {
        $pupilparents = Pupilparent::find($id);

        $pupilparents->delete();

        return back()->with('success', 'Parent Removed');
    }

}
