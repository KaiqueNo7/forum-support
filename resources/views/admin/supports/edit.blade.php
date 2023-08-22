<h1>Dúvida {{ $support->id }} </h1>

<x-alert/>

<form method="POST" action="{{ route('supports/update', $support->id) }}">
    @method('PUT')
    @include('admin/supports/partials/form', [
        'support' => $support
    ])
</form>