<meta charset="UTF-8">
@if(isset($seo))
<meta name="keywords" content="{{$seo->keywords}}">
<meta name="description" content="{{$seo->description}}">
<meta name="author" content="MD. FAKHRUL ISLAM TALUKDER">
@endif
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet/less" type="text/css" href="{{url('css/theme-style.less')}}">
<link rel="stylesheet" href="{{url('css/ie.style.css')}}">
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<!--[if IE 7]>
  <link rel="stylesheet" href="css/font-awesome-ie7.css">
<![endif]-->
<script src="{{url('js/vendor/modernizr.js')}}"></script>
<!--[if IE 8]><script src="js/vendor/less-1.3.3.js"></script><![endif]-->
<!--[if gt IE 8]><!--><script src="{{url('js/vendor/less.js')}}"></script><!--<![endif]-->
<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=260070431060837&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>