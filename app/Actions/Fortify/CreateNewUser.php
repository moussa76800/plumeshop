<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use PhpParser\Node\Stmt\Return_;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'namee' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['namee'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
        ]);
        if(session()->get('language') == 'french'){ 
        $notification = array(
            'message' => " Le nouveau Utilisateur a été enregistré avec succès ",
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }else{ 
        $notification = array(
            'message' => " The new User has been registered successfully ",
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
            }
        }
    }

