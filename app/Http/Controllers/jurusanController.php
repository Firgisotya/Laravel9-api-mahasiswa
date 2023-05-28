<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jurusan;

class jurusanController extends Controller
{
    public function index(){
        $jurusan = jurusan::all();
        return response()->json($jurusan);
    }

    public function store(Request $request){
        $jurusan = new jurusan;
        $jurusan->name = $request->name;
        $jurusan->save();

        return response()->json([
            "message" => "jurusan record created"
        ], 201);
    }

    public function show($id){
        $jurusan = jurusan::find($id);
        if($jurusan){
            return response()->json($jurusan);
        }else{
            return response()->json([
                "message" => "jurusan not found"
            ], 404);
        }
    }

    public function update(Request $request, $id){
        $jurusan = jurusan::find($id);
        if($jurusan){
            $jurusan->name = $request->name ? $request->name : $jurusan->name;
            $jurusan->save();
            return response()->json([
                "message" => "jurusan updated successfully"
            ], 200);
        }else{
            return response()->json([
                "message" => "jurusan not found"
            ], 404);
        }
    }

    public function destroy($id){
        $jurusan = jurusan::find($id);
        if($jurusan){
            $jurusan->delete();
            return response()->json([
                "message" => "jurusan deleted"
            ], 200);
        }else{
            return response()->json([
                "message" => "jurusan not found"
            ], 404);
        }
    }
}
