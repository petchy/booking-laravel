@extends('layouts.default')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Room type</div>
                <div class="card-body">
                    <form action="{{route('addRoomType')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="room_type_name">Room type name</label>
                            <input type="text" name="room_type_name" class="form-control">
                        </div>
                        @error('room_type_name')
                            <div class="my-2">
                                <span class="text-danger">{{$message}}</span>
                            </div>
                        @enderror
                        @if(session("success"))
                            <div class="my-2">
                                <span class="text-success">{{session("success")}}</span>
                            </div>
                        @endif
                        <br>
                        <input type="submit" value="Save" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
