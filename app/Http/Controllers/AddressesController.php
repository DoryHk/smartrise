<?php

namespace App\Http\Controllers;

use App\Actions\Address\CreateAddressAction;
use App\Actions\Address\DeleteAddressAction;
use App\Actions\Address\UpdateAddressAction;
use App\Http\Requests\CreateAddressRequest;
use App\Http\Requests\DeleteAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Address[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index($id)
    {
        $addresses = Address::all()->where('person_id',$id);
        return $addresses;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view("addresses.create", [
            'person_id' => $request->person_id,
            'countries' => Address::getCountries()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateAddressRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAddressRequest $request)
    {
        if (!CreateAddressAction::execute($request->validated())) {
            return back()->withErrors([
                "error" => "Could not create address. Check logs."
            ]);
        }

        $request->session()
            ->flash("success", "Address created successfully!");

        return redirect()->to("/persons/".$request->person_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $term = $request->has("q") ? trim($request->input("q")) : "";

        $query = Address::getQuery();

        if (!empty($term)) {
            $query->where("country", "like", "%" . $term . "%")
                ->orWhere("city", "like", "%" . $term . "%");
        }

        return view("search")->with("results", $query->paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = Address::find($id);

        return view("addresses.show",["address", $address]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = Address::find($id);

        return view("addresses.edit")->with("address", $address);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAddressRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddressRequest $request, $id)
    {
        $address = Address::find($id);
        if (!UpdateAddressAction::execute($address, $request->validated())) {
            return back()->withErrors([
                "error" => "Could not update address with id " . $id . "."
            ]);
        }

        $request->session()
            ->flash("success", "Address updated successfully!");

        return redirect()->to("/persons/".$address->person_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteAddressRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteAddressRequest $request, $id)
    {
        $address = Address::find($id);
        if (!DeleteAddressAction::execute($address)) {
            return back()->withErrors([
                "error" => "Could not update address with id " . $id . "."
            ]);
        }

        $request->session()
            ->flash("success", "Address updated successfully!");

        return redirect()->to("/persons/".$address->person_id);
    }
}
