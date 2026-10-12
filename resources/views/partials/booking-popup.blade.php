
<div class="booking-popup-actions">
    <a class="booking-hotline-launch" href="tel:{{ preg_replace('/[^0-9+]/', '', $websiteSettings->hotline ?: '0799 618 555') }}">
        <svg class="booking-hotline-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
            <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
        </svg>
        <span>HOTLINE: {{ $websiteSettings->hotline ?: '0799 618 555' }}</span>
    </a>
    <button class="booking-popup-launch" type="button" data-open-booking>{{ $popupSettings->launch_label }}</button>
</div>
<dialog class="booking-popup" id="booking-popup" aria-labelledby="booking-popup-title">
    <div class="booking-popup-layout">
        <img class="booking-popup-photo" src="{{ $popupSettings->image_url }}" alt="{{ $popupSettings->title }}">
        <div class="booking-popup-card">
            <button class="booking-popup-close" type="button" aria-label="Đóng popup" data-close-booking autofocus>&times;</button>
            <h2 id="booking-popup-title">{{ $popupSettings->title }}</h2>
            <div class="booking-popup-offer">
                <div class="booking-popup-hours booking-popup-custom-offer">{{ $popupSettings->offer_content }}</div>
            </div>
            @if($popupSettings->content)<p class="booking-popup-subtitle">{{ $popupSettings->content }}</p>@endif
            <form id="booking-popup-form" action="{{ route('booking.store') }}" method="post">
                @csrf
                <label for="booking-name">Họ và tên</label>
                <input id="booking-name" name="name" autocomplete="name" placeholder="Họ và tên" maxlength="100" required>
                <label for="booking-email">Email</label>
                <input id="booking-email" name="email" type="email" autocomplete="email" placeholder="Email" maxlength="255" required>
                <label for="booking-phone">Số điện thoại</label>
                <input id="booking-phone" name="phone" type="tel" autocomplete="tel" placeholder="Số điện thoại" pattern="[+0-9 ().\-]{8,20}" maxlength="20" required>
                <button class="booking-popup-submit" type="submit">{{ $popupSettings->submit_label }}</button>
                <p class="booking-popup-status" role="status" hidden></p>
            </form>
        </div>
    </div>
</dialog>
