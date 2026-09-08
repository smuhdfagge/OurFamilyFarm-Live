<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New enquiry</title>
</head>
<body style="margin:0;padding:0;background:#FAF7F2;font-family:Arial,sans-serif;color:#6B4226;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#FAF7F2;padding:32px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="background:#FFFFFF;border:1px solid #E5D5C5;border-radius:20px;overflow:hidden;max-width:600px;">
                    <tr>
                        <td style="background:#6B4226;padding:24px 32px;">
                            <img src="{{ asset('logo.png') }}" alt="Our Family Farm Nig. Ltd." width="40" height="40" style="display:inline-block;vertical-align:middle;border-radius:50%;background:#FFFFFF;">
                            <span style="font-size:24px;font-weight:bold;color:#FFFFFF;vertical-align:middle;margin-left:12px;">Our Family Farm Nig. Ltd.</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px;">
                            <p style="margin:0 0 18px;font-size:16px;line-height:1.8;">You have received a new enquiry from <strong>{{ $submission->name }}</strong>.</p>
                            <p style="margin:0 0 10px;font-size:15px;line-height:1.8;"><strong>Email:</strong> {{ $submission->email }}</p>
                            <p style="margin:0 0 10px;font-size:15px;line-height:1.8;"><strong>Phone:</strong> {{ $submission->phone }}</p>
                            <p style="margin:0 0 10px;font-size:15px;line-height:1.8;"><strong>Service:</strong> {{ $submission->service ?: 'General enquiry' }}</p>
                            <div style="margin-top:18px;padding:18px;background:#FAF7F2;border-left:4px solid #8CC63F;border-radius:12px;font-size:15px;line-height:1.8;">{{ $submission->message }}</div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
