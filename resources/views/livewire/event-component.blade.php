<div>
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{ asset('assets/images/page-banner-2.jpg') }})">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="page-banner-cont">
                      <h2>Events</h2>
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Events</li>
                          </ol>
                      </nav>
                  </div>  <!-- page banner cont -->
              </div>
          </div> <!-- row -->
      </div> <!-- container -->
  </section>

  <!--====== PAGE BANNER PART ENDS ======-->

  <!--====== EVENTS PART START ======-->

  <section id="event-page" class="pt-90 pb-120 gray-bg">
      <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="courses-top-search">
                    <ul class="nav float-left" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid"
                                role="tab" aria-controls="courses-grid" aria-selected="true"><i
                                    class="fa fa-th-large"></i></a>
                        </li>
                        <li class="nav-item">
                            <a id="courses-list-tab" data-toggle="tab" href="#courses-list" role="tab"
                                aria-controls="courses-list" aria-selected="false"><i
                                    class="fa fa-th-list"></i></a>
                        </li>
                        <li class="nav-item">Showning {{ $events->count() }} 0f {{ $paginate }} Results
                        </li>
                    </ul> <!-- nav -->

                    <div class="courses-search float-right">
                        <form action="#">
                            <input type="text" placeholder="Search" wire:model="searchTerm">
                            <button type="button"><i class="fa fa-search"></i></button>
                        </form>
                    </div> <!-- courses search -->
                </div> <!-- courses top search -->
            </div>
        </div> <!-- row -->
        @if($events->count() > 0)
         <div class="row">
                  @foreach ($events as $event)
                      <div class="col-lg-6">
                          <div class="singel-event-list mt-30">
                              <div class="event-thum">
                                  <img height="150" src="/storage/events/{{ $event->image }}" alt="Event">
                              </div>
                              <div class="event-cont">
                                  <span><i class="fa fa-calendar"></i> {{ $event->start_date }}  to  {{ $event->end_date }}</span>
                                  <a href="{{ route('event.detail',['event_slug'=>$event->slug]) }}"><h4>{{ $event->title }}</h4></a>
                                  <span><i class="fa fa-clock-o"></i> {{ $event->time }}</span>
                                  <span><i class="fa fa-map-marker"></i> {{ $event->location }}</span>
                                  <p>{!! htmlspecialchars_decode(\Illuminate\Support\Str::limit($event->description, 100)) !!}</p>
                              </div>
                          </div>
                      </div>
                  @endforeach
         </div> <!-- row -->
         @else
         <h1 class="text-center text-black mt-10">No Events Found</h1>
    @endif
          <div class="row">
              <div class="col-lg-12">
                  <nav class="courses-pagination mt-50">
                      <ul class="pagination justify-content-center">
                          {{ $events->links('pagination::bootstrap-4') }}
                      </ul>
                  </nav>  <!-- courses pagination -->
              </div>
          </div>  <!-- row -->
      </div> <!-- container -->
  </section>

  <!--====== EVENTS PART ENDS ======-->
</div>
