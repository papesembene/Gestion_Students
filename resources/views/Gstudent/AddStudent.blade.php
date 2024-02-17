@extends('header')
@section('content')
    <div class="card col-md-8 mt-5 offset-2">
        <h5 class="card-header bg-info"> {{$students->exists ? 'Modifier':'Ajout'}} Student </h5>
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{route($students->exists ?'student.update':'student.store',$students)}}" method="post" >
                @csrf
                @method($students->exists ?'put':'post')
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{$students->image?$students->image:old('image')}}"  >
                    @error("image")
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Firstname</label>
                    <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname"  value="{{$students->firstname?$students->firstname:old('firstname')}}" >
                    @error("firstname")
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Lastname</label>
                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"  value="{{$students->lastname?$students->lastname:old('lastname')}}">
                    @error("lastname")
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Number Call </label>
                    <input type="number" class="form-control @error('telephone') is-invalid @enderror" name="telephone"  value="{{$students->telephone?$students->telephone:old('telephone')}}">
                    @error('telephone')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Birthday</label>
                    <input type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday"  value="{{$students->birthday?$students->birthday:old('birthday')}}">
                    @error('birthday')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Lieu de Naissance</label>
                    <input type="text" class="form-control @error('lieu') is-invalid @enderror" name="lieu"  value="{{$students->lieu?$students->lieu:old('lieu')}}" >
                    @error('lieu')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Class</label>
                    <select class="form-control @error('id_classe') is-invalid @enderror " name="id_classe">
                        @foreach($classes  as $classe)
                            <option value="{{$classe->id}}" @selected($classe->nomclasse ) >{{$classe->nomclasse}}</option>
                        @endforeach
                    </select>
                    @error('id_classe')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Annee Academique</label>
                    <select class="form-control" name="annee_academique">
                        <option value="2023/2024" >2023/2024</option>
                        <option value="2022/2023" >2022/2023</option>
                        <option value="2021/2022" >2021/2022</option>
                        <option value="2020/2021" >2020/2021</option>
                    </select>
                </div>
                <hr>
                <button class="btn btn-outline-info">{{$students->exists ? 'Modifier':'Ajouter'}}</button>
            </form>
        </div>
    </div>
@endsection
