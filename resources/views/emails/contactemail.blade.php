<!DOCTYPE html>
<html lang="en">

<head>

    <title>Contact Email request</title>
    <style>
        body {
            font-family: system-ui !important;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <font face="system-ui" style="font-size: 16px; line-height: 1.6;">
        <div style="max-width: 600px; background: #ececec;">
            <h1 style="text-align: center; padding: 20px 0; background: #00a84c; color: #fff;">Contact Email</h1>
            <div style="padding: 20px;">
                <p>Hi Admin, you've got a new mail request.</p>
                <p>Here are the submitted details:</p>
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Phone:</strong> {{ $user->phone }}</p>
                <p><strong>Subject:</strong> {{ $user->subject }}</p>
                <p><strong>Message:</strong><br> {{ $user->message }}</p>
            </div>
            <div style="background: #00a84c; color: #fff; padding: 20px; text-align: center;">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            </div>
        </div>
    </font>

</body>

</html>
