<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Helpers\StringHelper;
use App\Models\User;
use App\Notifications\VerifyRegistration;

use Auth;
use Session;

class AuthenticationController extends Controller
{

  public function login(Request $request)
  {
    $this->validate($request, [
      'email'    => 'required|email',
      'password' => 'required'
    ]);

    //Find User by this email
    $user = User::where('email', $request->email)->first();

    if (!is_null($user)) {
      if ($user->status == 1) {
        // login This User

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
          // Log Him Now
          Auth::login($user);
          return json_encode(['success' => true, 'redirect' => true, 'message' => 'Successfully Logged in !!']);
        } else {
          return json_encode(['success' => false, 'redirect' => false, 'message' => 'Invalid Login Credentials !!']);
        }
      } else {
        // Send him a token again
        if (!is_null($user)) {
          // $user->notify(new VerifyRegistration($user));
          return json_encode(['success' => false, 'redirect' => false, 'message' => 'A verification mail has sent to you !!']);
        } else {
          return json_encode(['success' => false, 'redirect' => false, 'message' => 'Invalid Login Credentials !!']);
        }
      }
    } else {
      return json_encode(['success' => false, 'redirect' => false, 'message' => 'Invalid Login Credentials !!']);
    }
  }

  public function register(Request $request)
  {
    $this->validate($request, [
      'first_name'     => 'required|string|max:30',
      'last_name'      => 'nullable|string|max:15',
      'email'          => 'required|string|email|max:100|unique: users',
      'password'       => 'required|string|min:6|confirmed',
      'division_id'    => 'required|numeric',
      'district_id'    => 'required|numeric',
      'phone_no'       => 'required|max:15',
      'street_address' => 'required|max:100',
    ]);

    $user = User::create([
      'first_name'     => $request->first_name,
      'last_name'      => $request->last_name,
      'username'       => StringHelper::createSlug($request->first_name . $request->last_name, 'User', 'username', ''),
      'division_id'    => $request->division_id,
      'district_id'    => $request->district_id,
      'phone_no'       => $request->phone_no,
      'street_address' => $request->street_address,
      'ip_address'     => request()->ip(),
      'email'          => $request->email,
      'password'       => Hash::make($request->password),
      'api_token'      => bin2hex(openssl_random_pseudo_bytes(30)),
      'remember_token' => str_random(50),
      'status'         => 1,
    ]);

    if (!is_null($user)) {
      // $email_sent = $user->notify(new VerifyRegistration($user));

      return json_encode(['status' => 'true', 'email_sent' => true]);
    } else {
      return json_encode(['status' => 'false', 'email_sent' => false]);
    }
  }

  public function checkEmail(Request $request)
  {
    $existEmail = DB::table('users')->where('email', trim($request->email))->exists();
    return json_encode(!$existEmail);
  }

  public function checkUsername(Request $request)
  {
    $existUserName = DB::table('users')->where('username', trim($request->username))->exists();
    return json_encode(!$existUserName);
  }

  public function checkPhone(Request $request)
  {
    $existPhone = DB::table('users')->where('phone_no', trim($request->phone_no))->exists();
    return json_encode(!$existPhone);
  }
}
