@extends('../template')

@section('conteudo')
<style>
    h1 {
        color: #1c2e4b;
        text-align: center;
        margin-bottom: 30px;
    }

    form {
        background-color: #ffffff;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .form-control {
        border-radius: 10px;
        box-shadow: none;
        border: 1px solid #ccc;
    }

    .btn-success {
        background-color: #1c2e4b;
        border: none;
        border-radius: 10px;
    }

    .btn-success:hover {
        background-color: #ff8a00;
    }
</style>

<h1>Adquirir um Plano de Delivery</h1>
<form action="{{route('create.cliente-planoDelivery')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="planoDelivery">Plano de Delivery</label>
        <div class="form-floating">
            <select class="form-select" id="floatingSelect">
                @foreach ($planoDelivery as $plano)
                    <option value="{{ $plano->id }}">{{ $plano->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>
@endsection