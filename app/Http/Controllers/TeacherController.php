<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers=Teacher::orderBy('id','DESC')->get();
        return view('teacher', compact('teachers'));
    }
    public function store(Request $request)
    {
        $teacher =new Teacher();
        $teacher->name=$request->name;
        $teacher->title=$request->title;
        $teacher->institute=$request->institute;
        $teacher->save();
        return response()->json($teacher);
    }
    public function getTeacherById($id)
    {
        $teacher=Teacher::find($id)->first();
        return response()->json($teacher);
    }
    public function updateTeacher(Request $request)
    {
        $teacher =Teacher::find($request->id);
        $teacher->name=$request->name;
        $teacher->title=$request->title;
        $teacher->institute=$request->institute;
        $teacher->save();
        return response()->json($teacher);
    }
    public function deleteTeacher($id)
    {
        $teacher=Teacher::find($id)->first();
        $teacher->delete();
        return response()->json('success','Teacher has deleted');
    }
    public function deleteSelected(Request $request)
    {
        $ids=$request->ids;
        Teacher::whereIn('id',$ids)->delete();
        return response()->json('success','Teacher have been deleted');
    }

}
