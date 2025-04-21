@extends('template') {{-- Supondo que o template acima esteja em layouts/app.blade.php --}}

@section('conteudo')

<style>
    button {
        background-color: #1c2e4b;
        border: none;
        border-radius: 10px;
        color: white;
        padding: 10px;
        font-weight: bold;
    }

    button:hover {
        background-color: #ff8a00;
    }

</style>
<div class="card mt-5 shadow-lg">
    <div class="card-header text-white" style="background: linear-gradient(135deg, #1c2e4b, #0a1d37);">
        <h4 class="mb-0">Login</h4>
    </div>
    <div class="card-body">
        @if (session('erro'))
            <div class="alert alert-danger">{{ session('erro') }}</div>
        @endif

        <form method="POST" action="">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required placeholder="Digite seu e-mail">
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" required placeholder="Digite sua senha">
            </div>

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo de Usuário</label>
                <select name="tipo" id="tipo" class="form-select" required>
                    <option value="" disabled selected>Selecione</option>
                    <option value="operador">Operador</option>
                    <option value="cliente">Cliente</option>
                </select>
            </div>

            <div class="d-grid">
                <button type="submit">Entrar</button>
            </div>
        </form>
    </div>
</div>
@endsection
