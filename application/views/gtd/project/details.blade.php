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
	<ul class="todos sortable">
		{{ render_each('gtd/todo/single', $todos, 'todo') }}
	</ul>
	<p><a href="/gtd/todo/new/{{ $project->id }}">Create new todo</a></p>
@endsection
