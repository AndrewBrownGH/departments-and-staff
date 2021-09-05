<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SetkaSite</title>
</head>
<body>
    <div id="app">
        <v-header></v-header>
        <b-container class="mt-3">
            <router-view></router-view>
        </b-container>
    </div>
    <script src="{{asset('js/app.js')}}" ></script>
</body>
</html>