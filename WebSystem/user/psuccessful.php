<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
    <style>
        /* Styles for the pop-up container */
        .popup-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #1a1a1a;
            color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Styles for the checkmark icon */
        .checkmark {
            display: block;
            margin: 0 auto;
            font-size: 48px;
            color: #00cc00;
        }

        /* Styles for the text */
        .message {
            font-weight: bold;
            margin-top: 10px;
        }

        /* Styles for the OK button */
        .ok-button {
            background-color: #00cc00;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="popup-container">
        <span class="checkmark">✓</span>
        <p class="message">Thank You!</p>
        <p>Your details have been successfully submitted. Thanks!</p>
        <button class="ok-button" onclick="document.location='event.php'">OK</button>
    </div>
</body>
</html>
        