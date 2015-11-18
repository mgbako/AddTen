<?php

namespace Scholrs;

use Illuminate\Database\Eloquent\Model;

class Subjectquestionstatus extends Model
{
	protected $fillable = ['classe_id', 'subject_id', 'time'];
    protected $table = 'subjectquestionstatus';

    public $timestamps = false;
}
