@layout('gtd/gtd')

@section('title')
	Create New Project
@endsection

@section('content')
	<h1>Create New Project</h1>
	<?php echo Form::open('gtd/project/new'); ?>
	<ol>
		<li>
		    <?php echo Form::label('name', 'Project name'); ?>
		    <?php echo Form::text('name', Input::old('name')); ?>
		</li>
		<li>
		    <?php echo Form::label('description', 'Description'); ?>
		    <?php echo Form::text('description', Input::old('description')); ?>
		</li>
	</ol>
	<div>
	    <?php echo Form::submit('Save'); ?>
	</div>
	<?php echo Form::close(); ?>
@endsection
