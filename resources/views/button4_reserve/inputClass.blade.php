@extends('layouts.layout')
@section('title', '預約狀況')
@section('css')

@stop

@section('content')
<div class="container">

  <form action="{{ asset('/inputClass') }}" method="post">
 	    {{ csrf_field() }}
<select name="roomname" class="form-control" >
          @foreach ($classrooms as $classroom)
            <option value="{{ $classroom->roomname }} "> {{ $classroom->roomname }} </option>
          @endforeach
</select>
    <div class="form-group">
       <label for="classid">日期:</label>
       <input type="text" class="form-control" id="classtime" name="weekFirst">
    </div>
<select name="classTime" class="form-control" >

            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="午休">午休</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>

</select>
        <div class="form-group">
       <label for="classpic">老師名稱:</label>
       <input type="text" class="form-control" id="teachername" name="teacher">
    </div>
        <div class="form-group">
       <label for="classpic">活動內容:</label>
       <input type="text" class="form-control" id="classcontent" name="content">
    </div>
    <div>
        <button class="btn btn-primary" type="submit">送出</button>
    </div>
  </form>
</div>

@endsection

@section('js')

@stop