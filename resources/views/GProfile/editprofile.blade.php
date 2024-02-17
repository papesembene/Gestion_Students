@extends('template.header')
@extends('template.navbar')

@extends('template.sidebar')

<main id="main" class="main">

    <div class="card col-md-8">
        <div class="card-header">
            <h3>EDIT PROFILE </h3>
        </div>
        <div class="col-md-3">

        </div>
        <div class="card-body">
                <form method="POST" onsubmit="return validateform()" id="verifform" action="{{route('profile.update',$profil)}}">
                    @csrf
                    @method('put')
                    <label for="">libelle</label>
                    <input type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" required value="{{$profil->libelle}}">
                    @error("libelle")
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="">
                        <button  type="submit" class="btn btn-outline-primary"  name="">Modifier</button>
                    </div>
                </form>
            </div>

        </div>
    </main>

@extends('template.footer')
