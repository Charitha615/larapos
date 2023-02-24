<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ItemResource extends JsonResource
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
            'item_id' => $this->item_id,
            'description' => $this->description,
            'plu_no' => $this->plu_no,
            'department_id' => $this->department_id,
            'supplier_id' => $this->supplier_id,
            'unit_id' => $this->unit_id,
            'number_of_units' => $this->number_of_units,
            'tax_id' => $this->tax_id,
            'carton_cost' => $this->carton_cost,
            'open_price' => $this->open_price,
            'open_description' => $this->open_description,
            'modifier_popup' => $this->modifier_popup,
            'inc_price_in_kp' => $this->inc_price_in_kp,
            'no_of_dockets' => $this->no_of_dockets,
            'kp_description' => $this->kp_description,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'last_modified_by' => $this->last_modified_by,
            'last_modified_date' => $this->last_modified_date,
            'record_status' => $this->record_status,
        ];
    }
}
