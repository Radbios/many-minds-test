

@if(session("success"))
    <div class="card card-success" id="flash-card">
        <div class="card-title">
            Sucesso
        </div>

        <div class="card-content">
            {{Session::get("success")}}
        </div>
    </div>
@endif


@if($errors->any())
    <div class="card card-error" id="flash-card">
        <div class="card-title">
            Erro
        </div>
        <div class="card-content">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif
