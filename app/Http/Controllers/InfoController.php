<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function about()
    {
        return view('info.about');
    }

    public function mission()
    {
        return view('info.mission');
    }

    public function howToBuy()
    {
        return view('info.how-to-buy');
    }

    public function contact()
    {
        return view('info.contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        return redirect()->back()->with('success', '¡Gracias por contactarnos! Te responderemos pronto.');
    }
}
