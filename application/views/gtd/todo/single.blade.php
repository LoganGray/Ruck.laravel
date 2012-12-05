<li id="{{ $todo->id }}">
	<a href="/gtd/todo/{{ $todo->id }}">
		<input type="checkbox">
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
