<?php

$overviewSectionHtml = <<<HTML
@if(\$overviewSection)
<!------------------- TỔNG QUAN DỰ ÁN ------------------->
<section class="sec-overview" id="tong-quan" style="padding: 60px 0;">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-lg-6">
                @if(\$overviewSection->images->isNotEmpty())
                    <img src="{{ asset(\$overviewSection->images->first()->path) }}" alt="{{ \$overviewSection->title }}" style="width: 100%; border-radius: 16px;">
                @elseif(\$overviewSection->image_path)
                    <img src="{{ asset(\$overviewSection->image_path) }}" alt="{{ \$overviewSection->title }}" style="width: 100%; border-radius: 16px;">
                @else
                    <img src="{{ asset('frontend/images/capital.jpg') }}" alt="{{ \$overviewSection->title }}" style="width: 100%; border-radius: 16px;">
                @endif
			</div>
			<div class="col-12 col-lg-6 mt-4 mt-lg-0">
				<h3 class="font-wasted-vindey" style="color: var(--main-color); margin-bottom: 20px;">{{ \$overviewSection->title }}</h3>
                @if(\$overviewSection->sub_title)
                    <h4 style="color: var(--sub-color); font-size: 18px; margin-bottom: 20px; font-weight: bold;">{{ \$overviewSection->sub_title }}</h4>
                @endif
				<div class="overview-content" style="color: #333; line-height: 1.6;">
					{!! \$overviewSection->content !!}
				</div>
                <div style="margin-top: 30px;">
                    <button type="button" class="d-inline-flex justify-content-center align-items-center text-decoration-none" data-consultation style="padding: 12px 30px; border-radius: 8px; background: var(--main-color); color: #fff; font-weight: 600; border: none; gap: 8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/><path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/></svg>
                        {{ \$overviewSection->link_label ?: 'TẢI BROCHURE DỰ ÁN' }}
                    </button>
                </div>
			</div>
		</div>
	</div>
</section>
@endif
HTML;

$locationSectionHtml = <<<HTML

@if(\$locationSection)
<!------------------- VỊ TRÍ DỰ ÁN ------------------->
<section class="sec-location" id="vi-tri" style="padding: 60px 0; background-color: #ffffff;">
	<div class="container" style="max-width: var(--ebc-container-width);">
		<article class="row g-4 venue-layout">
			<div class="col-12">
				<div class="venue-info text-center">
					<h3 class="font-wasted-vindey" style="color: var(--main-color); border-bottom: none; margin-bottom: 8px;">{{ \$locationSection->title }}</h3>
                    @if(\$locationSection->sub_title)
                    <h4 style="color: var(--sub-color); font-size: 18px; margin-bottom: 20px; font-weight: bold; text-transform: uppercase;">{{ \$locationSection->sub_title }}</h4>
                    @endif
					<div class="venue-content overview-content mx-auto">
						{!! \$locationSection->content !!}
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-8">
				<div class="venue-slider" style="aspect-ratio: auto; min-height: auto;">
					<div class="swiper" style="height: auto;">
						<div class="swiper-wrapper">
                            @if(\$locationSection->images->isNotEmpty())
                                @foreach(\$locationSection->images as \$image)
							        <div class="swiper-slide" style="height: auto;"><img src="{{ asset(\$image->path) }}" alt="Location" style="width: 100%; height: auto; border-radius: 16px; display: block;"></div>
                                @endforeach
                            @elseif(\$locationSection->image_path)
                                <div class="swiper-slide" style="height: auto;"><img src="{{ asset(\$locationSection->image_path) }}" alt="Location" style="width: 100%; height: auto; border-radius: 16px; display: block;"></div>
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
            <div class="col-12 mt-4">
                <div class="text-center">
                    <button type="button" class="d-inline-flex justify-content-center align-items-center text-decoration-none" data-consultation style="padding: 14px 42px; border-radius: 8px; background: linear-gradient(135deg, var(--main-color), #8b1528); color: #fff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 4px 15px rgba(102,13,27,0.3); border: none; gap: 8px; transition: all 0.3s ease;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>
                        {{ \$locationSection->link_label ?: 'ĐĂNG KÝ XEM THỰC TẾ' }}
                    </button>
                </div>
			</div>
		</article>
	</div>
</section>
@endif
HTML;

$potentialSectionHtml = <<<HTML

<!------------------- TIỀM NĂNG DỰ ÁN ------------------->
@if(\$potentialSection)
<section class="sec-ebc-benefits" id="tiem-nang">
	<div class="ebc-benefits-frame" style="background-image: linear-gradient(rgba(51, 6, 13, 0.75), rgba(0, 0, 0, 0.8)), url('{{ asset(\$potentialSection?->images->first()?->path ?: (\$potentialSection?->image_path ?: 'frontend/images/cover-contact.jpg')) }}');">
		<div class="container" style="max-width: var(--ebc-container-width);">
			<div class="ebc-event-copy text-center">
				<h3 class="font-wasted-vindey" style="color: #fff; font-size: clamp(40px, 4vw, 45px); margin-bottom: 8px;">{{ \$potentialSection->title }}</h3>
                @if(\$potentialSection->sub_title)
                <h4 style="color: #fff; font-size: 24px; margin-bottom: 20px; font-weight: bold; text-transform: uppercase;">{{ \$potentialSection->sub_title }}</h4>
                @endif
				@if(\$potentialSection?->content)
					<div class="ebc-event-rich-content mx-auto" style="color: #fff; max-width: 800px; text-align: center;">{!! \$potentialSection->content !!}</div>
				@endif
			</div>
			<div class="ebc-benefit-slider">
				<div class="swiper">
					<div class="swiper-wrapper">
						@if(\$potentialSection?->children->isNotEmpty())
							@foreach(\$potentialSection->children as \$benefit)
								<div class="swiper-slide">
									<article class="ebc-benefit-card">
										@if(\$benefit->icon_path)<img class="ebc-benefit-icon" src="{{ asset(\$benefit->icon_path) }}" alt="">@endif
										<h2 class="">{{ \$benefit->title }}</h2>
										<span class="ebc-card-mark" aria-hidden="true"></span>
										<div class="ebc-benefit-card-content">{!! \$benefit->content !!}</div>
									</article>
								</div>
							@endforeach
						@endif
					</div>
					<div class="swiper-pagination"></div>
				</div>
				<button class="swiper-button-prev" type="button" aria-label="Ảnh trước"><i class="icon-prev-thin"></i></button>
				<button class="swiper-button-next" type="button" aria-label="Ảnh tiếp theo"><i class="icon-next-thin"></i></button>
			</div>
		</div>
	</div>
</section>
@endif
HTML;

$file_path = "C:/xampp/htdocs/www/mriverside/resources/views/home.blade.php";
$content = file_get_contents($file_path);

$pattern = '/@php\(\$benefitIcons.*?@if\(\$aboutSection\).*?<\/section>\s*@endif/s';
$replacement = $overviewSectionHtml . $locationSectionHtml . $potentialSectionHtml;
$new_content = preg_replace($pattern, $replacement, $content);

file_put_contents($file_path, $new_content);
echo "Replaced successfully!";
?>
