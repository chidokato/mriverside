import re

with open('resources/views/home.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

html = """
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
"""

pattern = r'(\s*@if\(\$supportSection\))'
replacement = html + r'\1'

new_content = re.sub(pattern, replacement, content, count=1)

with open('resources/views/home.blade.php', 'w', encoding='utf-8') as f:
    f.write(new_content)
print("Added sales policy section HTML")
