<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'date' => Carbon::parse($user->created)->format("d F Y"),
                    'avatar' => $user->avatar,
                ];
            })
        ];
    }
}
