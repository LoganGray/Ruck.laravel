<!DOCTYPE HTML>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') &#0183; GTD &#0183; Ruck</title>
    <style>
    	body {
    		font: 14px/20px Helvetica, Arial, sans-serif;
    		margin: 0;
    		padding: 0;
    	}
    	.header {
    		border-bottom: 1px solid #333;
    		overflow: hidden;
    	}
    	.header ul {
    		list-style: none;
    		padding: 0 20px;
    	}
    	.header a {
    		float: left;
    		padding: 5px 10px;
    		background: #333;
    		color: #fff;
    		margin-right: 10px;
    		text-decoration: none;
    	}
    	.content {
    		margin: 20px;
    	}
    	form ol {
    		list-style: none;
    		padding: 0;
    	}
    	label, input, textarea {
    		display: block;
    		width: 400px;
    	}
    </style>
</head>
<body>
    <div class="header">
        <ul>
        @section('navigation')
            <li><a href="/gtd/">GTD</a></li>
            <li><a href="/scrum/">Scrum</a></li>
        @yield_section
        </ul>
    </div>
    <div class="content">
	    @yield('content')
    </div>
</body>
</html>