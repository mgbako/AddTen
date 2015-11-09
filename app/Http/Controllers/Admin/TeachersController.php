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
		$user = \Auth::user();
		$count = 1;
		$teachers = Teacher::all();
		return view('admin.teachers.index', compact('teachers', 'count', 'user'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user = \Auth::user();
		$types = [
			'' => 'Selete Type',
			'Administrator'=>'Administrator',
			'Teacher'=>'Teacher',
			'Users'=>'Users',
			'Principal'=>'Principal',
			'Secretary'=>'Secretary',
		];

		$classes = Classe::lists('name', 'id');
		$subjects = Subject::lists('name', 'id');

		return view('admin.teachers.create', compact('types', 'subjects', 'classes', 'user'));
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

		
		$teacher->firstname = $request->input('firstname');
		$teacher->lastname = $request->input('lastname');
		$teacher->teacherId = $request->input('teacherId');
		$teacher->phone = $request->input('phone');
		$teacher->dob = $request->input('dob');
		$teacher->gender = $request->input('gender');
		$teacher->address = $request->input('address');
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
		$user = \Auth::user();
		$teacher = Teacher::find($id);

		return view('admin.teachers.show', compact('teacher', 'user', 'assignedClass'));
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
		$types = [
			'' => 'Selete Type',
			'Administrator'=>'Administrator',
			'Teacher'=>'Teacher',
			'Users'=>'Users',
			'Principal'=>'Principal',
			'Secretary'=>'Secretary',
		];

		$classes = Classe::lists('name', 'id');
		$subjects = Subject::lists('name', 'id');
		
		$teacher = Teacher::findOrFail($id);

		return view('admin.teachers.edit', compact('teacher', 'types', 'classes', 'subjects', 'user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(TeacherRequest $request, $id)
	{
		
		$teacher = Teacher::findOrFail($id);
		$image = $teacher->image;

		if($request->hasFile('image'))
		{
			$image = $request->file('image');
			
			$name = time().$image->getClientOriginalName();
			$path = 'img/staffs/';
			$image->move($path, $name);

			$image = $path.$name;
		}
		
		

		$teacher->update([
			'firstname'=>$request->input('firstname'),
	        'lastname'=>$request->input('lastname'),
	        'phone'=>$request->input('phone'),
	        'dob'=>$request->input('dob'),
	        'gender'=>$request->input('gender'),
	        'address'=>$request->input('address'),
	        'state'=>$request->input('state'),
	        'nationality'=>$request->input('nationality'),
	        'type'=>$request->input('type'),
	        'image'=>$image

		]);

		return redirect()
				->route('teachers.index')
				->with('message', '<p class="alert alert-success text-center">teacher Updated</p>');
	}

	public function delete($id)
	{
		$user = \Auth::user();

		$teacher = Teacher::find($id);

		return view('admin.teachers.delete', compact('teacher', 'user'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		$user = \Auth::user();
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
