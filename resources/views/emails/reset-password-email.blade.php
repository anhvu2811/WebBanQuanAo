<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            margin: 20px auto;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #007BFF;
            color: #ffffff;
            text-align: center;
            padding: 15px 0;
            border-radius: 8px 8px 0 0;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            color: #333333;
        }

        .content p {
            font-size: 16px;
            color: #555555;
            line-height: 1.6;
        }

        .button {
            display: inline-block;
            background-color: #007BFF;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            color: #888888;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>Đặt lại mật khẩu</h1>
        </div>

        <div class="content">
            <h2>Chào {{ $name }},</h2>
            <p>Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p>
            <p>Mật khẩu mới: <b>{{ $newPassword }}</b></p>
            {{-- <p>Để đặt lại mật khẩu, vui lòng nhấn vào liên kết dưới đây:</p>
            <a href="{{ $resetUrl }}" class="button">Đặt lại mật khẩu</a>
            <p>Liên kết này sẽ hết hạn trong 60 phút, vì vậy hãy chắc chắn rằng bạn thực hiện nhanh chóng.</p> --}}
        </div>

        <div class="footer">
            <p>Thân ái, <br> WineHouse</p>
        </div>
    </div>

</body>
</html>
