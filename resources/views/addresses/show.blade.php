<Html>
<div class="card card-secondary ">
    <div class="card-header">
        <h3 class="card-title">{{ $person->getNameAttribute() }} Address </h3>
    </div>
    <div class="card-body">
        @if(count($person->getAddresses()) !== 0)
            @foreach($person->getAddresses() as $key => $address)
                <div class="form-group col-md-12 row">
                    <div class="col-md-6">
                        <form
                                action="/addresses/{{ $address->id }}"
                                method="POST">
                            @method('DELETE')
                            @csrf
                            <button
                                    type="submit"
                                    class="btn-sm btn btn-outline-primary border-0 ">
                                <i class="fas fa-trash"></i>
                            </button>
                            <a
                                    href="{{url('addresses/'.$address->id.'/edit')}}"
                                    class="btn-sm btn btn-outline-primary border-0">
                                <i class="fas fa-edit"></i>
                            </a>
                            <label for="email"> Address {{ ++$loop->index }} : </label>
                        </form>
                    </div>
                    <div class="col-md-6">
                        {{ $address->getFullAddress() }}
                    </div>
                </div>
            @endforeach
        @else
            No Addresses Found
        @endif
        <div class="col-12">
            <a
                    href="{{action('AddressesController@create', [
                        'person_id' => $person->id,
                    ])}}"
                    class="btn btn-sm btn-primary float-right">
                Add New Address
            </a>
        </div>
    </div>
</div>
</Html>