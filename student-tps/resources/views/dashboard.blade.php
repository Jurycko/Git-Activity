@extends('layouts.app')

@section('content')
<div class="text-center mb-4">
  <h2 class="fw-bold text-primary">🏫 School Management Dashboard</h2>
  <p class="text-muted">Welcome to the Student Transaction Processing System</p>
</div>

<div class="row justify-content-center mb-4">
  <div class="col-md-4 mb-3">
    <div class="card shadow border-0">
      <div class="card-body text-center">
        <h5 class="card-title text-secondary">Total Students</h5>
        <h1 class="display-5 fw-bold text-primary">{{ $studentCount }}</h1>
        <a href="{{ route('students.index') }}" class="btn btn-outline-primary btn-sm">View Students</a>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-3">
    <div class="card shadow border-0">
      <div class="card-body text-center">
        <h5 class="card-title text-secondary">Total Sections</h5>
        <h1 class="display-5 fw-bold text-success">{{ $sectionCount }}</h1>
        <a href="{{ route('sections.index') }}" class="btn btn-outline-success btn-sm">View Sections</a>
      </div>
    </div>
  </div>
</div>

<div class="card shadow border-0">
  <div class="card-body">
    <h5 class="text-center text-secondary mb-4">📊 Students per Section</h5>
    <canvas id="studentsChart" height="120"></canvas>
  </div>
</div>

{{-- Embed chart data safely as raw JSON (no Blade-in-JS) --}}
<script id="chart-data" type="application/json">
{!! $chartData !!}
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const dataTag = document.getElementById('chart-data');
  let labels = [], values = [];

  try {
    const parsed = JSON.parse(dataTag.textContent || '{}');
    labels = Array.isArray(parsed.labels) ? parsed.labels : [];
    values = Array.isArray(parsed.data) ? parsed.data : [];
  } catch (e) {
    console.error('Failed to parse chart JSON:', e);
  }

  const canvas = document.getElementById('studentsChart');
  if (!canvas) return;

  const ctx = canvas.getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: 'Number of Students',
        data: values,
        backgroundColor: 'rgba(54, 162, 235, 0.6)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1,
        borderRadius: 5
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false },
        title: { display: true, text: 'Student Distribution per Section', color: '#333', font: { size: 18 } }
      },
      scales: { y: { beginAtZero: true } }
    }
  });
});
</script>
@endsection
