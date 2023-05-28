<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mata_kuliah;

class mataKuliahController extends Controller
{
    public function index(){
        $mataKuliah = mata_kuliah::with('mahasiswa')->get();
        return response()->json($mataKuliah);
    }

    public function store(Request $request){
        $mataKuliah = new mata_kuliah;
        $mataKuliah->name = $request->name;
        $mataKuliah->kode = $request->kode;
        $mataKuliah->sks = $request->sks;
        $mataKuliah->mahasiswa_id = $request->mahasiswa_id;
        $mataKuliah->save();

        return response()->json([
            "message" => "mataKuliah record created"
        ], 201);
    }

    public function show($id){
        $mataKuliah = mata_kuliah::find($id);
        if($mataKuliah){
            return response()->json($mataKuliah);
        }else{
            return response()->json([
                "message" => "mataKuliah not found"
            ], 404);
        }
    }

    public function update(Request $request, $id){
        $mataKuliah = mata_kuliah::find($id);
        if($mataKuliah){
            $mataKuliah->name = $request->name ? $request->name : $mataKuliah->name;
            $mataKuliah->kode = $request->kode ? $request->kode : $mataKuliah->kode;
            $mataKuliah->sks = $request->sks ? $request->sks : $mataKuliah->sks;
            $mataKuliah->mahasiswa_id = $request->mahasiswa_id ? $request->mahasiswa_id : $mataKuliah->mahasiswa_id;
            $mataKuliah->save();
            return response()->json([
                "message" => "mataKuliah updated successfully"
            ], 200);
        }else{
            return response()->json([
                "message" => "mataKuliah not found"
            ], 404);
        }
    }

    public function destroy($id){
        $mataKuliah = mata_kuliah::find($id);
        if($mataKuliah){
            $mataKuliah->delete();
            return response()->json([
                "message" => "mataKuliah deleted"
            ], 200);
        }else{
            return response()->json([
                "message" => "mataKuliah not found"
            ], 404);
        }
    }

}
