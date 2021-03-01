<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */



    public function toArray($request)
    {
        $timeStamp = $request->get('diff_time');
        $date      = date("Y-m-d H:i:s", $timeStamp);

        if ($this->deleted_at > $date) {
            $status = 'deleted';
        } elseif ($this->updated_at >= $date) {
            $status = 'modified';
        } else {
            $status = 'created';
        }
                
        $data = [
            'id'            => $this->id,
            'title'         => $this->title,
            'description'   => $this->description,
            'status'        => $status,
        ];

        $with = $request->get('with');

        if (!empty($with)) {
            if (str_contains($with, 'category')) {
                $data['category'] = $this->category;
            }
            
            if (str_contains($with, 'tags')) {
                $data['tags'] = $this->tags;
            }

            if (str_contains($with, 'ingredients')) {
                $data['ingredients'] = $this->ingredients;
            }
        }
   
        return $data;
    }
}
