<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //index
    public function index(Request $request)
    {
        $attendances = attendance::with('user')
            ->when($request->input('name'), function ($query, $name) {
                $query->whereHas('user', function ($query) use ($name) {
                    $query->where('name', 'like', '%' . $name . '%');
                });
            })->orderBy('id', 'desc')->paginate(10);
        return view("pages.absensi.index", compact("attendances"));
    }

    public function destroy(attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route("attendances.index")->with("success", "User deleted successfully");
    }
}
