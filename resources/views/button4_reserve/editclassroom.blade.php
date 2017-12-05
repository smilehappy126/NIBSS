@extends('layouts.layout')
@section('title', '預約狀況')
@section('css')
<style >
    .btn-primary {
        background-color: #FFF;
        color: #285e8e;
        border-color: #3276b1;
        border-radius: 25px;
    }
    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active    {
        background-color: #3276b1;
        color: #FFF;
        border-color: #285e8e;
    }
    .btn-secondary {
        background-color: #FFF;
        color: #ac2925;
        border-color: #d2322d;
        border-radius: 25px;
    }
    .btn-secondary:hover,
    .btn-secondary:focus,
    .btn-secondary:active {
        background-color: #d2322d;
        color: #FFF;
        border-color: #ac2925;
    }

</style>

@stop

@section('content')

  @foreach ($classrooms as $classroom)
  <div class="col-md-4">
    <div class="panel panel-default">
       <div class="panel-heading">{{ $classroom->roomname }}</div>
  
       <div class="panel-body"><img src="{{  url('/uploadimg/'.$classroom->imgurl) }}" height="200" width="300"></br>
              教室描述：
              {{ $classroom->word }} </br></br>
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#editModal{{$classroom->id}}">
               修改
            </button>
        <form action="{{ asset('/editclassroom/'.$classroom->id) }}" method="POST">
            {!! csrf_field() !!}
            {!! method_field('DELETE') !!}
            <button type="submit" class="btn btn-secondary btn-block" id="{{ $classroom->id }}">
                刪除 
            </button>
        </form>


 <div class="modal fade" id="editModal{{$classroom->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{ asset('/editclassroom/'.$classroom->id) }}" method="post">
       {{ csrf_field() }}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $classroom->roomname }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <textarea  class="form-control" rows="5" name="word">{{ $classroom->word }}</textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

       </div>
    </div>
  </div>
  @endforeach



@endsection

@section('js')



@stop