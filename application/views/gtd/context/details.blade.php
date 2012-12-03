@layout('gtd/gtd')

@section('title')
	Context Details
@endsection

@section('content')
	<h1>Context Details</h1>
	<h2>{{ $context->name }}</h2>
	@if ($context->description)
    	<p>{{ $context->description }}</p>
    @endif
    <p><a href="/gtd/context/{{ $context->id }}/edit">Edit</a> | <a href="/gtd/context/{{ $context->id }}/delete">Delete</a></p>
    <h3>Current To-Dos</h3>
	<ul>
		{{ render_each('gtd/todo/single', $todos, 'todo') }}
	</ul>
@endsection
