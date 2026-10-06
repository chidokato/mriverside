<!DOCTYPE html>
<html lang="{{ $locale }}">
<head>
<base href="{{ asset('frontend') }}/">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>{{ $websiteSettings->seo_title ?: $websiteSettings->title }}</title>
<meta name="generator" content="Bootply" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
@include('partials.website-meta', ['seoPageTitle' => $websiteSettings->seo_title ?: $websiteSettings->title])

<!------------------- CSS ------------------->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/swiper-bundle.min.css" rel="stylesheet">
<link href="css/fonts.css" rel="stylesheet">
<link href="css/common.css" rel="stylesheet">
<link href="css/index.css?v={{ filemtime(base_path('frontend/css/index.css')) }}" rel="stylesheet">
<link href="css/booking-popup.css?v={{ filemtime(base_path('frontend/css/booking-popup.css')) }}" rel="stylesheet">

<!------------------- FONT ------------------->
{!! $websiteSettings->head_code !!}
</head>

<body>

<!------------------- NAVIGATOR ------------------->
<header class="elite-site-header fix-top">
	<nav class="elite-site-nav" aria-label="Điều hướng chính">
		<div class="container elite-nav-content">
			@php
				$totalMenus = $headerMenus->count();
				$leftCount = ceil($totalMenus / 2);
			@endphp
			<div class="elite-nav-left">
				@foreach ($headerMenus->take($leftCount) as $menu)<a href="{{ $menu->url }}">{{ $menu->label }}</a>@endforeach
			</div>
			<a class="elite-nav-logo" href="{{ \App\Support\LocalizedUrl::route('home', ['locale' => $locale]) }}" aria-label="{{ $websiteSettings->title }}">
				<img class="elite-nav-logo-white" src="{{ asset($websiteSettings->white_logo_path ?: 'frontend/img/logo-trang.png') }}" alt="{{ $websiteSettings->title }}">
				<img class="elite-nav-logo-color" src="{{ asset($websiteSettings->logo_path ?: 'frontend/img/logo.png') }}" alt="{{ $websiteSettings->title }}">
			</a>
			<div class="elite-nav-right">
				@foreach ($headerMenus->slice($leftCount) as $menu)
					@if($loop->last)
						<a class="elite-nav-cta" href="#" data-open-booking aria-haspopup="dialog" aria-controls="booking-popup">{{ $menu->label }}</a>
					@else
						<a href="{{ $menu->url }}">{{ $menu->label }}</a>
					@endif
				@endforeach
			</div>
		</div>
	</nav>
</header>
<!------------------- END NAVIGATOR ------------------->

<!------------------- HERO ------------------->
<section class="sec-hero">
	<div class="hero-slider">
		<div class="swiper">
			<div class="swiper-wrapper">
				@forelse ($heroSliders as $slider)
					@php($hasHeroContent = filled($slider->title) || filled($slider->description) || filled($slider->button_label))
					<div class="swiper-slide {{ $hasHeroContent ? 'hero-slide-with-content' : '' }}">
						<picture class="w-100 thumb hero-responsive-image">
                            @if($slider->mobile_image_path)
                                <source media="(max-width: 767px)" srcset="{{ asset($slider->mobile_image_path) }}">
                            @endif
                            <img src="{{ asset($slider->image_path) }}" alt="{{ $slider->title }}" @if($loop->first) fetchpriority="high" @endif>
                        </picture>
						@if($hasHeroContent)
						<div class="hero-content">
							<div class="hero-text">
								@if(filled($slider->title))<h1>{{ $slider->title }}</h1>@endif
								@if ($slider->description)<p>{{ $slider->description }}</p>@endif
								@if ($slider->button_label)<button type="button" class="hero-consult-button d-inline-block text-decoration-none" data-open-booking aria-haspopup="dialog" aria-controls="booking-popup">{{ $slider->button_label }}</button>@endif
							</div>
						</div>
						@endif
					</div>
				@empty
					
				@endforelse
			</div>
			<div class="swiper-navigator">
				<div class="swiper-pagination"></div>
				<div class="swiper-navigator-btn">
					<div class="swiper-button-prev"><i class="icon-prev-thin"></i></div>
					<div class="swiper-button-next"><i class="icon-next-thin"></i></div>
				</div>
			</div>
		</div>
	</div>
	
