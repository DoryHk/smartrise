@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h4 class="mb-2">
                List Of Persons
                <a
                        href="{{ url('persons/create') }}"
                        class="btn bg-blue float-right">
                    Add New Person
                </a>
            </h4>
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        @if(count($persons) !== 0)
            <div class="row">
                @foreach($persons as $person)
                    <div class="col-lg-6 col-6">
                        <div class="small-box bg-gradient-blue">
                            <div class="inner">
                                <h3>
                                    {{$person->getNameAttribute()}}
                                    <form
                                            action="/persons/{{$person->id }}"
                                            method="POST"
                                            class="float-right">
                                        @method('DELETE')
                                        @csrf
                                        <a
                                                href="{{url('persons/'.$person->id.'/edit')}}"
                                                class="btn btn-tool">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button
                                                type="submit"
                                                class="btn btn-tool">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </h3>
                                <div class="bg-white">
                                    <div class="row  ml-1">
                                        <div class="col-md-3">
                                            <i class="fas fa-mail-bulk"></i>
                                            <b>Email:</b>
                                        </div>
                                        <div class="col-md-9">
                                            {{$person->email}}
                                        </div>
                                    </div>
                                    <div class="row ml-1">
                                        <div class="col-md-3">
                                            <i class="fas fa-phone"></i>
                                            <b>Phone #:</b>
                                        </div>
                                        <div class="col-md-9">
                                            {{$person->phone_number}}
                                        </div>
                                    </div>
                                    @include('addresses.all',[
                                        '$person'=>$person
                                    ])
                                </div>
                            </div>
                            <a
                                    href="{{url('persons/'.$person->id)}}"
                                    class="small-box-footer bg-gradient-blue">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
                    {!! $persons->links() !!}
            </div>
        @else
            <h3>No Results Found</h3>
        @endif
    </section>
@stop
