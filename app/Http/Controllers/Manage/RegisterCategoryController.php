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
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $cat = PspRegisterCategory::find($id);
        return view('manage.category.show', array('category' => $cat, 'action' => 'View'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $pspRegisterId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($pspRegisterId)
    {
        $cat = PspRegisterCategory::find($pspRegisterId);
        return view('manage.category.edit', array('category' => $cat, 'action' => 'Update'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $pspRegisterCategoryId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, int $pspRegisterCategoryId)
    {
        $task = PspRegisterCategory::findOrFail($pspRegisterCategoryId);
        $this->validate($request, [
            'name' => 'required'
        ]);
        $input = $request->all();
        $task->fill($input)->save();

        return redirect('manage/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $registerCategory = PspRegisterCategory::find($id);
        $registerCategory->delete();
        return redirect()->back();
    }
}
