@extends('template.header')
@extends('template.navbar')

@extends('template.sidebar')

<main id="main" class="main">

    <div class="card col-md-8">
        <div class="card-header">
        <h3>EDIT CLASS </h3>
        </div>
        <div class="col-md-3">

        </div>
        <div class="card-body">
            <form method="POST" onsubmit="return validateform()" id="verifform" action="{{route('classe.update',$classe)}}">
                @csrf
                @method('put')
                <label for="">className</label>
                <input type="text" class="form-control @error('className') is-invalid @enderror" name="className" required value="{{$classe->className}}">
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
