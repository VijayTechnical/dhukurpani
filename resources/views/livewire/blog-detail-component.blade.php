<div>
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8"
        style="background-image: url({{ asset('assets/images/page-banner-1.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>{{ $blog_title }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $blog_title }}</li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== BLOG PART START ======-->

    <section id="blog-singel" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if ($blog)
                        <div class="blog-details mt-30">
                            <div class="thum">
                                <img style="width: 100%; height:500px;"
                                    src="{{ asset('/storage/blogs') }}/{{ $blog->image }}"
                                    alt="{{ $blog->title }}">
                            </div>
                            <div class="cont">
                                <h3>{{ $blog->title }}</h3>
                                <ul>
                                    <li><a href="javascript:void(0);"><i
                                                class="fa fa-calendar"></i>{{ $blog->created_at->diffForHumans() }}</a>
                                    </li>
                                    <li><a href="javascript:void(0);"><i
                                                class="fa fa-user"></i>{{ $blog->author->name }}</a></li>
                                    <li><a href="javascript:void(0);"><i
                                                class="fa fa-tags"></i>{{ $blog->category->name }}</a></li>
                                </ul>
                                <p>{{ $blog->subtitle }}
                                    <br>
                                    <br>
                                    {!! htmlspecialchars_decode($blog->description) !!}
                                    <br>
                                </p>
                                <style>
                                    #social-links ul {
                                        padding-left: 0;
                                    }

                                    #social-links ul li {
                                        display: inline-block;
                                    }

                                    #social-links ul li a {
                                        padding: 4px;
                                        border: 1px solid #ccc;
                                        border-radius: 5px;
                                        margin: 1px;
                                        font-size: 25px;
                                        background-color: #fff;
                                    }

                                    #social-links .fa-facebook {
                                        color: #0d6efd;
                                    }

                                    #social-links .fa-twitter {
                                        color: deepskyblue;
                                    }

                                    #social-links .fa-linkedin {
                                        color: #0e76a8;
                                    }

                                    #social-links .fa-whatsapp {
                                        color: #25D366
                                    }

                                    #social-links .fa-reddit {
                                        color: #FF4500;
                                        ;
                                    }

                                    #social-links .fa-telegram {
                                        color: #0088cc;
                                    }

                                </style>
                                <ul class="share">
                                    <li class="title">Share :</li>
                                    {!! Share::page(url('/blogs/' . $blog->slug))->facebook()->twitter()->whatsapp()->reddit()->linkedin()->telegram() !!}
                                </ul>
                                {{-- <div class="blog-comment pt-45">
                                <div class="title pb-15">
                                    <h3>Comment (3)</h3>
                                </div> <!-- title -->
                                <ul>
                                    <li>
                                        <div class="comment">
                                            <div class="comment-author">
                                                <div class="author-thum">
                                                    <img src="images/review/r-1.jpg" alt="Reviews">
                                                </div>
                                                <div class="comment-name">
                                                    <h6>Bobby Aktar</h6>
                                                    <span>April 03, 2019</span>
                                                </div>
                                            </div>
                                            <div class="comment-description pt-20">
                                                <p>There are many variations of passages of Lorem Ipsum available, but
                                                    the majority have suffered alteration in some form, by injected
                                                    humour, or randomised words which.</p>
                                            </div>
                                            <div class="comment-replay">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div> <!-- comment -->
                                        <ul class="replay">
                                            <li>
                                                <div class="comment">
                                                    <div class="comment-author">
                                                        <div class="author-thum">
                                                            <img src="images/review/r-2.jpg" alt="Reviews">
                                                        </div>
                                                        <div class="comment-name">
                                                            <h6>Humayun Ahmed</h6>
                                                            <span>April 03, 2019</span>
                                                        </div>
                                                    </div>
                                                    <div class="comment-description pt-20">
                                                        <p>There are many variations of passages of Lorem Ipsum
                                                            available, but the majority have suffered alteration in some
                                                            form.</p>
                                                    </div>
                                                    <div class="comment-replay">
                                                        <a href="#">Reply</a>
                                                    </div>
                                                </div> <!-- comment -->
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="comment">
                                            <div class="comment-author">
                                                <div class="author-thum">
                                                    <img src="images/review/r-3.jpg" alt="Reviews">
                                                </div>
                                                <div class="comment-name">
                                                    <h6>Bobby Aktar</h6>
                                                    <span>April 03, 2019</span>
                                                </div>
                                            </div>
                                            <div class="comment-description pt-20">
                                                <p>There are many variations of passages of Lorem Ipsum available, but
                                                    the majority have suffered alteration in some form, by injected
                                                    humour, or randomised words which.</p>
                                            </div>
                                            <div class="comment-replay">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div> <!-- comment -->
                                    </li>
                                </ul>
                                <div class="title pt-45 pb-25">
                                    <h3>Leave a comment</h3>
                                </div> <!-- title -->
                                <div class="comment-form">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-singel">
                                                    <input type="text" placeholder="Name">
                                                </div> <!-- form singel -->
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-singel">
                                                    <input type="email" placeholder="email">
                                                </div> <!-- form singel -->
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-singel">
                                                    <textarea placeholder="Comment"></textarea>
                                                </div> <!-- form singel -->
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-singel">
                                                    <button class="main-btn">Submit</button>
                                                </div> <!-- form singel -->
                                            </div>
                                        </div> <!-- row -->
                                    </form>
                                </div> <!-- comment-form -->
                            </div> <!-- blog comment --> --}}
                            </div> <!-- cont -->
                        </div> <!-- blog details -->
                    @else
                        <h1 class="text-center text-black">No Blog Detail</h1>
                    @endif
                </div>
                <div class="col-lg-4">
                    <div class="saidbar">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="saidbar-search mt-30">
                                    <form action="#">
                                        <input type="text" placeholder="Search">
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
                                    <h4>Related Blogs</h4>
                                    <ul>
                                        @if ($related_blogs->count() > 0)
                                            @foreach ($related_blogs as $key => $related_blog)
                                                <li>
                                                    <a
                                                        href="{{ route('blog.detail', ['blog_slug' => $related_blog->slug]) }}">
                                                        <div class="singel-post">
                                                            <div class="thum">
                                                                <img height="70"
                                                                    src="{{ asset('/storage/blogs') }}/{{ $related_blog->image }}"
                                                                    alt="{{ $related_blog->title }}">
                                                            </div>
                                                            <div class="cont">
                                                                <h6>{{ $related_blog->title }}</h6>
                                                                <span>{{ $related_blog->created_at->diffForHumans() }}</span>
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
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/share.js') }}"></script>
@endpush
