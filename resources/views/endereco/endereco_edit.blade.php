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

<h1>Alterar Endereço</h1>
<form action="{{ route('update.endereco', ['id' => $endereco->id]) }}" method="POST">
    @csrf
    <div class="form-group">
        <div class="form-group">
            <label for="logradouro">Logradouro</label>
            <input type="text" class="form-control" name="logradouro" value="{{ $endereco->logradouro }}" required>
        </div>
        <div class="form-group">
            <label for="numero">Numero</label>
            <input type="number" class="form-control" name="numero" value="{{ $endereco->numero }}" required>
        </div>
        <div class="form-group">
            <label for="complemento">Complemento</label>
            <input type="text" class="form-control" name="complemento" value="{{ $endereco->complemento }}" required>
        </div>
        <div class="form-group">
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" name="bairro" value="{{ $endereco->bairro }}" required>
        </div>
        <label for="cliente">Cidade</label>
        <div class="form-data">
            <select class="form-select" id="floatingSelect" name="cidade_id">
                @foreach ($cidades as $cidade)
                    <option {{ $endereco->cidade_id == $cidade->id ? "selected" : "" }} value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                @endforeach
            </select>
        </div>
        <label for="cliente">Cliente</label>
        <div class="form-data">
            <select class="form-select" id="floatingSelect" name="cliente_id">
                <option selected>Selecione um cliente</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $endereco->cliente_id == $cliente->id ? 'selected': ''}}>{{ $cliente->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Alterar</button>
</form>
@endsection