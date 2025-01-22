<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GlobalController;
use Illuminate\Support\Facades\File;
use App\Models\Tag;
use App\Models\Category;
class TagController extends GlobalController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');//requires login
    }

    public function index()
    {

        return view('admin.tags.tags', [
            // 'datas' => Tag::where('concept_id', $this->concept->id)->orderBy('id', 'desc')->paginate(14),
            'categorys' => Category::where('concept_id', $this->concept->id)->get(),
            'concept_id' => $this->concept->id ,
            'data' => Tag::with('category')->where('concept_id', $this->concept->id)->orderBy('id', 'desc')->paginate(14),
            
        ]);
    }

    public function create(Request $request)
    {
        $this->store($request);
    }

    public function store(Request $request)
    {
        $validation_rules = array();
        $validation_rules['concept_id'] = 'required';
        $validation_rules['name'] = 'required|string';
        $validation_rules['category_id'] = 'required';
        $validator = Validator::make($request->all(), $validation_rules);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{
          
            $data = Tag::create($request->only(
                ['concept_id', 'name', 'category_id']));
            $data->concept_id = $this->concept->id;
            $data->update();
            return redirect('admin/tags')->with("success","Category Created successfully!");
        }
    }

    public function show($id)
    {
        $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.tags.tags', [
            'data' => Tag::with('category')->where('concept_id', $this->concept->id)->orderBy('id', 'desc')->paginate(14),
            'concept_id' => $this->concept->id ,
            'detail' => Tag::where('id', $id)->first(),
            'categorys' => Category::where('concept_id', $this->concept->id)->get(),
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
        $validation_rules['concept_id'] = 'required';
        $validation_rules['name'] = 'required|string';
        $validation_rules['category_id'] = 'required';

        $validator = Validator::make($request->all(), $validation_rules);


        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{
            $data = Tag::where('id', $id)->first();
            // dd($data);
            $data->update($request->only(
                ['concept_id', 'name', 'category_id']));
            $data->concept_id = $this->concept->id;
            $data->update();
            return redirect('admin/tags')->with("success","Tag Updated successfully!");
        }
    }

    public function destroy($id)
    {
        $data = Tag::find($id);
        $data->delete();
        return Redirect::back()->with("success","Tag Deleted successfully !");
    }
}
