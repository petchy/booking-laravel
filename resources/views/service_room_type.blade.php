@extends('layouts.default')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Service Room type</div>
                <div class="card-body">
                    <form action="{{route('addServiceRoomType')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="service_id">Service</label>
                            <select class="form-control" name="service_id" id="service_id">
                                <option value="">Select Service</option>
                                @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->service_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('service_id')
                            <div class="my-2">
                                <span class="text-danger">{{$message}}</span>
                            </div>
                        @enderror
                        <div class="form-group">
                            <label for="room_type_id">Room type</label>
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
