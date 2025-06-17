<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class=" min-h-[100dvh] flex flex-col justify-center items-center " style="background: linear-gradient(to bottom left, #0f172a, #1e1a78, #0f172a);">
    @yield('content')

    
    <script>
        @theme {
            --breakpoint-xs: 30rem;
        }
    </script>
    @yield('js')
</body>
</html>
