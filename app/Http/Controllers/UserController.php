<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUsetProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(User $user){
        return view('users.profile' , compact('user'));
    }

    public function edit(User $user){
        return view('users.edit' , compact('user'));
    }

    public function update(User $user , UpdateUsetProfileRequest $request){
        $data = $request->safe()->collect() ;

        if($data['password'] = ''){
            unset( $data['password'] ) ;
        }else{
            $data['password'] = Hash::make($data['password']);
        }
        
        if($data->has(['image'])){
            $image = $request->file(['image']) ; 
            $image_name = 'image/users/'. time() .'.'. $image->getClientOriginalExtension(); 
            $image->move(public_path('image/users') , $image_name);
            $data['image'] = $image_name ;
        }
        $data['private_account'] = $request->has('private_account');

        $user->update($data->toArray());

        session()->flash('success' , 'Your profile has beed updated');
        return redirect()->route('user_profile' ,$user);
    }
}
