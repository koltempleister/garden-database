<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateStockItem extends Request {

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
			'seed_id' => 'required',
			'supplier_id' => 'required',
			'status' => 'required',
			'fresh_untill' => 'required',
			'date_of_purchase' => 'required',
		];
	}

}
