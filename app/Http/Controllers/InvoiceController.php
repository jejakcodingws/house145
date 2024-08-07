<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    function index (){
        $data = Invoice::paginate(2);
        return view('layout/layout-cafe/invoice',compact('data'));
    }

    // function show(string $id){
    //     $data = DB::select(
    //         "SELECT *
    //         FROM invoice
    //         WHERE id = :id",
    //         ['id' => $id]
    //     );
    //     return view('layout/layout-cafe/pdfdownload',compact('data'));
    // }

    function show(string $id){
        $data = DB::table('invoice')
                ->where('id', $id)
                ->paginate(2); // Ubah angka 10 sesuai dengan jumlah item yang ingin Anda tampilkan per halaman
    
        return view('layout/layout-cafe/pdfdownload', compact('data'));
    }

    function create(){
        return view('layout/layout-cafe/form-invoice');
    }

    public function store(Request $request)
    {   
        $aturan = 
        [
            'for_nama' => 'required',
        ];
        
        $messages =  
        [
             'required' => 'Harus diisi',
        
        ];

        $validator = Validator::make($request->all(), $aturan, $messages);

       try {
        if($validator->fails()){
            return redirect()
            ->route('form-invoice')
            ->withErrors($validator)->withInput();
        }else{
            $insert = Invoice::create([
                'nama_reservasi'            => $request -> for_nama,
                'no_hp'                     => $request -> for_hp,
                'alamat'                    => $request -> for_alamat,
                'jumlah_reservasi'          => $request -> for_jumlah,
                'nominal_per_orang'         => $request -> for_nominal,
                'status'                    => $request -> for_status,
                'nik_karyawan'              => Auth::user()->nik_karyawan,
            ]);
            if($insert) {
                return redirect()->route('menu-invoice')
                ->with('success', 'berhasil Kirim Pengajuan');
            }
        }
        }catch (\Throwable $th) 
        { 
            return redirect()
            ->route('form-invoice')
            ->with('danger', $th->getMessage());
        }
    }


}
