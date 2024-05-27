@extends('layouts.app')

@section('content')

    <div class="my-2">
        <a href="{{route('posts.create')}}" class="btn btn-success">Új poszt</a>
    </div>

    <form action="" class="d-flex">
        <input type="text" name="term" class="form-control" value="{{ request()->term }}">
        <button class="btn btn-sm btn-outline-secondary" type="submit">Keresés</button>
    </form>

    <form action="" class="d-flex">
        <select name="field" id="field">
            <option value="title" {{request()->field == 'title' ? 'selected' : ''}}>Cím</option>
            <option value="description" {{request()->field == 'description' ? 'selected' : ''}}>Leírás</option>
            <option
                value="created_at" {{request()->field == 'title' ? '' : (request()->field == 'description' ? '' : 'selected')}}>
                Feltőltési dátum
            </option>
        </select>
        <select name="order" id="order">
            <option value="asc" {{request()->order == 'asc' ? 'selected' : ''}}>Növekvő</option>
            <option value="desc" {{request()->order == 'asc' ? '' : 'selected'}}>Csökkenő</option>
        </select>
        <button class="btn btn-sm btn-outline-secondary" type="submit">Rendezés</button>
    </form>

    <div class="d-flex flex-wrap">
        @foreach($posts as $post)
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
        @endforeach
    </div>

@endsection
