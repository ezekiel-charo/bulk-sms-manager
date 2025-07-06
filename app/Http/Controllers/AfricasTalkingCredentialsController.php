<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AfricasTalkingCredentialsController extends Controller
{
    public function create(Request $request): RedirectResponse | Response
    {
        $credentials = $request->user()->africasTalkingCredentials;

        if ($credentials) {
            print_r($credentials);
            return redirect('contacts');
        }

        return Inertia::render('CredentialsAdd');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'username' => 'required|string',
            'api_key' => 'required|string',
        ]);

        $request->user()->africasTalkingCredentials()->create($validated);

        return redirect('contacts');
    }
}
