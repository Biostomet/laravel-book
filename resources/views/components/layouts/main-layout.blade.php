<!DOCTYPE html>
<html lang="fr">
@props(['title'])

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/scrollreveal"></script>
    <title>Document | {{ $title }}</title>
    @vite('resources/css/app.css')

</head>

<body>
    {{ $slot }}
    @vite('resources/js/app.js')
</body>

</html>
