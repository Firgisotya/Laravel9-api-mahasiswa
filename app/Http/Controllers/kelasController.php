<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelas;

class kelasController extends Controller
{
    public function index(){
        $kelas = kelas::all();
        return response()->json($kelas);
    }

    public function store(Request $request){
        $kelas = new kelas;
        $kelas->name = $request->name;
        $kelas->save();

        return response()->json([
            "message" => "kelas record created"
        ], 201);
    }

    public function show($id){
        $kelas = kelas::find($id);
        if($kelas){
            return response()->json($kelas);
        }else{
            return response()->json([
                "message" => "kelas not found"
            ], 404);
        }
    }

    public function update(Request $request, $id){
        $kelas = kelas::find($id);
        if($kelas){
            $kelas->name = $request->name ? $request->name : $kelas->name;
            $kelas->save();
            return response()->json([
                "message" => "kelas updated successfully"
            ], 200);
        }else{
            return response()->json([
                "message" => "kelas not found"
            ], 404);
        }
    }

    public function destroy($id){
        $kelas = kelas::find($id);
        if($kelas){
            $kelas->delete();
            return response()->json([
                "message" => "kelas deleted"
            ], 200);
        }else{
            return response()->json([
                "message" => "kelas not found"
            ], 404);
        }
    }

    
}
