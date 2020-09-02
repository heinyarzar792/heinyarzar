<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        // dd($items);
       
        return view('backend.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        
        // return "Brand create form here";
        return view('backend.categories.create',compact('categories'));
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

        $request->photo->move(public_path('backend/categoryimg'),$imageName);
        $path = 'backend/categoryimg/'.$imageName;
        //Data insert
        $category =  new Category();
        $category->name = $request->name;
        $category->photo = $path;
        $category->save();

        
        return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
       $categories = Category::all();
        
        // return "Item create form here";
        return view('backend.categories.edit',compact('categories','category'));
        // return view('backend.items.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
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

        $request->photo->move(public_path('backend/categoryimg'),$imageName);
        $path = 'backend/categoryimg/'.$imageName;


        }else {
            $path = $request->$oldphoto;



        }
         //data update
        
        $category->name = $request->name;
        $category->photo = $path;
        
        $category->save();
        return redirect()->route('categories.index'); 

       
        //redirect
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
