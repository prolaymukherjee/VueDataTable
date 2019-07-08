<?php

namespace App\Http\Controllers\Api;

use App\Datatable;
use App\Http\Resources\DatatableCollection;
use App\Http\Resources\DatatableResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DatatableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DatatableCollection(Datatable::latest()->paginate(10));
    }

    public function search($field,$query)
    {
        return new DatatableCollection(Datatable::where($field,'LIKE',"%$query%")->latest()->paginate(10));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|',
            'phone' => 'required|numeric',
            'address' => 'required',
            'total' => 'required|numeric',
        ]);
        $datatable = new Datatable();
        $datatable->name = $request->name;
        $datatable->email = $request->email;
        $datatable->phone = $request->phone;
        $datatable->address = $request->address;
        $datatable->total = $request->total;
        $datatable->save();
        return new DatatableResource($datatable);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new DatatableResource(Datatable::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
            $this->validate($request,[
                'name' => 'required',
                'email' => 'required|email|',
                'phone' => 'required|numeric',
                'address' => 'required',
                'total' => 'required|numeric',
            ]);
            $datatable = Datatable::findOrfail($id);
            $datatable->name = $request->name;
            $datatable->email = $request->email;
            $datatable->phone = $request->phone;
            $datatable->address = $request->address;
            $datatable->total = $request->total;
            $datatable->save();
            return new DatatableResource($datatable);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datatable = Datatable::findOrfail($id);
        $datatable->delete();
        return new DatatableResource($datatable);
    }
}
