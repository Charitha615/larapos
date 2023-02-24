<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class KeyboardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'advertisement_id' => $this->advertisement_id,
            'name' => $this->name,
            'contents' => $this->contents,
            'terminal' => $this->terminal,
            'display_effect' => $this->display_effect,
            'duration' => $this->duration,
            'no_end_date' => $this->no_end_date,
            'start_date' => $this->start_date,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'last_modified_by' => $this->last_modified_by,
            'last_modified_date' => $this->last_modified_date,
            'record_status' => $this->record_status,
        ];
    }
}
