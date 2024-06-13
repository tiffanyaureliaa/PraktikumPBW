<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\make_up;

class APIController extends Controller
{
    public function searchmakeup(Request $request){
        $cari = $request->input('q');

        $makeup = make_up::where('merek', 'LIKE', "%$cari%")->get();

        if($makeup->isEmpty()){
            return response()->json([
                'success' => false,
                'data' => 'Data tidak ditemukan'
            ], 404)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500');
        }else{
            return response()->json([
                'success' => true,
                'data' => $makeup
            ], 200)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:5500');
        }
    }
}