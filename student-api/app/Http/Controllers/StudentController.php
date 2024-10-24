<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        // $students = DB::table('students')->get(); //menggunakan query builder
        $students = Student::all(); //menggunakan eloquent
        $data = [
            'message'=> "Berhasil menampilkan data mahasiswa",
            'data' => $students
        ];
        return response()->json($data, 200);
    }
    public function store( Request $request){
        $input =[
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];
        $student = Student::create($input);
        $data = [
            'message'=> "Berhasil menambahkan data mahasiswa",
            'data' => $student
        ];
        return response()->json($data, 200);
    }
    public function update(Request $request, $id){
        $student = Student::find($id);
        $input = [
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];
        $student->update($input);
        $data = [
            'message'=> "Berhasil mengupdate data mahasiswa",
            'data' => $student
        ];
        return response()->json($data, 200);
    }
    public function delete($id){
        $student = Student::find($id) ;
        $student->delete();
        $data = [
            'message'=> "Berhasil menghapus data mahasiswa",
            'data' => $student
        ];
        return response()->json($data, 200);
    }
}
