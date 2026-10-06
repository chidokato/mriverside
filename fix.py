import re
path='resources/views/partials/booking-popup.blade.php'
c = open(path, encoding='utf-8').read()
c = re.sub(r'<label for="booking-phone">.*?</form>', '<label for="booking-email">Email</label>\n                <input id="booking-email" name="email" type="email" autocomplete="email" placeholder="Email" maxlength="255" required>\n                <label for="booking-phone">Số điện thoại</label>\n                <input id="booking-phone" name="phone" type="tel" autocomplete="tel" placeholder="Số điện thoại" pattern="[+0-9 ().\\\-]{8,20}" maxlength="20" required>\n                <button class="booking-popup-submit" type="submit">{{ $popupSettings->submit_label }}</button>\n                <p class="booking-popup-status" role="status" hidden></p>\n            </form>', c, flags=re.DOTALL)
open(path, 'w', encoding='utf-8').write(c)
