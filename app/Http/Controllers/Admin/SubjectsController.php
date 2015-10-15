<?php namespace Scholrs\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Scholrs\Http\Requests;
use Scholrs\Http\Controllers\Controller;

use Scholrs\Http\Requests\SubjectRequest;
use Scholrs\Subject;
use Scholrs\Classe;


class SubjectsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{

		$count = 1;

		$subjects = Subject::all();
		
		return view('admin.subjects.index', compact('count', 'subjects'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//return view('admin.subjects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(SubjectRequest $request)
	{

		$input = $request->all();

		 Subject::create($input);

		 return redirect()
		 		->route('subjects.index')
				->with('message', '<p class="alert alert-success text-center">Subject Added</p>');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subject = Subject::findOrFail($id->id);

		return view('admin.subjects.edit', compact('subject'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$subject = Subject::findOrFail($id->id);

		$this->validate($request, ['name'=>'required|min:3']);

		$subject->update($request->all());

		return redirect()
				->route('subjects.index')
				->with('message', '<p class="alert alert-success text-center">Subject Updated</p>');
	}

	/**
	 * Show the form for deleting the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$subject = Subject::find($id);

		return view('admin.subjects.delete', compact('subject'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		$subject = Subject::find($id->id);

		if($request->get('agree')==1)
		{
			$subject->delete();

			return redirect('subjects')
				->with('message', '<p class="alert alert-danger">Subject Deleted</p>');
		}

		return redirect('subjects');
	}

}
