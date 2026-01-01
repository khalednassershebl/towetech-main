<?php

namespace App\Http\Controllers;

use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroSlides = HeroSlide::orderBy('order')->latest()->get();
        return view('admin.hero-slides.index', compact('heroSlides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hero-slides.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'subtitle_ar' => 'nullable|string',
            'subtitle_en' => 'nullable|string',
            'link' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('background_image')) {
            try {
                $validated['background_image'] = $request->file('background_image')->store('hero-slides', 'public');
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['background_image' => 'حدث خطأ أثناء رفع الصورة: ' . $e->getMessage()]);
            }
        }

        $validated['order'] = $validated['order'] ?? HeroSlide::max('order') + 1;
        $validated['is_active'] = $request->has('is_active') ? true : false;

        HeroSlide::create($validated);

        return redirect()->route('hero-slides.index')->with('success', 'تم إنشاء الشريحة بنجاح');
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
        $heroSlide = HeroSlide::findOrFail($id);
        return view('admin.hero-slides.edit', compact('heroSlide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $heroSlide = HeroSlide::findOrFail($id);

        $validated = $request->validate([
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'subtitle_ar' => 'nullable|string',
            'subtitle_en' => 'nullable|string',
            'link' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'delete_image' => 'nullable|boolean',
        ]);

        // Handle image deletion
        if ($request->has('delete_image') && $request->delete_image == '1') {
            if ($heroSlide->background_image) {
                Storage::disk('public')->delete($heroSlide->background_image);
            }
            $validated['background_image'] = null;
        } elseif ($request->hasFile('background_image')) {
            try {
                // Delete old image if exists
                if ($heroSlide->background_image) {
                    Storage::disk('public')->delete($heroSlide->background_image);
                }
                $validated['background_image'] = $request->file('background_image')->store('hero-slides', 'public');
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['background_image' => 'حدث خطأ أثناء رفع الصورة: ' . $e->getMessage()]);
            }
        } else {
            // Keep existing image
            $validated['background_image'] = $heroSlide->background_image;
        }

        $validated['is_active'] = $request->has('is_active') ? true : false;

        // Remove delete_image from validated array as it's not a model field
        unset($validated['delete_image']);

        $heroSlide->update($validated);

        return redirect()->route('hero-slides.index')->with('success', 'تم تحديث الشريحة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $heroSlide = HeroSlide::findOrFail($id);
        
        // Delete image if exists
        if ($heroSlide->background_image) {
            Storage::disk('public')->delete($heroSlide->background_image);
        }
        
        $heroSlide->delete();

        return redirect()->route('hero-slides.index')->with('success', 'تم حذف الشريحة بنجاح');
    }
}

