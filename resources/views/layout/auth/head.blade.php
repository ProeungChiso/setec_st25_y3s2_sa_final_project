<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title')</title>

<!-- Favicons -->
<link href="{{ asset('assets/img/favicon.png')}} " rel="icon">
<link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

<!-- Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect">
<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Optional: Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
    }
    .login-container {
        max-width: 400px;
        margin: 0 auto;
        padding: 30px;
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    .form-floating:focus-within {
        z-index: 2;
    }

    /* Custom Button Styles */
    .btn {
        background: darkviolet;
        color: white;
        border: none;
        transition: all 0.3s ease;
    }
    .btn:hover {
        background: darkviolet;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(138, 43, 226, 0.3);
        color: white;
    }
    .btn:active {
        transform: translateY(0);
    }
    .btn-outline-primary {
        background: transparent;
        color: darkviolet;
    }
    .btn-outline-primary:hover {
        background: transparent;
        color: darkviolet;
        box-shadow: none!important;
    }

    .back-to-home {
        margin-bottom: 20px;
    }
    .divider {
        display: flex;
        align-items: center;
        margin: 20px 0;
    }
    .divider::before, .divider::after {
        content: "";
        flex: 1;
        border-bottom: 1px solid #dee2e6;
    }
    .divider-text {
        padding: 0 10px;
        color: #6c757d;
    }
    .title {
        color: darkviolet;
        font-weight: bolder;
    }
</style>
