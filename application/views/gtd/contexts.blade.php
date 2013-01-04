<ul class="contexts">
	@foreach ($contexts as $context)
		<li><a href="/gtd/context/{{ $context->id }}">{{ $context->name }}</a></li>
	@endforeach
		<li><a href="/gtd/context/new" style="background: none; text-decoration: underline;">Add context</a></li>
</ul>
