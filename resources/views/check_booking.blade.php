@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Check booking</div>
                <div class="card-body">
                    <form action="{{route('checkBooking')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <select class="form-control" name="room_type_id" id="room_type_id">
                                <option value="">Select Room type</option>
                                @foreach($room_types as $room_type)
                                <option value="{{$room_type->id}}">{{$room_type->room_type_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('room_type_id')
                            <div class="my-2">
                                <span class="text-danger">{{$message}}</span>
                            </div>
                        @enderror
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input class="date form-control" name="date" type="text">
                        </div>
                        @error('date')
                            <div class="my-2">
                                <span class="text-danger">{{$message}}</span>
                            </div>
                        @enderror
                        <br>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
            @if($result ?? '' )
            <div class="card">
                <div class="card-header">Result</div>
                <div class="card-body">
                    <div class="form-group">
                        @if($result['status'] == 'success')
                        <div class="my-2">
                            <span class="text-success">Date : {{$result['date']}}</span>
                        </div>
                        <div class="my-2">
                            <span class="text-success">Room left : {{$result['room_left']}}</span>
                        </div>
                        <div class="my-2">
                            <span class="text-success">Price : {{$result['price']}}</span>
                        </div>
                        @elseif($result['status'] == 'fail')
                        <div class="my-2">
                            <span class="text-danger">Date : {{$result['date']}}</span>
                        </div>
                        <div class="my-2">
                            <span class="text-danger">Room left : {{$result['room_left']}}</span>
                        </div>
                        @else
                        <div class="my-2">
                            <span class="text-danger">Message : {{$result['message']}}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@stop
