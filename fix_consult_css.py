with open('resources/views/home.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

import re

# We will inject a <style> block into the sec-consultation section
style_block = '''<style>
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
</style>'''

pattern = r'<section class="sec-consultation" id="dangky".*?>'
# We replace the start tag with itself + the style block
def repl(m):
    return m.group(0) + '\n' + style_block

new_content = re.sub(pattern, repl, content)

with open('resources/views/home.blade.php', 'w', encoding='utf-8') as f:
    f.write(new_content)
print("Injected custom CSS for consultation section")
