<?php

namespace App\Http\Controllers\Admin;

use App\Models\RegisteredUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * This function for load resource.
     * Created by dilnamohan(26/01/2023)
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_login');
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
     * This function for admin login.
     * Created by dilnamohan(26/01/2023)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);
      
        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );
      
        if(\Auth::attempt($user_data)) 
            return redirect('userlist');
        else 
            return back()->with('error', 'Wrong Login Details');
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
        //
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
    }

    /**
    * This function for get user list.
    * Created by dilnamohan(26/01/2023)
    */
    public function userList()
    {
        return view('user_list')->with([
            'user_list' =>RegisteredUser::all(),
        ]);
    }
    /**
    * This function for admin logout.
    * Created by dilnamohan(26/01/2023)
    */
    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }
}
