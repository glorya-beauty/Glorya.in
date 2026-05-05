<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - Glorya Beauty</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f4f4f4;">
    <div style="background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="text-align: center; padding-bottom: 20px; border-bottom: 2px solid #ff69b4;">
            <h1 style="color: #ff69b4; margin: 0; font-size: 28px;">✨ Glorya Beauty ✨</h1>
            <h2 style="color: #333; margin: 10px 0 0 0;">Booking Confirmation</h2>
        </div>

        <p>Dear {{ $booking->customer_name }},</p>
        
        <p>Thank you for choosing Glorya Beauty! Your booking has been confirmed and is currently being processed. Here are your booking details:</p>

        <div style="margin: 20px 0;">
            <h3 style="color: #333; border-bottom: 1px solid #eee; padding-bottom: 10px;">📋 Booking Information</h3>
            <div style="margin: 10px 0; display: flex; justify-content: space-between;">
                <span style="font-weight: bold; color: #555;">Booking Number:</span>
                <span style="color: #333;"><strong>{{ $booking->booking_number }}</strong></span>
            </div>
            <div style="margin: 10px 0; display: flex; justify-content: space-between;">
                <span style="font-weight: bold; color: #555;">Status:</span>
                <span style="color: #333;"><span style="background-color: #28a745; color: white; padding: 5px 10px; border-radius: 15px; font-size: 12px; font-weight: bold;">{{ ucfirst(str_replace('_', ' ', $booking->status)) }}</span></span>
            </div>
            <div style="margin: 10px 0; display: flex; justify-content: space-between;">
                <span style="font-weight: bold; color: #555;">Booking Date:</span>
                <span style="color: #333;">{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</span>
            </div>
            <div style="margin: 10px 0; display: flex; justify-content: space-between;">
                <span style="font-weight: bold; color: #555;">Time Slot:</span>
                <span style="color: #333;">{{ $booking->time_slot }}</span>
            </div>
        </div>

        <div style="margin: 20px 0;">
            <h3 style="color: #333; border-bottom: 1px solid #eee; padding-bottom: 10px;">👤 Customer Information</h3>
            <div style="margin: 10px 0; display: flex; justify-content: space-between;">
                <span style="font-weight: bold; color: #555;">Name:</span>
                <span style="color: #333;">{{ $booking->customer_name }}</span>
            </div>
            <div style="margin: 10px 0; display: flex; justify-content: space-between;">
                <span style="font-weight: bold; color: #555;">Email:</span>
                <span style="color: #333;">{{ $booking->customer_email }}</span>
            </div>
            <div style="margin: 10px 0; display: flex; justify-content: space-between;">
                <span style="font-weight: bold; color: #555;">Phone:</span>
                <span style="color: #333;">{{ $booking->customer_phone }}</span>
            </div>
            <div style="margin: 10px 0; display: flex; justify-content: space-between;">
                <span style="font-weight: bold; color: #555;">Address:</span>
                <span style="color: #333;">{{ $booking->customer_address }}</span>
            </div>
        </div>

        @if($booking->items && $booking->items->count() > 0)
        <div style="margin: 20px 0;">
            <h3 style="color: #333; border-bottom: 1px solid #eee; padding-bottom: 10px;">💅 Services Booked</h3>
            @foreach($booking->items as $item)
            <div style="background-color: #f9f9f9; padding: 15px; margin: 10px 0; border-radius: 5px; border-left: 4px solid #ff69b4;">
                <div style="margin: 5px 0; display: flex; justify-content: space-between;">
                    <span style="font-weight: bold; color: #555;">Service:</span>
                    <span style="color: #333;">{{ $item->service_name }}</span>
                </div>
                <div style="margin: 5px 0; display: flex; justify-content: space-between;">
                    <span style="font-weight: bold; color: #555;">Category:</span>
                    <span style="color: #333;">{{ $item->service_category }}</span>
                </div>
                <div style="margin: 5px 0; display: flex; justify-content: space-between;">
                    <span style="font-weight: bold; color: #555;">Duration:</span>
                    <span style="color: #333;">{{ $item->service_time }}</span>
                </div>
                <div style="margin: 5px 0; display: flex; justify-content: space-between;">
                    <span style="font-weight: bold; color: #555;">Price:</span>
                    <span style="color: #333;">₹{{ number_format($item->service_price, 2) }}</span>
                </div>
                <div style="margin: 5px 0; display: flex; justify-content: space-between;">
                    <span style="font-weight: bold; color: #555;">Quantity:</span>
                    <span style="color: #333;">{{ $item->quantity }}</span>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div style="margin: 20px 0;">
            <h3 style="color: #333; border-bottom: 1px solid #eee; padding-bottom: 10px;">💅 Service Details</h3>
            <div style="background-color: #f9f9f9; padding: 15px; margin: 10px 0; border-radius: 5px; border-left: 4px solid #ff69b4;">
                <div style="margin: 5px 0; display: flex; justify-content: space-between;">
                    <span style="font-weight: bold; color: #555;">Service:</span>
                    <span style="color: #333;">{{ $booking->service_name }}</span>
                </div>
            </div>
        </div>
        @endif

        <div style="background-color: #ff69b4; color: white; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <h3 style="color: white;">💰 Payment Details</h3>
            <div style="margin: 5px 0; display: flex; justify-content: space-between;">
                <span>Base Amount:</span>
                <span>₹{{ number_format($booking->base_amount ?? 0, 2) }}</span>
            </div>
            @if($booking->gst_amount)
            <div style="margin: 5px 0; display: flex; justify-content: space-between;">
                <span>GST (5%):</span>
                <span>₹{{ number_format($booking->gst_amount, 2) }}</span>
            </div>
            @endif
            <div style="margin: 15px 0 5px 0; display: flex; justify-content: space-between; font-size: 18px; font-weight: bold; border-top: 1px solid rgba(255,255,255,0.3); padding-top: 10px;">
                <span>Total Amount:</span>
                <span>₹{{ number_format($booking->amount, 2) }}</span>
            </div>
        </div>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ route('my.bookings') }}" style="display: inline-block; padding: 12px 25px; background-color: #ff69b4; color: white; text-decoration: none; border-radius: 5px;">View My Bookings</a>
        </div>

        <div style="text-align: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; color: #666;">
            <p><strong>Important Information:</strong></p>
            <ul style="text-align: left;">
                <li>Please arrive 10 minutes before your scheduled time</li>
                <li>Bring your payment confirmation screenshot</li>
                <li>For any changes, please call us at least 24 hours in advance</li>
                <li>Our team will verify your payment and confirm the appointment</li>
            </ul>
            
            <p><strong>Contact Us:</strong></p>
            <p>📞 01141767035 | 📧 support@gloryabeauty.com</p>
            <p>📍 Your Beauty Destination</p>
            
            <hr style="margin: 20px 0; border: none; border-top: 1px solid #eee;">
            <p style="color: #999; font-size: 12px;">
                This is an automated message. Please do not reply to this email.<br>
                © 2026 Glorya Beauty. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
