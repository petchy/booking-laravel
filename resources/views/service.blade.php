@extends('layouts.default')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Service</div>
                <div class="card-body">
                    <form action="{{route('addService')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="service_name">Service name</label>
                            <input type="text" name="service_name" class="form-control">
                        </div>
                        @error('service_name')
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
