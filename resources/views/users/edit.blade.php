@extends('layouts.app')

@section('content')
<div class="col-12 p-4 d-flex justify-content-center align-items-center">
    <div class="col-6 bg-secondary rounded-2 p-4">
    <form action="{{route('users.update',$user)}}" method="post">
        @method('put')
        @csrf
            <div class="mb-4">
                <label for="name" class="text-light">Nombre</label>
                <input name="name" value="{{old('name',$user->name)}}" type="text" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="email" class="text-light">Correo</label>
                <input name="email" value="{{old('email',$user->email)}}" type="text" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="password" class="text-light">Contraseña</label>
                <input name="password" value="{{old('password',$user->password)}}" type="password" class="form-control" required>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Editar usuario</button>
            </div>
        </form>
    </div>
</div>
@endsection
