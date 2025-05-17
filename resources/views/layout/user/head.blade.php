<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>@yield('title')</title>
<meta name="description" content="">
<meta name="keywords" content="">

<!-- Favicons -->
<link href="{{ asset('assets/img/favicon.png')}} " rel="icon">
<link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

<!-- Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect">
<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

<!-- Main CSS File -->
<link href="{{asset('assets/css/main.css')}}" rel="stylesheet">

<!-- Include Quill library -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    #editor{
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;

    }
    .ql-toolbar{
        border-top-right-radius: 5px;
        border-top-left-radius: 5px;
    }
</style>

<style>
    .custom-file-upload {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 0.5rem 1rem;
        background-color: #0d6efd;
        color: white;
        border-radius: 0.5rem;
        cursor: pointer;
        font-weight: 500;
        transition: background 0.3s ease;
    }

    .custom-file-upload:hover {
        background-color: #0b5ed7;
    }

    .custom-file-upload i {
        font-size: 1.2rem;
    }

    #formFile {
        display: none;
    }
</style>

<style>
    /* Add to your stylesheet */
    .modal-dialog-scrollable .modal-body {
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }

    /* For Quill editor scrolling */
    #editor {
        max-height: 300px;
        overflow-y: auto;
    }
</style>

<style>
    .transition-card {
        transition: all 0.3s ease;
    }

    .transition-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }

    .blog-thumbnail-container {
        position: relative;
        overflow: hidden;
        height: 100%;
    }

    .blog-thumbnail {
        transition: transform 0.5s ease;
    }

    .transition-card:hover .blog-thumbnail {
        transform: scale(1.05);
    }

    .blog-category-badge {
        position: absolute;
        top: 10px;
        left: 10px;
    }
</style>

<link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.css" />

<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>


<!-- =======================================================
* Template Name: Techie
* Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
* Updated: Aug 07 2024 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
======================================================== -->
