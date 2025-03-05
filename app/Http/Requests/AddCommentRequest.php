<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCommentRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "comment" => "required|max:50",
            "user_id" => "required|exists:users,id",
            "movie_id" => "required|exists:movies,id"
        ];
    }
}
