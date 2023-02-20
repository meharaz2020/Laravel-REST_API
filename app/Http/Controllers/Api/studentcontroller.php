<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\student;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class studentcontroller extends Controller
{
    public function index()
    {
        $student = student::all();
        if ($student->count() > 0) {
            $data = [
                'status' => 200,
                'students' => $student
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'status' => 404,
                'message' => 'No record found'
            ];
            return response()->json($data, 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'email' => 'string|max:255',
            'phone' => 'string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->message()
            ], 422);
        } else {
            $student = student::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,

            ]);
            if ($student) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Student create successfully',
                ],200);
            }else{
                return response()->json([
                    'status' => 404,
                    'message' => 'Student not create successfully',
                ]);
            }
        }
    }

    public function show($id){
        $student=student::find($id);
         if($student){
            return response()->json([
                'status' => 200,
                'student' => $student,
            ]);
         }else{
            return response()->json([
                'status' => 404,
                'message' => 'Student not found',
            ]);
         }
    }

    public function edit($id){
        $student=student::find($id);


        






        if($student){
           return response()->json([
               'status' => 200,
               'student' => $student,
           ]);
        }else{
           return response()->json([
               'status' => 404,
               'message' => 'Student not found',
           ]);
        }
    }

    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'email' => 'string|max:255',
            'phone' => 'string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->message()
            ], 422);
        } else {
            $student=student::find($id);

           
            if ($student) {
                $student -> update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
    
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'Student update successfully',
                ],200);
            }else{
                return response()->json([
                    'status' => 404,
                    'message' => 'Student not update successfully',
                ]);
            }
        }
    }
    public function delete($id){
        $student=student::find($id);

           
        if ($student) {
             $student->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Student delete successfully',
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Student not delete successfully',
            ]);
        }
    }
}
