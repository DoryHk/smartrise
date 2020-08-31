@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Contact</h1>
@stop

@section('content')
    <section class="content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update {{ $person->getNameAttribute() }}</h3>
                    </div>
                    <form action="{{url('/persons/'.$person->id)}}" role="form" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input
                                        type="text"
                                        id="first_name"
                                        name="first_name"
                                        value="{{$person->first_name}}"
                                        class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input
                                        type="text"
                                        id="last_name"
                                        name="last_name"
                                        value="{{$person->last_name}}"
                                        class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="date_of_birth">Date Of Birth:</label>
                                <div
                                        class='input-group date'
                                >
                                    <input
                                            id='date_of_birth'
                                            type='text'
                                            name="date_of_birth"
                                            value="{{ $person->date_of_birth }}"
                                            class="form-control"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                        type="text"
                                        id="email"
                                        name="email"
                                        value="{{$person->email}}"
                                        placeholder="example@email.com"
                                        class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input
                                        type="text"
                                        id="phone_number"
                                        name="phone_number"
                                        value="{{$person->phone_number}}"
                                        class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="preferred_contact_method">Preferred Contact Method</label>
                                <select class="form-control custom-select" name="preferred_contact_method">
                                    <option selected disabled>Select one</option>
                                    <option

                                            {{ $person->preferred_contact_method == 1 ? 'selected' : '' }}
                                            value="1">Email
                                    </option>
                                    <option
                                            {{ $person->preferred_contact_method == 2 ? 'selected' : '' }}
                                            value="2">Phone
                                    </option>
                                    <option
                                            {{ $person->preferred_contact_method == 3 ? 'selected' : '' }}
                                            value="3">SMS
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Gender</label>
                                <div class="form-check">
                                    <input
                                            {{ $person->gender == 'male' ? 'checked' : '' }}
                                            class="form-check-input"
                                            type="radio"
                                            value="male"
                                            name="gender">
                                    <label class="form-check-label">Male</label>
                                </div>
                                <div class="form-check">
                                    <input
                                            {{ $person->gender == 'female' ? 'checked' : '' }}
                                            class="form-check-input"
                                            type="radio"
                                            value="female"
                                            name="gender">
                                    <label class="form-check-label">Female</label>
                                </div>
                                <div class="form-check">
                                    <input
                                            {{ $person->gender == 'others' ? 'checked' : '' }}
                                            class="form-check-input"
                                            type="radio"
                                            value="others"
                                            name="gender">
                                    <label class="form-check-label">Others</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <input
                                        type="submit"
                                        value="Update"
                                        class="btn btn-sm btn-primary float-right">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                @include('addresses.show',['person'=>$person])
            </div>
        </div>
    </section>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
          rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript">
        $('.date').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
@stop
