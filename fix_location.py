with open('resources/views/home.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

start_marker = '<section class="sec-location"'
end_marker = '@if()'

start_idx = content.find(start_marker)
end_idx = content.find(end_marker)

new_section = '''<section class="sec-location" id="vi-tri" style="padding: 60px 0; background-color: #ffffff;">
	<div class="container" style="max-width: var(--ebc-container-width);">
		<article class="row g-4 venue-layout align-items-stretch">
			<div class="col-12" style="margin-bottom: 20px;">
				<div class="venue-info text-center">
					<h3 style="color: var(--main-color); border-bottom: none; margin-bottom: 8px; text-transform: uppercase;">{{ ->title }}</h3>
                    @if(->sub_title)
                    <h4 style="color: var(--sub-color); font-size: 18px; margin-bottom: 20px; font-weight: bold; text-transform: uppercase;">{{ ->sub_title }}</h4>
                    @endif
					<div class="venue-content overview-content mx-auto" style="max-width: 1000px;">
						{!! ->content !!}
					</div>
				</div>
			</div>
			
			<div class="col-lg-7 d-flex flex-column">
				<div class="venue-slider flex-grow-1" style="min-height: 400px; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
					<div class="swiper h-100">
						<div class="swiper-wrapper h-100">
                            @if(->images->isNotEmpty())
                                @foreach(->images as )
							        <div class="swiper-slide h-100"><img src="{{ asset(->path) }}" alt="" style="width: 100%; height: 100%; object-fit: cover; display: block;"></div>
                                @endforeach
                            @elseif(->image_path)
                                <div class="swiper-slide h-100"><img src="{{ asset(->image_path) }}" alt="" style="width: 100%; height: 100%; object-fit: cover; display: block;"></div>
                            @endif
						</div>
					</div>
					<button class="swiper-button-prev" type="button" aria-label="?nh tru?c"><i class="icon-prev-thin"></i></button>
					<button class="swiper-button-next" type="button" aria-label="?nh ti?p theo"><i class="icon-next-thin"></i></button>
				</div>
			</div>
			
			<div class="col-lg-5 d-flex flex-column">
                <div class="location-legend-container flex-grow-1 d-flex flex-column justify-content-center" style="padding: 30px; background: #fffaf3; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                    @if(->children->isNotEmpty())
                        @foreach(->children as )
                        <div class="legend-item" style="margin-bottom: 24px;">
                            <h4 style="color: var(--main-color); font-weight: bold; font-size: 18px; border-bottom: 2px solid #e2bd7a; padding-bottom: 6px; margin-bottom: 12px; display: inline-block;">{{ ->title }}</h4>
                            <div class="legend-content overview-content" style="color: #444; font-size: 15px;">
                                {!! ->content !!}
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p style="text-align: center; color: #888;">Chua có d? li?u kho?ng cách.</p>
                    @endif
                    <div style="margin-top: auto; padding-top: 10px;">
                        <button type="button" class="d-inline-flex justify-content-center align-items-center text-decoration-none w-100" data-consultation style="padding: 14px 20px; border-radius: 8px; background: linear-gradient(135deg, var(--main-color), #8b1528); color: #fff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 4px 15px rgba(102,13,27,0.3); border: none; gap: 8px; transition: all 0.3s ease;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>
                            {{ ->link_label ?: 'ÐANG KÝ XEM TH?C T?' }}
                        </button>
                    </div>
                </div>
            </div>
		</article>
	</div>
</section>
@endif

'''

if start_idx != -1 and end_idx != -1:
    content = content[:start_idx] + new_section + content[end_idx:]
    with open('resources/views/home.blade.php', 'w', encoding='utf-8') as f:
        f.write(content)
    print("Location section updated successfully!")
else:
    print("Could not find markers")
