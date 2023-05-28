<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;

class mahasiswaController extends Controller
{
    public function index(){
        $mahasiswa = mahasiswa::with('kelas','jurusan')->get();
        return response()->json($mahasiswa);
    }

    public function store(Request $request){
        $mahasiswa = new mahasiswa;
        $mahasiswa->name = $request->name;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->no_hp = $request->no_hp;
        $mahasiswa->jurusan_id = $request->jurusan_id;
        $mahasiswa->kelas_id = $request->kelas_id;
        $mahasiswa->save();

        return response()->json([
            "message" => "mahasiswa record created"
        ], 201);
    }

    public function show($id){
        $mahasiswa = mahasiswa::find($id);
        if($mahasiswa){
            return response()->json($mahasiswa);
        }else{
            return response()->json([
                "message" => "mahasiswa not found"
            ], 404);
        }
    }

    public function update(Request $request, $id){
        $mahasiswa = mahasiswa::find($id);
        if($mahasiswa){
            $mahasiswa->name = $request->name ? $request->name : $mahasiswa->name;
            $mahasiswa->nim = $request->nim ? $request->nim : $mahasiswa->nim;
            $mahasiswa->alamat = $request->alamat ? $request->alamat : $mahasiswa->alamat;
            $mahasiswa->no_hp = $request->no_hp ? $request->no_hp : $mahasiswa->no_hp;
            $mahasiswa->jurusan_id = $request->jurusan_id ? $request->jurusan_id : $mahasiswa->jurusan_id;
            $mahasiswa->kelas_id = $request->kelas_id ? $request->kelas_id : $mahasiswa->kelas_id;
            $mahasiswa->save();
            return response()->json([
                "message" => "mahasiswa updated successfully"
            ], 200);
        }else{
            return response()->json([
                "message" => "mahasiswa not found"
            ], 404);
        }
    }

    public function destroy($id){
        $mahasiswa = mahasiswa::find($id);
        if($mahasiswa){
            $mahasiswa->delete();
            return response()->json([
                "message" => "mahasiswa deleted"
            ], 200);
        }else{
            return response()->json([
                "message" => "mahasiswa not found"
            ], 404);
        }
    }

}
