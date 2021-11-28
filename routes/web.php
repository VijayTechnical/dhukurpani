<?php

use App\Http\Livewire\BlogComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\EventComponent;
use App\Http\Livewire\VideoComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CourseComponent;
use App\Http\Livewire\NoticeComponent;
use App\Http\Livewire\PolicyComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\GalleryComponent;
use App\Http\Livewire\TeacherComponent;
use App\Http\Livewire\CalendarComponent;
use App\Http\Livewire\FacilityComponent;
use App\Http\Livewire\AdmissionComponent;
use App\Http\Livewire\PrincipalComponent;
use App\Http\Livewire\BlogDetailComponent;
use App\Http\Livewire\EventDetailComponent;
use App\Http\Livewire\CourseDetailComponent;
use App\Http\Livewire\NoticeDetailComponent;
use App\Http\Livewire\GalleryDetailComponent;
use App\Http\Livewire\TeacherDetailComponent;
use App\Http\Livewire\Admin\Blog\AdminBlogComponent;
use App\Http\Livewire\Admin\About\AdminAboutComponent;
use App\Http\Livewire\Admin\Brand\AdminBrandComponent;
use App\Http\Livewire\Admin\Event\AdminEventComponent;
use App\Http\Livewire\Admin\Level\AdminLevelComponent;
use App\Http\Livewire\Admin\Popup\AdminPopupComponent;
use App\Http\Livewire\Admin\Video\AdminVideoComponent;
use App\Http\Livewire\Admin\Blog\AdminAddBlogComponent;
use App\Http\Livewire\Admin\Blog\AdminEditBlogComponent;
use App\Http\Livewire\Admin\Course\AdminCourseComponent;
use App\Http\Livewire\Admin\Notice\AdminNoticeComponent;
use App\Http\Livewire\Admin\Policy\AdminPolicyComponent;
use App\Http\Livewire\Admin\Slider\AdminSliderComponent;
use App\Http\Livewire\Admin\Brand\AdminAddBrandComponent;
use App\Http\Livewire\Admin\Event\AdminAddEventComponent;
use App\Http\Livewire\Admin\Level\AdminAddLevelComponent;
use App\Http\Livewire\Admin\Video\AdminAddVideoComponent;
use App\Http\Livewire\Admin\Brand\AdminEditBrandComponent;
use App\Http\Livewire\Admin\Contact\AdminContactComponent;
use App\Http\Livewire\Admin\Event\AdminEditEventComponent;
use App\Http\Livewire\Admin\Gallery\AdminGalleryComponent;
use App\Http\Livewire\Admin\Level\AdminEditLevelComponent;
use App\Http\Livewire\Admin\Profile\AdminProfileComponent;
use App\Http\Livewire\Admin\Teacher\AdminTeacherComponent;
use App\Http\Livewire\Admin\Video\AdminEditVideoComponent;
use App\Http\Livewire\Admin\Course\AdminAddCourseComponent;
use App\Http\Livewire\Admin\Notice\AdminAddNoticeComponent;
use App\Http\Livewire\Admin\Profile\AdminPasswordComponent;
use App\Http\Livewire\Admin\Slider\AdminAddSliderComponent;
use App\Http\Livewire\Admin\Category\AdminCategoryComponent;
use App\Http\Livewire\Admin\Course\AdminEditCourseComponent;
use App\Http\Livewire\Admin\Facility\AdminFacilityComponent;
use App\Http\Livewire\Admin\Notice\AdminEditNoticeComponent;
use App\Http\Livewire\Admin\Slider\AdminEditSliderComponent;
use App\Http\Livewire\User\Dashboard\UserDashboardComponent;
use App\Http\Livewire\Admin\Gallery\AdminAddGalleryComponent;
use App\Http\Livewire\Admin\Teacher\AdminAddTeacherComponent;
use App\Http\Livewire\Admin\Admission\AdminAdmissionComponent;
use App\Http\Livewire\Admin\Dashboard\AdminDashboardComponent;
use App\Http\Livewire\Admin\Gallery\AdminEditGalleryComponent;
use App\Http\Livewire\Admin\Principal\AdminPrincipalComponent;
use App\Http\Livewire\Admin\Teacher\AdminEditTeacherComponent;
use App\Http\Livewire\Admin\Category\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\Facility\AdminAddFacilityComponent;
use App\Http\Livewire\Admin\Category\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\Contact\AdminContactDetailComponent;
use App\Http\Livewire\Admin\Facility\AdminEditFacilityComponent;
use App\Http\Livewire\Admin\Testimonial\AdminTestimonialComponent;
use App\Http\Livewire\Admin\Admission\AdminAdmissionDetailComponent;
use App\Http\Livewire\Admin\Testimonial\AdminTestimonialDetailComponent;
use App\Http\Livewire\Admin\User\AdminUserComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\FAQComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//Home Route
Route::get('/', HomeComponent::class)->name('home');

