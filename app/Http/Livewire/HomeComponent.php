<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\About;
use App\Models\Brand;
use App\Models\Event;
use App\Models\Popup;
use App\Models\Video;
use App\Models\Course;
use App\Models\Notice;
use App\Models\Slider;
use Livewire\Component;
use App\Models\Facility;
use App\Models\Principal;
use App\Models\Testimonial;

class HomeComponent extends Component
{

    public function render()
    {
        $todaysDateInGregorian = Carbon::now();
        $currentDateInNepal = $todaysDateInGregorian->addYears(56)->addMonths(8)->addDays(15);
        $current_year = Carbon::createFromFormat('Y-m-d H:i:s', $currentDateInNepal)->year;
        $about = About::find(1);
        $courses = Course::orderBy('created_at', 'DESC')->limit(10)->get();
        $sliders = Slider::orderBy('created_at', 'DESC')->limit(3)->get();
        $startDate = Carbon::today();
        $endDate = Carbon::today()->addDays(30);
        $events = Event::whereBetween('start_date', [$startDate, $endDate])->limit(3)->get();
        $blogs = Blog::orderBy('created_at', 'DESC')->limit(4)->get();
        $videos = Video::orderBy('created_at', 'DESC')->limit(1)->get();
        $facilities = Facility::orderBy('created_at', 'DESC')->limit(3)->get();
        $testimonials = Testimonial::where('status', 'active')->orderBy('created_at', 'DESC')->limit(10)->get();
        $popup = Popup::find(1);
        $brands = Brand::orderBy('created_at', 'DESC')->get();
        $notices = Notice::orderBy('created_at', 'DESC')->limit(10)->get();
        $principal = Principal::find(1);
        return view('livewire.home-component', ['about' => $about, 'sliders' => $sliders, 'courses' => $courses, 'events' => $events, 'blogs' => $blogs, 'principal' => $principal, 'videos' => $videos, 'facilities' => $facilities, 'testimonials' => $testimonials, 'popup' => $popup, 'brands' => $brands, 'notices' => $notices,'current_year'=>$current_year])->layout('layouts.base');
    }
}
