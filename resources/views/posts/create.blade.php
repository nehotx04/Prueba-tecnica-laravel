@extends('layouts.app')
@section('content')
    <div class="col-12 p-4 d-flex justify-content-center align-items-center">
        <div class="col-6 bg-secondary rounded-2 p-4">
        <form action="{{route('posts.store')}}" method="post">
            @csrf
                <div class="mb-4">
                    <label for="title" class="text-light">Titulo</label>
                    <input name="title" type="text" class="form-control" required>
                </div>
                    <div class="form-floating mb-4">
                        <textarea class="form-control" name="body" placeholder="Escribe el contenido de tu publicacion" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Contenido de la publicacion</label>
                    </div>
                
                </textarea>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Crear publicacion</button>
                </div>
            </form>
        </div>
    </div>
@endsection