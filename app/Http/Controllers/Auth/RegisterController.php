<?php

namespace App\Http\Controllers\Auth;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Student;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nip' => ['required', 'integer', 'unique:employees'],
            'role' => ['required', 'integer']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);

        if ($data['role'] != 10 && ($data['role'] >= 1 && $data['role'] <= 6 || $data['role'] == 9)) {

            return Employee::create([
                'PE_Nip' => $data['nip'],
                'PE_Nama' => $data['name'],
                'PE_NamaLengkap' => $data['name'],
                'PE_Email' => $data['email'],
                'PE_TipePegawai' => 0
            ]);
        }

        if ($data['role'] == 7 || $data['role'] == 8) {

            return Employee::create([
                'PE_Nip' => $data['nip'],
                'PE_Nama' => $data['name'],
                'PE_NamaLengkap' => $data['name'],
                'PE_Email' => $data['email'],
                'PE_TipePegawai' => 1
            ]);
        }

        TES

        return Student::create([
            'MA_Nrp' => $data['nrp'],
            'MA_NRP_Baru' => $data['nrp'],
            'MA_NamaLengkap' => $data['name'],
            'MA_Email' => $data['email']
        ]);
    }
}
