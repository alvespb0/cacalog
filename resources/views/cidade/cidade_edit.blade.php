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

<h1>Editar Cidade</h1>
<form action="{{route('update.cidade', ['id' => $cidade['id']]) }}" method="POST">
    @csrf
    <div class="form-group">
        <div class="form-group">
        <label for="nome">Nome da Cidade</label>
        <input type="text" id="nome" class="form-control" name="nome" value="{{ $cidade->nome }}" required>
    </div>
    <div class="form-group">
        <label for="cep">Cep</label>
        <input type="text" id="cep" class="form-control" name="cep" value="{{ $cidade->cep }}" required>
    </div>
    <label for="estado">Estado</label>
    <div class="form-data">
        <select class="form-select" id="floatingSelect" name="estado_id">
            @foreach ($estados as $estado)
                <option {{ ($cidade->estado_id == $estado->id ? "selected" : "") }} value="{{ $estado->id }}">{{ $estado->name }}</option>
            @endforeach
        </select>
    </div>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Alterar</button>
</form>
@endsection