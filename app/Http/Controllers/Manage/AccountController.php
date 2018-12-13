<?php

namespace App\Http\Controllers\Manage;

use App\Models\PspPersonalRegister;
use App\Models\PspRegisterCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the register accounts
        $register = PspPersonalRegister::all();

        // load the view and pass the register
        return view('manage.account.index')->with('register', $register);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PspRegisterCategory::all();
        return view('manage.account.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /**
         * :attribute portion of your validation message to be replaced with a custom attribute name,
         * you may specify the custom name in the attributes array of your
         * resources/lang/xx/validation.php language file:    'email' => 'email address',
         */
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'category' => 'required',
            'e_mail' => 'required|email',
            'username' => 'required',
            'pswd' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',
        ])->validate();

        $cat = PspRegisterCategory::find($request->category);

        $register = new PspPersonalRegister();
        $register->register_name = $request->name;
        $register->email = $request->e_mail;
        $register->username = $request->username;
        $register->passwrd = $request->pswd;
        $register->url = $request->url;
        $register->pin = $request->pin;
        $register->created_date = new \DateTime();
        $register->psp_register_category()->associate($cat);
        $register->save();

//        'register_name',
//		'email',
//		'username',
//		'passwrd',
//		'description',
//		'url',
//		'pin',
//		'member_id',
//		'created_date',
//		'updated_date',
//		'active',
//		'category_id'

        return redirect('manage/account');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reg = PspPersonalRegister::find($id);
        return view('manage.account.show', array('account' => $reg, 'action' => 'View'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = PspPersonalRegister::find($id);
        return view('manage.account.edit', array('category' => $cat, 'action' => 'Update'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $reg = PspPersonalRegister::findOrFail($id);
        $this->validate($request, [
            'name' => 'required'
        ]);
        $input = $request->all();
        $reg->fill($input)->save();

        return redirect('manage/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $register = PspPersonalRegister::find($id);
        $register->delete();
        return redirect()->back();
    }
}
