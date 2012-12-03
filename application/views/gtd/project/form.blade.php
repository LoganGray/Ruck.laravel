@layout('gtd/gtd')

@section('title')
	Create New Project
@endsection

@section('content')

	@if (isset($project))
		<h1>Edit Project</h1>
	@else
		<h1>Create New Project</h1>
	@endif
	
	@if (isset($project))
		<?php echo Form::open('gtd/project/' . $project->id . '/edit'); ?>
		<div class="hidden">
		    <?php echo Form::hidden('id', $project->id); ?>
		</div>
	@else
		<?php echo Form::open('gtd/project/new'); ?>
	@endif

	<ol>
		<li>
		    <?php echo Form::label('name', 'Project name'); ?>
			@if (isset($project))
			    <?php echo Form::text('name', $project->name); ?>
			@else
			    <?php echo Form::text('name', Input::old('name')); ?>
			@endif
		</li>
		<li>
		    <?php echo Form::label('description', 'Description'); ?>
			@if (isset($project))
			    <?php echo Form::text('description', $project->description); ?>
			@else
			    <?php echo Form::text('description', Input::old('description')); ?>
			@endif
		</li>
	</ol>
	<div>
	    <?php echo Form::submit('Save'); ?>
	</div>
	<?php echo Form::close(); ?>
@endsection
