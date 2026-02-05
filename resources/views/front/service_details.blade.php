@extends('front.layout.main')
@section('title', 'Service Details')
@section('content')
    <section class="page-title-layout3 page-title-light bg-parallax bg-overlay text-center">
        <div class="bg-img"><img src="{{ url('front/assets/images/page-titles/12.webp') }}" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="pagetitle-heading">{{ $service->title ?? '' }}</h1>
                    <nav>
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Service Details</li>
                        </ol>
                    </nav>
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

    <section class="pb-80">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <aside class="sidebar has-marign-right sticky-top mb-30">
                        <div class="widget widget-categories">
                            <h5 class="widget-title">Services</h5>
                            <div class="widget-content">
                                @if(!empty($otherservice))
                                    <ul class="list-unstyled mb-0">
                                        @foreach($otherservice as $s)
                                            <li><a href="{{ route('service_details', $s->id) }}"><span>{{ $s->title }}</span><i class="icon-arrow-up-right"></i></a></li>
                                        @endforeach
                                    </ul><!-- /.list-unstyled -->
                                @endif
                            </div><!-- /.widget-content -->
                        </div><!-- /.widget-categories -->
                    </aside><!-- /.sidebar -->
                </div><!-- /.col-lg-4 -->
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="text-block mb-50">
                        <h5 class="text-block-title">{{ $service->title ?? '' }}</h5>
                    </div><!-- /.text-block -->

                    <div class="video-banner-layout03 mb-50">
                        @if (!empty($service->image))
                            <img src="{{ asset('services/' . $service->image) }}" alt="banner">
                        @endif
                    </div><!-- /.video-banner -->

                    <div class="text-block mb-40">
                        <h5 class="text-block-title">Service Description:</h5>
                        <p class="text-block-desc mb-20">
                            {!! $service->details ?? '' !!}
                        </p>
                    </div>

                    @if (!empty($service->sub_image))
                        <img src="{{ asset('services/' . $service->sub_image) }}" alt="chart" class="mb-50">
                    @endif
                    
                    <div class="text-block mb-50">
                        <h5 class="text-block-title">Key Features</h5>
                        <p class="text-block-desc mb-20">
                            {!! $service->key_features ?? '' !!}
                        </p>
                       
                    </div><!-- /.text-block -->
                </div><!-- /.col-lg-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

       <section class="clients border-top pt-50 pb-50">
      @if(!empty($partnerLogos))
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <div class="swiper"
              data-swiper='{"slidesPerView":2,"spaceBetween":20,"autoplay":{"delay":"6000"}, "loop":true,"breakpoints":{"400":{"slidesPerView":3},"550":{"slidesPerView":4}, "992":{"slidesPerView":5},"1200":{"slidesPerView":6}} }'>
              <div class="swiper-wrapper">
                @foreach ($partnerLogos as $PLogo)
                <div class="swiper-slide client">
                  <img src="{{ asset('partner_logos/' . $PLogo->logo) }}" alt="client" loading="lazy">
                </div><!-- /.client -->
                @endforeach
              </div><!-- /.swiper-rapper -->
            </div><!-- /.swiper -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
      @endif
    </section>
@endsection
