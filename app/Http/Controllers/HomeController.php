<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Student;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $students = Student::orderBy('id', 'desc')->paginate(7);
        return view('home', compact('students'));
    }

    /**
     * Get student instance by id.
     *
     * @param  integer $id id of student in database
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);

        return response()->json([
            'error' => false,
            'student'  => $student,
        ], 200);
    }

    /**
     * Store student instance to database.
     *    
     * @param  \Illuminate\Http\Request $request info to store
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validator = Validator::make($request->input(), array(
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'sex' => 'required',
            'birthdate' => 'required',
            'group' => ['required', 'string', 'max:100'],
            'faculty' => ['required', 'string', 'max:100'],
        ));

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $student = Student::create($request->all());

        return response()->json([
            'error' => false,
            'student'  => $student,
        ], 200);
    }

    /**
     * Update student instance by id.
     *    
     * @param  \Illuminate\Http\Request $request info to update with
     * @param  integer $id id of student in database
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->input(), array(
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'sex' => 'required',
            'birthdate' => 'required',
            'group' => ['required', 'string', 'max:10'],
            'faculty' => ['required', 'string', 'max:100'],
        ));

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $student = Student::find($id);

        $student->first_name =  $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->sex = $request->input('sex');
        $student->birthdate = $request->input('birthdate');
        $student->group = $request->input('group');
        $student->faculty = $request->input('faculty');

        $student->save();

        return response()->json([
            'error' => false,
            'student'  => $student,
        ], 200);
    }

    /**
     * Remove student instance by id.
     *
     * @param  integer $id id of student in database
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::destroy($id);

        return response()->json([
            'error' => false,
            'student'  => $student,
        ], 200);
    }

    /**
     * Get datatable component of dashboard for ajax request.
     * 
     * @param  \Illuminate\Http\Request $request request from client side
     * @return \Illuminate\Http\Response
     */
    public function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $students = Student::orderBy('id', 'desc')->paginate(7);
            return view('partials.student_table', compact('students'))->render();
        }
    }
}
