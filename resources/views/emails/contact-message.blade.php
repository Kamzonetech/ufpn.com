<!DOCTYPE html>
<html>
<head>
    <title>New Contact Message</title>
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
            background-color: #04062e;
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
            color: #04062e;
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
            background-color: #04062e;
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
                background-color: #04062e;
            }

            .highlight {
                color: #4db8ff;
            }

            .email-footer {
                background-color: #1e1e1e;
                color: #bbb;
            }

            .btn {
                background-color: #04062e;
            }

            .btn:hover {
                background-color: #090d5e;
                color: #f4f4f4;
            }
        }
    </style>
</head>
<body>

    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            📩 New Contact Message
        </div>

        <!-- Body -->
        <div class="email-body">
            <p><span class="highlight">Name:</span> {{ $contact->name }}</p>
            <p><span class="highlight">Email:</span> {{ $contact->email }}</p>
            <p><span class="highlight">Subject:</span> {{ $contact->subject }}</p>
            <p><span class="highlight">Message:</span></p>
            <p>{{ $contact->message }}</p>

            <br>

            <!-- Reply Button -->
            <div style="text-align: center;">
                <a href="mailto:{{ $contact->email }}" class="btn">Reply to {{ $contact->name }}</a>
            </div>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>

</body>
</html>
