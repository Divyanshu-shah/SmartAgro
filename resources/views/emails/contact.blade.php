<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f0fdf4; font-family: 'Segoe UI', Arial, sans-serif; line-height: 1.6; color: #333;">
    <!-- Wrapper table for full-width background -->
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color: #f0fdf4; padding: 30px 0;">
        <tr>
            <td align="center">
                <!-- Main card -->
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08);">
                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #166534, #15803d, #22c55e); padding: 32px 24px; text-align: center;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center">
                                        <div style="width: 56px; height: 56px; background-color: rgba(255,255,255,0.2); border-radius: 50%; line-height: 56px; font-size: 24px; margin: 0 auto 12px;">
                                            ✉️
                                        </div>
                                        <h1 style="color: #ffffff; font-size: 22px; margin: 0 0 4px; font-weight: 700;">New Contact Submission</h1>
                                        <p style="color: #bbf7d0; font-size: 14px; margin: 0;">SmartAgro Contact Form</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding: 28px 24px;">
                            <!-- Name -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 16px;">
                                <tr>
                                    <td style="padding: 14px 16px; background-color: #f8fafc; border-left: 4px solid #22c55e; border-radius: 6px;">
                                        <p style="margin: 0 0 2px; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: #6b7280; font-weight: 600;">Name</p>
                                        <p style="margin: 0; font-size: 16px; color: #1f2937; font-weight: 500;">{{ $name }}</p>
                                    </td>
                                </tr>
                            </table>

                            <!-- Email -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 16px;">
                                <tr>
                                    <td style="padding: 14px 16px; background-color: #f8fafc; border-left: 4px solid #3b82f6; border-radius: 6px;">
                                        <p style="margin: 0 0 2px; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: #6b7280; font-weight: 600;">Email</p>
                                        <p style="margin: 0; font-size: 16px;"><a href="mailto:{{ $email }}" style="color: #2563eb; text-decoration: none;">{{ $email }}</a></p>
                                    </td>
                                </tr>
                            </table>

                            <!-- Phone (conditional) -->
                            @if($phone)
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 16px;">
                                <tr>
                                    <td style="padding: 14px 16px; background-color: #f8fafc; border-left: 4px solid #f59e0b; border-radius: 6px;">
                                        <p style="margin: 0 0 2px; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: #6b7280; font-weight: 600;">Phone</p>
                                        <p style="margin: 0; font-size: 16px; color: #1f2937;">{{ $phone }}</p>
                                    </td>
                                </tr>
                            </table>
                            @endif

                            <!-- Subject -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 16px;">
                                <tr>
                                    <td style="padding: 14px 16px; background-color: #f8fafc; border-left: 4px solid #8b5cf6; border-radius: 6px;">
                                        <p style="margin: 0 0 2px; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: #6b7280; font-weight: 600;">Subject</p>
                                        <p style="margin: 0; font-size: 16px; color: #1f2937; font-weight: 500;">{{ $mailSubject }}</p>
                                    </td>
                                </tr>
                            </table>

                            <!-- Message -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 16px; background-color: #f0fdf4; border: 1px solid #dcfce7; border-radius: 8px;">
                                        <p style="margin: 0 0 6px; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: #6b7280; font-weight: 600;">Message</p>
                                        <p style="margin: 0; font-size: 15px; color: #374151; line-height: 1.7; white-space: pre-wrap;">{{ $contactMessage }}</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding: 20px 24px; background-color: #f9fafb; border-top: 1px solid #e5e7eb; text-align: center;">
                            <p style="margin: 0; font-size: 12px; color: #9ca3af;">This email was sent from the SmartAgro contact form.</p>
                            <p style="margin: 4px 0 0; font-size: 12px; color: #9ca3af;">© {{ date('Y') }} SmartAgro. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
