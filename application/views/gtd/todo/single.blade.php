<li id="{{ $todo->id }}">
	<a href="/gtd/todo/{{ $todo->id }}">
		<input type="checkbox">
		@if ($todo->due)
			<strong><?php echo date('M j', strtotime($todo->due)); ?></strong>
		@endif
		{{ $todo->description }}
	</a>
<!--
	<small style="font-size: 75%;">
		<a href="/gtd/todo/{{ $todo->id }}/edit">Edit</a>
		|
		<a href="/gtd/todo/{{ $todo->id }}/delete">Delete</a>
	</small>
-->
</li>
