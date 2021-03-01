<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MealCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function withResponse($request, $response)
    {
        $data = [
            'meta' => [
                'currentPage' => $this->currentPage() ?? null,
                'totalItems'  => $this->total() ?? null,
                'itemsPerPage' => $this->count() ?? null,
                'totalPages'  => $this->lastPage()  ?? null,
            ],
            'data'  => $this->collection,
            'links' => [
                'prev'  => $this->previousPageUrl() ?? null,
                'next'  => $this->nextPageUrl() ?? null ,
                'self'  => $this->url($this->currentPage()) ?? null,
            ],
        ];
        $response->setData($data);
    }
}
