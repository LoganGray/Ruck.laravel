@layout('gtd/gtd')

@section('title')
	Create New Context
@endsection

@section('content')

	@if (isset($context))
		<h1>Edit Context</h1>
	@else
		<h1>Create New Context</h1>
	@endif
	
	@if (isset($context))
		<?php echo Form::open('gtd/context/' . $context->id . '/edit'); ?>
		<div class="hidden">
		    <?php echo Form::hidden('id', $context->id); ?>
		</div>
	@else
		<?php echo Form::open('gtd/context/new'); ?>
	@endif

	<ol>
		<li>
		    <?php echo Form::label('name', 'Context name'); ?>
			@if (isset($context))
			    <?php echo Form::text('name', $context->name); ?>
			@else
			    <?php echo Form::text('name', Input::old('name')); ?>
			@endif
		</li>
		<li>
		    <?php echo Form::label('description', 'Description'); ?>
			@if (isset($context))
			    <?php echo Form::text('description', $context->description); ?>
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
