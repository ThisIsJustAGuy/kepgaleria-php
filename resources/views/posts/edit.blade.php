@extends('layouts.app')

@section('content')
    <form action="{{isset($post) ? route('posts.update', $post->id) : route('posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if(isset($post))
            @method('PUT')
        @endif
        <label for="title">Cím: </label>
        <input type="text" name="title" id="title" value="{{isset($post) ? $post->title : ''}}">
        <br>

        <label for="description">Leírás(opcionális): </label>
        <input type="text" name="description" id="description" value="{{isset($post) ? $post->description : ''}}">
        <br>

        <label for="image">Kép:</label>
        <input
            type="file"
            name="image"
            id="image">
        <br>

        <button type="submit">Posztolás</button>
    </form>
@endsection
