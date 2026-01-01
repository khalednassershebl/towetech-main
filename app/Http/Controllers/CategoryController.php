<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function adminIndex()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function edit(int $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'name_en' => 'nullable|string|max:255|unique:categories,name_en',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
        ]);

        // Create category
        $imagePath = null;
        if ($request->hasFile('image')) {
            try {
                $imagePath = $request->file('image')->store('categories', 'public');
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['image' => 'حدث خطأ أثناء رفع الصورة: ' . $e->getMessage()]);
            }
        }
        
        $category = Category::create([
            'name' => $validated['name'],
            'image' => $imagePath,
            'name_en' => $validated['name_en'] ?? null,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'تم إنشاء الفئة بنجاح');
    }

    public function update(Request $request, int $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'name_en' => 'nullable|string|max:255|unique:categories,name_en,' . $category->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
        ]);

        $data = [
            'name' => $validated['name'],
            'name_en' => $validated['name_en'] ?? null,
            'slug' => Str::slug($validated['name'], '-'),
        ];

        if ($request->hasFile('image')) {
            try {
                if (!empty($category->image) && Storage::disk('public')->exists($category->image)) {
                    Storage::disk('public')->delete($category->image);
                }
                $data['image'] = $request->file('image')->store('categories', 'public');
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['image' => 'حدث خطأ أثناء رفع الصورة: ' . $e->getMessage()]);
            }
        }

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'تم تحديث الفئة بنجاح');
    }

    public function destroy(int $id)
    {
        $category = Category::findOrFail($id);

        if (!empty($category->image) && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->back()->with('success', 'تم حذف الفئة بنجاح');
    }

    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $categories
        ], 200);
    }
}
