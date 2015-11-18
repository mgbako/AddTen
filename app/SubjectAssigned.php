<?php

namespace Scholrs;

use Illuminate\Database\Eloquent\Model;

class SubjectAssigned extends Model
{
    protected $fillable = ['classe_id', 'subject_id', 'teacher_id'];
    protected $table = 'subjectAssigneds';
}
