@layout('gtd/gtd')

@section('title')
	Contexts
@endsection

@section('content')
	<h1>Context List</h1>
	<p>Contexts:</p>
	<ul>
		@foreach ($contexts as $context)
		    <li>
		    	<a href="/gtd/context/{{ $context->id }}">{{ $context->name }}</a>
		    </li>
		@endforeach
	</ul>
	<p><a href="/gtd/context/new">Add new context</a></p>
@endsection
