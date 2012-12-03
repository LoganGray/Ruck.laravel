@layout('gtd/gtd')

@section('title')
	Detail
@endsection

@section('content')
	<h1>To-Do Detail</h1>
	<h2>{{ $todo->description }}</h2>
	<p><small>Part of the <a href="/gtd/project/{{ $project->id }}">{{ $project->name }}</a> project</small></p>
	@if ($todo->notes)
    	<p>{{ $todo->notes }}</p>
    @endif
    <p><a href="/gtd/todo/{{ $todo->id }}/edit">Edit</a> | <a href="/gtd/todo/{{ $todo->id }}/delete">Delete</a></p>
@endsection
