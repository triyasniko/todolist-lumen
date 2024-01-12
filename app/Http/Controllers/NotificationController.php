<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where("user_id",
                                auth()->user()->user_id)
                                ->whereDate('created_at', Carbon::today()->toDateString())
                                ->orderBy('created_at', 'desc')
                                ->get();

        return response()->json([
            'success' => true,
            'message' =>'List Notification',
            'data'    => $notifications
        ], 200);
    }
    // public function store(Request $request)
    // {
    //     $notification = Notification::create([
    //         'user_id' => auth()->user()->user_id,
    //         'notification_message' =>'Kamu berhasil menambah data'
    //     ]);

    //     if ($notification) {
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Notification Berhasil Disimpan!',
    //             'data' => $notification
    //         ], 201);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Notification Gagal Disimpan!',
    //         ], 400);
    //     }
    // }
    public function show($id)
    {
        $notification = Notification::select("*")
                    ->where("notification_id",$id)
                    ->get();

        if ($notification) {
            return response()->json([
                'success'   => true,
                'message'   => 'Detail Notification!',
                'data'      => $notification
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Notification Tidak Ditemukan!',
            ], 404);
        }
    }
    public function destroy($id)
    {
        $notification = notification::where('notification_id',$id)->delete();

        if ($notification) {
            return response()->json([
                'success' => true,
                'message' => 'Notification Berhasil Dihapus!',
            ], 200);
        }

    }

}
