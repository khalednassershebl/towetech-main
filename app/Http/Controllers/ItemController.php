<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Store a newly created item.
     */

    public function show()
    {
        // جلب كل المنتجات مع الفئة المرتبطة
        $items = Item::with('category')->get();



        // إعادة الـ view مع البيانات
        return view('admin.items.show', compact('items'));
    }



    public function store(Request $request)
    {
        // التحقق من البيانات المدخلة
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
            'name_en' => 'nullable|string|max:255',
            'active' => 'boolean',
            'order' => 'nullable|integer|min:0',

        ]);

        $validated['order'] = $validated['order'] ?? Item::max('order') + 1;

        $validated['active'] = $request->boolean('active');

        // رفع الصورة لو موجودة
        if ($request->hasFile('image')) {
            try {
                $path = $request->file('image')->store('items', 'public');
                $validated['image'] = $path;
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['image' => 'حدث خطأ أثناء رفع الصورة: ' . $e->getMessage()]);
            }
        }

        // إنشاء المنتج
        $item = Item::create($validated);

        // إعادة التوجيه إلى صفحة عرض المنتجات مع رسالة نجاح
        return redirect()->route('admin.items.show')->with('success', 'تم إضافة المنتج بنجاح');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.items.create', compact('categories'));
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();
        return view('admin.items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
            'name_en' => 'nullable|string|max:255',
            'active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $validated['order'] = $validated['order'] ?? $item->order;
        $validated['active'] = $request->boolean('active');

        if ($request->hasFile('image')) {
            try {
                if (!empty($item->image) && Storage::disk('public')->exists($item->image)) {
                    Storage::disk('public')->delete($item->image);
                }
                $path = $request->file('image')->store('items', 'public');
                $validated['image'] = $path;
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['image' => 'حدث خطأ أثناء رفع الصورة: ' . $e->getMessage()]);
            }
        }

        $item->update($validated);

        return redirect()->route('admin.items.show')->with('success', 'تم تحديث المنتج بنجاح');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        if (!empty($item->image) && Storage::disk('public')->exists($item->image)) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect()->route('admin.items.show')->with('success', 'تم حذف المنتج بنجاح');
    }


    public function view($slug)
    {
        $locale = session('locale', 'ar');
        app()->setLocale($locale);

        $category = Category::where('slug', $slug)->firstOrFail(); // هذا القسم المحدد

        $items = $category->items()
            ->whereNotNull('category_id')
            ->where('active', true)
            ->orderByRaw('CASE WHEN `order` IS NULL THEN 1 ELSE 0 END')
            ->orderBy('order', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        $pageTitle = $category->name;
        $name_en = $category->name_en;
        if ($locale == 'en' && $name_en) {
            $pageTitle = $name_en;
        }
        $pageImage = $category->image_url;

        return view('categories.show', compact('category', 'items', 'pageTitle', 'pageImage', 'locale'));
    }
}
