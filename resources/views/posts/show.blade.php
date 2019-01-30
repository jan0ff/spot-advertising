@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$post->title}}</div>

                <div class="card-body">
                  <p class="card-text">{{$post->description}}</p>
                  <a href="#" class="card-link">Edit</a>
                  <a href="#" class="card-link text-danger">Delete</a>
                </div>



            </div>
        </div>
    </div>
</div>
@endsection
