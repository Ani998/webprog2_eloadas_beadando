@extends('layouts.app')

@section('title', 'Diagram – Bevétel mozinként')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Mozik összesített bevétele</h1>

    <canvas id="bevetelChart" height="120"></canvas>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('bevetelChart').getContext('2d');

    const labels = @json($labels);
    const data = @json($values);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Összbevétel (Ft)',
                data: data,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
