@extends('index')
@section('content')
<table id="datatablesSimple" class="table table-striped">
    <h2> Show details SchoolClass</h2>
    <thead>
    <tr>

        <th scope="col">Firstname</th>
        <th scope="col">Lastname</th>
        <th scope="col">Class</th>


    </tr>
    </thead>
    <tbody>
    @foreach ($details as $student)
        <tr>

            <td> {{$student->firstname}}</td>
            <td> {{$student->lastname}}</td>
            <td> {{$student->schoolClass->className}}</td>


        </tr>

    @endforeach



    </tbody>
</table>
@endsection
