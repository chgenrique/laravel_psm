<?php

namespace App\Http\Controllers\Manage;

use App\Models\PspRegisterCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the categories
        $categories = PspRegisterCategory::all();

        // load the view and pass the categories
        return view('manage.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('manage.category.create');
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
        // Pending validate request
//        $category = $this->validate(request(), [
//            'name' => 'required',
//            'price' => 'required|numeric'
//        ]);
//        Product::create($product);
//        return back()->with('success', 'Product has been added');

        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

//        $input = $request->all();

        PspRegisterCategory::create($validatedData);

        return redirect('manage/category');
        //return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PspRegisterCategory  $pspRegisterCategory
     * @return \Illuminate\Http\Response
     */
//    public function show(PspRegisterCategory $pspRegisterCategory)
    public function show($id)
    {
        //

        $car = PspRegisterCategory::find($id);
        return view('manage.category.show', array('category' => $car));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PspRegisterCategory  $pspRegisterCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PspRegisterCategory $pspRegisterCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PspRegisterCategory  $pspRegisterCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PspRegisterCategory $pspRegisterCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PspRegisterCategory  $pspRegisterCategory
     * @return \Illuminate\Http\Response
     */
//    public function destroy(PspRegisterCategory $pspRegisterCategory)
    public function destroy($id)
    {
        //
        $registerCategory = PspRegisterCategory::find($id);
        $registerCategory->delete();
        return redirect()->back();
    }
}
