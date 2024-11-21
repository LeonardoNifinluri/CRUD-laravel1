<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Biodata Page</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <h1 class="center_header">Welcome To My Web</h1>
        <img src="img_res/tengkorak_teknik.jpeg" alt="" class="center_img">
        <p class="center_text_body">{{$information['name']}}</p>
        <p class="center_text_body">{{$information['major']}}</p>
        <p class="center_text_body">{{$information['id']}}</p>
    </body>
</html>



