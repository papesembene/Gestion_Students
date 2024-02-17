@extends('header')
@section('content')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                @if (session('update'))
                    <alert class="alert alert-success"> {{session('update')}} </alert>
                @endif
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{asset('storage/images/'.$student->image)}}" alt="Profile" class="rounded-circle">
                        <h2>{{$student->firstname}}</h2>
                        <h3>{{$student->schoolClass->className}}</h3>

                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Details</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Student</button>
                            </li>



                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Student Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{$student->firstname.' '.$student->lastname}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{$student->email}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Classe</div>
                                    <div class="col-lg-9 col-md-8">{{$student->schoolClass->className}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Telephone</div>
                                    <div class="col-lg-9 col-md-8">{{$student->telephone}}</div>
                                </div>





                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{route('student.update',$student)}}" method="post" enctype="multipart/form-data" >
                                    @csrf
                                    @method('put')
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{asset('storage/images/'.$student->image)}}" alt="Profile">
                                            <div class="pt-2">
                                                <input type="file" class="form-control" name="image"  >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Fistname</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="firstname" type="text" class="form-control" id="" value="{{$student->firstname}}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Lastname</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="lastname" type="text" class="form-control" id="" value="{{$student->lastname}}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Telephone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="telephone" type="text" class="form-control" id="" value="{{$student->telephone}}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Class</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select class="form-control" name="class_id">
                                                @foreach($classes = \App\Models\SchoolClass::all() as $classe)
                                                    <option value="{{$classe->id}}" @selected($student->class_id==$classe->id)>{{$classe->className}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-settings">



                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
