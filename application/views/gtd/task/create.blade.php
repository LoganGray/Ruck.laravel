@layout('gtd/gtd')

@section('title')
	Create New Task
@endsection

@section('content')
	<h1>Create New Task</h1>
	<?php echo Form::open('gtd/task/new'); ?>
	<ol>
		<li>
		    <?php echo Form::label('description', 'Description'); ?>
		    <?php echo Form::text('description', Input::old('description')); ?>
		</li>
		<li>
		    <?php echo Form::label('notes', 'Notes'); ?>
		    <?php echo Form::textarea('notes', Input::old('notes')); ?>
		</li>
	</ol>
	<div>
	    <?php echo Form::submit('Save'); ?>
	</div>
	<?php echo Form::close(); ?>
@endsection
