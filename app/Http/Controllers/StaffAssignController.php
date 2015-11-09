<?php

namespace Scholrs\Http\Controllers;

use Illuminate\Http\Request;

use Scholrs\Http\Requests;
use Scholrs\Http\Requests\StaffAssignRequest;
use Scholrs\Http\Controllers\Controller;
use Scholrs\Teacher;
use Scholrs\Subject;
use Scholrs\Classe;
use Scholrs\Student;

class StaffAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = \Auth::user();
        $staff = Teacher::orderBy('lastname', 'asc')->get(['id', 'lastname', 'firstname', 'teacherId']);
        $classList = Classe::orderBy('name', 'asc')->lists('name', 'id');
        $subjectList = Subject::orderBy('name', 'asc')->lists('name', 'id');

        $assigned = [];
        $teacher = [];

        foreach(Teacher::lists('id') as $id)
        {
            $teacher = Teacher::findOrFail($id);
          
            foreach($teacher->classes as $st){
                $assignedClassId[] = $st->pivot->classe_id;
            }

            foreach($teacher->subjects as $st){
                $assignedSubjectId[] = $st->pivot->teacher_id;
            }

           
            $assignedClass = Classe::whereIn('id', $assignedClassId)->get();

            //return Classe::findOrFail(1)->subjects;

            foreach($assignedClass as $ass)
            {
                $subjects[] = Classe::findOrFail($ass->id)->subjects;
            }

           // return $subjects;
        }
        
        
    
        return view('Admin.staffAssign.index', compact('subjectList', 'classList', 'staff', 'user', 'assignedClass'));
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
    public function store(StaffAssignRequest $request)
    {

        $teacher = Teacher::findOrFail($request->input('teacher_id'));

        //$teacher->classes()->attach($request->input('classe_id'))->subjects()->attach($request->input('subject_id'));

        $teacher->classes()->attach($request->input('classe_id'));
        $teacher->subjects()->attach($request->input('subject_id'));
 
        return redirect()
            ->route('staffAssign.index')
            ->with('message', '<p class="alert alert-success text-center">Class and Subject Assigned to Staff</p>');
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
