<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $data['units'] = Unit::all();
        return view('backend.unit.index')->with($data);
    }
    public function create()
    {
        return view('backend.unit.create');
    }

    public function store(Request $request)
    {
        //Store category
        $save_unit                 = new Unit();
        $save_unit->name            = $request->name;
        $save_unit->code            = $request->code;
        $save_unit->description     = $request->description;
        $save_unit->status          = $request->status;
        $save_unit->save();

        return back()->with('message', 'Unit added successfully');
    }

    public function edit($id)
    {
        $data['unit']  = Unit::find($id);
        return view('backend.unit.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $update_unit  = Unit::find($id);

        $update_unit->name            = $request->name;
        $update_unit->code            = $request->code;
        $update_unit->description     = $request->description;
        $update_unit->status          = $request->status;
        $update_unit->save();

        return back()->with('message', 'Unit update successfully');
    }

    public function destroy($id)
    {
        $delete_unit  = Unit::find($id);
        $delete_unit->delete();

        return back()->with('message', 'Unit delete successfully');
    }
}
