<?php


namespace App\Http\Controllers;


class ProfilesController extends Controller {

	public function show()
	{
		// If validation failed

		$validation = new Validation;

		return $this->redirectBackWithErrors($validation);
	}

	public function update()
	{
		// If validation failed

		$validation = new Validation;

		return $this->redirectBackWithErrors($validation);
	}


}

class Validation {
	protected $errors = [
		'error one',
		'error two'
	];

	public function errors()
	{
		return $this->errors;
	}
}