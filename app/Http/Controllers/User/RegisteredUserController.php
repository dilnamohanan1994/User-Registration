<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\RegisteredUser;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * This function used for user registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrationRequest $request)
    {
        $referralCode = $request->referral_code;
        for($i=0;$i<=10;$i++) {
            if($referralCode)
		    {
			    $user=RegisteredUser::where('referral_code',$referralCode)->firstOrFail();
			    $user->points = $user->points + (10-$i);
                $user->save();
			    $referralCode = $user->referred_by;
            } 
            else{
                $user = new RegisteredUser();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->referral_code = $number = random_int(1000000, 9999999);
                $user->points = 0;
                $user->referred_by = $request->referral_code;
                $user->save();
                break;
            }
        }
        return response()->json([
            'success' => 1,
            'message' => "Registration Completed Successfully! Your Refereral Code $user->referral_code."
        ], 200);
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
}
