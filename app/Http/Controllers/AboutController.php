<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::latest()->get();
        return view('admin.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subtitle_ar' => 'nullable|string|max:255',
            'subtitle_en' => 'nullable|string|max:255',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'experience_years' => 'required|integer|min:0',
            'experience_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
            'experience_description_ar' => 'nullable|string',
            'experience_description_en' => 'nullable|string',
            'content_ar' => 'required|string',
            'content_en' => 'required|string',
            'features_ar' => 'nullable|array',
            'features_ar.*' => 'string|max:255',
            'features_en' => 'nullable|array',
            'features_en.*' => 'string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
        ]);

        // Handle experience image upload
        if ($request->hasFile('experience_image')) {
            try {
                $validated['experience_image'] = $request->file('experience_image')->store('abouts', 'public');
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['experience_image' => 'حدث خطأ أثناء رفع صورة الخبرة: ' . $e->getMessage()]);
            }
        }

        // Handle main image upload
        if ($request->hasFile('image')) {
            try {
                $validated['image'] = $request->file('image')->store('abouts', 'public');
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['image' => 'حدث خطأ أثناء رفع الصورة: ' . $e->getMessage()]);
            }
        }

        About::create($validated);

        return redirect()->route('abouts.index')->with('success', 'تم إنشاء محتوى من نحن بنجاح');
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
        $about = About::findOrFail($id);
        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $about = About::findOrFail($id);

        $validated = $request->validate([
            'subtitle_ar' => 'nullable|string|max:255',
            'subtitle_en' => 'nullable|string|max:255',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'experience_years' => 'required|integer|min:0',
            'experience_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
            'experience_description_ar' => 'nullable|string',
            'experience_description_en' => 'nullable|string',
            'content_ar' => 'required|string',
            'content_en' => 'required|string',
            'features_ar' => 'nullable|array',
            'features_ar.*' => 'string|max:255',
            'features_en' => 'nullable|array',
            'features_en.*' => 'string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
            'delete_experience_image' => 'nullable|boolean',
            'delete_image' => 'nullable|boolean',
        ]);

        // Handle experience image deletion
        if ($request->has('delete_experience_image') && $request->delete_experience_image == '1') {
            if ($about->experience_image) {
                Storage::disk('public')->delete($about->experience_image);
            }
            $validated['experience_image'] = null;
        } elseif ($request->hasFile('experience_image')) {
            try {
                // Delete old image if exists
                if ($about->experience_image) {
                    Storage::disk('public')->delete($about->experience_image);
                }
                $validated['experience_image'] = $request->file('experience_image')->store('abouts', 'public');
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['experience_image' => 'حدث خطأ أثناء رفع صورة الخبرة: ' . $e->getMessage()]);
            }
        } else {
            // Keep existing image
            $validated['experience_image'] = $about->experience_image;
        }

        // Handle main image deletion
        if ($request->has('delete_image') && $request->delete_image == '1') {
            if ($about->image) {
                Storage::disk('public')->delete($about->image);
            }
            $validated['image'] = null;
        } elseif ($request->hasFile('image')) {
            try {
                // Delete old image if exists
                if ($about->image) {
                    Storage::disk('public')->delete($about->image);
                }
                $validated['image'] = $request->file('image')->store('abouts', 'public');
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['image' => 'حدث خطأ أثناء رفع الصورة: ' . $e->getMessage()]);
            }
        } else {
            // Keep existing image
            $validated['image'] = $about->image;
        }

        // Remove delete flags from validated array
        unset($validated['delete_experience_image']);
        unset($validated['delete_image']);

        $about->update($validated);

        return redirect()->route('abouts.index')->with('success', 'تم تحديث محتوى من نحن بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about = About::findOrFail($id);
        
        // Delete images if exist
        if ($about->experience_image) {
            Storage::disk('public')->delete($about->experience_image);
        }
        if ($about->image) {
            Storage::disk('public')->delete($about->image);
        }
        
        $about->delete();

        return redirect()->route('abouts.index')->with('success', 'تم حذف محتوى من نحن بنجاح');
    }
}

