@extends('layouts.app')

@section('content')

    <div class="my-2">
        <a href="{{route('posts.create')}}" class="btn btn-success">Új poszt</a>
    </div>

    <form action="" class="d-flex">
        <input type="text" name="term" class="form-control" value="{{ request()->term }}">
        <button class="btn btn-sm btn-outline-secondary" type="submit">Keresés</button>
    </form>

    <div class="d-flex flex-wrap">
        @foreach($posts as $post)
            @if((isset(request()->term) &&
                (Str::contains($post->title, request()->term) ||
                Str::contains($post->description, request()->term) ||
                Str::contains($post->updated_at, request()->term)))
                || !isset(request()->term))

                <div class="card col-6">
                    <h2>{{$post->title}}</h2>
                    <img src="data:image/png;base64,{{$post->image}}" alt="kép" width="200px">
                    <small>{{$post->description}}</small>

                    <div>
                        <a href="{{route('posts.edit', [$post])}}" class="btn btn-warning">Szerkesztés</a>
                    </div>
                    <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Kép törlése</button>
                    </form>
                </div>

            @endif
        @endforeach
    </div>

@endsection
