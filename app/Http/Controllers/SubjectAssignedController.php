<?php

namespace Scholrs\Http\Controllers;

use Illuminate\Http\Request;

use Scholrs\Http\Requests;
use Scholrs\Http\Requests\SubjectAssignedRequest;
use Scholrs\Http\Controllers\Controller;
use Auth;
use Scholrs\Teacher;
use Scholrs\Subject;
use Scholrs\Classe;
use Scholrs\SubjectAssigned;

class SubjectAssignedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();

        $staff = Teacher::all();
        $classList = Classe::lists('name', 'id');
        $subjectList = Subject::lists('name', 'id');

        $subjectAssigned = SubjectAssigned::all();

        return view('Admin.subjectAssigned.index', compact('subjectList', 'classList', 'staff', 'user', 'assignedClass', 'subjectAssigned'));
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
    public function store(SubjectAssignedRequest $request)
    {
        $subjectAssigned = SubjectAssigned::where('teacher_id', $request->teacher_id)
                                            ->where('classe_id', $request->classe_id)
                                            ->where('subject_id', $request->subject_id)->get()->count();
        
        if($subjectAssigned > 0)                                    
        {
            return redirect()
                ->route('subjectAssigned.index')
                ->with('message', '<p class="alert alert-success text-center">Class and Subject Already been Assigned to Teacher</p>');        
        }

        $input = $request->all();

        SubjectAssigned::create($input);

        return redirect()
                ->route('subjectAssigned.index')
                ->with('message', '<p class="alert alert-success text-center">Class and Subject has been Assigned to Teacher</p>');        
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
     * Shaow the form for editing the specified resource.
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
