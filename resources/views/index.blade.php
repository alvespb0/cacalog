@extends('template')
@section('conteudo')
<style>
    .card {
        border: 1px solid #e1e1e1;
    }

    .salvar-btn:disabled {
        background-color: #cccccc;
        border-color: #cccccc;
    }

    .salvar-btn:not(:disabled) {
        background-color: #ff8a00;
        border-color: #ff8a00;
    }

    .status-select {
        width: 200px;
    }

    .status-circle {
        width: 15px;
        height: 15px;
        border-radius: 50%;
        margin-right: 10px;
    }
</style>

<div class="container py-5">
    @if(Auth::check() && Auth::user()->tipo == 'cliente')
    <h6>Token API: 
        <span id="token" class="d-none">{{ Auth::user()->cliente->token_autenticacao }}</span>
        <button class="btn btn-sm btn-outline-primary ms-2" onclick="document.getElementById('token').classList.toggle('d-none')">
            Show Token
        </button>
    </h6>
        @endif
    <div class="row">
        @foreach($entregas as $entrega)
        @if(Auth::check() && (Auth::user()->tipo == 'operador' || Auth::user()->cliente->id == $entrega->cliente_id))
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Codigo Pedido: {{ $entrega->codigo_pedido }}</h5>
                    <p class="card-text">
                        Cliente: {{ $entrega->cliente }} <br>
                        Endereço: {{ $entrega->endereco }}<br>
                        Conteudo: {{ $entrega->conteudo_entrega }} <br>
                        Motoboy: {{ $entrega->motoboy ? $entrega->motoboy->name : 'Não foi definido motoboy' }}
                        </p>
                    
                    Status da Entrega:
                    <div class="d-flex align-items-center mb-3">
                        <div id="status-circle-{{ $entrega->id }}" 
                            style="width: 15px; height: 15px; border-radius: 50%; background-color: {{ $entrega->status_cor }}; margin-right: 10px;">
                        </div>
                        @if(Auth::check() && Auth::user()->tipo === 'operador')
                        <select class="form-select status-select" 
                                data-entrega-id="{{ $entrega->id }}" 
                                style="width: 200px;" name="status">
                            @foreach($status as $s)
                                <option value="{{ $s->id }}" 
                                        data-color="{{ $s->cor }}" 
                                        style="background-color: {{ $s->cor }};" {{$s->id == $entrega->status_id ? 'selected' : ''}}>
                                    {{ $s->nome }} 
                                </option>
                            @endforeach
                        </select>
                        @endif
                        @if(Auth::check() && Auth::user()->tipo === 'cliente')
                        <p><div style="width: 10px; height: 10px; border-radius: 50%; background-color: {{$entrega->status ? $entrega->status->cor : 'gray'}};"></div>
                            &nbsp{{$entrega->status ? $entrega->status->nome : 'Nenhum status Vinculado'}}</p> 
                        @endif
                    </div>

                    @if(Auth::check() && Auth::user()->tipo === 'operador')
                    <input type="hidden" name="entrega_id" value="{{ $entrega->id }}">

                    <button class="btn btn-primary salvar-btn" 
                            data-entrega-id="{{ $entrega->id }}" 
                            disabled>Salvar</button>

                    @endif
                </div>
            </div>
        </div>
        @endif
        @endforeach
        <form action="{{route('vincular.entregas')}}" method="POST">
        @csrf
        @foreach($entregas as $entrega)
            <input type="hidden" name="entregas[{{$entrega->id}}][id]" value="{{ $entrega->id }}">
            <input type="hidden" name="entregas[{{$entrega->id}}][cep]" value="{{ $entrega->cep }}">
            <input type="hidden" name="entregas[{{$entrega->id}}][rua]" value="{{ $entrega->rua }}">
            <input type="hidden" name="entregas[{{$entrega->id}}][bairro]" value="{{ $entrega->bairro }}">
        @endforeach
        <button class="col-sm-12 btn btn-primary">
            teste
        </button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const selects = document.querySelectorAll('.status-select');
    const buttons = document.querySelectorAll('.salvar-btn');

    selects.forEach(select => {
        const entregaId = select.dataset.entregaId;
        const originalValue = select.value;
        const saveBtn = document.querySelector(`.salvar-btn[data-entrega-id="${entregaId}"]`);
        const statusCircle = document.getElementById(`status-circle-${entregaId}`);
        const hiddenInput = document.querySelector(`input[name="entrega_id"][value="${entregaId}"]`); // Pegando o input hidden

        // Atualiza a bolinha de status inicialmente
        const initialColor = select.options[select.selectedIndex].dataset.color;
        statusCircle.style.backgroundColor = initialColor;

        select.addEventListener('change', function () {
            // Muda a bolinha para a nova cor
            const selectedOption = select.options[select.selectedIndex];
            const newColor = selectedOption.dataset.color;
            statusCircle.style.backgroundColor = newColor;
            
            // Ativa o botão de salvar somente se alterou
            if (select.value !== originalValue) {
                saveBtn.disabled = false;
            } else {
                saveBtn.disabled = true;
            }
        });

        saveBtn.addEventListener('click', function () {
            const formData = new FormData();
            formData.append('id', entregaId);  // A entrega id continua aqui
            formData.append('entrega_id', hiddenInput.value);  // Agora envia o hidden input
            formData.append('status', select.value);

            fetch('{{ route('entrega.index') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao salvar');
                }
                return response.json();
            })
            .then(data => {
                alert('Status atualizado com sucesso!');
                saveBtn.disabled = true;
            })
            .catch(error => {
                console.error(error);
                alert('Erro ao atualizar status.');
            });
        });
    });
});
</script>

@endsection