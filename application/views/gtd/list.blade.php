<ul>
	@foreach ($tasks as $task)
	    <li>
	    	<h2>{{ $task->description }}</h2>
	    	@if ($task->notes)
		    	<p>{{ $task->notes }}</p>
		    @endif
	    </li>
	@endforeach
</ul>
