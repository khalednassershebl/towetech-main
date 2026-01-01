<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('order')->latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'position_ar' => 'required|string|max:255',
            'position_en' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
            'rating' => 'required|integer|min:1|max:5',
            'review_ar' => 'required|string',
            'review_en' => 'required|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            try {
                $validated['image'] = $request->file('image')->store('testimonials', 'public');
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['image' => 'حدث خطأ أثناء رفع الصورة: ' . $e->getMessage()]);
            }
        }

        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['order'] = $request->order ?? 0;

        Testimonial::create($validated);

        return redirect()->route('testimonials.index')->with('success', 'تم إنشاء رأي العميل بنجاح');
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
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'position_ar' => 'required|string|max:255',
            'position_en' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
            'rating' => 'required|integer|min:1|max:5',
            'review_ar' => 'required|string',
            'review_en' => 'required|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'delete_image' => 'nullable|boolean',
        ]);

        // Handle image deletion
        if ($request->has('delete_image') && $request->delete_image == '1') {
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
            $validated['image'] = null;
        } elseif ($request->hasFile('image')) {
            try {
                // Delete old image if exists
                if ($testimonial->image) {
                    Storage::disk('public')->delete($testimonial->image);
                }
                $validated['image'] = $request->file('image')->store('testimonials', 'public');
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['image' => 'حدث خطأ أثناء رفع الصورة: ' . $e->getMessage()]);
            }
        } else {
            // Keep existing image
            $validated['image'] = $testimonial->image;
        }

        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['order'] = $request->order ?? 0;

        // Remove delete_image from validated array as it's not a model field
        unset($validated['delete_image']);

        $testimonial->update($validated);

        return redirect()->route('testimonials.index')->with('success', 'تم تحديث رأي العميل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        // Delete image if exists
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }
        
        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'تم حذف رأي العميل بنجاح');
    }
}

