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

    .btn-add-phone {
        margin-top: 10px;
        margin-bottom: 20px;
        background-color: #1c2e4b;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 6px 12px;
    }

    .btn-add-phone:hover {
        background-color: #ff8a00;
    }

</style>
<h1>Editar Cliente</h1>
<form action="{{ route('update.cliente', ['id' => $cliente['id']]) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="NameFornecedor">Nome Do Fornecedor</label>
        <input type="text" class="form-control" name="nome" required value="{{$cliente['name']}}">
    </div>
    <div class="form-group">
        <label for="NameFornecedor">CNPJ</label>
        <input type="number" class="form-control" name="cnpj" required value="{{$cliente['cnpj']}}">
    </div>
    <div class="form-group">
        <label for="email">email</label>
        <input type="email" class="form-control" name="email" required value="{{$cliente->user->email}}">
    </div>
    <div class="form-group">
        <label for="senha">senha</label>
        <input type="password" class="form-control" name="senha">
    </div>
    <div class="form-group">
        <label for="url_callback">url_callback</label>
        <input type="text" class="form-control" name="url_callback" value="{{$cliente['url_callback']}}">
    </div>
    <div class="form-group">
    <label for="Telefone">Telefone</label>
    <div id="telefones-container">
            @foreach($cliente->telefone as $index => $telefone)
            <div class="input-group mb-2">
                <input type="number" class="form-control" name="telefone[]" required min="0" value="{{ $telefone->telefone }}">
                @if($index > 0)
                <button type="button" class="btn btn-danger btn-sm" onclick="removerTelefone(this)">x</button>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    <button type="button" class="btn btn-secondary mb-3" onclick="adicionarTelefone()">+ Adicionar Telefone</button>
    <br>
    <button type="submit" class="btn btn-success">Submit</button>

</form>

<script>
    function adicionarTelefone() {
        const container = document.getElementById('telefones-container');
        const wrapper = document.createElement('div');
        wrapper.classList.add('input-group', 'mb-2');

        wrapper.innerHTML = `
            <input type="number" class="form-control" name="telefone[]" required placeholder="Outro telefone">
            <button type="button" class="btn btn-danger btn-sm" onclick="removerTelefone(this)">x</button>
        `;

        container.appendChild(wrapper);
    }

    function removerTelefone(botao) {
        const linha = botao.parentNode;
        linha.remove();
    }
</script>

@endsection