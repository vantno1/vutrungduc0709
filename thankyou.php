<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            text-align: center;
            padding: 20px;
        }

        h1 {
            color: #333333;
        }

        p {
            color: #666666;
            margin-bottom: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .animation {
            animation-name: rotate;
            animation-duration: 2s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .social-share {
            margin-top: 30px;
        }

        .social-share button {
            background-color: #3b5998;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            margin-right: 10px;
            cursor: pointer;
        }

        .social-share button:last-child {
            margin-right: 0;
        }

        .social-share button:hover {
            opacity: 0.8;
        }

        .qr-code {
            margin-top: 30px;

        }

        .qr-code img {
            width: 500px;
            height: 500px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Thank You for Booking a Tour!</h1>
        <p>We have received your booking and will process it shortly.</p>
        <p>An email confirmation will be sent to you with further details.</p>
        <p>Thank you for choosing our services. We look forward to providing you with an amazing experience!</p>
        <div class="social-share">
            <button>Share on Facebook</button>
            <button>Share on Twitter</button>
            <button>Share on Instagram</button>
        </div>
        <div class="qr-code">
            <img src="images/qrcode.jpg" alt="QR Code" width="200" height="200">
        </div>
    </div>
</body>

</html>