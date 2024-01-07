<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return response()->json([
            'success' => true,
            'message' =>'List TodoList',
            'data'    => $tasks
        ], 200);
        // return response()->json([
        //     'message'=>'Masuk broo'
        // ],200);
    }
    public function store(Request $request)
    {
        // return response()->json([
        //     'message'=>'Masuk broo'
        // ],200);
        // exit();
        $validator = Validator::make($request->all(), [
            'task_name'   => 'required',
            'due_date' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Task Name/Due Date tidak boleh kosong!',
                'data'   => $validator->errors()
            ],401);

        } else {

            $task = Task::create([
                'task_id' => $request->input('task_id'),
                'user_id' => $request->input('user_id'),
                'task_name' => $request->input('task_name'),
                'description'  => $request->input('description'),
                'due_date' => $request->input('due_date'),
                'status' => $request->input('status'),
                'priority' => $request->input('priority'),

            ]);

            if ($task) {
                return response()->json([
                    'success' => true,
                    'message' => 'Task Berhasil Disimpan!',
                    'data' => $task
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Task Gagal Disimpan!',
                ], 400);
            }

        }
    }
    public function show($id)
    {
        $task = Task::select("*")
                    ->where("task_id",$id)
                    ->get();

        if ($task) {
            return response()->json([
                'success'   => true,
                'message'   => 'Detail Task!',
                'data'      => $task
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Task Tidak Ditemukan!',
            ], 404);
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'task_name'   => 'required',
            'due_date' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Task Name/Due Date Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);

        } else {

            $task = Task::where('task_id',$id)->update([
                'task_id' => $request->input('task_id'),
                'user_id' => $request->input('user_id'),
                'task_name' => $request->input('task_name'),
                'description'  => $request->input('description'),
                'due_date' => $request->input('due_date'),
                'status' => $request->input('status'),
                'priority' => $request->input('priority'),
            ]);

            if ($task) {
                return response()->json([
                    'success' => true,
                    'message' => 'Task Berhasil Diupdate!',
                    'data' => $task
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Task Gagal Diupdate!',
                ], 400);
            }
        }
    }
    public function destroy($id)
    {
        $task = Task::where('task_id',$id)->delete();

        if ($task) {
            return response()->json([
                'success' => true,
                'message' => 'Task Berhasil Dihapus!',
            ], 200);
        }

    }


}
