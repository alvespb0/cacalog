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

<h1>Para qual cliente é esta entrega?</h1>
<form action="{{route('cadastro.entrega')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="Cliente">Cliente</label>
        <select name="cliente" class="form-select"  id="" required>
            <option selected>Selecione um Cliente</option>
            @foreach($clientes as $cliente)
            <option value="{{$cliente->id}}">{{$cliente->name}}</option>
            @endforeach
        </select>        
    </div>
    <br>
    <button type="submit" class="btn btn-success">Submit</button>
</form>

@endsection