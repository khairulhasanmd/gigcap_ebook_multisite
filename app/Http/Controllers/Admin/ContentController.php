<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\GlobalController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Content;
use App\Models\Category;

class ContentController extends GlobalController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');//requires login
    }

    public function index($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)
                    ->where('concept_id', $this->concept->id)->first();
        return view('admin.contents.contents', [
            'category' => $category,
            'data' => Content::where('category_id', $category->id)
                                ->where('concept_id', $this->concept->id)
                                ->orderBy('id', 'desc')->paginate(14),
        ]);
    }

    public function create($categorySlug, Request $request)
    {
        $this->store($categorySlug, $request);
    }

    public function store($categorySlug, Request $request)
    {
        $validation_rules = array();
        $validation_rules['title'] = 'required|string';
        $validation_rules['slug'] = 'required|string';
        // $validation_rules['description'] = 'required|string';
        if ($request->has('image')) {
            $validation_rules['image'] = 'required|max:2000048';
            $image = $request->file('image');
        }
        if ($request->has('file')) {
            $validation_rules['file'] = 'required|max:2000048';
            // $file = $request->file('file');
        }
        if ($request->has('video')) {
            $validation_rules['video'] = 'required|string';
            // $video = $request->file('video');
        }

        $validator = Validator::make($request->all(), $validation_rules);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{
            $data = Content::create($request->only(
                ['title', 'slug', 'description', 'category_id']));
            if ($request->has('image')) {
                $imageName = $request->slug.time().'_thumb.'.$image->extension();
                $image->move(public_path('contents/'), $imageName);
                $data->image = "/contents/".$imageName;
            }
            if ($request->has('file')) {
                // $fileName = $request->slug.time().'.'.$file->extension();
                // $file->move(public_path('contents/'), $fileName);
                // $data->file = "/contents/".$fileName;
                $data->file = $request->file;
            }
            if ($request->has('video')) {
                // $videoName = $request->slug.time().'.'.$video->extension();
                // $video->move(public_path('contents/'), $videoName);
                // $data->video = "/contents/".$videoName;
                $data->video = $request->video;
            }
            if ($request->has('post')) {
                $data->post = $request->post;
            }
            if ($request->has('tag_id')) {
                $data->tag_id = $request->tag_id;
            }
            $data->concept_id = $this->concept->id;
            $data->update();
            return redirect('admin/contents/'.$categorySlug)->with("success","Content Created successfully!");
        }
    }

    public function show($categorySlug, $id)
    {
        $this->edit($categorySlug, $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($categorySlug, $id)
    {
        $category = Category::where('slug', $categorySlug)
        ->where('concept_id', $this->concept->id)->first();
        return view('admin.contents.contents', [
            'category' => $category,
            'data' => Content::where('category_id', $category->id)
                                ->where('concept_id', $this->concept->id)
                                ->orderBy('id', 'desc')->paginate(14),
            'detail' => Content::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($categorySlug, Request $request, $id)
    {
        $validation_rules = array();
        $validation_rules['title'] = 'required|string';
        $validation_rules['slug'] = 'required|string';
        // $validation_rules['description'] = 'required|string';
        if ($request->has('image')) {
            $validation_rules['image'] = 'required|max:2000048';
            $image = $request->file('image');
        }
        if ($request->has('file')) {
            $validation_rules['file'] = 'required|max:2000048';
            // $file = $request->file('file');
        }
        if ($request->has('video')) {
            $validation_rules['video'] = 'required|string';
            // $validation_rules['video'] = 'required|max:2000048';
            // $video = $request->file('video');
        }

        $validator = Validator::make($request->all(), $validation_rules);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{
            $data = Content::where('id', $id)->first();
            @unlink(public_path().$data->image);
            @unlink(public_path().$data->file);
            @unlink(public_path().$data->video);
            $data->update($request->only(
                ['title', 'slug', 'description', 'category_id']));
            if ($request->has('image')) {
                $imageName = $request->slug.time().'_thumb.'.$image->extension();
                $image->move(public_path('contents/'), $imageName);
                $data->image = "/contents/".$imageName;
            }
            if ($request->has('file')) {
                // $fileName = $request->slug.time().'.'.$file->extension();
                // $file->move(public_path('contents/'), $fileName);
                // $data->file = "/contents/".$fileName;
                $data->file = $request->file;
            }
            if ($request->has('video')) {
                // $videoName = $request->slug.time().'.'.$video->extension();
                // $video->move(public_path('contents/'), $videoName);
                // $data->video = "/contents/".$videoName;
                $data->video = $request->video;
            }
            if ($request->has('post')) {
                $data->post = $request->post;
            }
            if ($request->has('tag_id')) {
                $data->tag_id = $request->tag_id;
            }
            $data->concept_id = $this->concept->id;
            $data->update();
            return redirect('admin/contents/'.$categorySlug)->with("success","Content Updated successfully!");
        }
    }

    public function destroy($categorySlug, $id)
    {
        $data = Content::find($id);
        @unlink(public_path().$data->image);
        @unlink(public_path().$data->file);
        @unlink(public_path().$data->video);
        $data->delete();
        return Redirect::back()->with("success","Content Deleted successfully !");
    }

}
