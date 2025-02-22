<!DOCTYPE html>
<html>
    <head>

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

        @vite([
        'resources/css/app.css',
        'resources/js/app.js'
        ])

        {{--Remix icons--}}
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css"
            rel="stylesheet"
            integrity="sha512-MqL4+Io386IOPMKKyplKII0pVW5e+kb+PI/I3N87G3fHIfrgNNsRpzIXEi+0MQC0sR9xZNqZqCYVcC61fL5+Vg=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />

        <title>
            UI Library
        </title>

        @inertiaHead

        @routes

    </head>
    <body>

       @inertia

    </body>
</html>
