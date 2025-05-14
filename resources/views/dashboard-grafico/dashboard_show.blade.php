@extends("../template")

@section("conteudo")
<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart').getContext('2d');

  const nomes = [
    @foreach($dadosGraficoMotoboy as $dado)
      "{{ $dado['nome'] }}",
    @endforeach
  ];

  const entregas = [
    @foreach($dadosGraficoMotoboy as $dado)
      {{ $dado['qtd_entregas'] }},
    @endforeach
  ];

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: nomes,
      datasets: [{
        label: 'Entregas por motoboy',
        data: entregas,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
@endsection