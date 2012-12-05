<ul class="contexts">
	@foreach ($contexts as $context)
		<li><a href="/gtd/context/{{ $context->id }}">{{ $context->name }}</a></li>
	@endforeach
</ul>
