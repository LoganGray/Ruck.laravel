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
			<?php echo Form::label('due', 'Due Date'); ?>
			@if (isset($todo))
			    <?php echo Form::text('due', $todo->due); ?>
			@else
			    <?php echo Form::text('due', Input::old('due')); ?>
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
					@if ((isset($todo) && $todo->project_id == $project->id) || (isset($project_id) && $project_id == $project->id))
						selected="selected"
					@endif
					>{{ $project->name }}</option>
				@endforeach
			</select>
		</li>
		<li>
			<?php echo Form::label('status', 'Status'); ?>
			<select name="status" id="status">
				<option>Choose status:</option>
				@foreach ($statuses as $status)
					<option value="{{ $status->id }}"
					@if ((isset($todo) && $todo->status_id == $status->id) || (!isset($todo) && $status->id == 1))
						selected="selected"
					@endif
					>{{ $status->name }}</option>
				@endforeach
			</select>
		</li>
		<li>
			<?php echo Form::label('context', 'Context'); ?>
			<select name="context" id="context">
				<option>Choose context:</option>
				@foreach ($contexts as $context)
					<option value="{{ $context->id }}"
					@if (isset($todo) && $todo->context_id == $context->id)
						selected="selected"
					@endif
					>{{ $context->name }}</option>
				@endforeach
			</select>
		</li>
	</ol>
	<div>
	    <?php echo Form::submit('Save'); ?>
	</div>
	<?php echo Form::close(); ?>
@endsection
