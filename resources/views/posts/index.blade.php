@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        @foreach ($posts as $post)

          <div class="col-md-8 mb-3">
              <div class="card">
                  <div class="card-header">{{$post->title}}</div>

                  <div class="card-body">
                    <p class="card-text">{{ str_limit($post->description, 45) }}</p>

                      <p class="card-text">by {{ $post->user->name }} on {{ $post->created_at }}</p>
                      <p class="card-text">
                        @foreach ($post->tags as $tag)
                            <a href="/posts/tags/{{$tag->id}}" class="badge badge-secondary">{{$tag->label}}</a>
                        @endforeach
                      </p>


                    <a href="{{ '/posts/'. $post->id }}" class="btn btn-primary">More</a>
                  </div>

              </div>
          </div>
          @endforeach
  </div>
  <div class="row justify-content-center">
    {{ $posts->links() }}
  </div>

</div>



@endsection
