<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        // try {
        //     $user = Socialite::driver('google')->stateless()->user();
        //     $is_user = User::where('email', $user->getEmail())->first();
        //     if (!$is_user) {
        //         $saveUser = User::updateOrCreate([
        //             "google_id" => $user->getId(),
        //         ], [
        //             'name' => $user->getName(),
        //             'email' => $user->getEmail(),
        //             'password' => Hash::make($user->getname() . '@' . $user->getId())
        //         ]);
        //     }else{
        //         $saveUser =  User::where('email', $user->getEmail())->update([
        //             'google_id' => $user->getId(),
        //         ]);
        //     }
        //     // Auth::loginUsingId($saveUser->id);

        //     return redirect()->route('users.index');
        //     // dd($user);
        // } catch (\Throwable $th) {
        //     throw $th;
        // }
        try {
      
            $user = Socialite::driver('google')->user();
       
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect()->route('users.index');
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('12345678')
                ]);
      
                Auth::login($newUser);
      
                return redirect()->route('users.index');
            }
      
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->route('users.index');
        }

    }
}
