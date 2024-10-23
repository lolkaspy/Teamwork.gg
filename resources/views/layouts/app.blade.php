<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Teamwork.gg</title>


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="static/style/app.css" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script>
        window.onload = function() {
            var span = document.getElementsByClassName('badge');
            for (var i = 0; i < span.length; i++) {
                span[i].style.backgroundColor = 'rgb(' +
                    Math.floor(Math.random() * 200) + ',' +
                    Math.floor(Math.random() * 200) + ',' +
                    Math.floor(Math.random() * 200) + ')';
            }
        };
    </script>

</head>
<body class="antialiased body-whitesmoke">

<header class="sticky-top">
   <x-navbar/>
</header>

@yield('form')
@yield('content')

<footer class="text-lg-start panel justify-content-center d-flex footer-panel">
<x-footer-navbar/>
</footer>
<script>
    const words = ["завтра!", "вчера!", "послезавтра!", "через год!", "год назад!"];
    const backgrounds = [
        'it.jpg',
        'project.jpg',
        'sport.jpg',
        'cybersport.jpg',
        'science.jpg'
    ];

    const dynamicText = document.getElementById('dynamic-text');
    const dynamicContent = document.getElementById("dynamic-bg");
    let index = 0;
    let interval;

    dynamicText.addEventListener('mouseenter', () => {
        index = 0;
        interval = setInterval(() => {
            dynamicText.textContent = words[index];
            dynamicContent.style.backgroundImage = "url('static/images/" + backgrounds[index] + "')";
            dynamicContent.style.color = "white";
            index = (index + 1) % words.length; // Циклический переход по массиву
        }, 425);
    });
    //static/images/project_placeholder.jpg
    dynamicText.addEventListener('mouseleave', () => {
        clearInterval(interval);
        dynamicText.textContent = "всегда!";
        dynamicContent.style.backgroundImage = "";
        dynamicContent.style.color = "black";

    });


    function changeUnderlineColor() {
        const spanElement = document.querySelector('span');
        // Генерация случайного цвета
        const randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
        // Изменение цвета подчеркивания
        spanElement.style.setProperty('--underline-color', randomColor);
        spanElement.style.setProperty('text-decoration-color', randomColor);
        spanElement.style.borderBottom = "2px solid ${randomColor}";
    }

    // Добавляем обработчик события клика
    document.querySelector('span').addEventListener('mouseenter', changeUnderlineColor);
</script>
</body>
</html>
