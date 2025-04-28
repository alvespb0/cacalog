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

<h1>Editar status</h1>
<form action="{{ route('update.status', $status->id) }}" method="post">
    @csrf
    <div class="form-group">
        <label for="nome">Status</label>
        <input type="text" id="nome" class="form-control" name="nome" required value="{{$status->nome}}">
    </div>
    <div class="form-group">
        <label for="cor">cor</label>
        <input type="color" id="cor" class="form-control" name="cor" required value="{{$status->cor}}">
    </div>
    <br>
    <button type="submit" class="btn btn-success">editar</button>
</form>
@endsection