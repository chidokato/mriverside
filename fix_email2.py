with open('resources/views/emails/contact-request.blade.php', 'w', encoding='utf-8') as f:
    f.write('''<h2>Yêu cầu đăng ký từ khách hàng</h2>
<p><strong>Họ và tên:</strong> {{ $contact['name'] }}</p>
<p><strong>Email:</strong> {{ $contact['email'] ?? 'Không có' }}</p>
<p><strong>Số điện thoại:</strong> {{ $contact['phone'] }}</p>
<p>Yêu cầu từ form đăng ký trên website M Riverside Danang.</p>
''')
print("Updated email view properly")
