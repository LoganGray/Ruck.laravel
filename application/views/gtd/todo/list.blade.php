@layout('gtd/gtd')

@section('title')
	Lists
@endsection

@section('content')
	<h1>To-Do Lists</h1>
	<p>Your current to-do list:</p>
	<ul>
		{{ render_each('gtd/todo/single', $todos, 'todo') }}
	</ul>
	<p><a href="/gtd/todo/new">Add new task</a></p>
@endsection
