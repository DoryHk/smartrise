<?php

namespace App\Http\Controllers;

use App\Actions\Person\CreatePersonAction;
use App\Actions\Person\DeletePersonAction;
use App\Actions\Person\UpdatePersonAction;
use App\Http\Requests\CreatePersonRequest;
use App\Http\Requests\DeletePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Address;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = Person::paginate(6);
        return view("persons.all", compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("persons.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePersonRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePersonRequest $request)
    {
        $person = CreatePersonAction::execute($request->validated());
        if (!$person) {
            return back()->withErrors([
                "error" => "Could not create person. Check logs."
            ]);
        }

        $request->session()
            ->flash("success", "Person created successfully!");
        return view("addresses.create", [
            "person_id" => $person->id,
            'countries' => Address::getCountries()
        ]);
    }

    /**
     * Search for persons by first and last name.
     *
     * @param  Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $term = $request->has("q") ? trim($request->input("q")) : " ";
        if (!empty($term)) {
            $persons = Person::where("first_name", "like", "%" . $term . "%")
                ->orWhere("last_name", "like", "%" . $term . "%")->paginate(6);
        } else {
            $persons = Person::paginate(6);
        }
        return view("persons.all", compact('persons'));
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
        $person = Person::find($id);

        return view("persons.show")->with("person", $person);
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
        $person = Person::find($id);

        return view("persons.edit")->with("person", $person);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePersonRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonRequest $request, $id)
    {
        if (!UpdatePersonAction::execute(Person::find($id), $request->validated())) {
            return back()->withErrors([
                "error" => "Could not update person with id " . $id . "."
            ]);
        }

        $request->session()
            ->flash("success", "Person updated successfully!");

        return redirect()->to("/persons/" . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeletePersonRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeletePersonRequest $request, $id)
    {
        if (!DeletePersonAction::execute(Person::find($id))) {
            return back()->withErrors([
                "error" => "Could not update person with id " . $id . "."
            ]);
        }

        $request->session()
            ->flash("success", "Person updated successfully!");

        return redirect()->to("/persons");
    }
}
