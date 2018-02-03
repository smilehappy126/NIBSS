<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use Image;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        
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

        /* 檢查教室名稱是否已存在 */
        $query = Classroom::all()->where('roomname', $request->roomname);

        foreach ($query as $item){
            if($item->roomname == $request->roomname){
                return redirect('/newclassroom')
                    ->with('alert', '您輸入的教室名稱已存在!');
            }
        }

        /* 建立新教室 */
        $classrooms = new Classroom;
        $classrooms->roomname = $request->roomname;
        $classrooms->word = $request->word;

        $this->validate($request, [
            'imgurl' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->imgurl->getClientOriginalExtension();
        $request->imgurl->move(public_path('uploadimg'), $imageName);
        $classrooms->imgurl= $imageName;

        $classrooms->save();

        // echo public_path('uploadimg');
        // echo "imageName: ".$imageName;
        
        return redirect('/reserve');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function show(Request $request)
    {
        
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Classroom $classrooms)
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

        $classroom = Classroom::find($id);

        $classroom->word = $request->word;

        /* 如果有更換教室圖片 */
        if($request->imgurl){

            $this->validate($request, [
                'imgurl' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('imgurl');

            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploadimg/' . $imageName);
            Image::make($image)->save($location);

            $classroom->imgurl = $imageName;
        }

        $classroom->save();
        

        return redirect('/editclassroom');
        // return $classroom->id;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Classroom $classroom)
    {
        $classroom->delete();
        return redirect('/editclassroom');
    }

    //新增教室資料頁面
    public function newClassroomPage()
    {
        $classrooms = Classroom::all();
        return view('button4_reserve.newclassroom',[
                'classrooms'=> $classrooms
            ]);
    }

    public function editClassroomPage()
    {
        $classrooms = Classroom::all();
        return view('button4_reserve.editclassroom',[
                'classrooms'=> $classrooms,
            ]);
    }


}
