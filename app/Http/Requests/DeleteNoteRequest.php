<?php

namespace App\Http\Requests;


class DeleteNoteRequest extends UpdateNoteRequest
{

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return parent::authorize();
    }


    /**
     * @return array
     */
    public function rules(): array
    {
        return [

        ];
    }
}
