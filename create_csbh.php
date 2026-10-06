<?php use App\Models\HomepageSection;
use Illuminate\Support\Str;

$group = (string) Str::uuid();

$parent = HomepageSection::create([
    'locale' => 'vi',
    'translation_group' => $group,
    'key' => 'giacsbh',
    'title' => 'ĐẦU TƯ THẢNH THƠI - TỐI ƯU DÒNG VỐN VỚI CHÍNH SÁCH BÁN HÀNG ĐẶC QUYỀN',
    'content' => '<p>Sở hữu bất động sản mặt tiền đường 2/9 kế cận Cầu Rồng chưa bao giờ dễ dàng hơn thế. Nhằm hỗ trợ tối đa cho khách hàng an cư lẫn các nhà đầu tư khai thác lưu trú, Chủ đầu tư áp dụng chính sách bán hàng linh hoạt: tiến độ thanh toán giãn cách, hỗ trợ vay vốn ngân hàng lên đến 70% giá trị căn hộ, ân hạn nợ gốc và miễn lãi suất dài hạn. Đây là thời điểm vàng để sở hữu căn hộ với mức giá tốt nhất trước các đợt điều chỉnh tăng giá tiếp theo.</p><p>Khám phá bảng giá chi tiết và các phương án thanh toán ưu đãi ngay dưới đây:</p>',
    'sort_order' => 6,
    'is_active' => true,
]);

$items = [
    'Giá bán (Slide 40)',
    'Chính sách bán hàng nổi bật',
    'Chính sách Early Bird',
    'Tặng 2 năm quản lý vận hành',
    'Quà tặng kim cương',
    'Dự kiến giá thuê & tỷ suất cho thuê'
];

foreach ($items as $index => $item) {
    HomepageSection::create([
        'locale' => 'vi',
        'translation_group' => (string) Str::uuid(),
        'parent_id' => $parent->id,
        'title' => $item,
        'sort_order' => $index + 1,
        'is_active' => true,
    ]);
}
echo 'Created CSBH section in DB with ID: ' . $parent->id;
