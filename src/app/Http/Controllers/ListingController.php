<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index()
    {
        return view(
            'listings.index',
            [
                'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
            ]
        );
    }

    public function show(Listing $listing)
    {
        return view('listings.show', ['listing' => $listing]);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'email' => ['required', 'email'],
            'description' => 'required'
        ]);
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('public/logos');
            $path = str_replace('public', '', $path);
            $validated['logo'] = $path;
        }
        $validated['user_id'] = auth()->id();
        Listing::create($validated);
        return redirect('/')->with('message', 'Listing successfully created!');
    }

    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {
        if ($listing->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized Action');
        }
        $validated = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'email' => ['required', 'email'],
            'description' => 'required'
        ]);
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('public/logos');
            $path = str_replace('public', '', $path);
            $validated['logo'] = $path;
        }
        $listing->update($validated);
        return back()->with('message', 'Listing successfully updated!');
    }

    public function destroy(Listing $listing) {
        if ($listing->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized Action');
        }
        if ($listing->logo && Storage::disk('public')->exists($listing->logo)) {
            Storage::disk('public')->delete($listing->logo);
        }
        $listing->delete();
        return redirect('/')->with('message', 'Listing successfully deleted!');
    }

    public function manage() {
        return view(
            'listings.manage',
            [
                'listings' => auth()->user()->listings()->get()
            ]
        );
    }

}
