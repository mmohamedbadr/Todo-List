<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="antialiased">
      <div id="app">
          <Comp></Comp>
      </div>
    </body>
    <script src="{{ mix('js/app.js') }}" type="text/javascript" ></script>
</html>
