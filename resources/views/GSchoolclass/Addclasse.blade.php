@extends('header')
@section('content')
    <div class="card col-md-8 mt-5 offset-2">
        <h5 class="card-header bg-info"> {{$classes->exists ? 'Modifier':'Ajout'}} Classe </h5>
        <div class="card-body">
            <form  action="{{route($classes->exists ?'class.update':'class.store',$classes)}}" method="post">
                @csrf
                @method($classes->exists ?'put':'post')
                <div class="form-group">
                    <label for="">ClassName</label>
                    <input type="text" class="form-control @error('nomclasse') is-invalid @enderror" name="nomclasse" value="{{$classes->nomclasse?$classes->nomclasse:old('nomclasse')}}"  >
                    @error("nomclasse")
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <hr>
                <button class="btn btn-outline-info">{{$classes->exists ? 'Modifier':'Ajouter'}}</button>
            </form>
        </div>
    </div>
@endsection
