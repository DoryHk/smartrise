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
        <form
                action="{{route('addresses.store', ['person_id' => $person_id])}}"
                role="form"
                method="POST">
            @csrf
            <div class="row">
                <div class="card card-secondary col-12">
                    <div class="card-header">
                        <h3 class="card-title">Address</h3>
                        <div class="card-tools">
                            <button
                                    type="button"
                                    class="btn btn-tool"
                                    data-card-widget="collapse"
                                    data-toggle="tooltip"
                                    title="Collapse">
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEstimatedBudget">Name</label>
                            <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="floor">Floor</label>
                            <input
                                    type="text"
                                    id="floor"
                                    name="floor"
                                    class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="building">Building</label>
                            <input
                                    type="text"
                                    id="building"
                                    name="building"
                                    class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="street">Street</label>
                            <input
                                    type="text"
                                    id="street"
                                    name="street"
                                    class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="region">City</label>
                            <input
                                    type="text"
                                    id="city"
                                    name="city"
                                    class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="region">Region</label>
                            <input
                                    type="text"
                                    id="region"
                                    name="region"
                                    class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <select
                                    class="form-control select2"
                                    name="country"
                                    style="width: 100%;">
                                <option disabled selected="selected">Select country</option>
                                @foreach($countries as $country)
                                    <option>{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="/persons" class="btn btn-secondary">Cancel</a>
                    <input
                            type="submit"
                            value="Save"
                            class="btn btn-md btn-primary float-right">
                </div>
            </div>
        </form>
    </section>
@stop
