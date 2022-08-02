<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $persons = Person::paginate(25);
        return view("person.welcome")->with(["persons" => $persons]);
    }

    public function add()
    {
        return view("person.add");
    }

    public function save(Request $req)
    {
        $validator = $req->validate([
            'name' => 'required|min:2|max:255',
        ], [
            'name.required' => 'person name required',
            'name.min' => 'person name must be a minimum of 2 characters',
            'name.max' => 'person name must be a maximum of 255 characters',
        ]);

        $new = new Person;
        $new->name = $req->name;
        $birthday = Carbon::parse($req->birthday)->format('Y-m-d');
        $new->birthday = $birthday;
        $new->gender = $req->gender;
        $new->save();

        return redirect("/");
    }

    public function update($id)
    {
        $persons = Person::where("id",$id)->get();
        return view("person.update")->with(["persons"=>$persons, "id"=>$id]);
    }

    public function store(Request $req)
    {
        $validator = $req->validate([
            'name' => 'required|min:2|max:255',
        ], [
            'name.required' => 'person name required',
            'name.min' => 'person name must be a minimum of 2 characters',
            'name.max' => 'person name must be a maximum of 255 characters',
        ]);

        $new = Person::find($req->id);
        $new->name = $req->name;
        $birthday = Carbon::parse($req->birthday)->format('Y-m-d');
        $new->birthday = $birthday;
        $new->gender = $req->gender;
        $new->save();

        return redirect("/");
    }

    public function delete($id)
    {
       $d = Person::find($id);
       $d->delete();

       return redirect('/');
    }

}
