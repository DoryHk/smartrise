<html>
@if(count($person->getAddresses()) !== 0)
    @foreach($person->getAddresses() as $key => $address)
        <div class="row ml-1">
            <div class="col-md-3">
                <i class="fas fa-address-card"></i>
                <b>Address {{ ++$loop->index }}:</b>
            </div>
            <div class="col-md-9">
                {{ $address->getFullAddress() }}
            </div>
        </div>
    @endforeach
@endif
</html>