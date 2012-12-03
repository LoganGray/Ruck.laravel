@layout('gtd/gtd')

@section('title')
	Create New To-Do
@endsection

@section('content')

	@if (isset($todo))
		<h1>Edit To-Do</h1>
	@else
		<h1>Create New To-Do</h1>
	@endif

	@if (isset($todo))
		<?php echo Form::open('gtd/todo/' . $todo->id . '/edit'); ?>
		<div class="hidden">
		    <?php echo Form::hidden('id', $todo->id); ?>
		</div>
	@else
		<?php echo Form::open('gtd/todo/new'); ?>
	@endif

	<ol>
		<li>
		    <?php echo Form::label('description', 'Description'); ?>
			@if (isset($todo))
			    <?php echo Form::text('description', $todo->description); ?>
			@else
			    <?php echo Form::text('description', Input::old('description')); ?>
			@endif
		</li>
		<li>
		    <?php echo Form::label('notes', 'Notes'); ?>
			@if (isset($todo))
			    <?php echo Form::textarea('notes', $todo->notes); ?>
			@else
			    <?php echo Form::textarea('notes', Input::old('notes')); ?>
			@endif
		</li>
		<li>
			<?php echo Form::label('project', 'Project'); ?>
			<select name="project" id="project">
				<option>Select a project:</option>
				@foreach ($projects as $project)
					<option value="{{ $project->id }}"
					@if ((isset($todo) && $todo->project_id == $project->id) || (isset($id) && $id == $project->id))
						selected="selected"
					@endif
					>{{ $project->name }}</option>
				@endforeach
			</select>
		</li>
	</ol>
	<div>
	    <?php echo Form::submit('Save'); ?>
	</div>
	<?php echo Form::close(); ?>
@endsection
