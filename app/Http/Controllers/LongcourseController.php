<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\Course;

use DateTime;
use DateInterval;
use DatePeriod;

class LongcourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($roomname)
    {
        $classrooms = Classroom::all();
        return view('button4_reserve.inputClass',[
                'classrooms'=> $classrooms,
                'currentClassroom'=> $roomname
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $begin = new DateTime( $request->start_date );
        $end = new DateTime( $request->end_date );
        $mondays = getIntervalMonday($begin, $end);
        
        $day = getBeginDay($begin);
        
        foreach($mondays as $monday){
            $course = new Course;
            $course->content = $request->content;
            $course->teacher = $request->teacher;
            $course->start_classTime = $day . "_" . $request->start_classTime;
            $course->end_classTime = $day . "_" . $request->end_classTime;
            $course->roomname = $request->roomname;
            $course->weekFirst = $monday;
            $course->save();
        }
    
        
        return redirect('reserve/'.$request->roomname);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

function getIntervalMonday($begin, $end){
    
    /* 當週任一天的禮拜一是幾號? */
    $beginString = $begin->format("Y-m-d");
    $endString = $end->format("Y-m-d");
    
    //讓起始日期&結束日期成為禮拜一
    if(date("w", strtotime($beginString)) == 1){
        $beginMon = strtotime($beginString);
    }else{
        $beginMon = strtotime('last monday', strtotime($beginString));
    }
    
    if(date("w", strtotime($endString)) == 1){
        $ending = strtotime("+1 day", $endString);
    }else{
        //$endMon = strtotime('last monday', strtotime($endString));
        $ending = strtotime("last monday +1 day", strtotime($endString)); // +1天，為了DatePeriod取的時候尾巴沒包含
    }
    
    $beginMon = date("Y-m-d", $beginMon);
    // echo "begin Monday is " . $beginMon . "<br>";
    $beginMon = new DateTime($beginMon);
    
    $ending = date("Y-m-d", $ending);
    // echo "endMon plus one day is " . $ending . "<br>";
    $ending = new DateTime($ending);
    
    
    $interval = new DateInterval('P1D');
    $period = new DatePeriod($beginMon, $interval, $ending);
    
    $dates = array();// 區間內的所有日期
    $mondays = array(); // 區間內的禮拜一
    
    // $dates陣列內放置$date(格式為"Y-m-d")
    foreach($period as $date){
        //$dates[] = $date->format("Y-m-d");
        array_push($dates, $date->format("Y-m-d"));
    }
    
    // 列出日期區間為Monday的
    foreach($dates as $date){
        if(date("w", strtotime($date)) == 1){
            array_push($mondays, $date);
        }
    }
    
    return $mondays;
}

function getBeginDay($begin){
    /* 取起始日期為星期幾 */
    
    $beginString = $begin->format("Y-m-d");
    $beginDay = date("w", strtotime($beginString));
    
    $dayOfWeek = array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
    
    //echo $dayOfWeek[$beginDay] . "<br>";
    return $dayOfWeek[$beginDay];
}