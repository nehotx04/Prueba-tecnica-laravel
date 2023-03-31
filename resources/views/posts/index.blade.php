@extends('layouts.app')

@section('content')


<div class="col-12 container">
    <a href="{{route('posts.create')}}" class="btn btn-primary">Crear publicacion</a>
    <div class="text-center">
        <h2>Publicaciones</h2>
    </div>
    @if(empty($posts))
    <div class="text-secondary text-opacity-75 text-center mt-5">
        <h3>
            Aun no hay publicaciones aqui...
        </h3>
    </div>
    @else
    <ul>
        @foreach ($posts as $post)
        <li class="card shadow-sm mb-3 p-4">
            <a href="{{route('posts.show',$post)}}">{{$post->title}}</a>
        </li>
        @endforeach
    </ul>
    @endif
</div>

@endsection