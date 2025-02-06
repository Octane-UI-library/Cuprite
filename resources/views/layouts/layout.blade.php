<!DOCTYPE html>
<html>

    <head>
        <script>
            const theme = localStorage.getItem('theme');
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>

        <meta
            charset="UTF-8"
        >

        <meta
            name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
        >

        <meta
            http-equiv="X-UA-Compatible"
            content="ie=edge"
        >

        <meta
            name="csrf-token"
            content="{{ csrf_token() }}"
        >

        <link
            type="image/x-icon"
            href="/favicon.ico"
            rel="icon"
        >

        @vite([
        'resources/css/app.css',
        'resources/js/app.js'
        ])

        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css"
            rel="stylesheet"
            integrity="sha512-MqL4+Io386IOPMKKyplKII0pVW5e+kb+PI/I3N87G3fHIfrgNNsRpzIXEi+0MQC0sR9xZNqZqCYVcC61fL5+Vg=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />

        <title>
            @yield('app_main_layout_title')
        </title>

        @stack('app_main_layout_stack_head')

    </head>

    <body>
        @yield('app_main_layout_content')

        @stack('app_main_layout_scripts')
    </body>

</html>
