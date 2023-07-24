<?php

namespace App\Actions\Fortify;

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;


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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            'street' => ['required'],
            'number' => ['required'],
            'city' => ['required'],
            'country_id' => ['required', 'exists:ship_countries,id'],
        ])->validate();
    
        $address = new Address();
        $address->street_name = $input['street'];
        $address->street_number = $input['number'];
        $address->city = $input['city'];
        $address->country_id = $input['country_id'];
        $address->save();
    
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
        ]);
    
        $user->address_id = $address->id;
        // $user->address()->associate($address);
        $user->save();
    
        $notification = array(
            'message' =>  "The new User has been registered successfully",
            'alert-type' => 'success'
        );
    
       return redirect()->route('dashboard')->with($notification);
    }
}

    

