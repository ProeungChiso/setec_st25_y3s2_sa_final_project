<!DOCTYPE html>
<html lang="en">

<head>

    @include("layout.user.head")

</head>

<body class="index-page">

    @include("layout.user.navbar")

    @yield("content")

    @include("layout.user.footer")

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

    @include("layout.user.script")

    @if(session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
    @if(session('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: "{{ session('error') }}",
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
    @if($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Something went wrong!',
                html: `{!! implode('<br>', $errors->all()) !!}`,
            });
        </script>
    @endif

</body>

</html>
