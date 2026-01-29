<!DOCTYPE html>
<html>

<head>
    <title>Thank You for Contacting Us</title>
    <style>
        /* Default Light Mode */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .email-container {
            max-width: 600px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: auto;
        }

        .email-header {
            background-color: #00923F;
            padding: 20px;
            color: white;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .email-body {
            padding: 20px;
            text-align: left;
        }

        .email-body p {
            font-size: 16px;
            line-height: 1.6;
        }

        .highlight {
            font-weight: bold;
            color: #00923F;
        }

        .email-footer {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            color: #777;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            color: white;
            background-color: #00923F;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #090d5e;
            color: #f4f4f4;
        }

        /* 🌙 Dark Mode Styling */
        @media (prefers-color-scheme: dark) {
            body {
                background-color: #121212;
                color: #e0e0e0;
            }

            .email-container {
                background-color: #1e1e1e;
                box-shadow: none;
            }

            .email-header {
                background-color: #00923F;
            }

            .highlight {
                color: #4db8ff;
            }

            .email-footer {
                background-color: #1e1e1e;
                color: #bbb;
            }

            .btn {
                background-color: #00923F;
            }

            .btn:hover {
                background-color: #00923F;
                color: #f4f4f4;
            }
        }
    </style>
</head>

<body>

    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            Thank You, {{ $contact->name }}!
        </div>

        <!-- Body -->
        <div class="email-body">
            <p>Hello <span class="highlight">{{ $contact->name }}</span>,</p>

            <p>We appreciate you reaching out to us. Your message has been received, and one of our team members will
                get back to you as soon as possible.</p>

            <p><strong>Your Message:</strong></p>
            <p>"{{ $contact->message }}"</p>

            <p>If your inquiry is urgent, please feel free to <a href="mailto:{{ config('mail.from.address') }}"
                    class="highlight">email us directly</a>.</p>

            <br>

            <!-- Call to Action Button -->
            <div style="text-align: center;">
                <a href="{{ route('contact') }}" class="btn">Visit Our Website</a>
            </div>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>

</body>

</html>
