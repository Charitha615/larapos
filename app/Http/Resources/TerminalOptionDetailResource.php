<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class TerminalOptionDetailResource extends JsonResource
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
            'terminal_option_detail_id' => $this->terminal_option_detail_id,
            'description' => $this->description,
            'type' => $this->type,
            'purpose' => $this->purpose,
            //'last_modified_by' => $this->last_modified_by,
            //'last_modified_date' => $this->last_modified_date,
            //'record_status' => $this->record_status,
        ];
    }
}
