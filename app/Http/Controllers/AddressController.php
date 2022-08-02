<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Person;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::paginate(25);
        return view("address.welcome")->with(["addresses" => $addresses]);
    }

    public function add()
    {
        $persons = Person::select("id", "name")->orderBy("name")->get();
        return view("address.add")->with(["persons" => $persons]);
    }

    public function save(Request $req)
    {
        $validator = $req->validate([
            'address_name' => 'required|min:2|max:255',
            'address' => 'required',
            'city_name' => 'required',
            'country_name' => 'required',
        ], [
            'address_name.required' => 'address name required',
            'address_name.min' => 'address name must be a minimum of 2 characters',
            'address_name.max' => 'address name must be a maximum of 255 characters',
            'address.required' => 'address required',
            'city_name.required' => 'City name required',
            'country_name.required' => 'Country name required'
        ]);

        $new = new Address;
        $new->address_name = $req->address_name;
        $new->address = $req->address;
        $new->person_id = $req->person_id;
        $new->post_code = $req->post_code;
        $new->city_name = $req->city_name;
        $new->country_name = $req->country_name;
        $new->save();

        return redirect("/address");
    }


    public function delete($id)
    {
        $d = Address::find($id);
        $d->delete();

        return redirect('/');
    }
}
