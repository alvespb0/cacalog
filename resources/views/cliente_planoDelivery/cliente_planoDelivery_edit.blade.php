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
<form action="{{route('update.cliente-planoDelivery', ['id' => $plano['id']] )}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="planoDelivery">Plano de Delivery</label>
        <div class="form-data">
            <select class="form-select" id="floatingSelect" name="planoDelivery">
                @foreach ($planoDelivery as $planos)
                    <option {{ ($planos->id == $plano->plano_delivery_id ? "selected" : "") }} value="{{ $planos->id }}">{{ $planos->nome }}</option>
                @endforeach
            </select>
        </div>
        <label for="cliente">Cliente</label>
        <div class="form-data">
            <select class="form-select" id="floatingSelect" name="cliente">
                @foreach ($clientes as $cliente)
                    <option {{ ($cliente->id == $plano->cliente_id ? "selected" : "")  }} value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="dataInicio">Data de Inicio do Plano</label>
            <input value="{{ $plano->data_inicio }}" class="form-control" type="date" name="dataInicio">
        </div>
        <div>
            <label for="dataFim">Data Final do Plano</label>
            <input value="{{ $plano->data_fim }}" class="form-control" type="date" name="dataFim">
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>
@endsection