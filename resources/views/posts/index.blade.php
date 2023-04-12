@extends('layouts.app')

@section('content')



<div class="col-12 container">
    @if(Auth::user()->hasRole('Publicador'))
    <a href="{{route('posts.create')}}" class="btn btn-primary">Crear publicacion</a>
    @endif
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
        <a href="{{route('posts.show',$post)}}">
            <li class="card shadow-sm mb-3 p-4">
                <span class="text-black text-decoration-none">
                    {{$post->title}}
                </span>
            </li>
        </a>
        @endforeach
    </ul>
    @endif
</div>

@endsection