<?php

namespace App\Http\Requests;


class UpdateNoteRequest extends StoreNoteRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->isAdmin()
            || $this->user()->notes()->where('id', $this->note->id)->exists();
    }
}
