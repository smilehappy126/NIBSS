<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\Course;

use DateTime;
use DateInterval;
use DatePeriod;
use Excel;

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
        
//        /* testing query */
//        $query = Course::all()->where('roomname', $roomname)
//            ->where('weekfirst', $weekfirst)->count();
//        
//        return $query;
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


            /* 檢查節次是否重疊 */
            $query = Course::all()->where('roomname', $request->roomname)
                ->where('weekFirst', $monday);

            foreach($query as $item){
                if( isOverlap($item->start_classTime, $item->end_classTime, 
                         $day . "_" . $request->start_classTime, $day . "_" . $request->end_classTime) ){
                    return redirect('inputClass/'.$request->roomname)
                        ->with('alert', '課堂節次有重複!')
                        ->with('weekFirst', $monday);
                    }
                }


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

    //excel
    public function importExcel(Request $request)
    {
        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();
            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach($value as $v){
                             $begin = new DateTime( $v['start_date'] );
                             $end = new DateTime( $v['end_date'] );
                             $mondays = getIntervalMonday($begin, $end);
                             $day = getBeginDay($begin);
                            foreach ($mondays as $monday) {
                            //start_date / end_date要是日期格式
                            //英文字母需皆為小寫    
                                $insert[] = ['roomname' => $v['roomname'], 'weekFirst' => $monday, 'start_classtime' => $day . "_" .$v['start_classtime'], 'end_classtime' => $day . "_" .$v['end_classtime'], 'teacher' => $v['teacher'], 'content' => $v['content']];
                            }
                        }
                    }
                }

                
                if(!empty($insert)){
                    Course::insert($insert);
                    // return back()->with('success','Insert Record successfully.');
                    return redirect('reserve/'.$v['roomname']);
                }

            }
            
        // return redirect('reserve/'.$roomname);
        }

        return back()->with('error','Please Check your file, Something is wrong there.');

    }
    //download excel
    // public function downloadExcel(Request $request)
    // { 
    //     $data = Course::get()->toArray();
    //     return Excel::create('2_exceldemo', function($excel){
    //         $excel->sheet('2_exceldemo', function($sheet)
    //         {
    //             $sheet->loadView('longdownloadExcel');
    //         });
    //     })->export('xlsx');
    // }
    public function downloadExcel()
    {
        $myFile = public_path("exceldemo.ods");
        $headers = ['Content-Type: application/ods'];
        $t=time();
        $newName = 'exceldemo'.date("Y-m-d",$t).'.ods';


        return response()->download($myFile, $newName, $headers);
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
    /* 取區間日期的禮拜一
    (當週任一天的禮拜一是幾號?) */
    
    $beginString = $begin->format("Y-m-d");
    $endString = $end->format("Y-m-d");
    
    // 讓起始日期&結束日期成為禮拜一
    if(date("w", strtotime($beginString)) == 1){
        $beginMon = strtotime($beginString);
    }else{
        $beginMon = strtotime('last monday', strtotime($beginString));
    }
    
    // 結束日期+1天，是為了用DatePeriod的時候，尾巴沒包含
    if(date("w", strtotime($endString)) == 1){
        $ending = strtotime("+1 day", strtotime($endString));
    }else{
        //$endMon = strtotime('last monday', strtotime($endString));
        $ending = strtotime("last monday +1 day", strtotime($endString)); 
        
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

function isOverlap($db_start, $db_end, $start, $end){
    /* 檢查課堂節次是否重疊
    
       資料庫內課堂的起始、結束節次: $db_start, $db_end
       輸入的(要被檢查的)起始、結束節次: $start, $end
    */
    
    $classTime = array("Mon_1","Mon_2","Mon_3","Mon_4","Mon_noon","Mon_5","Mon_6","Mon_7","Mon_8","Mon_9","Mon_A","Mon_B","Mon_C", "Tue_1","Tue_2","Tue_3","Tue_4","Tue_noon","Tue_5","Tue_6","Tue_7","Tue_8","Tue_9","Tue_A","Tue_B","Tue_C", "Wed_1","Wed_2","Wed_3","Wed_4","Wed_noon","Wed_5","Wed_6","Wed_7","Wed_8","Wed_9","Wed_A","Wed_B","Wed_C", "Thu_1","Thu_2","Thu_3","Thu_4","Thu_noon","Thu_5","Thu_6","Thu_7","Thu_8","Thu_9","Thu_A","Thu_B","Thu_C", "Fri_1","Fri_2","Fri_3","Fri_4","Fri_noon","Fri_5","Fri_6","Fri_7","Fri_8","Fri_9","Fri_A","Fri_B","Fri_C", "Sat_1","Sat_2","Sat_3","Sat_4","Sat_noon","Sat_5","Sat_6","Sat_7","Sat_8","Sat_9","Sat_A","Sat_B","Sat_C", "Sun_1","Sun_2","Sun_3","Sun_4","Sun_noon","Sun_5","Sun_6","Sun_7","Sun_8","Sun_9","Sun_A","Sun_B","Sun_C");

    $db_startIndex = array_search($db_start, $classTime);
    $db_endIndex = array_search($db_end, $classTime);
    $startIndex = array_search($start, $classTime);
    $endIndex = array_search($end, $classTime);
    
    $db_array = array();
    for($i = $db_startIndex; $i <= $db_endIndex; $i++){
        array_push($db_array, $i);
    }

    for($i = $startIndex; $i <= $endIndex; $i++){
        if( in_array($i, $db_array) ){
            // echo "重疊了<br>";
            return true;
        }
    }
    return false;
}