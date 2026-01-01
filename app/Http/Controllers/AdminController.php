<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Slider;
use App\Models\Partner;
use App\Models\About;
use App\Models\HeroSlide;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\Setting;
use App\Models\Category;

class AdminController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }
    
    /**
     * Handle admin login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        throw ValidationException::withMessages([
            'email' => __('The provided credentials do not match our records.'),
        ]);
    }

    /**
     * Show the admin dashboard.
     */
    public function dashboard()
    {
        // Get counts for all sections
        $stats = [
            'sliders' => Slider::count(),
            'partners' => Partner::count(),
            'about' => About::count(),
            'hero_slides' => HeroSlide::count(),
            'projects' => 0, // Placeholder - update when model exists
            'services' => Service::count(),
            'testimonials' => Testimonial::count(),
            'blogs' => Blog::count(),
            'settings' => Setting::distinct('group')->count('group'), // Count distinct setting groups
            'categories' => Category::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    /**
     * Handle admin logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