//About Route
Route::get('/about-us', AboutComponent::class)->name('about');

//Principal Message
Route::get('/principal-message', PrincipalComponent::class)->name('principal');

//Contact Route
Route::get('/contact-us', ContactComponent::class)->name('contact');

//Course Route
Route::get('/courses', CourseComponent::class)->name('course');
Route::get('/courses/{course_slug}', CourseDetailComponent::class)->name('course.detail');

//Teachers Route
Route::get('/teachers', TeacherComponent::class)->name('teacher');
Route::get('/teachers/{teacher_slug}', TeacherDetailComponent::class)->name('teacher.detail');

//Blog Route
Route::get('/blogs', BlogComponent::class)->name('blog');
Route::get('/blogs/{blog_slug}', BlogDetailComponent::class)->name('blog.detail');

//Event Route
Route::get('/events', EventComponent::class)->name('event');
Route::get('events/{event_slug}', EventDetailComponent::class)->name('event.detail');

//Image Gallery Route
Route::get('/galleries', GalleryComponent::class)->name('gallery');
Route::get('/galleries/{gallery_slug}', GalleryDetailComponent::class)->name('gallery.detail');

// Video Gallery Route
Route::get('/videos', VideoComponent::class)->name('video');

//Facility Route
Route::get('/facilities', FacilityComponent::class)->name('facility');

//Admission Route
Route::get('/admission/{admission_slug}', AdmissionComponent::class)->name('admission');

//Policy Route
Route::get('/privacy-policy', PolicyComponent::class)->name('policy');

//School Calendar Route
Route::get('/calendar', CalendarComponent::class)->name('calendar');

//FAQ Route
Route::get('/frequently-asked-questions', FAQComponent::class)->name('faq');

//Category Route
Route::get('/categories/{category_slug}', CategoryComponent::class)->name('category');


//SiteMap Routes
Route::get('/sitemap.xml', App\Http\Controllers\SitemapController::class . '@index');
Route::get('/sitemap.xml/sitemap', App\Http\Controllers\SitemapController::class . '@sitemap');
Route::get('/sitemap.xml/blogs', App\Http\Controllers\SitemapController::class . '@blogs');
Route::get('/sitemap.xml/categories', App\Http\Controllers\SitemapController::class . '@categories');
Route::get('/sitemap.xml/events', App\Http\Controllers\SitemapController::class . '@events');
Route::get('/sitemap.xml/galleries', App\Http\Controllers\SitemapController::class . '@galleries');
Route::get('/sitemap.xml/teachers', App\Http\Controllers\SitemapController::class . '@teachers');
Route::get('/sitemap.xml/courses', App\Http\Controllers\SitemapController::class . '@courses');




//For User
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //User Dashboard Route
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');


    //Route for Web Notification
    Route::post('/push', [App\Http\Controllers\PushController::class, 'store']);

    //Notice Route
    Route::get('/user/notices', NoticeComponent::class)->name('notice');
    Route::get('/user/notices/{notice_slug}', NoticeDetailComponent::class)->name('notice.detail');
});



