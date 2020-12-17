<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Kota;
use App\Provinsi;
use App\UsersDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Kavist\RajaOngkir\Facades\RajaOngkir;


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
    protected $redirectTo = '/';

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function index(){
        // Uncomment kalo db provinsi & kota kosong

        // $provinsi = RajaOngkir::provinsi()->all();
        
        // foreach($provinsi as $prov){
        //     Provinsi::create([
        //         'idprovinsi'    => $prov['province_id'],
        //         'nama'          => $prov['province']
        //     ]);
        // }
        
        // $kota = RajaOngkir::kota()->all();
        
        // foreach($kota as $kot){
        //     Kota::create([
        //         'idkota'        => $kot['city_id'],
        //         'idprovinsi'    => $kot['province_id'],
        //         'nama'          => $kot['city_name'],
        //         'tipe'          => $kot['type'],
        //         'kodepos'       => $kot['postal_code']
        //     ]);
        // }

        $data['provinsi']   = Provinsi::all();
        $data['kota']       = Kota::all();
        return view('auth.register', $data);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['password'] == $data['confpassword']){
            $user = User::create([
                'nama' => $data['nama'],
                'email' => $data['email'],
                'password' => $data['password'],
                'level' => 2
            ]);
    
            UsersDetail::create([
                'iduser'        => $user->id,
                'alamat'        => $data['alamat'],
                'idprovinsi'    => $data['provinsi'],
                'idkota'        => $data['kota'],
                'telepon'       => $data['telp'],
            ]);

            return $user;
        }else{
            return redirect()->back()->with('message', 'Konfirmasi Password tidak sesuai');
        }
        
    }
}