</section>

@if($overviewSection)
<!------------------- TỔNG QUAN DỰ ÁN ------------------->
<section class="sec-overview" id="tong-quan" style="padding: 60px 0; background-color: #fffaf3;">
	<div class="container" style="max-width: var(--ebc-container-width);">
		<article class="row g-4 align-items-stretch venue-layout">
			<div class="col-lg-5">
				<div class="venue-info h-100 d-flex flex-column justify-content-center">
					<h3  style="color: var(--main-color); border-bottom-color: var(--sub-color); margin-bottom: 0px;">{{ $overviewSection->title }}</h3>
                    @if($overviewSection->sub_title)
                    <h4 style="color: var(--sub-color); font-size: 18px; margin-bottom: 20px; font-weight: bold; text-transform: uppercase;">{{ $overviewSection->sub_title }}</h4>
                    @endif
					<div class="venue-content overview-content">
						{!! $overviewSection->content !!}
					</div>
				</div>
			</div>
			<div class="col-lg-7 d-flex flex-column">
				<div class="venue-slider flex-grow-1" style="min-height: 300px;">
					<div class="swiper">
						<div class="swiper-wrapper">
                            @if($overviewSection->images->isNotEmpty())
                                @foreach($overviewSection->images as $image)
							        <div class="swiper-slide"><span class="venue-media" style="background-image:url('{{ asset($image->path) }}')"></span></div>
                                @endforeach
                            @elseif($overviewSection->image_path)
                                <div class="swiper-slide"><span class="venue-media" style="background-image:url('{{ asset($overviewSection->image_path) }}')"></span></div>
                            @else
                                <div class="swiper-slide"><span class="venue-media" style="background-image:url('{{ asset('frontend/images/capital.jpg') }}')"></span></div>
                            @endif
						</div>
					</div>
					<button class="swiper-button-prev" type="button" aria-label="Ảnh trước"><i class="icon-prev-thin"></i></button>
					<button class="swiper-button-next" type="button" aria-label="Ảnh tiếp theo"><i class="icon-next-thin"></i></button>
				</div>
                <div style="margin-top: 24px; flex-shrink: 0; display: flex; justify-content: center;">
                    <button type="button" class="d-inline-flex justify-content-center align-items-center text-decoration-none" data-open-booking aria-haspopup="dialog" aria-controls="booking-popup" style="padding: 14px 42px; border-radius: 8px; background: linear-gradient(135deg, var(--main-color), #8b1528); color: #fff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 4px 15px rgba(102,13,27,0.3); border: none; gap: 8px; transition: all 0.3s ease;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/><path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/></svg>
                        {{ $overviewSection->link_label ?: 'TẢI BROCHURE DỰ ÁN' }}
                    </button>
                </div>
			</div>
		</article>
	</div>
</section>
@endif

@if($locationSection)
<!------------------- VỊ TRÍ DỰ ÁN ------------------->
<section class="sec-location" id="vi-tri" style="padding: 60px 0; background-color: #ffffff;">
	<div class="container" style="max-width: var(--ebc-container-width);">
		<style>
