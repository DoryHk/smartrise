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
        <form action="{{url('/addresses/'.$address->id)}}" role="form" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Update Address</h3>

                                <div class="card-tools">
                                    <button
                                            type="button"
                                            class="btn btn-tool"
                                            data-card-widget="collapse">
                                    </button>
                                </div>

                            </div>
                            <form role="form"
                                  action="{{action('AddressesController@update',$address->id)}}"
                                  method="POST">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input
                                                type="text"
                                                id="name"
                                                name="name"
                                                value="{{$address->name}}"
                                                class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="floor">Floor</label>
                                        <input
                                                type="number"
                                                id="floor"
                                                name="floor"
                                                value="{{$address->floor}}"
                                                class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="building">Building</label>
                                        <input
                                                type="text"
                                                value="{{$address->building}}"
                                                id="building"
                                                name="building"
                                                class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="street">Street</label>
                                        <input
                                                type="text"
                                                value="{{$address->street}}"
                                                id="street"
                                                name="street"
                                                class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="region">City</label>
                                        <input
                                                type="text"
                                                id="city"
                                                value="{{$address->city}}"
                                                name="city"
                                                class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="region">Region</label>
                                        <input
                                                type="text"
                                                value="{{$address->region}}"
                                                id="region"
                                                name="region"
                                                class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select
                                                class="form-control select2"
                                                style="width: 100%;"
                                                name="country"
                                                value="{{$address->country}}"
                                        >
                                            @foreach($address->getCountries() as $country)
                                            <option>{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" value="Update"
                                               class="btn btn-sm btn-primary float-right">
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </form>
    </section>
@stop
