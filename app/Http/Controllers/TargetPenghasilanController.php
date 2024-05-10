<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\TargetPenghasilanModel;

class TargetPenghasilanController extends Controller
{
    public function store(Request $request)
    {   
        $aturan = 
        [
            'for_kd_target'           => 'required',

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
                'kd_target'             => strtoupper($request -> for_kd_target),
                'bulan'                 => $request -> for_bulan,
                'nominal_target'        => $request -> for_nominal,
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
