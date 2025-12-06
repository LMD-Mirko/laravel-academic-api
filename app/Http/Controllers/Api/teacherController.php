<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class teacherController extends Controller
{
    public function index()
    {
        $teachers = Teachers::all();
        $data = [
            'teachers' => $teachers,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'paternal_last_name' => 'required|string|max:255',
            'maternal_last_name' => 'required|string|max:255',
            'dni' => 'required|digits:8',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'required|digits:9',
            'gender' => 'required|in:M,F',
            'language' => 'required|in:es,en,fr,de,it,pt'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error al crear el profesor',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $teacher = Teachers::create([
            'name' => $request->name,
            'paternal_last_name' => $request->paternal_last_name,
            'maternal_last_name' => $request->maternal_last_name,
            'dni' => $request->dni,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'language' => $request->language
        ]);
        if (!$teacher) {
            $data = [
                'message' => 'Error al crear el profesor',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'Profesor creado correctamente',
            'teacher' => $teacher,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id)
    {
        $teacher = Teachers::find($id);
        if (!$teacher) {
            $data = [
                'message' => 'Profesor no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'teacher' => $teacher,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $teacher = Teachers::find($id);
        if (!$teacher) {
            $data = [
                'message' => 'Profesor no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $teacher->delete();
        $data = [
            'message' => 'Profesor eliminado correctamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    
    public function update(Request $request, $id)
    {
        $teacher = Teachers::find($id);
        if (!$teacher) {
            $data = [
                'message' => 'Profesor no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'paternal_last_name' => 'required|string|max:255',
            'maternal_last_name' => 'required|string|max:255',
            'dni' => 'required|digits:8',
            'email' => 'required|email|unique:teachers,email,' . $id,
            'phone' => 'required|digits:9',
            'gender' => 'required|in:M,F',
            'language' => 'required|in:es,en,fr,de,it,pt'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error al actualizar el profesor',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $teacher->name = $request->name;
        $teacher->paternal_last_name = $request->paternal_last_name;
        $teacher->maternal_last_name = $request->maternal_last_name;
        $teacher->dni = $request->dni;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->gender = $request->gender;
        $teacher->language = $request->language;
        $teacher->save();
        $data = [
            'message' => 'Profesor actualizado correctamente',
            'teacher' => $teacher,
            'status' => 200
        ];  
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id)
    {
        $teacher = Teachers::find($id);
        if (!$teacher) {
            $data = [
                'message' => 'Profesor no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'paternal_last_name' => 'sometimes|string|max:255',
            'maternal_last_name' => 'sometimes|string|max:255',
            'dni' => 'sometimes|digits:8',
            'email' => 'sometimes|email|unique:teachers,email,' . $id,
            'phone' => 'sometimes|digits:9',
            'gender' => 'sometimes|in:M,F',
            'language' => 'sometimes|in:es,en,fr,de,it,pt'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error al actualizar el profesor',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        if ($request->has('name')) {
            $teacher->name = $request->input('name');
        }
        if ($request->has('paternal_last_name')) {
            $teacher->paternal_last_name = $request->input('paternal_last_name');
        }
        if ($request->has('maternal_last_name')) {
            $teacher->maternal_last_name = $request->input('maternal_last_name');
        }
        if ($request->has('dni')) {
            $teacher->dni = $request->input('dni');
        }
        if ($request->has('email')) {
            $teacher->email = $request->input('email');
        }   
        if ($request->has('phone')) {
            $teacher->phone = $request->input('phone');
        }
        if ($request->has('gender')) {
            $teacher->gender = $request->input('gender');
        }
        if ($request->has('language')) {
            $teacher->language = $request->input('language');
        }
        $teacher->save();
        $data = [
            'message' => 'Profesor actualizado correctamente',
            'teacher' => $teacher,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

}