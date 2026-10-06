import sys
import re

file_path = r'C:\xampp\htdocs\www\mriverside\resources\views\home.blade.php'
with open(file_path, 'r', encoding='utf-8') as f:
    content = f.read()

replacement = '''			<div class="col-12 col-lg-8">
				<div class="venue-slider" style="aspect-ratio: auto; min-height: auto;">
					<div class="swiper" style="height: auto;">
						<div class="swiper-wrapper">
                            @if(->images->isNotEmpty())
                                @foreach(->images as )
							        <div class="swiper-slide" style="height: auto;"><img src="{{ asset(->path) }}" alt="Location" style="width: 100%; height: auto; border-radius: 16px; display: block;"></div>
                                @endforeach
                            @elseif(->image_path)
                                <div class="swiper-slide" style="height: auto;"><img src="{{ asset(->image_path) }}" alt="Location" style="width: 100%; height: auto; border-radius: 16px; display: block;"></div>
                            @else
                                <div class="swiper-slide" style="height: auto;"><img src="{{ asset('frontend/images/capital.jpg') }}" alt="Location" style="width: 100%; height: auto; border-radius: 16px; display: block;"></div>
                            @endif
						</div>
					</div>
					<button class="swiper-button-prev" type="button" aria-label="Ảnh trước"><i class="icon-prev-thin"></i></button>
					<button class="swiper-button-next" type="button" aria-label="Ảnh tiếp theo"><i class="icon-next-thin"></i></button>
				</div>
            </div>
            <div class="col-12 col-lg-4 mt-4 mt-lg-0">
                <div class="location-legend p-4 p-lg-5 h-100 d-flex flex-column justify-content-center" style="background: rgba(144, 21, 39, 0.05); border-radius: 16px; border: 1px solid rgba(144, 21, 39, 0.1);">
                    <h4 class="text-uppercase mb-4 font-wasted-vindey" style="font-size: 28px; color: var(--main-color);">CHÚ THÍCH</h4>
                    <ul class="list-unstyled" style="font-size: 16px; color: #333; margin-bottom: 0;">
                        <li class="mb-3 d-flex align-items-center">
                            <span class="d-flex align-items-center justify-content-center rounded-circle" style="width: 32px; height: 32px; background: var(--main-color); color: white; margin-right: 15px; font-size: 14px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>
                            </span>
                            <span style="font-weight: 500;">Ăn uống</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <span class="d-flex align-items-center justify-content-center rounded-circle" style="width: 32px; height: 32px; background: var(--main-color); color: white; margin-right: 15px; font-size: 14px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>
                            </span>
                            <span style="font-weight: 500;">Thể thao</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <span class="d-flex align-items-center justify-content-center rounded-circle" style="width: 32px; height: 32px; background: var(--main-color); color: white; margin-right: 15px; font-size: 14px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>
                            </span>
                            <span style="font-weight: 500;">Check in</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <span class="d-flex align-items-center justify-content-center rounded-circle" style="width: 32px; height: 32px; background: var(--main-color); color: white; margin-right: 15px; font-size: 14px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>
                            </span>
                            <span style="font-weight: 500;">TTTM</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <span class="d-flex align-items-center justify-content-center rounded-circle" style="width: 32px; height: 32px; background: var(--main-color); color: white; margin-right: 15px; font-size: 14px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>
                            </span>
                            <span style="font-weight: 500;">Nghệ thuật</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <span class="d-flex align-items-center justify-content-center rounded-circle" style="width: 32px; height: 32px; background: var(--main-color); color: white; margin-right: 15px; font-size: 14px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>
                            </span>
                            <span style="font-weight: 500;">Y tế</span>
                        </li>
                        <li class="mb-0 d-flex align-items-center">
                            <span class="d-flex align-items-center justify-content-center rounded-circle" style="width: 32px; height: 32px; background: var(--main-color); color: white; margin-right: 15px; font-size: 14px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>
                            </span>
                            <span style="font-weight: 500;">Văn hóa - di sản</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="text-center" style="margin-top: 24px;">
                    <button type="button" class="d-inline-flex justify-content-center align-items-center text-decoration-none" data-consultation style="padding: 14px 42px; border-radius: 8px; background: linear-gradient(135deg, var(--main-color), #8b1528); color: #fff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 4px 15px rgba(102,13,27,0.3); border: none; gap: 8px; transition: all 0.3s ease;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>
                        {{ ->link_label ?: \'ĐĂNG KÝ XEM THỰC TẾ\' }}
                    </button>
                </div>
			</div>'''

import re
pattern = re.compile(r'\t\t\t<div class="col-12">\n\t\t\t\t<div class="venue-slider"(.*?)</button>\n                </div>\n\t\t\t</div>', re.DOTALL)
new_content = pattern.sub(replacement, content)
if new_content == content:
    print("Not changed. Pattern might be wrong.")
else:
    with open(file_path, 'w', encoding='utf-8') as f:
        f.write(new_content)
    print("Done")
