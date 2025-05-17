<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>404</title>

    <meta name="robots" content="noindex, follow">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .glitch-wrapper {
            position: relative;
            display: inline-block;
        }

        .glitch {
            position: relative;
            font-size: 2.5rem;
            font-weight: 600;
            line-height: 1.2;
            letter-spacing: 5px;
            animation: shake 0.8s infinite;
        }

        .glitch::before,
        .glitch::after {
            content: attr(data-text);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .glitch::before {
            left: 2px;
            text-shadow: -2px 0 #ff00c1;
            clip: rect(24px, 550px, 90px, 0);
            animation: glitch-anim 3s infinite linear alternate-reverse;
        }

        .glitch::after {
            left: -2px;
            text-shadow: -2px 0 #00fff9;
            clip: rect(85px, 550px, 140px, 0);
            animation: glitch-anim2 2.5s infinite linear alternate-reverse;
        }

        @keyframes glitch-anim {
            0% {
                clip: rect(42px, 9999px, 44px, 0);
            }
            5% {
                clip: rect(12px, 9999px, 59px, 0);
            }
            10% {
                clip: rect(48px, 9999px, 29px, 0);
            }
            15% {
                clip: rect(42px, 9999px, 73px, 0);
            }
            20% {
                clip: rect(63px, 9999px, 27px, 0);
            }
            25% {
                clip: rect(34px, 9999px, 55px, 0);
            }
            30% {
                clip: rect(86px, 9999px, 73px, 0);
            }
            35% {
                clip: rect(20px, 9999px, 20px, 0);
            }
            40% {
                clip: rect(26px, 9999px, 60px, 0);
            }
            45% {
                clip: rect(25px, 9999px, 66px, 0);
            }
            50% {
                clip: rect(57px, 9999px, 98px, 0);
            }
            55% {
                clip: rect(5px, 9999px, 46px, 0);
            }
            60% {
                clip: rect(82px, 9999px, 31px, 0);
            }
            65% {
                clip: rect(54px, 9999px, 27px, 0);
            }
            70% {
                clip: rect(28px, 9999px, 99px, 0);
            }
            75% {
                clip: rect(45px, 9999px, 69px, 0);
            }
            80% {
                clip: rect(23px, 9999px, 85px, 0);
            }
            85% {
                clip: rect(54px, 9999px, 84px, 0);
            }
            90% {
                clip: rect(45px, 9999px, 47px, 0);
            }
            95% {
                clip: rect(37px, 9999px, 20px, 0);
            }
            100% {
                clip: rect(4px, 9999px, 91px, 0);
            }
        }

        @keyframes glitch-anim2 {
            0% {
                clip: rect(65px, 9999px, 100px, 0);
            }
            5% {
                clip: rect(52px, 9999px, 74px, 0);
            }
            10% {
                clip: rect(79px, 9999px, 85px, 0);
            }
            15% {
                clip: rect(75px, 9999px, 5px, 0);
            }
            20% {
                clip: rect(67px, 9999px, 61px, 0);
            }
            25% {
                clip: rect(14px, 9999px, 79px, 0);
            }
            30% {
                clip: rect(1px, 9999px, 66px, 0);
            }
            35% {
                clip: rect(86px, 9999px, 30px, 0);
            }
            40% {
                clip: rect(23px, 9999px, 98px, 0);
            }
            45% {
                clip: rect(85px, 9999px, 72px, 0);
            }
            50% {
                clip: rect(71px, 9999px, 75px, 0);
            }
            55% {
                clip: rect(2px, 9999px, 48px, 0);
            }
            60% {
                clip: rect(30px, 9999px, 16px, 0);
            }
            65% {
                clip: rect(59px, 9999px, 50px, 0);
            }
            70% {
                clip: rect(41px, 9999px, 62px, 0);
            }
            75% {
                clip: rect(2px, 9999px, 82px, 0);
            }
            80% {
                clip: rect(47px, 9999px, 73px, 0);
            }
            85% {
                clip: rect(3px, 9999px, 27px, 0);
            }
            90% {
                clip: rect(26px, 9999px, 55px, 0);
            }
            95% {
                clip: rect(42px, 9999px, 97px, 0);
            }
            100% {
                clip: rect(38px, 9999px, 49px, 0);
            }
        }

        @keyframes shake {
            0% { transform: translate(1px, 1px) rotate(0deg); }
            10% { transform: translate(-1px, -2px) rotate(-1deg); }
            20% { transform: translate(-3px, 0px) rotate(1deg); }
            30% { transform: translate(3px, 2px) rotate(0deg); }
            40% { transform: translate(1px, -1px) rotate(1deg); }
            50% { transform: translate(-1px, 2px) rotate(-1deg); }
            60% { transform: translate(-3px, 1px) rotate(0deg); }
            70% { transform: translate(3px, 1px) rotate(-1deg); }
            80% { transform: translate(-1px, -1px) rotate(1deg); }
            90% { transform: translate(1px, 2px) rotate(0deg); }
            100% { transform: translate(1px, -2px) rotate(-1deg); }
        }
    </style>
</head>

<body>
<section id="notFound">
    <div class="w-100 vh-100 bg-dark d-flex flex-column justify-content-center align-items-center text-white">
        <div class="container text-center">
            <h1 class="display-1 fw-bold mb-4">404</h1>
            <div class="glitch-wrapper mb-4">
                <div class="glitch" data-text="Page Not Found">Page Not Found</div>
            </div>
            <p class="lead mb-5">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
            <a href="{{ url('/') }}" class="btn btn-outline-light btn-lg px-5">
                Return Home
            </a>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
