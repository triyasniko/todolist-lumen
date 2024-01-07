<?php

namespace App\Http\Controllers;

use App\Models\TaskCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TaskCategoryController extends Controller
{
    public function index()
    {
        $taskCategories = TaskCategory::all();

        return response()->json([
            'success' => true,
            'message' =>'List Task Category',
            'data'    => $taskCategories
        ], 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task_id' => 'required',
            'category_id'   => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Task ID/Category ID tidak boleh kosong!',
                'data'   => $validator->errors()
            ],401);

        } else {

            $taskCategory = TaskCategory::create([
                'task_id' => $request->input('task_id'),
                'category_id' => $request->input('category_id'),
            ]);

            if ($taskCategory) {
                return response()->json([
                    'success' => true,
                    'message' => 'Task Category Berhasil Disimpan!',
                    'data' => $taskCategory
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Task Category Gagal Disimpan!',
                ], 400);
            }

        }
    }
    public function show($id)
    {
        $taskCategory = TaskCategory::select("*")
                    ->where("taskcategory_id",$id)
                    ->get();

        if ($taskCategory) {
            return response()->json([
                'success'   => true,
                'message'   => 'Detail Category!',
                'data'      => $taskCategory
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category Tidak Ditemukan!',
            ], 404);
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'task_id'   => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Task ID/Category ID Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);

        } else {

            $taskCategory = TaskCategory::where('taskcategory_id',$id)->update([
                'task_id' => $request->input('task_id'),
                'category_id' => $request->input('category_id'),
            ]);

            if ($taskCategory) {
                return response()->json([
                    'success' => true,
                    'message' => 'Task Category Berhasil Diupdate!',
                    'data' => $taskCategory
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Task Category Gagal Diupdate!',
                ], 400);
            }
        }
    }
    public function destroy($id)
    {
        $taskCategory = TaskCategory::where('taskcategory_id',$id)->delete();

        if ($taskCategory) {
            return response()->json([
                'success' => true,
                'message' => 'Task Category Berhasil Dihapus!',
            ], 200);
        }

    }

}
