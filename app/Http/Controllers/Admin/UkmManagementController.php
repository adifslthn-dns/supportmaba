<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ukm;
use App\Models\Category;

class UkmManagementController extends Controller
{
    /**
     * Display a listing of the UKMs.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ukms = Ukm::all();
        return view('admin.ukm-management', compact('ukms'));
    }

    /**
     * Show the form for creating a new UKM.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.ukm-create', compact('categories'));
    }

    /**
     * Store a newly created UKM in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'establishment_year' => 'required|integer|min:1900|max:' . date('Y'),
            'members_count' => 'required|integer|min:1',
            'supervisor' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:20',
            'instagram' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'activities' => 'required|string',
            'facilities' => 'required|string',
        ]);

        $ukm = new Ukm();
        $ukm->name = $request->name;
        $ukm->description = $request->description;
        $ukm->category_id = $request->category_id;
        $ukm->establishment_year = $request->establishment_year;
        $ukm->members_count = $request->members_count;
        $ukm->supervisor = $request->supervisor;
        $ukm->contact_person = $request->contact_person;
        $ukm->contact_email = $request->contact_email;
        $ukm->contact_phone = $request->contact_phone;
        $ukm->instagram = $request->instagram;
        $ukm->website = $request->website;
        $ukm->activities = $request->activities;
        $ukm->facilities = $request->facilities;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/ukm'), $imageName);
            $ukm->image = $imageName;
        }

        $ukm->save();

        return redirect()->route('admin.ukm.index')->with('success', 'UKM berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified UKM.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $ukm = Ukm::findOrFail($id);
        $categories = Category::all();
        return view('admin.ukm-edit', compact('ukm', 'categories'));
    }

    /**
     * Update the specified UKM in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'establishment_year' => 'required|integer|min:1900|max:' . date('Y'),
            'members_count' => 'required|integer|min:1',
            'supervisor' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:20',
            'instagram' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'activities' => 'required|string',
            'facilities' => 'required|string',
        ]);

        $ukm = Ukm::findOrFail($id);
        $ukm->name = $request->name;
        $ukm->description = $request->description;
        $ukm->category_id = $request->category_id;
        $ukm->establishment_year = $request->establishment_year;
        $ukm->members_count = $request->members_count;
        $ukm->supervisor = $request->supervisor;
        $ukm->contact_person = $request->contact_person;
        $ukm->contact_email = $request->contact_email;
        $ukm->contact_phone = $request->contact_phone;
        $ukm->instagram = $request->instagram;
        $ukm->website = $request->website;
        $ukm->activities = $request->activities;
        $ukm->facilities = $request->facilities;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($ukm->image && file_exists(public_path('images/ukm/' . $ukm->image))) {
                unlink(public_path('images/ukm/' . $ukm->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/ukm'), $imageName);
            $ukm->image = $imageName;
        }

        $ukm->save();

        return redirect()->route('admin.ukm.index')->with('success', 'UKM berhasil diperbarui.');
    }

    /**
     * Remove the specified UKM from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $ukm = Ukm::findOrFail($id);
        
        // Delete image if exists
        if ($ukm->image && file_exists(public_path('images/ukm/' . $ukm->image))) {
            unlink(public_path('images/ukm/' . $ukm->image));
        }
        
        $ukm->delete();

        return redirect()->route('admin.ukm.index')->with('success', 'UKM berhasil dihapus.');
    }
}