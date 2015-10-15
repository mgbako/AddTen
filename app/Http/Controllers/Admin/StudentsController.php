<?php namespace Scholrs\Http\Controllers\Admin;

use Scholrs\Http\Requests;
use Scholrs\Http\Requests\StudentRequest;
use Scholrs\Http\Controllers\Controller;
use Scholrs\Student;
use Scholrs\Classe;
use Scholrs\Subject;

use Illuminate\Http\Request;

class StudentsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$count = 1;
		$students = Student::all();
		return view('admin.students.index', compact('students', 'count'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$classList = Classe::lists('name', 'id');
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
		$input = $request->all();
		$student = Student::create($input);
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
		$student = Student::find($id);
		return view('admin.students.show', compact('student'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$classList = Classe::lists('name', 'name');
		$subjects = Subject::lists('name', 'id');

		$student = Student::findOrFail($id);
		
		return view('admin.students.edit', compact('student', 'classList', 'subjects'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$student = Student::findOrFail($id);

		$this->validate($request, Student::updateRules());

		$student->update($request->all());

		return redirect()
				->route('students.index')
				->with('message', '<p class="alert alert-success text-center">Student Updated</p>');
	}

	public function delete($id)
	{
		$student = Student::find($id);

		return view('admin.students.delete', compact('student'));
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

			return redirect()
				->route('students.index')
				->with('message', '<p class="alert alert-danger text-center">Student Deleted</p>');
		}

		return redirect('students');
	}

}
