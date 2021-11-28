<div>
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8"
        style="background-image: url({{ asset('assets/images/page-banner-1.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Blog</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== BLOG PART START ======-->

    <section id="blog-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if ($blogs->count() > 0)
                        @foreach ($blogs as $key => $blog)
                            <div class="singel-blog mt-30">
                                <div class="blog-thum">
                                    <img style="width: 100%; height:500px;"
                                        src="{{ asset('/storage/blogs') }}/{{ $blog->image }}"
                                        alt="{{ $blog->title }}">
                                </div>
                                <div class="blog-cont">
                                    <a href="{{ route('blog.detail', ['blog_slug' => $blog->slug]) }}">
                                        <h3>{{ $blog->title }}</h3>
                                    </a>
                                    <ul>
                                        <li><a href="javascript:void(0);"><i
                                                    class="fa fa-calendar"></i>{{ $blog->created_at->diffForHumans() }}</a>
                                        </li>
                                        <li><a href="javascript:void(0);"><i
                                                    class="fa fa-user"></i>{{ $blog->author->name }}</a></li>
                                        <li><a href="javascript:void(0);"><i
                                                    class="fa fa-tags"></i>{{ $blog->category->name }}</a></li>
                                    </ul>
                                    <p>{{ $blog->subtitle }}</p>
                                </div>
                            </div> <!-- singel blog -->
                        @endforeach
                        <nav class="courses-pagination mt-50">
                            <ul class="pagination justify-content-lg-end justify-content-center">
                                {{ $blogs->links('pagination::bootstrap-4') }}
                            </ul>
                        </nav> <!-- courses pagination -->
                    @else
                        <p class="text-black mt-10">No blogs found</p>
                    @endif
                </div>
                <div class="col-lg-4">
                    <div class="saidbar">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="saidbar-search mt-30">
                                    <form action="#">
                                        <input type="text" placeholder="Search" wire:model="searchTerm">
                                        <button type="button"><i class="fa fa-search"></i></button>
                                    </form>
                                </div> <!-- saidbar search -->
                                <div class="categories mt-30">
                                    <h4>Categories</h4>
                                    @if ($categories->count() > 0)
                                        <ul>
                                            @foreach ($categories as $key => $category)
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <a
                                                                href="{{ route('category', ['category_slug' => $category->slug]) }}">{{ $category->name }}
                                                            </a>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            @if ($category->blogs->count() > 0)<span>({{ $category->blogs->count() }})</span> @endif
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No categories found</p>
                                    @endif
                                </div>
                            </div> <!-- categories -->
                            <div class="col-lg-12 col-md-6">
                                <div class="saidbar-post mt-30">
                                    <h4>Recent Blogs</h4>
                                    <ul>
                                        @if ($recent_blogs->count() > 0)
                                            @foreach ($recent_blogs as $key => $recent_blog)
                                                <li>
                                                    <a
                                                        href="{{ route('blog.detail', ['blog_slug' => $recent_blog->slug]) }}">
                                                        <div class="singel-post">
                                                            <div class="thum">
                                                                <img height="70"
                                                                    src="{{ asset('/storage/blogs') }}/{{ $recent_blog->image }}"
                                                                    alt="{{ $recent_blog->title }}">
                                                            </div>
                                                            <div class="cont">
                                                                <h6>{{ $recent_blog->title }}</h6>
                                                                <span>{{ $recent_blog->created_at->diffForHumans() }}</span>
                                                            </div>
                                                        </div> <!-- singel post -->
                                                    </a>
                                                </li>
                                            @endforeach
                                        @else
                                            <p>No releted blogs found</p>
                                        @endif
                                    </ul>
                                </div> <!-- saidbar post -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- saidbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== BLOG PART ENDS ======-->
</div>
