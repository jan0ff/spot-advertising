@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new Post</div>

                <div class="card-body">

                  <form method="POST" action="/posts">
                      @csrf

                      <div class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Example Post Title"  value="{{ old('title') }}">
                      </div>

                      <div class="form-group">
                        <label for="description">Post Description</label>
                        <textarea  class="form-control" id="description" name="description" placeholder="Example Post Description" rows="8">{{ old('description') }}</textarea>
                      </div>

                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" value="1" id="is_headline" name="is_headline" {{ ( old('is_headline') ) ? 'checked': '' }}>
                        <label class="form-check-label" for="is_headline">Is a headline</label>
                      </div>
                      <div class="form-group">
                        <h6>Tags</h6>
                        @foreach ($tags as $tag)
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="{{$tag->id}}" name="tags[]">
                            <label class="form-check-label">{{$tag->label}}</label>
                          </div>
                        @endforeach
                      </div>


                      <div class="form-group">
                          <input type="submit" class="btn btn-primary" value="Save">
                      </div>

                  </form>

                  @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                  </div>
                  @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
