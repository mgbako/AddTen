<?php namespace Scholrs\Http\Requests;

use Scholrs\Http\Requests\Request;

class UserRequest extends Request {

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
		return [
			'firstname'=>'required',
			'lastname'=>'required',
			'user_id'=>'required',
			'email'=>'required|email|unique:users',
			'password'=>'required|confirmed',
			'password_confirmation'=>'required',
			'phone'=>'required',
			'dob'=>'required',
			'gender'=>'required',
			'address'=>'required',
			'state'=>'required',
			'nationality'=>'required'
		];
	}

}
