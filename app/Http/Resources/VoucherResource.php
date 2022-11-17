<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class VoucherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id ,
            'name' => $this->name ,
            'code' => $this->code,
            'discount' => $this->discount,
            'valid_from' => Carbon::parse($this->valid_from)->format('Y-m-d'),
            'valid_to' => Carbon::parse($this->valid_to)->format('Y-m-d'),
            'status'=>Carbon::now()->gt($this->valid_from) && Carbon::now()->lt($this->valid_to)? 'Active': 'Inactive',
            'created_at' =>  Carbon::parse($this->created_at)->format('Y-m-d'),
        ];
    }
}
