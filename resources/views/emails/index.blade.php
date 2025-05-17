<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .password-box {
            background-color: #f4f4f4;
            padding: 15px;
            font-family: monospace;
            font-size: 18px;
            text-align: center;
            border-radius: 5px;
            border: 1px solid #ccc;
            user-select: all;
        }
    </style>
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
<div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
    <div class="card-body text-center">
        <h2 class="mb-3 text-capitalize">Hello, {{ $name }}! We are from Techie Blog.</h2>
        <p class="mb-2">Your new password</p>
        <div class="password-box">
            {{ $password }}
        </div>
        <p class="text-muted text-danger">!important: Please log in and change your password as soon as possible.</p>
    </div>
</div>

<!-- Bootstrap 5 JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
