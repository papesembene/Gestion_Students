@extends('index')
@section('content')
<!-- Modal -->
<div class="modal fade" id="ajoutprofil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulaire</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <form method="POST" onsubmit="return validateform()" id="verifform" action="{{route('profile.store')}}">
                    @csrf

                    <label for="">libelle</label>
                    <input type="text" class="form-control" name="libelle" required value="{{old('libelle')}}">
                    @error('libelle')
                    <span style="color:red">{{$message}}</span>
                    @enderror

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button  type="submit" class="btn btn-outline-primary"  name="">Ajouter</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">

    </div>
    <div class="col-md-3">

    </div>
    <div class="card-body">
        @if (session('success'))
            <alert class="alert alert-success"> {{session('success')}} </alert>
        @endif
        @if (session('danger'))
            <alert class="alert alert-danger"> {{session('danger')}} </alert>
        @endif
            @if (session('update'))
                <alert class="alert alert-primary"> {{session('update')}} </alert>
            @endif
        <button class="btn btn-outline-primary mt-5 float-end" data-bs-toggle="modal" data-bs-target="#ajoutprofil">Ajouter</button>
        <table id="datatablesSimple" class="table table-striped">
            <h2> PROFILE LIST</h2>
            <thead>
            <tr>

                <th scope="col">Libelle</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($profils as $profil)
            <tr>

                <td> {{$profil->libelle}}</td>
                <td>
                    <a  href="{{route('profile.edit',$profil)}}" class="btn btn-outline-primary " >Modifier</a>
                </td>
                <td>
                    <form action="{{route('profile.destroy',$profil)}}" method="post">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm ('Etes-Vous Sur?'); return false;" class="btn btn-outline-danger">Supprimer</button>
                    </form>
                </td>


            </tr>

            @endforeach



            </tbody>
        </table>
    </div>
</div>
@endsection
