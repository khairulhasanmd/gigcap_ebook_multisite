<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin\Product;
use App\Models\Admin\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('admin.product.list')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.product.add')->with(['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'product_name' => 'required|max:255',
            'product_description' => 'nullable',
            'image' => 'nullable',
            'pdf_url' => 'required'
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $product = Product::create([
            'product_name' => $request->get('product_name'),
            'product_description' => $request->get('product_description'),
            'image' => $imageName,
            'pdf_url' => $request->get('pdf_url'),
            'slug' => Str::slug($request->get('product_name')),
        ]);

        if ($request->has('tags') && count($request->get('tags')) > 0) {
            $tags = $request->get('tags');
            foreach ($tags as $tag) {
                ProductTag::create([
                    'product_id' => $product->id,
                    'tag_id' => $tag,
                ]);
            }
        }

        return redirect()->route('product.create')
                           ->with('success','Product added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $product = Product::find($id);
        $productTag = ProductTag::where(['product_id' => $product->id])->get();
        $pTags = [];
        foreach ($productTag as $pTag) {
            $pTags[] = $pTag->tag_id;
        }
        return view('admin.product.edit')->with(['product' => $product, 'tags' => $tags, 'pTags' => $pTags]);
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
        //
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('product.index')
                ->with('error', 'Product not found.');
        }

        $request->validate([
            'product_name' => 'required|max:255',
            'image' => 'nullable',
            'product_description' => 'nullable',
            'pdf_url' => 'required',
            'tags' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->product_name = request('product_name');
        $product->product_description = request('product_description');
        $product->pdf_url = request('pdf_url');
        $product->slug = Str::slug($request->product_name);

        $product->save();

        $productTag = ProductTag::where('product_id', $product->id)->get();
        $pTags = [];
        $rTags = [];
        $nTags = [];
        foreach ($productTag as $pTag) {
            $pTags[] = $pTag->tag_id;
        }
        
        
        if ($pTags != $request->get('tags')) {
            if ($request->has('tags') && count($request->get('tags')) > 0) {

                $tags = $request->get('tags');
                foreach ($tags as $tag) {
                    $rTags[] = $tag;
                }

                $oldTags = count($pTags);
                $requestTags = count($rTags);
                $i = 0;

                while ($i < $oldTags || $i < $requestTags) {

                    if (isset($pTags[$i]) && isset($rTags[$i]) && $pTags[$i] != $rTags[$i]) {

                        ProductTag::where('tag_id', $pTags[$i])->delete();
                        $nTags[] = $rTags[$i];

                    } elseif (!isset($rTags[$i])) {

                        ProductTag::where('tag_id', $pTags[$i])->delete();

                    } else {

                        $nTags[] = $rTags[$i];

                    }
                    
                    $i++;
                }
                foreach ($nTags as $tag) {
                    ProductTag::create([
                        'product_id' => $product->id,
                        'tag_id' => $tag,
                    ]);
                
                }
            } else {

                ProductTag::where('product_id', $product->id)->delete();
            }
        }

        return redirect()->route('product.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Product::find($id)->delete();

        return redirect()->route('product.index')
                        ->with('success','Product deleted successfully');
    }
}
