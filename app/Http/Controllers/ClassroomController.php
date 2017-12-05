<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;

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
        $classrooms = new Classroom;
        $classrooms->roomname= $request->roomname;
        $classrooms->word= $request->word;
        $classrooms->imgurl= $request->imgurl;

        $this->validate($request, [
            'imgurl' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->imgurl->getClientOriginalExtension();
        $request->imgurl->move(public_path('uploadimg'), $imageName);
        $classrooms->save();



    return redirect('/reserve/'.$request->roomname);
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
    public function update(Request $request,Classroom $classroom)
    {

        $classroom->word = $request->word;
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

    //取名注意！！！別取new
    public function newClassroomPage()
    {
        $classrooms = Classroom::all();
        return view('button4_reserve.newclassroom',[
                'classrooms'=> $classrooms,
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
