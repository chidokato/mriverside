<?php echo App\Models\HomepageSection::where('locale', 'vi')->where(function($q) { $q->whereIn('key', ['support', 'dangky'])->orWhereIn('title', ['HỖ TRỢ TƯ VẤN', 'ĐĂNG KÝ']); })->first()->id;
