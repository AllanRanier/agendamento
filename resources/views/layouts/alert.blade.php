@if (\Session::has('sucesso'))
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul>
        <li>{!! \Session::get('sucesso') !!}</li>
    </ul>
</div>
@endif
@if (\Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>

    <div class="mb-3 font-medium text-red-600">
        <b>Opa!Algo deu errado.</b>
    </div>
    <ul>
        <li>{!! \Session::get('error') !!}</li>
    </ul>
</div>
@endif
@if (\Session::has('info'))
<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul>
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
        <b>Opa!Algo deu errado.</b>
    </div>

    @foreach ($errors->all() as $error)
    <ul>
        <li>
            {{ $error }}
        </li>
    </ul>
    @endforeach
</div>
@endif


<script>
    $(".alert").alert('close')
</script>
