<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
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
        $id = Request::instance()->company_id;

        if ($id) {
            return [
                'name' => ['required', 'max:255'],
                'email' => ['required', 'max:255', 'email', 'unique:companies,email,' . $id],
                'logo' => ['image', 'mimes:jpg,png,jpeg'],
                'website' => ['required', 'max:255']
            ];
        } else {
            return [
                'name' => ['required', 'max:255'],
                'email' => ['required', 'max:255', 'email', 'unique:companies'],
                'logo' => ['image', 'mimes:jpg,png,jpeg'],
                'website' => ['required', 'max:255']
            ];
        }
    }
}
