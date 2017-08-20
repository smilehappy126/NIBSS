<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

//Controller好像要寫在一起，不同Controller同時return相同view會有問題
//測試中...把部分WeekController東西移來這裡
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
    public function create()
    {
        //
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
        $courses->classTime= $request->classTime;
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
    public function show($roomname)
    {
        //
//        $data['fuck'] = $roomname;
//        return View::make('simple', $data);
//        return $roomname;
//        return view('button4_reserve.index', [
//                'currentClass'=>$roomname
//            ]);

        $today = date( 'Y-m-d', strtotime( 'monday this week' ) );
        $classrooms = Classroom::all();
        
        $courses = Course::all();

        return view('button4_reserve.index',[
                'weekfirst' => $today,
                'classrooms'=> $classrooms,
                'currentClass'=> $roomname,
                'courses'=> $courses
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
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
