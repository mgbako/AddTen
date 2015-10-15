<?php namespace Scholr;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model {

	protected $fillable = ['firstname', 'lastname', 'teacher_id', 
    'phone', 'dob', 'gender', 'address', 'state',
    'nationality', 'type' 'end_date'];


   public function account() {
      return $this->hasOne('Scholr\User');
    }

    
}
