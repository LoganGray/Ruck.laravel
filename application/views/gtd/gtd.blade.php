<!DOCTYPE HTML>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') &#0183; GTD &#0183; Ruck</title>
</head>
<body>
    <div class="header">
        <ul>
        @section('navigation')
            <li><a href="#">GTD</a></li>
            <li><a href="#">Scrum</a></li>
        @yield_section
        </ul>
    </div>
    @yield('content')
</body>
</html>