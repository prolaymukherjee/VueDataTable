<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DatatableCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'data' =>$this->collection->transform(function ($datatable){
                return[
                 'id' =>$datatable->id,
                 'name' => $datatable->name,
                 'email' => $datatable->email,
                 'phone' => $datatable->phone,
                 'address' => $datatable->address,
                 'total' => $datatable->total,
                ];
            })
        ];
    }
}
