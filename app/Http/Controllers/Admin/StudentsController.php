<?php namespace Scholrs\Http\Controllers\Admin;

use Scholrs\Http\Requests;
use Scholrs\Http\Requests\StudentRequest;
use Scholrs\Http\Controllers\Controller;
use Scholrs\Student;
use Scholrs\Classe;
use Scholrs\Subject;

use Illuminate\Http\Request;

class StudentsController extends Controller {

	private $path = 'img/student/';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = \Auth::user();
		$count = 1;
		$students = Student::all();
		return view('admin.students.index', compact('students', 'count', 'user'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$classList = Classe::lists('name');
		$subjects = Subject::lists('name', 'id');
		return view('admin.students.create', compact('classList', 'subjects'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StudentRequest $request)
	{
		$student = new Student();
		
		$image = $request->file('image');
		
		$name = time().$image->getClientOriginalName();
		
		$image->move($this->path, $name);

		$student->firstname = $request->input('firstname');
		$student->lastname = $request->input('lastname');
		$student->studentId = $request->input('studentId');
		$student->phone = $request->input('phone');
		$student->dob = $request->input('dob');
		$student->gender = $request->input('gender');
		$student->state = $request->input('state');
		$student->address = $request->input('address');
		$student->nationality = $request->input('nationality');
		$student->class = $request->input('class');
		$student->image = $this->path.$name;
		$student->save();

		$student->subjects()->attach($request->input('subject_list'));

		return redirect()
			->route('students.index')
			->with('message', '<p class="alert alert-success text-center">Student Added</p>');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = \Auth::user();

		$student = Student::find($id);
		return view('admin.students.show', compact('student', 'user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = \Auth::user();

		$classList = Classe::lists('name', 'name');
		$subjects = Subject::lists('name', 'id');

		$student = Student::findOrFail($id);

		$str = [];
		foreach($student->subjects as $st){
			$str[] = $st->pivot->subject_id;
		}
		
		return view('admin.students.edit', compact('student', 'classList', 'subjects',  'str', 'user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(StudentRequest $request, $id)
	{
		$student = Student::findOrFail($id);
		$image = $student->image;

		if($request->hasFile('image'))
		{
			$image = $request->file('image');
			
			$name = time().$image->getClientOriginalName();
			
			$image->move($this->path, $name);

			$image = $this->path.$name;
		}

		$student->update([

			'firstname'=>$request->input('firstname'),
	        'lastname'=>$request->input('lastname'),
	        'phone'=>$request->input('phone'),
	        'dob'=>$request->input('dob'),
	        'gender'=>$request->input('gender'),
	        'address'=>$request->input('address'),
	        'state'=>$request->input('state'),
	        'nationality'=>$request->input('nationality'),
	        'class'=>$request->input('class'),
	        'image'=>$image
		]);

		$student->subjects()->sync($request->input('subject_list'));

		return redirect()
				->route('students.index')
				->with('message', '<p class="alert alert-success text-center">Student Updated</p>');
	}

	public function delete($id)
	{
		$user = \Auth::user();

		$student = Student::find($id);

		return view('admin.students.delete', compact('student', 'user'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		$student = Student::find($id);

		if($request->get('agree')==1)
		{
			$student->delete();
			$student->subjects()->detach($id);

			return redirect()
				->route('students.index')
				->with('message', '<p class="alert alert-danger text-center">Student Deleted</p>');
		}

		return redirect('students');
	}

}
