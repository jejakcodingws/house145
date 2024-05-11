<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\TargetPenghasilanModel;
use App\Models\User;

class TargetPenghasilanController extends Controller
{
    function index(){
        $datauser = User::where('status', 1)->get();
        $datatarget = TargetPenghasilanModel::all();
        return view('layout/user-managemant/data-target',compact('datauser','datatarget'));
    }





    public function store(Request $request)
    {   
        $aturan = 
        [
            'target_name'           => 'required',
            'bulan_name'           => 'required',
            'nominal_name'           => 'required',

        ];

        $messages =  
        [
             'required' => 'Wajib Diisi',  
        ];

        $validator = Validator::make($request->all(), $aturan, $messages);
       try {
        
        if($validator->fails()){
            return redirect()
            ->route('user-manage')
            ->withErrors($validator)->withInput();
        }else{
            $insert = TargetPenghasilanModel::create([
                'kd_target'             => strtoupper($request -> target_name),
                'bulan'                 => $request -> bulan_name,
                'nominal_target'        => $request -> nominal_name,
                'dibuat_kapan'          => date('Y-m-d H:i:s'),
                'dibuat_oleh'           => Auth::user()->name,
            ]);
    
            if($insert) {
                return redirect()->route('user-manage')
                ->with('success', 'Target Berhasil disimpan');
            }
        }

        }catch (\Throwable $th) 
        { 
            return redirect()
            ->route('user-manage')
            ->with('danger', $th->getMessage());
        }
    }
}
