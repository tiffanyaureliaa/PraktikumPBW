<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Make_up;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function home()
    {
        return view("home", ["key" => "home"]);
    }

    public function makeup()
    {
        $makeup = Make_up::orderBy('id', 'desc')->get();
        return view("make_up", ["key" => "make_up", "mu" => $makeup]);
    }

    public function formaddmakeup()
    {
        return view("form-add", ["key" => "make_up"]);
    }

    public function savemakeup(Request $request)
    {
        $file_name = time().'-'.$request->file('warna')->getClientOriginalName();
        $path = $request->file('warna')->storeAs('warna', $file_name, 'public');
        
        Make_up::create([
            'merek' => $request->merek,
            'kategori' => $request->kategori,
            'warna' => $path
        ]);

        return redirect('/make_up')->with('alert', 'Data Berhasil Disimpan');
    }

    public function formeditmakeup($id)
    {
        $makeup = Make_up::find($id);
        return view("form-edit", ["key" => "make_up", "mu" =>$makeup]);
    }

    public function updatemakeup($id, Request $request)
    {
        $makeup = Make_up::find($id);
        $makeup->merek = $request->merek;
        $makeup->kategori = $request->kategori;

        if ($request->warna)
        {
            if ($makeup->warna)
            {
                Storage::disk('public')->delete($makeup->warna);
            }

            $file_name = time().'-'.$request->file('warna')->getClientOriginalName();
            $path = $request->file('warna')->storeAs('warna', $file_name, 'public');
            $makeup->warna = $path;
        }

        $makeup->save();

        return redirect("/make_up")->with('alert', 'Data Berhasil Diubah');
    }

    public function deletemakeup($id)
    {
        $makeup = Make_Up::find($id);
        
        if ($makeup->warna)
            {
                Storage::disk('public')->delete($makeup->warna);
            }


        $makeup->delete();

        return redirect("/make_up")->with('alert', 'Data Berhasil Dihapus');
    }

    public function login()
    {
        return view("Login");
    }

    public function formedituser()
    {
        return view("formedituser", ["key" => ""]);
    }
    
    public function updateuser(Request $request)
    {
        if ($request->password_baru == $request->konfirmasi_password)
        {
            $user = Auth::user();
            $user->password = bcrypt($request->password_baru);
            $user->save();

            return redirect("/user")->with("info", "Password Berhasil diubah");
        }
        else
        {
            return redirect("/user")->with("info", "Password Gagal Diubah");
        }
    }
}
