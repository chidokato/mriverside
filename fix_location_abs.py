with open('resources/views/home.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

start_marker = '<article class="row g-4 venue-layout">'
if start_marker not in content:
    start_marker = '<article class="row g-4 venue-layout'

start_idx = content.find('<article class="row g-4 venue-layout')
end_idx = content.find('</article>', start_idx) + 10

new_article = '''<style>
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
					<h3 style="color: var(--main-color); border-bottom: none; margin-bottom: 8px;">{{ ->title }}</h3>
                    @if(->sub_title)
                    <h4 style="color: var(--sub-color); font-size: 18px; margin-bottom: 20px; font-weight: bold; text-transform: uppercase;">{{ ->sub_title }}</h4>
                    @endif
					<div class="venue-content overview-content mx-auto" style="max-width: 900px;">
						{!! ->content !!}
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="venue-slider w-100 h-100" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
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
					<button class="swiper-button-prev" type="button" aria-label="Ảnh trước"><i class="icon-prev-thin"></i></button>
					<button class="swiper-button-next" type="button" aria-label="Ảnh tiếp theo"><i class="icon-next-thin"></i></button>
				</div>
			</div>
			
			<div class="col-lg-4 vi-tri-text-col">
                <div class="location-legend-container vi-tri-text-wrapper" style="padding: 24px; background: #fffaf3; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                    @if(->children->isNotEmpty())
                        @foreach(->children as )
                        <div class="legend-item" style="margin-bottom: 20px;">
                            <h4 style="color: var(--main-color); font-weight: bold; font-size: 18px; border-bottom: 2px solid #e2bd7a; padding-bottom: 6px; margin-bottom: 12px; display: inline-block;">{{ ->title }}</h4>
                            <div class="legend-content overview-content" style="color: #444; font-size: 15px;">
                                {!! ->content !!}
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p style="text-align: center; color: #888;">Chưa có dữ liệu khoảng cách.</p>
                    @endif
                </div>
            </div>
		</article>'''

if start_idx != -1 and end_idx != -1:
    content = content[:start_idx] + new_article + content[end_idx:]
    with open('resources/views/home.blade.php', 'w', encoding='utf-8') as f:
        f.write(content)
    print("Location layout fixed perfectly!")
else:
    print("Could not find article")
