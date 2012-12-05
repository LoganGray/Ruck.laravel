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
    		float: left;
    	}
    	form ol {
    		list-style: none;
    		padding: 0;
    	}
    	label, select, input, textarea {
    		display: block;
    		width: 400px;
    	}
    	.projects {
    		float: left;
    		width: 200px;
    		padding: 20px;
    	}
    	.todos {
    		list-style: none;
    		padding: 0;
    	}
    	.todos li:first-child {
    		background: #ff0;
    	}
    	.todos a {
    		display: block;
    		text-decoration: none;
    		padding: 5px;
    	}
    	.todos a:hover {
    		background: #eee;
    	}
    	.todos input {
    		display: inline;
    		margin-right: 5px;
    		width: auto;
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
    <div class="projects">
    	<?php echo render('gtd.projects'); ?>
    </div>
    <div class="content">
	    @yield('content')
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="/j/vendor/jquery-1.8.3.js"><\/script>')</script>
	<script src="/j/vendor/jquery-ui-1.9.2.custom.js"></script>
	<script>
		$(function () {
			$(".todos").sortable({
				revert: true,
				update: function (event, ui) {
					$.ajax({
						data: {
							project_id	: $('#project_id').val(),
							new_order	: $('.todos').sortable('toArray')
						},
						error: function () {
							
						},
						type: 'PUT',
						url: '/gtd/project/order'
					});
				}
			});
		});
	</script>
</body>
</html>