@extends('layouts.app')
@section('content')
    <ul>
        <li><h3>{{$user->name}}</h3></li>
        <li><h3>{{$user->email}}</h3></li>
    </ul>
    
    <div>
        <a class="btn btn-success" href="{{route('users.edit',$user)}}">Editar usuario</a>
        <form class="col-4 mt-2" action="{{route('users.destroy',$user)}}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">borrar usuario</button>
        </form>
    </div>
@endsection