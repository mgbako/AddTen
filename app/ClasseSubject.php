<?php

namespace Scholrs;

use Illuminate\Database\Eloquent\Model;

class ClasseSubject extends Model
{
	protected $table = 'classe_subject';
	
    protected $fillable = ['classe_id', 'subject_id'];

	 /**
	 * The users that belong to the role.
	 */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }


}
