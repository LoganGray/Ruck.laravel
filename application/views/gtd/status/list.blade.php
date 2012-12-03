@layout('gtd/gtd')

@section('title')
	Statuses
@endsection

@section('content')
	<h1>Status List</h1>
	<p>Live statuses:</p>
	<ul>
		@foreach ($statuses as $status)
		    <li>
		    	<a href="/gtd/status/{{ $status->id }}">{{ $status->name }}</a>
		    </li>
		@endforeach
	</ul>
	<p><a href="/gtd/status/new">Add new status</a></p>
@endsection
