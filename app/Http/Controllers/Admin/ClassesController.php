<?php namespace Scholrs\Http\Controllers\Admin;

use Scholrs\Http\Requests;
use Scholrs\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Scholrs\Http\Requests\ClassesRequest;
use Scholrs\Classe;
use Scholrs\Subject;

class ClassesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = \Auth::user();
		$count = 1;
		$classes = Classe::orderBy('name', 'asc')->get();
		$subjectList = Subject::orderBy('name', 'asc')->lists('name', 'id');
		return view('admin.classes.index', compact('classes', 'count', 'user', 'subjectList'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user = \Auth::user();
		$subjectList = Subject::orderBy('name', 'asc')->lists('name', 'id');
		return view('admin.classes.create', compact('subjectList', 'user'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ClassesRequest $request)
	{
		$classe = Classe::create($request->all());

		$classe->subjects()->attach($request->input('subjects'));

		return redirect('classes');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
		$class = Classe::find($id);

		return view('admin.classes.edit', compact('class', 'user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$class = Classe::findOrFail($id);

		$this->validate($request, ['name'=>'required|min:3']);

		$class->update($request->all());

		return redirect()
			->route('classes.index')
			->with('message', '<p class="alert alert-success">Class Updated</p>');
	}

	/**
	 * Show the form for deleting the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$user = \Auth::user();
		$class = Classe::find($id);

		return view('admin.classes.delete', compact('class', 'user'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		$class = Classe::find($id);

		if($request->get('agree')==1)
		{
			$class->delete();

			return redirect()
				->route('classes.index')
				->with('message', '<p class="alert alert-danger">Class Deleted</p>');
		}

		return redirect('classes');
	}

}
