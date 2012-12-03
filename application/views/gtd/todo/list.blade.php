@layout('gtd/gtd')

@section('title')
	Lists
@endsection

@section('content')
	<h1>To-Do Lists</h1>
	<p>Your current to-do list:</p>
	<ul>
		@foreach ($todos as $todo)
		    <li>
		    	<a href="/gtd/todo/{{ $todo->id }}">{{ $todo->description }}</a>
		    </li>
		@endforeach
	</ul>
	<p><a href="/gtd/todo/new">Add new task</a></p>
@endsection
