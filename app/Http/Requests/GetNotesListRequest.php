<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class GetNotesListRequest extends GetNotesRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->isAdmin();
    }
}
