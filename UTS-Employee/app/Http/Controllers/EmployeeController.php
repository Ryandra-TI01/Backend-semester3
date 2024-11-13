<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    // all route dibawah ini hanya bisa diakses oleh user yang sudah login

    // Fungsi untuk menampilkan semua data employee
    public function index()
    {
        // Mengambil semua data employee
        $employee = Employee::all();
        // pemeriksaaan jika data employee tidak kosong dan kosong
        if($employee->isNotEmpty()){
            $data = [
                'message'=> "Get All Resource",
                'data' => $employee
            ];
            return response()->json($data, 200);
        }else{
            $data= [
                'message'=> "Data is Empty",
                'data'=> $employee
            ];
            return response()->json($data, 200);
        }
    }

    // Fungsi untuk menabahkan data employee
    public function store(Request $request)
    {
        // Memvalidasi data employee
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'gender'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'email'=>'required',
            'status'=>'required',
            'hired_on'=>'required'
        ]);
        // melemparkan pesan gagal otomatis
        if($validator->fails()){
            return response()->json([
                'message' => 'Gagal menambahkan data karyawan',
                'errors' => $validator->errors()
            ], 422);
        }
        $employee = Employee::create($request->all());
        $data = [
            'message'=>'Resource is added successfully',
            'data'=>$employee
        ];
        return response()->json($data, 201);
    }

    // Fungsi untuk menampilkan data employee sesuai id
    public function show($id)
    {
        // mencari data employee sesuai id
        $employee = Employee::find($id);
        // pemeriksaaan jika data employee tidak kosong
        if($employee){
            $data = [
                'message'=> "Get Detail Resource",
                'data' => $employee
            ];
            return response()->json($data, 200);
        }else{
            $data= [
                'message'=> "Resource Not Found",
            ];
            return response()->json($data, 404);
        }
    }

    // Fungsi untuk mengupdate data employee
    public function update(Request $request, string $id)
    {
        // Temukan data employee berdasarkan id
        $employee = Employee::find($id);
        // pengecekan jika data employee ditemukan dan update
        if ($employee) {
            // Update resource dengan data yang dikirim atau partials
            $employee->update($request->only(['name', 'gender', 'phone', 'address', 'email', 'status', 'hired_on']));

            $data = [
                'message' => 'Resource is updated successfully',
                'data' => $employee
            ];
            return response()->json($data, 200);

        } else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }

    // Fungsi untuk menghapus data employee
    public function destroy(string $id)
    {
        // Temukan data employee berdasarkan id
        $employee = Employee::find($id);
        // pengecekan jika data employee ditemukan
        if($employee){
            $employee->delete();
            $data = [
                'message'=> "Resource is deleted successfully",
            ];
            return response()->json($data, 200);
        }else{
            $data= [
                'message'=> "Resource Not Found",
            ];
            return response()->json($data, 404);
        }
    }

    // Fungsi untuk mencari data employee berdasarkan nama 
    public function search(Request $request){
        // Mencari data employee berdasarkan nama
        $employee = Employee::where('name', 'like', '%' . $request->name . '%')->get();
        // pemeriksaaan jika data employee tidak kosong
        if($employee->isNotEmpty()){
            $data = [
                'message'=> "Get Searched Resource",
                'data' => $employee
            ];
            return response()->json($data, 200);
        }else{
            $data= [
                'message'=> "Resource Not Found",
                'data'=> $employee
            ];
            return response()->json($data, 404);
        }
    }
    // Fungsi untuk menampilkan data employee berdasarkan status active
    public function active(){
        // Mencari data employee berdasarkan status active dan mengambilnya
        $employee = Employee::where('status', 'active')->get();
        // pengecekan jika data employee tidak kosong dan kosong
        if($employee->isNotEmpty()){
            $data = [
                'message'=> "Get Active Resource",
                'data' => $employee
            ];
            return response()->json($data, 200);
        }else{
            $data= [
                'message'=> "Resource Not Found",
                'data'=> $employee
            ];
            return response()->json($data, 404);
        }
    }
    // Fungsi untuk menampilkan data employee berdasarkan status inactive
    public function inactive(){
        // Mencari data employee berdasarkan status inactive dan mengambilnya
        $employee = Employee::where('status', 'inactive')->get();
        // pengecekan jika data employee tidak kosong dan kosong
        if($employee->isNotEmpty()){
            $data = [
                'message'=> "Get Inactive Resource",
                'data' => $employee
            ];
            return response()->json($data, 200);
        }else{
            $data= [
                'message'=> "Resource Not Found",
                'data'=> $employee
            ];
            return response()->json($data, 404);
        }
    }
    // Fungsi untuk menampilkan data employee berdasarkan status terminated
    public function terminated(){
        // Mencari data employee berdasarkan status terminated dan mengambilnya
        $employee = Employee::where('status', 'terminated')->get();
        // pengecekan jika data employee tidak kosong dan kosong
        if($employee->isNotEmpty()){
            $data = [
                'message'=> "Get Terminated Resource",
                'data' => $employee
            ];
            return response()->json($data, 200);
        }else{
            $data= [
                'message'=> "Resource Not Found",
                'data'=> $employee
            ];
            return response()->json($data, 404);
        }
    }
}
