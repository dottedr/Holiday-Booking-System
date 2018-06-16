<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HolidayRequest extends JsonResource
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
            'start'=>$this->start,
            'end'=>$this->end,
            'title'=>$this->title,
            'body'=>$this->body,
           // 'start'=>$this->start,
        ];

    }
    //TODO:
    public function with($request)
    {
        return [
          'color'=>'#880e4f'
        ];
    }
}
