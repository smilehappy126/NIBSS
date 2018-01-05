<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Classroom;
use Excel;


class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $today = date( 'Y-m-d', strtotime( 'monday this week' ) );
        $classrooms = Classroom::all();

        return view('button4_reserve.index',[
                'weekfirst' => $today,
                'classrooms'=> $classrooms,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //新增課程資料
    public function create(Request $request)
    {
        /* 檢查節次是否重疊 */
        $query = Course::all()->where('roomname', $request->roomname)
            ->where('weekFirst', $request->weekFirst);

        foreach($query as $item){
            if( isOverlap($item->start_classTime, $item->end_classTime, 
                     $request->start_classTime, $request->end_classTime) ){
                return redirect('reserve/'.$request->roomname.'/'.$request->weekFirst)
                    ->with('alert', '課堂節次有重複!');
            }
        }
        
        /* 新增一筆課堂資料 */
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
                        foreach ($value as $v) { 
                            //start_classtime / end_classtime要是文字格式   
                            //英文字母需皆為小寫    
                            $insert[] = ['roomname' => $v['roomname'], 'weekfirst' => $v['weekfirst'], 'start_classtime' => $v['start_classtime'], 'end_classtime' => $v['end_classtime'], 'teacher' => $v['teacher'], 'content' => $v['content']];
                        }
                    }
                }

                
                if(!empty($insert)){
                    Course::insert($insert);
                    return back()->with('success','Insert Record successfully.');
                }

            }

        }

        return back()->with('error','Please Check your file, Something is wrong there.');
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

        /* 檢查節次是否重疊 */
        $query = Course::all()->where('roomname', $request->roomname)
            ->where('weekFirst', $request->weekFirst)
            ->where('id', '!=', $id); //除了自己以外
            

        foreach($query as $item){
            if( isOverlap($item->start_classTime, $item->end_classTime, 
                     $request->start_classTime, $request->end_classTime) ){
                return redirect('reserve/'.$request->roomname.'/'.$request->weekFirst)
                    ->with('alert', '課堂節次有重複!');
            }
        }


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
    
    //刪除課程資料(點選Modal後)
    public function destroy(Request $request, $id)
    {
       
        $course = Course::find($id);
        $roomname = $course->roomname;
        $weekFirst = $course->weekFirst;
        $course->delete();
        
        return redirect('reserve/'.$roomname.'/'.$weekFirst);
    }
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
