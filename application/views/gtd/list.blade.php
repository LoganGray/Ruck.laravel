@layout('gtd/gtd')

@section('title')
	Lists
@endsection

@section('content')
	<h1>Task Lists</h1>
	<p>Your current to-do list:</p>
	<ul>
		@foreach ($tasks as $task)
		    <li>
		    	<a href="/gtd/task/{{ $task->id }}">{{ $task->description }}</a>
		    </li>
		@endforeach
	</ul>
@endsection
