import re

with open('resources/views/home.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

html = """
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
                        <div style="height: 260px; background-image: url('{{ asset($img) }}'); background-size: cover; background-position: center; border-bottom: 1px solid #eee;"></div>
                    @else
                        <div style="height: 260px; background: #f8f9fa; display: flex; flex-direction: column; align-items: center; justify-content: center; border-bottom: 1px solid #eee;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="var(--main-color)" viewBox="0 0 16 16" style="opacity: 0.3; margin-bottom: 12px;">
                                <path d="M14 14V4.5L8 0 2 4.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 1 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4.5h2A1.5 1.5 0 0 1 6.5 3h3z"/>
                            </svg>
                            <span style="color: var(--main-color); opacity: 0.6; font-size: 14px;">Ảnh căn hộ</span>
                        </div>
                    @endif
                    <div style="padding: 24px; flex-grow: 1; text-align: center;">
                        <h3 style="color: var(--main-color); font-size: 22px; font-weight: bold; margin-bottom: 10px;">{{ $apt->title }}</h3>
                        @if($apt->sub_title)
                            <div style="color: #666; font-size: 15px; font-weight: 500; background: #fffaf3; display: inline-block; padding: 6px 16px; border-radius: 20px; border: 1px solid #e2bd7a;">{{ $apt->sub_title }}</div>
                        @endif
                        @if($apt->content)
                            <div style="margin-top: 16px; color: #555; font-size: 14px; text-align: left;">{!! $apt->content !!}</div>
                        @endif
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
"""

pattern = r'(\s*@if\(\$salesPolicySection\))'
replacement = html + r'\1'

new_content = re.sub(pattern, replacement, content, count=1)

with open('resources/views/home.blade.php', 'w', encoding='utf-8') as f:
    f.write(new_content)
print("Added apartments section HTML")
