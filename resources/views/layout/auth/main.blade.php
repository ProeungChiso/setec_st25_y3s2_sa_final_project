<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.auth.head')
</head>
<body>

    @yield('content')

    @if(session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            }).then(()=>{
                const currentRoute = window.location.pathname;

                if(currentRoute === '/register'){
                    console.log("register")
                    window.location.href = '/login'
                }else{
                    console.log("login")
                    window.location.href = '/'
                }
            })
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

    @include('layout.auth.script')

</body>
</html>
