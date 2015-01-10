<?php namespace Idun\Http\Requests;

use Idun\Http\Requests\Request;

class UpdateUserRequest extends Request {

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
			'email' => 'required'
		];
	}
	/**
	 * Set the validation messages that apply to the request.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'email.required' => 'Dont wreck it '
		];
	}

	/**
	 * Get the sanitized input for the request.
	 *
	 * @return array
	 */
	public function sanitize()
	{
		return $this->all();
	}

	public function forbiddenResponse()
	{
		return $this->redirector->to('/403');
	}

}
