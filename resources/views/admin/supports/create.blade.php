<h1>Nova dúvida</h1>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

<form method="POST" action="{{ route('supports/store') }}">
    @include('admin/supports/partials/form')
</form>