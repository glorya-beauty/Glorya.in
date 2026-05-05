<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset - Glorya Beauty</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f4f4f4;">
    <div style="background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="text-align: center; padding-bottom: 20px; border-bottom: 2px solid #8B5CF6;">
            <h1 style="color: #8B5CF6; margin: 0; font-size: 28px;">✨ Glorya Beauty ✨</h1>
            <h2 style="color: #333; margin: 10px 0 0 0;">Password Reset Request</h2>
        </div>

        <p>Dear Customer,</p>
        
        <p>We received a request to reset your password for your Glorya Beauty account. Click the button below to reset your password:</p>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ route('password.reset', $token) }}" 
               style="display: inline-block; padding: 15px 30px; background: linear-gradient(135deg, #8B5CF6 0%, #7C3AED 100%); color: white; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 16px;">
                Reset Your Password
            </a>
        </div>

        <p style="color: #666; font-size: 14px;">This link will expire in 60 minutes for security reasons.</p>

        <p style="color: #666; font-size: 14px;">If you didn't request a password reset, please ignore this email. Your password will remain unchanged.</p>

        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0; border-left: 4px solid #8B5CF6;">
            <h4 style="color: #8B5CF6; margin-top: 0;">Security Tips:</h4>
            <ul style="color: #555; margin-bottom: 0;">
                <li>Choose a strong password with at least 8 characters</li>
                <li>Include uppercase, lowercase, numbers, and symbols</li>
                <li>Don't use the same password for multiple accounts</li>
                <li>Never share your password with anyone</li>
            </ul>
        </div>

        <div style="text-align: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; color: #666;">
            <p><strong>Need Help?</strong></p>
            <p>📞 Call us: 01141767035</p>
            <p>📧 Email: glorya.beauty.service@gmail.com</p>
            
            <hr style="margin: 20px 0; border: none; border-top: 1px solid #eee;">
            <p style="color: #999; font-size: 12px;">
                This is an automated message. Please do not reply to this email.<br>
                © 2026 Glorya Beauty. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
