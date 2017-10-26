<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

//Controller好像要寫在一起，不同Controller同時return相同view會有問題
//測試中...把WeekController東西移來這裡
use App\Classroom;


class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $course = new Course;
        $course->content = $request->content;
        $course->teacher = $request->teacher;
        $course->start_classTime = $request->start_classTime;
        $course->end_classTime = $request->end_classTime;
        $course->roomname = $request->roomname;
        $course->weekFirst = $request->weekFirst;
        $course->save();
        
        return redirect('reserve/'.$request->roomname.'/'.$request->weekFirst);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $courses = new Course;
        $courses->roomname= $request->roomname;
        $courses->weekFirst= $request->weekFirst;
        $courses->start_classTime= $request->start_classTime;
        $courses->end_classTime= $request->end_classTime;
        $courses->teacher= $request->teacher;
        $courses->content= $request->content;
        $courses->save();
        return redirect('/inputClass');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */

    //預約狀況(點選教室後)
    public function show($roomname)
    {
        $thisMonday = date( 'Y-m-d', strtotime( 'monday this week' ) );
        $classrooms = Classroom::all();

        $courses = Course::where('roomname', '=', $roomname)->get();

        return view('button4_reserve.showSingleClass',[
            'thisMonday' => $thisMonday,
            'classrooms'=> $classrooms,
            'currentClassroom'=> $roomname,    
            'results'=> $courses
        ]);

    }

    //(點選上下一週後)
    public function showOtherWeek($roomname, $weekfirst)
    {  
        $classrooms = Classroom::all();

        $courses = Course::where('roomname', '=', $roomname)->get();

        return view('button4_reserve.showSingleClass',[
            'thisMonday' => $weekfirst,
            'classrooms'=> $classrooms,
            'currentClassroom'=> $roomname,    
            'results'=> $courses
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */

    //更新課程資料(點選Modal後)
    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $course->content = $request->content;
        $course->teacher = $request->teacher;
        $course->start_classTime = $request->start_classTime;
        $course->end_classTime = $request->end_classTime;
        $course->roomname = $request->roomname;
        $course->weekFirst = $request->weekFirst;
        $course->save();

        return redirect('reserve/'.$request->roomname.'/'.$request->weekFirst);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    
    //更新課程資料(點選Modal後)
    public function destroy(Request $request, $id)
    {
       
        $course = Course::find($id);
        $roomname = $course->roomname;
        $weekFirst = $course->weekFirst;
        $course->delete();
        
        return redirect('reserve/'.$roomname.'/'.$weekFirst);
    }
}
