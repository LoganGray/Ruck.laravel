<li id="{{ $todo->id }}">
	<a href="/gtd/todo/{{ $todo->id }}">
		@if ($todo->due && date('M j', strtotime($todo->due)) === date('M j'))
			<span style="background: red; color: #fff; padding: 2px 5px; font-size: 11px; font-weight: bold;">DUE TODAY</span>
		@endif
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
