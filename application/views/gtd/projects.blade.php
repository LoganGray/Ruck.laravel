<h2>Projects List</h2>

<ul>
	@foreach ($projects as $project)
		<li><a href="/gtd/project/{{ $project->id }}">{{ $project->name }}</a></li>
	@endforeach
</ul>

<p><a href="/gtd/project/new">Add Project</a> | <a href="/gtd/todo/new">Add Single Task</a></p>
