@layout('gtd/gtd')

@section('title')
	Status Details
@endsection

@section('content')
	<h1>Status Details</h1>
	<h2>{{ $status->name }}</h2>
	@if ($status->description)
    	<p>{{ $status->description }}</p>
    @endif
    <p><a href="/gtd/status/{{ $status->id }}/edit">Edit</a> | <a href="/gtd/status/{{ $status->id }}/delete">Delete</a></p>
    <h3>Current To-Dos</h3>
	<ul>
		{{ render_each('gtd/todo/single', $todos, 'todo') }}
	</ul>
@endsection
