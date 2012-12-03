<ul>
	@foreach ($projects as $project)
		<li><a href="/gtd/project/{{ $project->id }}">{{ $project->name }}</a></li>
	@endforeach
</ul>

<p><a href="/gtd/project/new">Add Project</a></p>