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

<h1>Cadastrar Cliente</h1>
<form action="{{route('create.cliente')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="NameFornecedor">Nome Do Fornecedor</label>
        <input type="text" class="form-control" name="nome" required>
    </div>
    <div class="form-group">
        <label for="NameFornecedor">CNPJ</label>
        <input type="number" class="form-control" name="cnpj" required>
    </div>
    <div class="form-group">
        <label for="email">email</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="form-group">
        <label for="senha">senha</label>
        <input type="password" class="form-control" name="senha" required>
    </div>
    <div class="form-group">
        <label for="url_callback">url_callback</label>
        <input type="text" class="form-control" name="url_callback">
    </div>
    <div class="form-group">
        <label for="token_autenticação">token_autenticação</label>
        <input type="text" class="form-control" name="token_autenticacao">
    </div>
    <br>
    <button type="submit" class="btn btn-success">Submit</button>
</form>

@endsection