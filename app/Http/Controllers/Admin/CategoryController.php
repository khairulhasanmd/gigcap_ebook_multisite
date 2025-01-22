<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GlobalController;
use Illuminate\Support\Facades\File;
use App\Models\Category;

class CategoryController extends GlobalController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');//requires login
    }

    public function index()
    {
        return view('admin.categories.categories', [
            'data' => Category::where('concept_id', $this->concept->id)->orderBy('id', 'desc')->paginate(14),
        ]);
    }

    public function create(Request $request)
    {
        $this->store($request);
    }

    public function store(Request $request)
    {
        // dd($request);
        $validation_rules = array();
        $validation_rules['name'] = 'required|string';
        $validation_rules['slug'] = 'required|string';
        $validation_rules['type'] = 'required|string';
        $validation_rules['description'] = 'required|string';
        $validation_rules['file'] = 'required|image|mimes:jpeg,JPEG,png,PNG,jpg,JPG,gif,GIF,svg,SVG|max:2048';

        $image = $request->file('file');

        $validator = Validator::make($request->all(), $validation_rules);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{
            $imageName = $request->slug.time().'.'.$image->extension();
            $image->move(public_path('images/categories'), $imageName);
            $data = Category::create($request->only(
                ['name','type','slug','description']));
            $data->image = "/images/categories/".$imageName;
            $data->concept_id = $this->concept->id;
            $data->menu_icon = $request->menu_icon;
            $data->update();
            return redirect('admin/categories')->with("success","Category Created successfully!");
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
        return view('admin.categories.categories', [
            'data' => Category::where('concept_id', $this->concept->id)->orderBy('id', 'desc')->paginate(14),
            'detail' => Category::where('id', $id)->first(),
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
        $validation_rules['slug'] = 'required|string';
        $validation_rules['type'] = 'required|string';
        $validation_rules['description'] = 'required|string';
        $validation_rules['file'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';

        $validator = Validator::make($request->all(), $validation_rules);

        $image = $request->file('file');

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{
            $data = Category::where('id', $id)->first();
            @unlink(public_path().$data->image);
            $imageName = $request->slug.'_'.time().'.'.$image->extension();
            $image->move(public_path('images/categories'), $imageName);
            $data->update($request->only(
                ['name', 'description', 'type', 'slug']));
            $data->image = "/images/categories/".$imageName;
            $data->concept_id = $this->concept->id;
            $data->menu_icon = $request->menu_icon;

            $data->update();
            return redirect('admin/categories')->with("success","Category Updated successfully!");
        }
    }

    public function destroy($id)
    {
        $data = Category::find($id);
        @unlink(public_path().$data->image);
        $data->delete();
        return Redirect::back()->with("success","Category Deleted successfully !");
    }

}
