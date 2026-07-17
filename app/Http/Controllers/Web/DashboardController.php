<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $sites = $request->user()->sites;
        return view('dashboard', ['sites' => $sites]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'domain' => 'required|string|max:255',
        ]);
        $validated['user_id'] = $request->user()->id;
        $validated['public_key'] = 'pub_' . Str::random(16);

        Site::create($validated);

        return redirect('/dashboard');
    }
}
