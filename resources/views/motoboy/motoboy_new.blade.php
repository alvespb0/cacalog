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

<h1>Cadastrar Motoboy</h1>
<form action="{{route('create.motoboy')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="NameFornecedor">Nome Do Motoboy</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group">
        <label for="NameFornecedor">CPF</label>
        <input type="number" class="form-control" name="CPF" required min="0">
    </div>
    <div class="form-group">
        <label for="NameFornecedor">Telefone</label>
        <input type="number" class="form-control" name="Telefone" required min="0">
    </div>
    <br>
    <button type="submit" class="btn btn-success">Submit</button>
</form>

@endsection