<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showForm()
    {
        return view('html101');
    }

    public function handleSubmit(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'agree' => 'accepted',
        ]);

        $formData = $request->except(['_token']);

        $fullName = $request->input('first_name') . ' ' . $request->input('last_name');
        $address = $request->input('address');
        $favColor = $request->input('favcolor');
        $musicInterests = $request->input('music');

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $fileName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads'), $fileName);
        }

        return view('submission_success', [
            'fullName' => $fullName,
            'address' => $address,
            'color' => $favColor,
            'music' => $musicInterests ?? [],
        ]);
    }
}