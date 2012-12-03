@layout('gtd/gtd')

@section('title')
	Create New To-Do
@endsection

@section('content')
	<h1>Create New To-Do</h1>
	<?php echo Form::open('gtd/todo/new'); ?>
	<ol>
		<li>
		    <?php echo Form::label('description', 'Description'); ?>
		    <?php echo Form::text('description', Input::old('description')); ?>
		</li>
		<li>
		    <?php echo Form::label('notes', 'Notes'); ?>
		    <?php echo Form::textarea('notes', Input::old('notes')); ?>
		</li>
		<li>
			<?php echo Form::label('project', 'Project'); ?>
			<select name="project" id="project">
				<option>Select a project:</option>
				@foreach ($projects as $project)
					<option value="{{ $project->id }}">{{ $project->name }}</option>
				@endforeach
			</select>
		</li>
	</ol>
	<div>
	    <?php echo Form::submit('Save'); ?>
	</div>
	<?php echo Form::close(); ?>
@endsection
