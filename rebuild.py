with open('resources/views/home.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

start_marker = '<!------------------- EBC BENEFITS ------------------->'
end_marker = '@if()'
start_idx = content.find(start_marker)
end_idx = content.find(end_marker)

new_sections = '''@if()
<!------------------- TỔNG QUAN DỰ ÁN ------------------->
<section class="sec-overview" id="tong-quan" style="padding: 60px 0; background-color: #fffaf3;">
	<div class="container" style="max-width: var(--ebc-container-width);">
		<article class="row g-4 align-items-stretch venue-layout">
			<div class="col-lg-5">
				<div class="venue-info h-100 d-flex flex-column justify-content-center">
					<h3 class="font-wasted-vindey" style="color: var(--main-color); border-bottom-color: var(--sub-color); margin-bottom: 20px;">{{ ->title }}</h3>
                    @if(->sub_title)
                    <h4 style="color: var(--sub-color); font-size: 18px; margin-bottom: 20px; font-weight: bold; text-transform: uppercase;">{{ ->sub_title }}</h4>
                    @endif
					<div class="venue-content overview-content">
						{!! ->content !!}
					</div>
				</div>
			</div>
			<div class="col-lg-7 d-flex flex-column">
				<div class="venue-slider flex-grow-1" style="min-height: 300px;">
					<div class="swiper">
						<div class="swiper-wrapper">
                            @if(->images->isNotEmpty())
                                @foreach(->images as )
							        <div class="swiper-slide"><span class="venue-media" style="background-image:url('{{ asset(->path) }}')"></span></div>
                                @endforeach
                            @elseif(->image_path)
                                <div class="swiper-slide"><span class="venue-media" style="background-image:url('{{ asset(->image_path) }}')"></span></div>
                            @else
                                <div class="swiper-slide"><span class="venue-media" style="background-image:url('{{ asset('frontend/images/capital.jpg') }}')"></span></div>
                            @endif
						</div>
					</div>
					<button class="swiper-button-prev" type="button" aria-label="Ảnh trước"><i class="icon-prev-thin"></i></button>
					<button class="swiper-button-next" type="button" aria-label="Ảnh tiếp theo"><i class="icon-next-thin"></i></button>
				</div>
                <div style="margin-top: 24px; flex-shrink: 0; display: flex; justify-content: center;">
                    <button type="button" class="d-inline-flex justify-content-center align-items-center text-decoration-none" data-consultation style="padding: 14px 42px; border-radius: 8px; background: linear-gradient(135deg, var(--main-color), #8b1528); color: #fff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 4px 15px rgba(102,13,27,0.3); border: none; gap: 8px; transition: all 0.3s ease;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/><path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/></svg>
                        {{ ->link_label ?: 'TẢI BROCHURE DỰ ÁN' }}
                    </button>
                </div>
			</div>
		</article>
	</div>
</section>
@endif

@if()
<!------------------- VỊ TRÍ DỰ ÁN ------------------->
<section class="sec-location" id="vi-tri" style="padding: 60px 0; background-color: #ffffff;">
	<div class="container" style="max-width: var(--ebc-container-width);">
		<article class="row g-4 venue-layout">
			<div class="col-12">
				<div class="venue-info text-center">
					<h3 class="font-wasted-vindey" style="color: var(--main-color); border-bottom: none; margin-bottom: 8px;">{{ ->title }}</h3>
                    @if(->sub_title)
                    <h4 style="color: var(--sub-color); font-size: 18px; margin-bottom: 20px; font-weight: bold; text-transform: uppercase;">{{ ->sub_title }}</h4>
                    @endif
					<div class="venue-content overview-content mx-auto" style="max-width: 900px;">
						{!! ->content !!}
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="venue-slider" style="aspect-ratio: auto; min-height: auto;">
					<div class="swiper" style="height: auto;">
						<div class="swiper-wrapper">
                            @if(->images->isNotEmpty())
                                @foreach(->images as )
							        <div class="swiper-slide"><img src="{{ asset(->path) }}" alt="" style="width: 100%; border-radius: 12px; display: block;"></div>
                                @endforeach
                            @elseif(->image_path)
                                <div class="swiper-slide"><img src="{{ asset(->image_path) }}" alt="" style="width: 100%; border-radius: 12px; display: block;"></div>
                            @endif
						</div>
					</div>
					<button class="swiper-button-prev" type="button" aria-label="Ảnh trước"><i class="icon-prev-thin"></i></button>
					<button class="swiper-button-next" type="button" aria-label="Ảnh tiếp theo"><i class="icon-next-thin"></i></button>
				</div>
                <div style="margin-top: 24px; text-align: center;">
                    <button type="button" class="d-inline-flex justify-content-center align-items-center text-decoration-none" data-consultation style="padding: 14px 42px; border-radius: 8px; background: linear-gradient(135deg, var(--main-color), #8b1528); color: #fff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 4px 15px rgba(102,13,27,0.3); border: none; gap: 8px; transition: all 0.3s ease;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>
                        {{ ->link_label ?: 'ĐĂNG KÝ XEM THỰC TẾ' }}
                    </button>
                </div>
			</div>
		</article>
	</div>
</section>
@endif

@if()
<!------------------- TIỀM NĂNG DỰ ÁN ------------------->
<section class="sec-ebc-benefits" id="tiem-nang">
	<div class="ebc-benefits-frame" style="background-image: linear-gradient(rgba(51, 6, 13, 0.75), rgba(0, 0, 0, 0.8)), url('{{ asset(->images->first()?->path ?: (->image_path ?: 'frontend/images/cover-contact.jpg')) }}');">
		<div class="container" style="max-width: var(--ebc-container-width);">
			<div class="ebc-event-copy text-center" style="margin: 0 auto 50px; max-width: 800px; padding-left: 0; min-height: auto;">
				<h3 class="font-wasted-vindey" style="color: #fff; font-size: clamp(40px, 4vw, 45px); margin-bottom: 8px;">{{ ->title }}</h3>
                @if(->sub_title)
                <h4 style="color: #fff; font-size: 24px; margin-bottom: 20px; font-weight: bold; text-transform: uppercase;">{{ ->sub_title }}</h4>
                @endif
				@if(->content)
					<div class="ebc-event-rich-content mx-auto" style="color: #fff; text-align: center;">{!! ->content !!}</div>
				@endif
			</div>
			<div class="ebc-benefit-slider">
				<div class="swiper">
					<div class="swiper-wrapper">
						@if(->children->isNotEmpty())
							@foreach(->children as )
								<div class="swiper-slide">
									<article class="ebc-benefit-card">
										@if(->icon_path)<img class="ebc-benefit-icon" src="{{ asset(->icon_path) }}" alt="">@endif
										<h2 class="">{{ ->title }}</h2>
										<span class="ebc-card-mark" aria-hidden="true"></span>
										<div class="ebc-benefit-card-content">{!! ->content !!}</div>
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

@if()
<!------------------- TIỆN ÍCH DỰ ÁN ------------------->
<section class="sec-service-experience" id="tien-ich" style="padding: 60px 0; background-color: #fffaf3;">
	<div class="container" style="max-width: var(--ebc-container-width);">
		<div class="service-experience-heading text-center" style="margin-bottom: 40px;">
			<h2 class="font-wasted-vindey" style="color: var(--main-color); margin-bottom: 12px;">{{ ->title }}</h2>
			@if(->sub_title)
			<h3 style="color: var(--sub-color, #a87b4f); font-size: 20px; font-weight: bold; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1px;">{{ ->sub_title }}</h3>
			@endif
			<div class="service-description mx-auto" style="max-width: 900px;">{!! ->content !!}</div>
		</div>
		<div class="event-slider swiper" style="padding: 20px 0;">
			<div class="swiper-wrapper">
				@foreach(->children as )
					@php( = ->images->first()?->path ?: ->image_path)
					<div class="swiper-slide">
                        <article class="event-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); height: 100%; display: flex; flex-direction: column;">
						    <div class="event-card-image {{  ? '' : 'event-card-image--empty' }}" @if() style="background-image:url('{{ asset() }}'); height: 250px; background-size: cover; background-position: center; border-radius: 12px 12px 0 0;" @endif></div>
                            <div style="padding: 24px; flex: 1;">
						        <h3 style="color: var(--main-color); font-size: 20px; font-weight: bold; margin-bottom: 8px; text-transform: uppercase;">{{ ->title }}</h3>
                                @if(->sub_title)
                                <h4 style="color: var(--sub-color, #a87b4f); font-size: 16px; font-weight: bold; margin-bottom: 12px;">{{ ->sub_title }}</h4>
                                @endif
						        <div class="event-card-content" style="color: #555; font-size: 15px;">{!! ->content !!}</div>
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

'''

if start_idx != -1 and end_idx != -1:
    content = content[:start_idx] + new_sections + content[end_idx:]
    with open('resources/views/home.blade.php', 'w', encoding='utf-8') as f:
        f.write(content)
    print("Rebuilt successfully!")
else:
    print("Could not find markers")
