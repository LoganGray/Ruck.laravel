@layout('gtd/gtd')

@section('title')
	Context Details
@endsection

@section('content')
	<h1>{{ $context->name }}</h1>
	@if ($context->description)
    	<p>{{ $context->description }}</p>
    @endif
    <p><a href="/gtd/context/{{ $context->id }}/edit">Edit</a> | <a href="/gtd/context/{{ $context->id }}/delete">Delete</a></p>
    <h3>Current To-Dos</h3>
	<ul class="todos">
		{{ render_each('gtd/todo/single', $todos, 'todo') }}
	</ul>
@endsection
