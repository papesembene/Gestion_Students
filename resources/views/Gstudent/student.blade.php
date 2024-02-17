@extends('header')
@section('content')

        <form method="get">
            <div class="d-flex col-md-4 mt-9" style="margin-left: 45rem;">
                <input class="form-control  @error('lastname') is-invalid @enderror" name="lastname" placeholder="Votre Nom" value="{{$input['lastname'] ?? ''}}" >
                <button class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart-fill" viewBox="0 0 16 16">
                        <path d="M6.5 13a6.47 6.47 0 0 0 3.845-1.258h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1A6.47 6.47 0 0 0 13 6.5 6.5 6.5 0 0 0 6.5 0a6.5 6.5 0 1 0 0 13m0-8.518c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018"/>
                    </svg></button>
                @error("lastname")
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

        </form>

    <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="d-flex col-md-4 mt-4">
            <input type="file" name="file" class="form-control  @error('file') is-invalid @enderror">
                <button type="submit" class="btn btn-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                    </svg>
                </button>
            @error("file")
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </form>
    <div class="col-md-4"  style="margin-left: 35rem;">
        <a class="btn btn-outline-info m-5  " href="{{route('studentlistexcel')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5zM3 12v-2h2v2zm0 1h2v2H4a1 1 0 0 1-1-1zm3 2v-2h3v2zm4 0v-2h3v1a1 1 0 0 1-1 1zm3-3h-3v-2h3zm-7 0v-2h3v2z"/>
            </svg>Export</a>
        <a class="btn btn-outline-info m-5 " href="{{route('student.create',$students)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0"/>
            </svg>Ajouter</a>
    </div>
       <div class="col-md-12">
           @if (session('import'))
           <alert class="alert alert-primary "> {{session('import')}} </alert>
           @endif
           @if (session('success'))
               <alert class="alert alert-success "> {{session('success')}} </alert>
           @endif
           @if (session('danger'))
               <alert class="alert alert-danger "> {{session('danger')}} </alert>
           @endif
           @if (session('update'))
               <alert class="alert alert-primary "> {{session('update')}} </alert>
           @endif
       </div>
            <div class=" col-md-12 row" >
                @foreach ($students as $student)
                <div class="card-group col-md-6" style="width: 18rem;">
                    <img src="{{asset('storage/images/'.$student->image)}}" class="card-img-top" alt="..."style=" height: 15rem;" >
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"> Prenom: {{$student->firstname}}</li>
                            <li class="list-group-item">  Nom : {{$student->lastname}}</li>
                            <li class="list-group-item">  Email :{{$student->email}}</li>
                            <li class="list-group-item"> Classe : @foreach($student->classes as $cl)
                                    {{$cl->nomclasse}}@endforeach
                            </li>

                        </ul>
                    </div>
                        <div class="card-body">
                            <form action="{{route('student.destroy',$student)}}" method="post">
                                @csrf
                                @method('delete')
                                <div class="d-flex">
                                    <button onclick="return confirm ('Etes-Vous Sur?'); return false;" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                        </svg>Supprimer</button>
                                </div>
                            </form>
                            <br>
                            <a href="{{route('student.edit',$student)}}" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg>Modifier</a>
                    </div>
                </div>
                @endforeach

            </div>
{{$students->links()}}







@endsection