//For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {

    //Admin Dashboard Route
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

    //Admin Profile Route
    Route::get('/admin/profile/{user_id}', AdminProfileComponent::class)->name('admin.profile');
    Route::get('/admin/profile/change-password/{user_id}', AdminPasswordComponent::class)->name('admin.profile.password');

    //Admin About route
    Route::get('/admin/about-us', AdminAboutComponent::class)->name('admin.about');

    //Admin Principal Component
    Route::get('/admin/principal', AdminPrincipalComponent::class)->name('admin.principal');

    //Admin User Component
    Route::get('/admin/users', AdminUserComponent::class)->name('admin.user');

    //Admin Slider route
    Route::get('/admin/slider', AdminSliderComponent::class)->name('admin.slider');
    Route::get('/admin/slider/add', AdminAddSliderComponent::class)->name('admin.slider.add');
    Route::get('/admin/slider/edit/{slider_id}', AdminEditSliderComponent::class)->name('admin.slider.edit');

    //Admin Teacher route
    Route::get('/admin/teacher', AdminTeacherComponent::class)->name('admin.teacher');
    Route::get('/admin/teacher/add', AdminAddTeacherComponent::class)->name('admin.teacher.add');
    Route::get('/admin/teacher/edit/{teacher_id}', AdminEditTeacherComponent::class)->name('admin.teacher.edit');

    //Admin Level route
    Route::get('/admin/level', AdminLevelComponent::class)->name('admin.level');
    Route::get('/admin/level/add', AdminAddLevelComponent::class)->name('admin.level.add');
    Route::get('/admin/level/edit/{level_id}', AdminEditLevelComponent::class)->name('admin.level.edit');

    //Admin Course route
    Route::get('/admin/course', AdminCourseComponent::class)->name('admin.course');
    Route::get('/admin/course/add', AdminAddCourseComponent::class)->name('admin.course.add');
    Route::get('/admin/course/edit/{course_id}', AdminEditCourseComponent::class)->name('admin.course.edit');


    //Admin Category route
    Route::get('/admin/blog/category', AdminCategoryComponent::class)->name('admin.category');
    Route::get('/admin/blog/category/add', AdminAddCategoryComponent::class)->name('admin.category.add');
    Route::get('/admin/blog/category/edit/{category_id}', AdminEditCategoryComponent::class)->name('admin.category.edit');

    //Admin Blog Route
    Route::get('/admin/blog/', AdminBlogComponent::class)->name('admin.blog');
    Route::get('/admin/blog/add', AdminAddBlogComponent::class)->name('admin.blog.add');
    Route::get('/admin/blog/edit/{blog_id}', AdminEditBlogComponent::class)->name('admin.blog.edit');

    //Admin Event route
    Route::get('/admin/event', AdminEventComponent::class)->name('admin.event');
    Route::get('/admin/event/add', AdminAddEventComponent::class)->name('admin.event.add');
    Route::get('/admin/event/edit/{event_id}', AdminEditEventComponent::class)->name('admin.event.edit');

    //Admin Gallery route
    Route::get('/admin/gallery', AdminGalleryComponent::class)->name('admin.gallery');
    Route::get('/admin/gallery/add', AdminAddGalleryComponent::class)->name('admin.gallery.add');
    Route::get('/admin/gallery/edit/{gallery_id}', AdminEditGalleryComponent::class)->name('admin.gallery.edit');

    //Admin Video route
    Route::get('/admin/video', AdminVideoComponent::class)->name('admin.video');
    Route::get('/admin/video/add', AdminAddVideoComponent::class)->name('admin.video.add');
    Route::get('/admin/video/edit/{video_id}', AdminEditVideoComponent::class)->name('admin.video.edit');

    //Admin Facility route
    Route::get('/admin/facility', AdminFacilityComponent::class)->name('admin.facility');
    Route::get('/admin/facility/add', AdminAddFacilityComponent::class)->name('admin.facility.add');
    Route::get('/admin/facility/edit/{facility_id}', AdminEditFacilityComponent::class)->name('admin.facility.edit');

    //Admin Notice route
    Route::get('/admin/notice', AdminNoticeComponent::class)->name('admin.notice');
    Route::get('/admin/notice/add', AdminAddNoticeComponent::class)->name('admin.notice.add');
    Route::get('/admin/notice/edit/{notice_id}', AdminEditNoticeComponent::class)->name('admin.notice.edit');

    //Admin Brand route
    Route::get('/admin/brand', AdminBrandComponent::class)->name('admin.brand');
    Route::get('/admin/brand/add', AdminAddBrandComponent::class)->name('admin.brand.add');
    Route::get('/admin/brand/edit/{brand_id}', AdminEditBrandComponent::class)->name('admin.brand.edit');

    //Admin Admission Route
    Route::get('/admin/admission', AdminAdmissionComponent::class)->name('admin.admission');
    Route::get('/admin/admission/{admission_id}', AdminAdmissionDetailComponent::class)->name('admin.admission.detail');

    //Admin Contact Route
    Route::get('/admin/contact', AdminContactComponent::class)->name('admin.contact');
    Route::get('/admin/contact/{contact_id}', AdminContactDetailComponent::class)->name('admin.contact.detail');

    //Admin Testimonial Route
    Route::get('/admin/testimonial', AdminTestimonialComponent::class)->name('admin.testimonial');
    Route::get('/admin/testimonial/{testimonial_id}', AdminTestimonialDetailComponent::class)->name('admin.testimonial.detail');

    //Admin Popup Route
    Route::get('/admin/popups', AdminPopupComponent::class)->name('admin.popup');

    //Admin Policy Route
    Route::get('/admin/policies', AdminPolicyComponent::class)->name('admin.policy');
});


