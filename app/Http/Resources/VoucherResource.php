<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class VoucherResource extends JsonResource
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
            'voucher_id' => $this->voucher_id,
            'voucher_type_id' => $this->voucher_type_id,
            'description' => $this->description,
            'value' => $this->value,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'print_receipt' => $this->print_receipt,
            'unlimited' => $this->unlimited,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'last_modified_by' => $this->last_modified_by,
            'last_modified_date' => $this->last_modified_date,
            'record_status' => $this->record_status,
        ];
    }
}