@media (min-width: 992px) {
    .vi-tri-text-col { position: relative; }
    .vi-tri-text-wrapper { position: absolute; top: 0; left: 12px; right: 12px; bottom: 0; overflow-y: auto; }
}
@media (max-width: 991px) {
    .vi-tri-text-wrapper { max-height: 400px; overflow-y: auto; }
}
.vi-tri-text-wrapper::-webkit-scrollbar { width: 6px; }
.vi-tri-text-wrapper::-webkit-scrollbar-track { background: transparent; }
.vi-tri-text-wrapper::-webkit-scrollbar-thumb { background: rgba(102, 13, 27, 0.3); border-radius: 4px; }
.vi-tri-text-wrapper::-webkit-scrollbar-thumb:hover { background: rgba(102, 13, 27, 0.6); }
</style>
<article class="row g-4 venue-layout align-items-stretch">
			<div class="col-12">
				<div class="venue-info text-center">
					<h3 style="color: var(--main-color); border-bottom: none; margin-bottom: 8px;">{{ $locationSection->title }}</h3>
                    @if($locationSection->sub_title)
                    <h4 style="color: var(--sub-color); font-size: 18px; margin-bottom: 20px; font-weight: bold; text-transform: uppercase;">{{ $locationSection->sub_title }}</h4>
                    @endif
					<div class="venue-content overview-content mx-auto" >
						{!! $locationSection->content !!}
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="venue-slider w-100" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
					<div class="swiper">
						<div class="swiper-wrapper">
                            @if($locationSection->images->isNotEmpty())
                                @foreach($locationSection->images as $image)
							        <div class="swiper-slide"><img src="{{ asset($image->path) }}" alt="" style="width: 100%; height: auto; display: block;"></div>
                                @endforeach
                            @elseif($locationSection->image_path)
                                <div class="swiper-slide"><img src="{{ asset($locationSection->image_path) }}" alt="" style="width: 100%; height: auto; display: block;"></div>
                            @endif
						</div>
					</div>
					<button class="swiper-button-prev" type="button" aria-label="Ảnh trước"><i class="icon-prev-thin"></i></button>
					<button class="swiper-button-next" type="button" aria-label="Ảnh tiếp theo"><i class="icon-next-thin"></i></button>
				</div>
			</div>
			
			<div class="col-lg-4 vi-tri-text-col">
                <div class="location-legend-container vi-tri-text-wrapper" style="padding: 24px; background: #fffaf3; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                    @if($locationSection->children->isNotEmpty())
                        @foreach($locationSection->children as $child)
                        <div class="legend-item" style="margin-bottom: 20px;">
                            <h4 style="color: var(--main-color); font-weight: bold; font-size: 18px; border-bottom: 2px solid #e2bd7a; padding-bottom: 6px; margin-bottom: 12px; display: inline-block;">{{ $child->title }}</h4>
                            <div class="legend-content overview-content" style="color: #444; font-size: 15px;">
                                {!! $child->content !!}
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p style="text-align: center; color: #888;">Chưa có dữ liệu khoảng cách.</p>
                    @endif
                </div>
            </div>
		</article>
	</div>
</section>
@endif

