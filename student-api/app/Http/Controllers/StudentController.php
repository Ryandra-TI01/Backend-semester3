<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class StudentController extends Controller
{
    public function index(){
        // $students = DB::table('students')->get(); //menggunakan query builder
        $students = Student::all(); //menggunakan eloquent

        if ($students->isNotEmpty()) {            
            $data = [
                'message'=> "Berhasil menampilkan data mahasiswa",
                'data' => $students
            ];
            return response()->json($data, 200);
        }else{
            $data = [
                'message'=> "Data mahasiswa tidak ditemukan",
                'data'=> $students
            ];
            return response()->json($data, 404);
        }
    }
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'nim' => 'required|unique:students,nim',
    //         'email' => 'required|email|unique:students,email|max:255',
    //         'jurusan' => 'required|string|max:255',
    //     ]);
    
    //     $student = Student::create($validated);

    //     $data = [
    //         'message'=> "Berhasil menambahkan data mahasiswa",
    //         'data' => $student
    //     ];
    
    //     // Kembalikan response JSON dengan kode 201 (Created)
    //     return response()->json($data, 201);
    // }
    public function store(Request $request){
        $validator = FacadesValidator::make($request->all(), [
            'name' => 'required',
            'nim' => 'required',
            'email' => 'required',
            'jurusan'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Gagal menambahkan data mahasiswa',
                'errors' => $validator->errors()
            ], 422);
        }
        $student = Student::create($request->all());
        $data = [
            'message'=>'Berhasil menambahkan data mahasiswa',
            'data'=>$student
        ];
        return response()->json($data, 201);
    }
    
    public function update(Request $request, $id){
        $student = Student::find($id);
        if($student){
            $validate = $request->validate([
                'name' => 'sometimes|string|max:255',
                'nim' => 'sometimes|integer|max:20|unique:students,nim,' . $student->id,
                'email' => 'sometimes|email|max:255|unique:students,email,' . $student->id,
                'jurusan' => 'sometimes|string|max:255',
            ]);
            $student->update($validate);
            $data = [
                'message'=> "Berhasil mengupdate data mahasiswa",
                'data' => $student
            ];
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Data mahasiswa tidak ditemukan',
            ];
            return response()->json($data, 404);
        }

    }
    public function delete($id){
        $student = Student::find($id) ;
        if ($student) {
            $student->delete();
            $data = [
                'message'=> "Berhasil menghapus data mahasiswa",
            ];
            return response()->json($data, 200);
        }else{
            $data = [
                'message'=> "Data mahasiswa tidak ditemukan",
            ];
            return response()->json($data, 404);
        }
    }
    public function show($id){
        $student = Student::find($id);
        if($student){
            $data = [
                'message'=> "Berhasil menampilkan data mahasiswa",
                'data' => $student
            ];
            return response()->json($data,200);
        }else{
            $data = [
                'message'=> "Data mahasiswa tidak ditemukan",
            ];
            return response()->json($data,404);
        }
    }
}
