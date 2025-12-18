<?php

namespace App\Http\Controllers;

use App\Models\IndexSectionHeader;
use Illuminate\Http\Request;

class IndexSectionHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $headers = IndexSectionHeader::latest()->get();
        return view('admin.index-section-headers.index', compact('headers'));
    }
    
    /**
     * Display a listing of the resource filtered by section type.
     */
    public function indexByType($type)
    {
        $headers = IndexSectionHeader::where('section_type', $type)->latest()->get();
        return view('admin.index-section-headers.index', compact('headers', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.index-section-headers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'section_type' => 'required|string|in:services,testimonials,blog',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'subtitle_ar' => 'nullable|string|max:255',
            'subtitle_en' => 'nullable|string|max:255',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active') ? true : false;

        IndexSectionHeader::create($validated);

        return redirect()->route('index-section-headers.index')->with('success', 'تم إنشاء رأس القسم بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $header = IndexSectionHeader::findOrFail($id);
        return view('admin.index-section-headers.edit', compact('header'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $header = IndexSectionHeader::findOrFail($id);

        $validated = $request->validate([
            'section_type' => 'required|string|in:services,testimonials,blog',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'subtitle_ar' => 'nullable|string|max:255',
            'subtitle_en' => 'nullable|string|max:255',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active') ? true : false;

        $header->update($validated);

        return redirect()->route('index-section-headers.index')->with('success', 'تم تحديث رأس القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $header = IndexSectionHeader::findOrFail($id);
        $header->delete();

        return redirect()->route('index-section-headers.index')->with('success', 'تم حذف رأس القسم بنجاح');
    }
}