@if($potentialSection)
<!------------------- TIỀM NĂNG DỰ ÁN ------------------->
<section class="sec-ebc-benefits" id="tiem-nang">
	<div class="ebc-benefits-frame" style="background-image: linear-gradient(rgba(51, 6, 13, 0.75), rgba(0, 0, 0, 0.8)), url('{{ asset($potentialSection?->images->first()?->path ?: ($potentialSection?->image_path ?: 'frontend/images/cover-contact.jpg')) }}'); display: flex; flex-direction: column;">
		<div class="container" style="max-width: var(--ebc-container-width); flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
			<div class="ebc-event-copy text-center" style="margin: 0 auto; max-width: 800px; padding-left: 0; min-height: auto; padding-top: 40px; margin-bottom: 20px;">
				<h3  style="color: #fff; font-size: clamp(40px, 4vw, 45px); margin-bottom: 8px;">{{ $potentialSection->title }}</h3>
                @if($potentialSection->sub_title)
                <h4 style="color: #fff; font-size: 24px; margin-bottom: 20px; font-weight: bold; text-transform: uppercase;">{{ $potentialSection->sub_title }}</h4>
                @endif
				@if($potentialSection?->content)
					<div class="ebc-event-rich-content mx-auto" style="color: #fff; text-align: center;">{!! $potentialSection->content !!}</div>
				@endif
			</div>
			<div class="ebc-benefit-slider" style="margin-bottom: -20px;">
				<div class="swiper" style="padding-bottom: 20px;">
					<div class="swiper-wrapper">
						@if($potentialSection?->children->isNotEmpty())
							@foreach($potentialSection->children as $benefit)
								<div class="swiper-slide">
									<article class="ebc-benefit-card">
										@if($benefit->icon_path)<img class="ebc-benefit-icon" src="{{ asset($benefit->icon_path) }}" alt="">@endif
										<h2 >{{ $benefit->title }}</h2>
										<span class="ebc-card-mark" aria-hidden="true"></span>
										<div class="ebc-benefit-card-content">{!! $benefit->content !!}</div>
									</article>
								</div>
							@endforeach
						@endif
					</div>
					<div class="swiper-pagination"></div>
				</div>
				<button class="swiper-button-prev" type="button" aria-label="Thẻ trước"><i class="icon-prev-thin"></i></button>
				<button class="swiper-button-next" type="button" aria-label="Thẻ tiếp theo"><i class="icon-next-thin"></i></button>
			</div>
		</div>
	</div>
</section>
@endif

@if($amenitiesSection)
<!------------------- TIỆN ÍCH DỰ ÁN ------------------->
<section class="sec-service-experience" id="tien-ich" style="padding: 60px 0; background-color: #fffaf3;">
	<div class="container" style="max-width: var(--ebc-container-width);">
		<div class="service-experience-heading text-center" style="margin-bottom: 40px;">
			<h2  style="color: var(--main-color); margin-bottom: 12px;">{{ $amenitiesSection->title }}</h2>
			@if($amenitiesSection->sub_title)
			<h3 style="color: var(--sub-color, #a87b4f); font-size: 20px; font-weight: bold; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1px;">{{ $amenitiesSection->sub_title }}</h3>
			@endif
			<div class="service-description mx-auto" style="max-width: 900px;">{!! $amenitiesSection->content !!}</div>
		</div>
		<div class="event-slider swiper" style="padding: 20px 0;">
			<div class="swiper-wrapper">
				@foreach($amenitiesSection->children as $service)
					@php($serviceImage = $service->images->first()?->path ?: $service->image_path)
					<div class="swiper-slide">
                        <article class="event-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); height: 100%; display: flex; flex-direction: column; padding: 0;">
						    <div class="event-card-image {{ $serviceImage ? '' : 'event-card-image--empty' }}" @if($serviceImage) style="background-image:url('{{ asset($serviceImage) }}'); height: 250px; background-size: cover; background-position: center; border-radius: 12px 12px 0 0; margin: 0;" @endif></div>
                            <div style="padding: 24px; flex: 1;">
						        <h3 style="color: var(--main-color); font-size: 20px; font-weight: bold; margin-bottom: 8px; text-transform: uppercase;">{{ $service->title }}</h3>
                                @if($service->sub_title)
                                <h4 style="color: var(--sub-color, #a87b4f); font-size: 16px; font-weight: bold; margin-bottom: 12px;">{{ $service->sub_title }}</h4>
                                @endif
						        <div class="event-card-content" style="color: #555; font-size: 15px;">{!! $service->content !!}</div>
                            </div>
					    </article>
                    </div>
				@endforeach
			</div>
			<button class="swiper-button-prev" type="button" aria-label="Tiện ích trước"></button>
			<button class="swiper-button-next" type="button" aria-label="Tiện ích tiếp theo"></button>
		</div>
	</div>
</section>
@endif






@if($amenitiesSection)

@endif

