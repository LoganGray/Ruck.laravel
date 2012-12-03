@layout('gtd/gtd')

@section('title')
	Project Details
@endsection

@section('content')
	<h1>Project Details</h1>
	<h2>{{ $project->name }}</h2>
	@if ($project->description)
    	<p>{{ $project->description }}</p>
    @endif
    <p><a href="/gtd/project/{{ $project->id }}/edit">Edit</a> | <a href="/gtd/project/{{ $project->id }}/delete">Delete</a></p>
    <h3>Current To-Dos</h3>
    <ul>
    	@foreach ($todos as $todo)
    		<li><a href="/gtd/todo/{{ $todo->id }}">{{ $todo->description }}</a></li>
    	@endforeach
    </ul>
@endsection
