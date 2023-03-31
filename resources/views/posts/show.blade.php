@extends('layouts.app')
@section('content')
<h1>{{$post->title}}</h1>
<h2>{{$post->body}}</h2>
<div>
    <a href="{{route('posts.edit',$post)}}" class="btn btn-success">Editar publicacion</a>
    <form class="col-4 mt-2" action="{{route('posts.destroy',$post)}}" method="post">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger">borrar publicacion</button>
    </form>
</div>
@endsection