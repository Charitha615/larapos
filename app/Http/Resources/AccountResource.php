<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class AccountResource extends JsonResource
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

            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'card_number' => $this->card_number,
            'credit_limit' => $this->credit_limit,
            'user_id' => $this->user_id,
            'layBy_amount' => $this->layBy_amount,
            'due_amount' => $this->due_amount,
            'mobile_no' => $this->mobile_no,
            'phone_no' => $this->phone_no,
            'address' => $this->address,
            'notes' => $this->notes,
            'state' => $this->state,
            'post_code' => $this->post_code,
            'suburb' => $this->suburb,
            'store_credit' => $this->store_credit,
            'company_name' => $this->company_name,
            'email_address' => $this->email_address,
            'discount' => $this->discount,
            'last_modified_date' => $this->last_modified_date,

            //'id' => $this->id,
            //'first_name' => $this->first_name,
            //'last_name' => $this->last_name,
            //'card_number' => $this->card_number,
            //'credit_limit' => $this->credit_limit,
            //'user_id' => $this->user_id,
            //'layBy_amount' => $this->layBy_amount,
            //'due_amount' => $this->due_amount,
            //'store_credit' => $this->store_credit,
            //'phone_no' => $this->phone_no,
            //'mobile_no' => $this->mobile_no,
            //'email_address' => $this->email_address,
            //'discount' => $this->discount,
            //'address' => $this->address,
            //'suburb' => $this->suburb,
            //'state' => $this->state,
            //'post_code' => $this->post_code,
            //'notes' => $this->notes,
            //'created_by' => $this->created_by,
            //'created_date' => $this->created_date,
            //'last_modified_by' => $this->last_modified_by,
            //'last_modified_date' => $this->last_modified_date,
            //record_status' => $this->record_status,
        ];
    }
}
