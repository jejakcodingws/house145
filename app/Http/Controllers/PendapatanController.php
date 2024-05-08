<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\PenghasilanModel;
use Illuminate\Support\Facades\Auth;

class PendapatanController extends Controller
{
    
    public function store(Request $request)
    {   
        $aturan = 
        [
            'for_hari'           => 'required',

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
            $insert = PenghasilanModel::create([
                'hari'                  => strtoupper($request -> for_hari),
                'tanggal'               => $request -> for_date,
                'pemasukan'             => $request -> for_pemasukan_hari_ini,
                'dibuat_kapan'          => date('Y-m-d H:i:s'),
                'dibuat_oleh'           => Auth::user()->name,
            ]);
    
            if($insert) {
                return redirect()->route('master-data')
                ->with('success', 'berhasil simpan data');
            }
        }

        }catch (\Throwable $th) 
        { 
            return redirect()
            ->route('master-data')
            ->with('danger', $th->getMessage());
        }
    }
}
