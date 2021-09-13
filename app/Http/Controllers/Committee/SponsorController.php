<?php

namespace App\Http\Controllers\Committee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SponsorController extends Controller
{

    public function index()
    {
        return view('committee.sponsors');
    }

    public function allSponsors()
    {
        $sponsors = User::all()->where('role', 1);
        return response()->json($sponsors);
    }

    public function store(Request $request)
    {
        $sponsor = new User([
            'name' => $request->input('name'),
            'field' => $request->input('field'),
            'email' => $request->input('email'),
            'contactNumber' => $request->input('contactNumber'),
            'role' => 1,
            'password' => '123456'
        ]);
        $sponsor->save();

        return response()->json('The sponsor successfully added');
    }

    public function edit($id)
    {
        $sponsor = User::find($id);
        return response()->json($sponsor);
    }

    public function update($id, Request $request)
    {
        $sponsor = User::find($id);
        $sponsor->update($request->all());
        return response()->json('The sponsor successfully updated');
    }

    public function destroy($id)
    {
        $sponsor = User::find($id);
        $sponsor->delete();

        return response()->json('The sponsor successfully deleted');
    }
}
