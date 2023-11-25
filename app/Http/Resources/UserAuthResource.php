<?php

namespace App\Http\Resources;

use App\DTO\Auth\AuthData;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var AuthData $resource */
        $resource = $this->resource;

        return [
            "token" => $resource->token,
            "user" => UserResource::make($resource->user),
        ];
    }
}
