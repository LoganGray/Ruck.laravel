@layout('gtd/gtd')

@section('title')
	Detail
@endsection

@section('content')
	<h1>Task Detail</h1>
	<h2>{{ $task->description }}</h2>
	@if ($task->notes)
    	<p>{{ $task->notes }}</p>
    @endif
    <p><a href="/gtd/task/{{ $task->id }}/edit">Edit</a> | <a href="/gtd/task/{{ $task->id }}/delete">Delete</a></p>
@endsection
