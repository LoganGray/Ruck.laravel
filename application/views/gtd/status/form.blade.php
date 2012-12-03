@layout('gtd/gtd')

@section('title')
	Create New Status
@endsection

@section('content')

	@if (isset($status))
		<h1>Edit Status</h1>
	@else
		<h1>Create New Status</h1>
	@endif
	
	@if (isset($status))
		<?php echo Form::open('gtd/status/' . $status->id . '/edit'); ?>
		<div class="hidden">
		    <?php echo Form::hidden('id', $status->id); ?>
		</div>
	@else
		<?php echo Form::open('gtd/status/new'); ?>
	@endif

	<ol>
		<li>
		    <?php echo Form::label('name', 'Status name'); ?>
			@if (isset($status))
			    <?php echo Form::text('name', $status->name); ?>
			@else
			    <?php echo Form::text('name', Input::old('name')); ?>
			@endif
		</li>
		<li>
		    <?php echo Form::label('description', 'Description'); ?>
			@if (isset($status))
			    <?php echo Form::text('description', $status->description); ?>
			@else
			    <?php echo Form::text('description', Input::old('description')); ?>
			@endif
		</li>
		<li>
			<?php echo Form::label('type', 'Type'); ?>
			<select name="type" id="type">
				<option value="todo"
					@if (isset($status) && $status->type == 'todo')
						selected="selected"
					@endif
				>To-Do</option>
				<option value="project"
					@if (isset($status) && $status->type == 'project')
						selected="selected"
					@endif
				>Project</option>
			</select>
		</li>
	</ol>
	<div>
	    <?php echo Form::submit('Save'); ?>
	</div>
	<?php echo Form::close(); ?>
@endsection