@if($eliteClubSection)
<!------------------- ELITE CLUB FROM DATABASE ------------------->
@php($eliteClubImage = $eliteClubSection->images->first()?->path ?: $eliteClubSection->image_path)
<section id="clbhoivien" class="sec-elite-club" @if($eliteClubImage) style="--elite-club-background:url('{{ asset($eliteClubImage) }}')" @endif>
	<div class="container">
		<div class="elite-club-content">
			<h2 >{{ $eliteClubSection->title }}</h2>
			@if($eliteClubSection->sub_title)<span>{{ $eliteClubSection->sub_title }}</span>@endif
			<div class="elite-club-description">{!! $eliteClubSection->content !!}</div>
			@if($eliteClubSection->link_url && $eliteClubSection->link_label)<a class="elite-club-cta" href="{{ $eliteClubSection->link_url }}">{{ $eliteClubSection->link_label }}</a>@endif
		</div>
	</div>
</section>
@endif
@if($floorPlanSection)
<section class="sec-floor-plan" id="matbang" style="padding: 80px 0; background-color: #fcfaf8;">
    <div class="container" style="max-width: var(--ebc-container-width);">
        <div class="floor-plan-heading text-center mx-auto" style="max-width: 900px; margin-bottom: 40px;">
            <h2 style="color: var(--main-color); font-size: clamp(28px, 4vw, 36px); font-weight: bold; margin-bottom: 20px; text-transform: uppercase;">{{ $floorPlanSection->title }}</h2>
            <div class="overview-content" style="font-size: 16px; color: #555; line-height: 1.6;">
                {!! $floorPlanSection->content !!}
            </div>
        </div>

        <div class="floor-plan-image mx-auto" style="max-width: 1100px; background: #fff; border-radius: 16px; padding: 10px; box-shadow: 0 15px 40px rgba(0,0,0,0.06);">
            @php($matBangImg = $floorPlanSection->images->first()?->path ?: $floorPlanSection->image_path)
            @if($matBangImg)
                <img src="{{ asset($matBangImg) }}" alt="{{ $floorPlanSection->title }}" style="width: 100%; height: auto; border-radius: 10px; display: block;">
            @else
                <div style="width: 100%; aspect-ratio: 16/9; background: linear-gradient(135deg, #fdfbf8, #f4e8d3); border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; border: 2px dashed #e2bd7a;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="var(--main-color)" viewBox="0 0 16 16" style="opacity: 0.4; margin-bottom: 16px;">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>
                    <span style="color: var(--main-color); font-weight: bold; opacity: 0.6; font-size: 18px;">Ảnh mặt bằng (vui lòng upload trong Quản trị)</span>
                </div>
            @endif
        </div>
    </div>
