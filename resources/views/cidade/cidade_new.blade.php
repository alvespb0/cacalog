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

<h1>Cadastrar Cidade</h1>
<form action="{{ route('create.cidade') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="nome">Nome da Cidade</label>
        <input type="text" id="nome" class="form-control" name="nome" required>
    </div>
    <div class="form-group">
        <label for="cep">Cep</label>
        <input type="text" id="cep" class="form-control" name="cep" required>
    </div>
    <label for="estado">Estado</label>
    <div class="form-data">
        <select class="form-select" id="floatingSelect" name="estado_id">
            @foreach ($estados as $estado)
                <option value="{{ $estado->id }}">{{ $estado->name }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>
@endsection