<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\User;

class UserManagemantController extends Controller
{
    public function index(){

        $datauser = User::all();
        return view('layout/user-managemant/index', compact('datauser'));
    }

    function create(){
        $datauser = User::all();
        return view('layout/user-managemant/tambah-data-user',compact('datauser'));
    }


    function store(Request $request)
    {   
        $aturan = 
        [
            'for_nama'           => 'required',

        ];

        $messages =  
        [
             'required' => 'Wajib Diisi',   
        ];

        $validator = Validator::make($request->all(), $aturan, $messages);
       try {
        
        if($validator->fails()){
            return redirect()
            ->route('tambah-data-baru')
            ->withErrors($validator)->withInput();
        }else{
            $insert = User::create([
                'name'                  => strtoupper($request -> for_nama),
                'email'                 => $request -> for_email,
                'level'                  => $request -> for_level_login,
                'password'              => $request -> for_password,
                'dibuat_kapan'          => date('Y-m-d H:i:s'),
            ]);
    
            if($insert) {
                return redirect()->route('add-users')
                ->with('success', 'Success add user new');
            }
        }

        }catch (\Throwable $th) 
        { 
            return redirect()
            ->route('add-users')
            ->with('danger', $th->getMessage());
        }
    }
}
