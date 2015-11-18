<?php

namespace Scholrs\Http\Controllers;

use Illuminate\Http\Request;

use Scholrs\Http\Requests;
use Scholrs\Http\Requests\ClassesSubjectsRequest;
use Scholrs\Http\Controllers\Controller;
use Scholrs\Subject;
use Scholrs\Classe;
use Scholrs\ClasseSubject;

class ClassesSubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($classe_id)
    {

        $user = \Auth::user();

        $count = 1;

        $subjectList = Subject::orderBy('name', 'asc')->lists('name', 'id');

        $subjectName = Classe::findOrFail($classe_id)->name;

        $subjects = Classe::orderBy('name', 'asc')->findOrFail($classe_id)->subjects;

        $classes = Classe::findOrFail($classe_id);

        $str = [];
        foreach($classes->subjects as $st){
            $str[] = $st->pivot->subject_id;
        }

        return view('admin.classesSubjects.index', compact('subjects', 'subjectList', 'count', 'classe_id', 'subjectName', 'str', 'user') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ClassesSubjectsRequest $request, $classe_id)
    {
        $classSubject = Classe::findOrFail($classe_id);

        $classSubject->subjects()->sync($request->input('subject_id'));
        return redirect()
                ->route('classes.subjects', $classe_id)
                ->with('message', '<p class="alert alert-success text-center">Subject Created</p>');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Show the form for Deleting the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id, $subjectId)
    {
        $user = \Auth::user();

        $subject = Classe::find($id);
        $subject = $subject->subjects()->find($subjectId);
       
        return view('admin.classesSubjects.delete', compact('subject', 'id', 'subjectId', 'user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy( Request $request, $id, $subjectId)
    {
        $classe = Classe::find($id);

        if($request->get('agree')==1)
        {
             $classe->subjects()->detach($subjectId);

            return redirect()
                ->route("classes.subjects.index", [$id])
                ->with('message', '<p class="alert alert-success text-center">Subject Deleted</p>');
        }

        return redirect()
                ->route("classes.subjects.index", [$id]);

        
    }
}
