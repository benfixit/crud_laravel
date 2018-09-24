<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FilmStoreRequest extends FormRequest
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
        return [
            'name' => 'required|unique:films|min:3|max:255',
            'description' => 'required',
            'release_date' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'ticket_price' => 'required',
            'country_id' => 'required',
            'genre' => 'required',
            'photo' => 'required|image|max:5000|mimes:jpg,png,bmp,jpeg',
        ];
    }
}
