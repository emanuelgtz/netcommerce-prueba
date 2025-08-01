<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

// get
class TaskResource extends JsonResource
{
    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'user' => $this->name,
            'description' => $this->description,
            'is_completed' => $this->is_completed,
            'start_at' => $this->start_at,
            'expired_at' => $this->expired_at
        ];
    }
}
