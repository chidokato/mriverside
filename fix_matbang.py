import re
path = 'resources/views/home.blade.php'
c = open(path, encoding='utf-8').read()
new_html = r'''        <div class="floor-plan-image mx-auto position-relative" style="max-width: 1100px; background: #fff; border-radius: 16px; padding: 10px; box-shadow: 0 15px 40px rgba(0,0,0,0.06);">
            <div class="floor-plan-slider">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @if($floorPlanSection->images->isNotEmpty())
                            @foreach($floorPlanSection->images as $image)
                                <div class="swiper-slide">
                                    <img src="{{ asset($image->path) }}" alt="{{ $floorPlanSection->title }}" style="width: 100%; height: auto; border-radius: 10px; display: block;">
                                </div>
                            @endforeach
                        @elseif($floorPlanSection->image_path)
                            <div class="swiper-slide">
                                <img src="{{ asset($floorPlanSection->image_path) }}" alt="{{ $floorPlanSection->title }}" style="width: 100%; height: auto; border-radius: 10px; display: block;">
                            </div>
                        @else
                            <div class="swiper-slide">
                                <div style="width: 100%; aspect-ratio: 16/9; background: linear-gradient(135deg, #fdfbf8, #f4e8d3); border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; border: 2px dashed #e2bd7a;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="var(--main-color)" viewBox="0 0 16 16" style="opacity: 0.4; margin-bottom: 16px;">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                    </svg>
                                    <span style="color: var(--main-color); font-weight: bold; opacity: 0.6; font-size: 18px;">Ảnh mặt bằng (vui lòng upload trong Quản trị)</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                @if($floorPlanSection->images->count() > 1)
                    <button class="swiper-button-prev" type="button" aria-label="Trước" style="left: -20px; width: 40px; height: 40px; background: #fff; border-radius: 50%; box-shadow: 0 4px 10px rgba(0,0,0,0.1); color: var(--main-color); border: 1px solid #eee; justify-content: center; align-items: center; display: flex;"><i class="icon-prev-thin" style="font-size: 20px;"></i></button>
                    <button class="swiper-button-next" type="button" aria-label="Sau" style="right: -20px; width: 40px; height: 40px; background: #fff; border-radius: 50%; box-shadow: 0 4px 10px rgba(0,0,0,0.1); color: var(--main-color); border: 1px solid #eee; justify-content: center; align-items: center; display: flex;"><i class="icon-next-thin" style="font-size: 20px;"></i></button>
                    <div class="swiper-pagination" style="bottom: -30px;"></div>
                @endif
            </div>
        </div>'''
new_html = new_html.replace('$', '$')
c = re.sub(r'        <div class="floor-plan-image mx-auto".*?</div>\s*</div>', new_html + '\n    </div>', c, flags=re.DOTALL)
open(path, 'w', encoding='utf-8').write(c)