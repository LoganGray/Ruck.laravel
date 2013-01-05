<!DOCTYPE HTML>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') &#0183; GTD &#0183; Ruck</title>
    <link rel="stylesheet" href="/c/ruck.css">
    <link rel="stylesheet" href="/c/jquery-ui-1.9.2.custom.min.css">
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
    <div class="contexts">
    	<?php echo render('gtd.contexts'); ?>
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
			$(".sortable").sortable({
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
			$('#due').datepicker({
				showOn: 'button',
				buttonImage: '/i/calendar.gif',
				showButtonPanel: true
			});
		});
	</script>
</body>
</html>