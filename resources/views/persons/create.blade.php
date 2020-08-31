@extends('adminlte::page')

@section('title', 'Dashboard')

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
        <form action="{{url('/persons')}}" role="form" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Person</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input
                                        type="text"
                                        id="first_name"
                                        name="first_name"
                                        class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input
                                        type="text"
                                        id="last_name"
                                        name="last_name"
                                        class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Date Of Birth:</label>
                                <div
                                        class='input-group date'
                                >
                                    <input
                                            id='date_of_birth'
                                            type='date'
                                            name="date_of_birth"
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
                                        placeholder="example@email.com"
                                        class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input
                                        type="text"
                                        id="phone_number"
                                        name="phone_number"
                                        class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="preferred_contact_method">Preferred Contact Method</label>
                                <select
                                        class="form-control custom-select"
                                        name="preferred_contact_method">
                                    <option selected disabled>Select one</option>
                                    <option value="1">Email</option>
                                    <option value="2">Phone</option>
                                    <option value="3">SMS</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Gender</label>
                                <div class="form-check">
                                    <input
                                            class="form-check-input"
                                            type="radio"
                                            value="male"
                                            name="gender">
                                    <label class="form-check-label">Male</label>
                                </div>
                                <div class="form-check">
                                    <input
                                            class="form-check-input"
                                            type="radio"
                                            value="female"
                                            name="gender">
                                    <label class="form-check-label">Female</label>
                                </div>
                                <div class="form-check">
                                    <input
                                            class="form-check-input"
                                            type="radio"
                                            value="others"
                                            name="gender">
                                    <label class="form-check-label">Others</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="/persons" class="btn btn-secondary btn-sm">Cancel</a>
                    <input type="submit" value="Next" class="btn btn-sm btn-primary float-right">
                </div>
            </div>
        </form>
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
