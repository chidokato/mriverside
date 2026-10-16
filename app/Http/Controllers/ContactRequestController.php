<?php

namespace App\Http\Controllers;

use App\Mail\ContactRequestMail;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ContactRequestController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['nullable', 'email:filter', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^[+0-9 ().-]{8,20}$/'],
        ], [], [
            'name' => 'họ và tên',
            'email' => 'email', 'phone' => 'số điện thoại',
        ]);

        $recipient = WebsiteSetting::current()->booking_email ?: (config('mail.booking_to') ?: config('mail.from.address'));
        $hotline = WebsiteSetting::current()->hotline ?: '0799 618 555';

        if (! filter_var($recipient, FILTER_VALIDATE_EMAIL)
            || in_array(config('mail.default'), ['log', 'array'], true)) {
            return response()->json(['message' => "Chức năng gửi yêu cầu đang được cấu hình. Vui lòng gọi $hotline để được hỗ trợ."], 503);
        }

        try {
            Mail::to($recipient)->send(new ContactRequestMail($data));
        } catch (\Throwable $exception) {
            report($exception);
            return response()->json(['message' => "Chưa gửi được yêu cầu. Vui lòng thử lại sau hoặc gọi $hotline."], 503);
        }

        return response()->json(['message' => 'Đã gửi yêu cầu liên hệ. M Riverside Danang sẽ liên hệ với bạn để tư vấn.']);
    }
}
