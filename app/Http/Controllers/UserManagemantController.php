<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\User;
use App\Models\SiteKaryawanModel;

class UserManagemantController extends Controller
{
    public function index(){
        $datakaryawan = SiteKaryawanModel::all();
        $datauser = User::where('status', 1)->get();
        return view('layout/user-managemant/index', compact('datauser','datakaryawan'));
    }

    function create(){
        $datakaryawan = SiteKaryawanModel::all();
        $datauser =User::where('status', 1)->get();
        return view('layout/user-managemant/tambah-data-user',compact('datauser','datakaryawan'));
    }

    function data_user(){
        $datakaryawan = SiteKaryawanModel::all();
        $datauser =User::where('status', 1)->get();
        return view('layout/user-managemant/data-user ',compact('datauser','datakaryawan'));
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
                'email'                 => $request -> for_email_karyawan,
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

    function destroy($id){
        try {
            $update = User::where(['id' => $id])->update([
                'status' => 0,
            ]);
    
            if($update) {
                return redirect()
                ->route('user-manage')
                ->with('success', 'User berhasil di hapus');
            }
        }
        catch (\Throwable $th) 
        { 
            return redirect()
            ->route('user-manage')
            ->with('danger', $th->getMessage());
        }
    }
}