</section>
@endif
@if($apartmentSection)
<section class="sec-apartments" id="canho" style="padding: 80px 0; background-color: #ffffff;">
    <style>
    .apt-card { background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.06); transition: all 0.3s ease; border: 1px solid #f0f0f0; }
    .apt-card:hover { transform: translateY(-5px); box-shadow: 0 15px 35px rgba(102,13,27,0.1); border-color: #e2bd7a; }
    </style>
    <div class="container" style="max-width: var(--ebc-container-width);">
        <div class="apartments-heading text-center mx-auto" style="max-width: 900px; margin-bottom: 50px;">
            <h2 style="color: var(--main-color); font-size: clamp(28px, 4vw, 36px); font-weight: bold; margin-bottom: 20px; text-transform: uppercase;">{{ $apartmentSection->title }}</h2>
            <div class="overview-content" style="font-size: 16px; color: #555; line-height: 1.6;">
                {!! $apartmentSection->content !!}
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($apartmentSection->children as $apt)
            <div class="col-lg-4 col-md-6">
                <article class="apt-card h-100 d-flex flex-column">
                    @php($img = $apt->images->first()?->path ?: $apt->image_path)
                    @if($img)
                        <img src="{{ asset($img) }}" alt="{{ $apt->title }}" style="width: 100%; height: auto; display: block;">
                    @else
                        <div style="aspect-ratio: 4/3; background: #f8f9fa; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="var(--main-color)" viewBox="0 0 16 16" style="opacity: 0.3; margin-bottom: 12px;">
                                <path d="M14 14V4.5L8 0 2 4.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 1 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4.5h2A1.5 1.5 0 0 1 6.5 3h3z"/>
                            </svg>
                            <span style="color: var(--main-color); opacity: 0.6; font-size: 14px;">Chưa cập nhật ảnh</span>
                        </div>
                    @endif
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


@if($salesPolicySection)
<section class="sec-sales-policy" id="giacsbh" style="padding: 80px 0; background: linear-gradient(to bottom, #ffffff, #fffaf3);">
    <style>
    .policy-card:hover { transform: translateY(-5px); box-shadow: 0 15px 40px rgba(102,13,27,0.15) !important; border-color: var(--main-color) !important; }
    </style>
    <div class="container" style="max-width: var(--ebc-container-width);">
        <div class="sales-policy-heading text-center mx-auto" style="max-width: 1000px; margin-bottom: 50px;">
            <h2 style="color: var(--main-color); font-size: clamp(28px, 4vw, 36px); font-weight: bold; margin-bottom: 24px; text-transform: uppercase;">{{ $salesPolicySection->title }}</h2>
            <div class="overview-content" style="font-size: 16px; color: #444; line-height: 1.6;">
                {!! $salesPolicySection->content !!}
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($salesPolicySection->children as $policy)
            <div class="col-lg-4 col-md-6">
                <article class="policy-card h-100" style="background: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: all 0.3s ease; border: 1px solid rgba(226, 189, 122, 0.4); display: flex; flex-direction: column;">
                    @php($img = $policy->images->first()?->path ?: $policy->image_path)
                    @if($img)
                        <div style="height: 220px; background-image: url('{{ asset($img) }}'); background-size: cover; background-position: center; border-bottom: 3px solid #e2bd7a;"></div>
                    @else
                        <div style="height: 180px; background: linear-gradient(135deg, #fdfbf8, #f4e8d3); display: flex; align-items: center; justify-content: center; border-bottom: 3px solid #e2bd7a;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="var(--main-color)" viewBox="0 0 16 16" style="opacity: 0.5;">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                            </svg>
                        </div>
                    @endif
                    <div style="padding: 28px 24px; flex-grow: 1; display: flex; align-items: center; justify-content: center; text-align: center;">
                        <h3 style="color: var(--main-color); font-size: 20px; font-weight: bold; margin: 0; line-height: 1.4;">{{ $policy->title }}</h3>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


@if($supportSection)
<!------------------- CONSULTATION FROM DATABASE ------------------->
@php($supportImage = $supportSection->images->first()?->path ?: $supportSection->image_path)
<section class="sec-consultation" id="dangky" @if($supportImage) style="--consultation-background:url('{{ asset($supportImage) }}')" @endif>
<style>
.sec-consultation { padding: 60px 0; }
.consultation-layout { padding: 0 !important; gap: 40px !important; grid-template-columns: 1fr 480px !important; }
.consultation-intro h2 { font-size: 42px !important; font-weight: bold !important; text-transform: uppercase; color: #e2bd7a !important; margin-bottom: 24px !important; border-bottom: 2px solid #e2bd7a; padding-bottom: 12px; display: inline-block; }
.consultation-description { font-size: 16px !important; line-height: 1.6 !important; text-align: justify; }
.consultation-form { padding: 35px 30px !important; box-shadow: 0 10px 30px rgba(0,0,0,0.3) !important; background: #fffaf3 !important; }
.consultation-form h3 { font-size: 24px !important; margin-bottom: 20px !important; text-transform: uppercase; }
.consultation-form label { font-size: 14px !important; font-weight: 600; color: #444; }
.consultation-form input { height: 48px !important; font-size: 15px !important; margin-bottom: 15px !important; background: #fff !important; border: 1px solid #ddd !important; border-radius: 8px !important; }
.consultation-form button { font-size: 16px !important; padding: 14px !important; border-radius: 8px !important; background: linear-gradient(135deg, var(--main-color), #8b1528) !important; box-shadow: 0 4px 15px rgba(102,13,27,0.3); transition: all 0.3s ease; margin-top: 10px !important; }
.consultation-form button:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(102,13,27,0.4); }
@media (max-width: 991px) {
    .consultation-layout { grid-template-columns: 1fr !important; }
}
</style>
	<div class="container">
		<div class="consultation-layout">
			<div class="consultation-intro">
				<h2 >{{ $supportSection->title }}</h2>
				<div class="consultation-description">{!! $supportSection->content !!}</div>
			</div>
			<form class="consultation-form" action="{{ route('contact.store') }}" method="post">
                @csrf
				<h3 style="color: var(--main-color);">Thông Tin Liên Hệ</h3>
				<label>Họ và tên <sup>*</sup><input type="text" name="name" maxlength="100" placeholder="Nhập họ và tên của bạn" required></label>
				<label>Email <input type="email" name="email" maxlength="255" placeholder="example@email.com"></label>
				<label>Số điện thoại <sup>*</sup><input type="tel" name="phone" minlength="8" maxlength="20" placeholder="0123456789" required></label>
				<button type="submit" style="background: var(--main-color); margin-top: 15px;">Đăng Ký Ngay</button>
                <p role="status" aria-live="polite" hidden></p>
			</form>
		</div>
	</div>
</section>
@endif



<!------------------- FOOTER ------------------->
<footer class="elite-footer">
	<div class="container">
		<div class="elite-footer-main">
			<div class="elite-footer-brand">
				<img src="{{ asset($websiteSettings->white_logo_path ?: $websiteSettings->logo_path ?: 'frontend/img/logo-trang.png') }}" alt="{{ $websiteSettings->title }}">
			</div>
			<div class="elite-footer-links">
				<h3>Về Chúng Tôi</h3>
				<!-- <a href="#">Hệ thống sảnh</a><a href="#">Dịch vụ</a><a href="#">Thực đơn tiệc</a> -->
				<p>Tổng đại lý miền bắc</p>
				<h5>Công ty cổ phần Bất Động Sản INDOCHINE</h5>
			</div>
			<div class="elite-footer-contact">
				<h3>Liên Hệ</h3>
				<p>6 đường 2/9, Phường Hải Châu, Thành phố Đà Nẵng</p>
				<a class="elite-footer-phone" href="tel:0799618555">0799 618 555</a>
				<div class="elite-footer-social"><a href="#" aria-label="Facebook"><i class="icon-facebook"></i></a><a href="#" aria-label="YouTube"><i class="icon-youtube"></i></a></div>
			</div>
		</div>
		<div class="elite-footer-bottom"><span>Copyright © 2026 M Riverside DANANG</span><div><a href="#">Chính sách Cookie</a><a href="#">Điều khoản &amp; Điều kiện</a><a href="#">Chính sách quyền riêng tư</a></div></div>
	</div>
</footer>
<!------------------- END: FOOTER ------------------->

@if(auth()->user()?->is_admin)
<a class="admin-shortcut" href="{{ route('admin.dashboard') }}">Vào quản trị</a>
@endif

<!------------------- JS core------------------->
@include('partials.booking-popup')
<script src="js/booking-popup.js?v={{ filemtime(base_path('frontend/js/booking-popup.js')) }}" defer></script>
<script src="js/contact-form.js?v={{ filemtime(base_path('frontend/js/contact-form.js')) }}" defer></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/swiper-bundle.min.js"></script>
<script src="js/index.js?v={{ filemtime(base_path('frontend/js/index.js')) }}"></script>
<script src="js/scroll-reveal.js?v={{ filemtime(base_path('frontend/js/scroll-reveal.js')) }}"></script>

{!! $websiteSettings->footer_code !!}
</body>
</html>
