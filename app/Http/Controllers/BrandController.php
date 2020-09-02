<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $brands = Brand::all();
        // dd($items);
       
        return view('backend.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        
        // return "Brand create form here";
        return view('backend.brands.create',compact('brands'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            "name" => 'required',
            "photo" => 'required'   
        ]);
        //if include file,upload file
        $imageName = time().'.'.$request->photo->extension();

        $request->photo->move(public_path('backend/brandimg'),$imageName);
        $path = 'backend/brandimg/'.$imageName;
        //Data insert
        $brand =  new Brand();
        $brand->name = $request->name;
        $brand->photo = $path;
        $brand->save();

        
        return redirect()->route('brands.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $brands = Brand::all();
        
        // return "Item create form here";
        // $brand reuse in compact('brand')
        return view('backend.brands.edit',compact('brands','brand'));
        // return view('backend.items.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
       //dd(request);
        //validate
        $request->validate([
            
            "name" => 'required',
            "photo" => 'sometimes'
        ]);
        //file upload,if data
        // form name photo
        if($request->hasFile('photo')){
        $imageName = time().'.'.$request->photo->extension();

        $request->photo->move(public_path('backend/brandimg'),$imageName);
        $path = 'backend/brandimg/'.$imageName;


        }else {
            $path = $request->$oldphoto;



        }
         //data update
        
        $category->name = $request->name;
        $category->photo = $path;
        
        $category->save();
        return redirect()->route('brands.index'); 

       
        //redirect
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
