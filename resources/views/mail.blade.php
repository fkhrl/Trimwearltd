<html lang="en-US">
<head>
    <meta charset="text/html">
</head>
<body>
	{{asset('/img/logo.png')}}
    Subject: {{$title}}
    <br>
    Message body:
    <?php
    $mesages= str_replace('"', '', $body);
    $mesage= str_replace('<\/p>', '', $mesages);
     echo html_entity_decode($mesage);?>
</body>
</html>