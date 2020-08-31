@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <section class="content">
        <div class="row col-md-12">
            <div class="card card-primary col-md-6">
                <div class="card-header">
                    <h3 class="card-title">{{$person->getNameAttribute()}}</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-6" for="firs_name">First Name: </label>
                        <div class="col-md-6">
                            {{$person->first_name}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-6" for="last_name">Last Name: </label>
                        <div class="col-md-6">
                            {{$person->last_name}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-6">Date Of Birth: </label>
                        <div class="col-md-6">
                            {{$person->date_of_birth}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-6" for="email">Email: </label>
                        <div class="col-md-6">
                            {{$person->email}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-6" for="phone_number">Phone Number: </label>
                        <div class="col-md-6">
                            {{$person->phone_number}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-6">Preferred Contact Method: </label>
                        <div class="col-md-6">
                            {{ $person->getPreferredContactMethod() }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-6" for="email">Gender: </label>
                        <div class="col-md-6">
                            {{ $person->gender }}
                        </div>
                    </div>
                    <a
                            href="{{url('persons/'.$person->id.'/edit')}}"
                            class="btn btn-sm btn-primary float-right">
                        Edit
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                    @include('addresses.show',['person'=>$person])
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <a href="/persons" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </section>
@stop
