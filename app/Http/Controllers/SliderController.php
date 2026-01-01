<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'background' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'link' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('background')) {
            try {
                $imagePath = $request->file('background')->store('sliders', 'public');
                $validated['background'] = $imagePath;
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['background' => 'حدث خطأ أثناء رفع الصورة: ' . $e->getMessage()]);
            }
        }

        Slider::create($validated);

        return redirect()->route('sliders.index')->with('success', 'تم إنشاء السلايدر بنجاح');
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
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::findOrFail($id);

        $validated = $request->validate([
            'background' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'link' => 'nullable|url|max:255',
            'delete_image' => 'nullable|boolean',
        ]);

        // Handle image deletion
        if ($request->has('delete_image') && $request->delete_image == '1') {
            if ($slider->background) {
                Storage::disk('public')->delete($slider->background);
            }
            $validated['background'] = null;
        } elseif ($request->hasFile('background')) {
            try {
                // Delete old image if exists
                if ($slider->background) {
                    Storage::disk('public')->delete($slider->background);
                }
                $imagePath = $request->file('background')->store('sliders', 'public');
                $validated['background'] = $imagePath;
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['background' => 'حدث خطأ أثناء رفع الصورة: ' . $e->getMessage()]);
            }
        } else {
            // Keep existing image
            $validated['background'] = $slider->background;
        }

        // Remove delete_image from validated array as it's not a model field
        unset($validated['delete_image']);

        $slider->update($validated);

        return redirect()->route('sliders.index')->with('success', 'تم تحديث السلايدر بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        
        // Delete image if exists
        if ($slider->background) {
            Storage::disk('public')->delete($slider->background);
        }
        
        $slider->delete();

        return redirect()->route('sliders.index')->with('success', 'تم حذف السلايدر بنجاح');
    }
}
