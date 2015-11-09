<?php namespace Scholrs\Http\Requests;

use Scholrs\Http\Requests\Request;

class TeacherRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
			'firstname'=>'required',
			'lastname'=>'required',
			'phone'=>'required',
			'dob'=>'required',
			'gender'=>'required',
			'address'=>'required',
			'state'=>'required',
			'nationality'=>'required',
			'type'=>'required'
		];

		if(Request::isMethod('post'))
        {
        	$rules['teacherId'] = 'required|unique:teachers';
            $rules['image'] = 'required';
        }

        return $rules;
	}

}
