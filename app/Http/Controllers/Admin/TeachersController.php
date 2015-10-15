<?php namespace Scholrs\Http\Controllers\Admin;

use Scholrs\Http\Requests;
use Scholrs\Http\Requests\TeacherRequest;
use Scholrs\Http\Controllers\Controller;
use Scholrs\Teacher;
use Scholrs\Classe;
use Scholrs\Subject;

use Illuminate\Http\Request;
use Image;

class TeachersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$count = 1;
		$teachers = Teacher::all();
		return view('admin.teachers.index', compact('teachers', 'count'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$types = [
			'Administrator'=>'Administrator',
			'Teacher'=>'Teacher',
			'Users'=>'Users',
		];

		$classes = Classe::lists('name', 'id');
		$subjects = Subject::lists('name', 'id');

		return view('admin.teachers.create', compact('types', 'subjects', 'classes'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TeacherRequest $request)
	{	
		$teacher = new Teacher();

		$image = $request->file('image');
		
		$name = time().$image->getClientOriginalName();
		$path = 'img/staffs/';
		$image->move($path, $name);

		//Image::make($image->getRealPath() )->resize(468, 249)->save('public/img/staffs'.$name);


		$teacher->firstname = $request->input('firstname');
		$teacher->lastname = $request->input('lastname');
		$teacher->teacherId = $request->input('teacherId');
		$teacher->phone = $request->input('phone');
		$teacher->dob = $request->input('dob');
		$teacher->gender = $request->input('gender');
		$teacher->state = $request->input('state');
		$teacher->nationality = $request->input('nationality');
		$teacher->type = $request->input('type');
		$teacher->firstname = $request->input('firstname');
		$teacher->image = $path.$name;

		$teacher->save();


		/*$teacher->classes()->attach($request->input('classes'));
		$teacher->subjects()->attach($request->input('subjects'));
*/
		return redirect()
			->route('teachers.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$teacher = Teacher::find($id);
		return view('admin.teachers.show', compact('teacher'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$types = [
			'Administrator'=>'Administrator',
			'Teacher'=>'Teacher',
			'Users'=>'Users',
		];

		$classes = Classe::lists('name', 'id');
		$subjects = Subject::lists('name', 'id');
		
		$teacher = Teacher::findOrFail($id);

		return view('admin.teachers.edit', compact('teacher', 'types', 'classes', 'subjects'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$teacher = Teacher::findOrFail($id);

		$this->validate($request, Teacher::updateRules());

		$teacher->update($request->all());

		return redirect()
				->route('teachers.index')
				->with('message', '<p class="alert alert-success text-center">teacher Updated</p>');
	}

	public function delete($id)
	{
		$teacher = Teacher::find($id);

		return view('admin.teachers.delete', compact('teacher'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		$teacher = Teacher::find($id);

		if($request->get('agree')==1)
		{
			$teacher->delete();

			return redirect()
				->route('teachers.index')
				->with('message', '<p class="alert alert-danger text-center">teacher Deleted</p>');
		}

		return redirect('teachers');
	}

}
