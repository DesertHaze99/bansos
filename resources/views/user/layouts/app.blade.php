<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.layouts.include.head')
    <style>
        .objectAnimate {
            animation: MoveUpDown 3s linear infinite;
            position: absolute;
            left: 0;
            bottom: 0;
            margin-bottom: -110px;
        }

        .floatIn {
            animation: FloatIn 3s linear infinite;
            position: absolute;
            left: 0;
            bottom: -100;
        }

        @keyframes MoveUpDown {
            0%, 100% {
                bottom: 0;
            }
            50% {
                bottom: 20px;
            }
        }

        @keyframes FloatIn {
            100% {
                bottom: 0;
            }
        }
    </style>
</head>
<body class="bg-shape">

    @include('user.layouts.include.header')


    @yield('content')


    @include('user.layouts.include.footer')
    
    @include('user.layouts.include.script')

</body>
</html>