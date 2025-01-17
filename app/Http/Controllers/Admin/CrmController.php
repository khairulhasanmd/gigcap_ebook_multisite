<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GlobalController;
use Illuminate\Http\Request;
use App\Models\Crm;
use Exception;
use DB;

class CrmController extends GlobalController
{

    public function index()
    {
        parent::__construct();
        return view('admin.crms.crms', [
            'data' => Crm::all()->sortByDesc("id"),
        ]);
    }

    public function create(Request $request)
    {
        $this->store($request);
    }

    public function store(Request $request)
    {
        $validation_rules = array();
        $validation_rules['name'] = 'required|string';
        $validation_rules['api_url'] = 'required|string';
        $validation_rules['api_key'] = 'required|string';
        $validation_rules['olark_code'] = 'required|string';

        $validator = Validator::make($request->all(), $validation_rules);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{
            $data = Crm::create($request->only(
                ['name', 'api_url', 'api_key', 'olark_code']));
            return redirect('admin/crms')->with("success","Crm Created successfully!");
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.crms.crms', [
            'data' => Crm::all()->sortByDesc("id"),
            'detail' => Crm::where('id', $id)->first(),
         ]);
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
        $validation_rules = array();
        $validation_rules['name'] = 'required|string';
        $validation_rules['api_url'] = 'required|string';
        $validation_rules['api_key'] = 'required|string';
        $validation_rules['olark_code'] = 'required|string';

        $validator = Validator::make($request->all(), $validation_rules);

        $image = $request->file('file');

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{
            $data = Crm::where('id', $id)->first();
            $data->update($request->only(
                ['name', 'api_url', 'api_key', 'olark_code']));
            $data->update();
            return redirect('admin/crms')->with("success","Crm Updated successfully!");
        }
    }

    public function destroy($id)
    {
        $data = Crm::find($id);
        $data->delete();
        return Redirect::back()->with("success","Crm Deleted successfully !");
    }



}
