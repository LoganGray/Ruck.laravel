@layout('gtd/gtd')

@section('title')
	Your Tasks
@endsection

@section('content')
	<h1>Your Tasks</h1>
	<p>Your current next actions:</p>
	<ul class="todos">
		{{ render_each('gtd/todo/single', $todos, 'todo') }}
	</ul>
@endsection
