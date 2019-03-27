<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
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
        if ($this->request->has('delete_author_thumbnail') || $this->request->has('delete_front_image')) {
            return [];
        }

        return [
            'title' => 'required',
            'post_date' => 'required',
            'author' => 'required',
            // 'author_thumbnail' => 'required|image|dimensions:min_width=100,min_height=100|max:1024',
            // 'front_image' => 'required|image|dimensions:min_width=560,min_height=250|max:1024',
        ];
    }

    public function response(array $errors)
    {
        return response()->json([
            'error' => 1,
            'messages' => $errors
        ]);
    }
}
