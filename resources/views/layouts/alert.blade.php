@if (\Session::has('sucesso'))
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
        <p class="alert-heading">{!! \Session::get('sucesso') !!}</p>

</div>
@endif
@if (\Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>

    <div class="mb-3 font-medium text-red-600">
        <b>Opa!</b> Algo deu errado.
    </div>
    <ul style="list-style: none;">
        <li>{!! \Session::get('error') !!}</li>
    </ul>
</div>
@endif
@if (\Session::has('info'))
<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul style="list-style: none;">
        <li>{!! \Session::get('info') !!}</li>
    </ul>
</div>
@endif

@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>

    <div class="mb-3 font-medium text-red-600">
        <b>Opa!</b> Algo deu errado.
    </div>

    @foreach ($errors->all() as $error)
    <ul style="list-style: none;">
        <li>
            {{ $error }}
        </li>
    </ul>
    @endforeach
</div>
@endif


<script>
    // $(".alert").alert('close')
</script>
