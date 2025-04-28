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

<h1>Cadastrar Entrega</h1>
<form action="{{route('create.entrega')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="conteudo_entrega">Conteudo</label>
        <input type="text" class="form-control" name="conteudo_entrega" required>
    </div>
    <div class="form-group">
        <label for="codigo_pedido">Codigo do Pedido</label>
        <input type="number" class="form-control" name="codigo_pedido" required min="0">
    </div>
    <div class="form-group">
        <label for="Motoboy">Motoboy</label>
        <select name="motoboy_id" class="form-select"  id="" required>
            <option selected>Selecione um motoboy</option>
            @foreach($motoboys as $motoboy)
            <option value="{{$motoboy->id}}">{{$motoboy->name}}</option>
            @endforeach
        </select>        
    </div>
    <div class="form-group">
        <label for="Cliente">Cliente</label>
        <input type="text" name="" class="form-control" id="" value = "{{$cliente->name}}" disabled>
    </div>
    <div class="form-group">
        <label for="Endereco">Selecione o Endereco do cliente vinculado</label>
        <select name="endereco_id" class ="form-control" id="">
            <option selected>{{$enderecos->isEmpty() ? 'Não há endereços cadastrados para esse cliente' : 'Selecione o endereço' }}</option>
            @foreach($enderecos as $endereco)
            <option value="{{$endereco->id}}">{{$endereco->logradouro}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="Status">Selecione um status para a entrega</label>
        <select name="status_id" class ="form-control" id="">
            <option selected>Selecione um status<option>
            @foreach($status as $s)
            <option value="{{$s->id}}">{{$s->nome}}</option>
            @endforeach
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Submit</button>
</form>

@endsection