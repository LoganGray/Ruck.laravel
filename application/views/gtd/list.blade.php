@layout('gtd/gtd')

@section('title')
	Lists
@endsection

@section('content')
	<h1>Task Lists</h1>
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
@endsection
