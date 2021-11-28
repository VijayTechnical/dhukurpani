<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Event;
use App\Models\Level;
use App\Models\Course;
use App\Models\Gallary;
use App\Models\Teacher;
use App\Models\Category;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $blogs = Blog::all()->first();
        $categories = Category::all()->first();
        $events = Event::all()->first();
        $galleries = Gallary::all()->first();
        $teachers = Teacher::all()->first();
        $courses = Course::all()->first();
        $levels = Level::all()->first();

        return response()->view('sitemap.index', [
            'blogs' => $blogs,
            'categories' => $categories,
            'events' => $events,
            'galleries' => $galleries,
            'teachers' => $teachers,
            'levels' => $levels,
            'courses' => $courses,
        ])->header('Content-Type', 'text/xml');
    }

    public function sitemap()
    {
        return response()->view('sitemap.sitemap')->header('Content-Type', 'text/xml');
    }


    public function blogs()
    {
        $blogs = Blog::latest()->get();
        return response()->view('sitemap.blogs', [
            'blogs' => $blogs,
        ])->header('Content-Type', 'text/xml');
    }

    public function categories()
    {
        $categories = Category::latest()->get();
        return response()->view('sitemap.categories', [
            'categories' => $categories,
        ])->header('Content-Type', 'text/xml');
    }

    public function events()
    {
        $events = Event::latest()->get();
        return response()->view('sitemap.events', [
            'events' => $events,
        ])->header('Content-Type', 'text/xml');
    }

    public function galleries()
    {
        $galleries = Gallary::latest()->get();
        return response()->view('sitemap.galleries', [
            'galleries' => $galleries,
        ])->header('Content-Type', 'text/xml');
    }

    public function teachers()
    {
        $teachers = Teacher::latest()->get();
        return response()->view('sitemap.teachers', [
            'teachers' => $teachers,
        ])->header('Content-Type', 'text/xml');
    }


    public function courses()
    {
        $courses = Course::latest()->get();
        $levels = Level::latest()->get();
        return response()->view('sitemap.courses', [
            'courses' => $courses,
            'levels' => $levels,
        ])->header('Content-Type', 'text/xml');
    }
}
