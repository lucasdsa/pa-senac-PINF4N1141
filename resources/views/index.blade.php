<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="{!! asset('js/index.js') !!}"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{!! asset('css/index.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/decoration.css') !!}" />
    <title><?php echo $title; ?></title>
</head>

<body>
    <div id="page">
        <button id="menuButton"><img src="{!! $userImg !!}"></img></button>
        <div id="header">
            <h1>SkillShare</h1>
        </div>

        <div id="content">
            <div id="menu">
                <ul id="menulist">
                    <?php echo $menu; ?>
                </ul>
            </div>
            <div id="text">

                <h2>Bem-vindo!</h2>

            </div>
        </div>

        <div id="footer">
            <p>Site em desenvolvimento</p>
            <div>Icon made by
                <a href="http://buditanrim.co" title="Budi Tanrim">Budi Tanrim </a>from
                <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>
                is licensed under
                <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">
                    CC BY 3.0
                </a>
            </div>
        </div>
</body>
</html>