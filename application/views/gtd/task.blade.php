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
@endsection
