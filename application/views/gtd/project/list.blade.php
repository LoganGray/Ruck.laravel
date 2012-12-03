@layout('gtd/gtd')

@section('title')
	Projects
@endsection

@section('content')
	<h1>Projects List</h1>
	<p>Your current projects:</p>
	<ul>
		@foreach ($projects as $project)
		    <li>
		    	<a href="/gtd/project/{{ $project->id }}">{{ $project->name }}</a>
		    </li>
		@endforeach
	</ul>
	<p><a href="/gtd/project/new">Add new project</a></p>
@endsection
