@extends('../template')
@section('conteudo')

<style>
    h1 {
        color: #1c2e4b;
        font-weight: 700;
        text-align: center;
        margin-bottom: 30px;
    }

    .container-box {
        max-width: 900px;
        margin: 40px auto;
        background: white;
        padding: 25px 30px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        overflow: hidden;
        border-radius: 12px;
    }

    th, td {
        padding: 12px 18px;
        text-align: center;
    }

    th {
        background-color: #1c2e4b;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f3f6fa;
    }

    .btn {
        font-weight: bold;
        border-radius: 8px;
        padding: 6px 12px;
        margin: 2px;
        transition: 0.2s ease-in-out;
    }

    .btn-primary {
        background-color: #1c2e4b;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background-color: #163059;
        transform: scale(1.05);
    }

    .btn-danger {
        background-color: #ff8a00;
        color: white;
        border: none;
    }

    .btn-danger:hover {
        background-color: #e07a00;
        transform: scale(1.05);
    }


</style>

    <div class="card shadow p-4 mb-4 bg-white rounded">
        <h1 class="mb-4 text-center" style="color: #1c2e4b;">Lista de Entregas</h1>

        <table class="table table-hover table-bordered text-center align-middle" style="border-radius: 10px; overflow: hidden;">
            <thead class="table-dark">
                <tr>
                    <th style ="background: #1c2e4b;">ID</th>
                    <th style ="background: #1c2e4b;">Conteudo</th>
                    <th style ="background: #1c2e4b;">Cliente</th>
                    <th style ="background: #1c2e4b;">Endereço</th>
                    <th style ="background: #1c2e4b;">Motoboy</th>
                    <th style ="background: #1c2e4b;">Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($entregas as $entrega)
                    <tr>
                        <td>{{ $entrega->id }}</td>
                        <td>{{ $entrega->conteudo_entrega }}</td>
                        <td>{{ $entrega->endereco->cliente->name }}</td>
                        <td>{{ $entrega->endereco->logradouro }}</td>
                        <td>{{ $entrega->motoboy->name}}</td>
                        <td> 
                            <a href="{{ route('alteracao.entrega', ['id' => $entrega->id]) }}" class="btn btn-outline-primary btn-sm me-2">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            <a href="{{ route('delete.entrega', ['id' => $entrega->id])}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">
                                <i class="bi bi-trash"></i> Excluir
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
