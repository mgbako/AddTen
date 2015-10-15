<?php namespace Scholrs;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model {

	//

}


public function student()
{
  return $this->belongsTo('Scholrs\Student');
}

public function subject()
{
  return $this->belongsTo('Scholrs\Subject');
}