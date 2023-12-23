<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'emp_id' => $this->emp_id,
            'sch_id' => $this->sch_id,
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'worked_hour' => $this->worked_hour,
            'total_hours_worked' => $this->when(isset($this->total_hours_worked), $this->total_hours_worked),
        ];
    }
}
