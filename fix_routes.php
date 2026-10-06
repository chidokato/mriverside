<?php
\ = <<<PHP
<?php

use App\Http\Middleware\SetLocale;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\HomepageSectionController;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\HomepageSection;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/booking-request', [\App\Http\Controllers\BookingRequestController::class, 'store'])
    ->middleware('throttle:5,1')->name('booking.store');

Route::post('/contact-request', [\App\Http\Controllers\ContactRequestController::class, 'store'])
    ->middleware('throttle:5,1')->name('contact.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AdminController::class, 'login'])->name('login');
        Route::post('login', [AdminController::class, 'authenticate'])->name('authenticate');
    });

    Route::middleware(['auth', 'is_admin'])->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('settings', [\App\Http\Controllers\Admin\WebsiteSettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [\App\Http\Controllers\Admin\WebsiteSettingController::class, 'update'])->name('settings.update');
        Route::get('popup-settings', [\App\Http\Controllers\Admin\PopupSettingController::class, 'edit'])->name('popup-settings.edit');
        Route::put('popup-settings', [\App\Http\Controllers\Admin\PopupSettingController::class, 'update'])->name('popup-settings.update');
        Route::post('logout', [AdminController::class, 'logout'])->name('logout');
        Route::resource('users', UserController::class)->except('show');
        Route::resource('menus', MenuController::class)->except('show');
        Route::resource('sliders', SliderController::class)->except('show');
        Route::patch('news/{news}/status', [\App\Http\Controllers\Admin\NewsArticleController::class, 'updateStatus'])->name('news.status');
        Route::resource('news', \App\Http\Controllers\Admin\NewsArticleController::class)->except('show');
        Route::delete('homepage-sections/{homepageSection}/images/{image}', [HomepageSectionController::class, 'destroyImage'])->name('homepage-sections.images.destroy');
        Route::resource('homepage-sections', HomepageSectionController::class)->except('show');
    });
});

\ = function (string \) {
    return view('home', [
        'locale' => \,
        'newsArticles' => \App\Models\NewsArticle::where('locale', \)->published()->orderByDesc('published_at')->limit(9)->get(),
        'languages' => [
            'vi' => 'Tiếng Việt',
            'en' => 'English',
            'zh' => '中文',
            'ko' => '한국어',
        ],
        'translations' => \ === 'vi' ? [] : trans('site'),
        'headerMenus' => Menu::query()
            ->where('locale', \)
            ->where('location', 'header')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get(),
        'heroSliders' => Slider::query()
            ->where('locale', \)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get(),
        'overviewSection' => HomepageSection::query()
            ->where('locale', \)
            ->where('key', 'tongquan')
            ->where('is_active', true)
            ->with(['images', 'children' => fn (\) => \->where('is_active', true)->with('images')])
            ->first(),
        'locationSection' => HomepageSection::query()
            ->where('locale', \)
            ->where('key', 'vitri')
            ->where('is_active', true)
            ->with(['images', 'children' => fn (\) => \->where('is_active', true)->with('images')])
            ->first(),
        'potentialSection' => HomepageSection::query()
            ->where('locale', \)
            ->where('key', 'tiemnang')
            ->where('is_active', true)
            ->with(['images', 'children' => fn (\) => \->where('is_active', true)->with('images')])
            ->first(),
        'ballroomSection' => HomepageSection::query()
            ->where('locale', \)
            ->where('key', 'ballroom')
            ->where('is_active', true)
            ->with(['images', 'children' => fn (\) => \->where('is_active', true)->with('images')])
            ->first(),
        'servicesSection' => HomepageSection::query()
            ->where('locale', \)
            ->where('key', 'services')
            ->where('is_active', true)
            ->with(['children' => fn (\) => \->where('is_active', true)->with('images')])
            ->first(),
        'amenitiesSection' => HomepageSection::query()
            ->where('locale', \)
            ->where('key', 'tienich')
            ->where('is_active', true)
            ->with(['children' => fn (\) => \->where('is_active', true)->with('images')])
            ->first(),
        'eliteClubSection' => HomepageSection::query()
            ->where('locale', \)
            ->where('is_active', true)
            ->where(fn (\) => \->where('key', 'elite-club')->orWhere('title', 'ELITE CLUB'))
            ->with('images')
            ->first(),
        'supportSection' => HomepageSection::query()
            ->where('locale', \)
            ->where('is_active', true)
            ->where(function (\) {
                \->where('key', 'support')->orWhere('title', 'HỖ TRỢ TƯ VẤN')
                    ->orWhereIn('translation_group', HomepageSection::query()
                        ->select('translation_group')
                        ->whereNotNull('translation_group')
                        ->whereNull('parent_id')
                        ->where(fn (\) => \->where('key', 'support')->orWhere('title', 'HỖ TRỢ TƯ VẤN')));
            })
            ->whereNull('parent_id')
            ->with('images')
            ->first(),
    ]);
};

Route::get('/', \)->defaults('locale', 'vi')->middleware(SetLocale::class)->name('home.vi');
Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->defaults('locale', 'vi')->middleware(SetLocale::class)->name('news.index.vi');
Route::get('/news/{news}', [\App\Http\Controllers\NewsController::class, 'show'])->defaults('locale', 'vi')->whereNumber('news')->middleware(SetLocale::class)->name('news.show.vi');

Route::get('/vi/{path?}', function (Request \, ?string \ = null) {
    \ = url(\ ?: '/');
    if (\->getQueryString()) \ .= '?'.\->getQueryString();
    return redirect()->to(\, 301);
})->where('path', 'news(?:/[0-9]+)?');
PHP;
file_put_contents("routes/web.php", trim(\) . "\n");
echo "Fixed routes!";
?>
