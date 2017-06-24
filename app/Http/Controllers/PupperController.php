<?php

namespace App\Http\Controllers;

use App\Pupper;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PupperController extends Controller
{
    public function index($id = null)
    {
        if($id == null)
        {
            return Pupper::orderBy('id', 'asc')->get();
        }
        else
        {
            return $this->show($id);
        }

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $pupper = new Pupper;

        $pupper->name = $request->input('name');
        $pupper->first_name = $request->input('first_name');
        $pupper->last_name = $request->input('last_name');
        $pupper->date_of_birth = $request->input('date_of_birth');
        $pupper->age = $request->input('age');
        $pupper->gender = $request->input('gender');
        $pupper->save();

        return "Pupper " . $pupper->name . " saved ok fren ty";
    }

    public function show($id)
    {
        return Pupper::find($id);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $pupper = Pupper::find($id);

        $pupper->name = $request->input('name');
        $pupper->first_name = $request->input('first_name');
        $pupper->last_name = $request->input('last_name');
        $pupper->date_of_birth = $request->input('date_of_birth');
        $pupper->age = $request->input('age');
        $pupper->gender = $request->input('gender');
        $pupper->save();

        return "Successfull saving pupper " . $pupper->name . " thx vvvmuch frendo";
    }

    public function destroy($id)
    {
        $pupper = Pupper::find($id);
        $pupper->destroy($id);

        return "pupper deleted. sad fren :( ";
    }
}
