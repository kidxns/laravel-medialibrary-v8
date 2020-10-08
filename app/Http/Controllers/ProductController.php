<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('id','desc')->paginate(10);

        return view('upload/add',compact('product'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request){
          $product = new Product($request->except(['image_id']));
          $product->save();
          if($request->hasFile('image') && $request->file('image')->isValid()){
            $product->addMediaFromRequest('image')->toMediaCollection('products');
          }
          return view('upload._list',['product' => Product::orderBy('id','desc')->get()])->render();
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
    public function edit(Request $request)
    {
        $product =  Product::findOrFail($request->id);
        return view('upload/update',[
            'product' =>$product,
            'media' => $product -> getMedia('products')->pluck('file_name')
            ])->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAjax(ProductRequest $request)
    {
        $product = Product::findOrFail($request->id);
        $update =  $product->update($request->only(['name','description']));

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $product->addMedia($request->file('image'))->toMediaCollection('products');
          }
        if($update){
            return view('upload._list',['product' => Product::orderBy('id','desc')->get()])->render();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
            $product = Product::whereIn('id',$request->input('id'));
            foreach($product->get() as $item){
                 $mediaItems = $item->getMedia('products');
                 $mediaItems[0]->delete();
            }
            if($product->delete()){
                return view('upload._list',['product' => Product::orderBy('id','desc')->get()])->render();
            }

    }
}