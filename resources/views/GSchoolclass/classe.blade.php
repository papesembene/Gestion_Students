@extends('header')
@section('content')

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
            <a href="{{route('class.create')}}" class="btn btn-outline-info mt-5"> Ajouter </a>
            <table class="table table-striped">
                <h2> CLASS LIST</h2>
                <thead>
                <tr>
                    <th scope="col">Libelle</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Details</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($classes as $classe)
                <tr>

                    <td> {{$classe->nomclasse}}</td>

                    <td>
                        <a  href="{{route('class.edit',$classe)}}" class="btn btn-outline-primary " >Modifier</a>
                    </td>
                    <td>
                        <form action="{{route('class.destroy',$classe)}}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm ('Etes-Vous Sur?'); return false;" class="btn btn-outline-danger">Supprimer</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('class.show',$classe->id)}}" class="btn btn-outline-success " >details classe</a>

                    </td>
                </tr>
                @endforeach




                </tbody>
            </table>
        </div>
    </div>
@endsection
