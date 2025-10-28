# Midterm Project: Student Transaction Processing System(TPS)

## Description / Overview
This midterm project is a simple Student Record Manager CLI application that demonstrates the skills learned in the course. It lets you add, list, search, update, and delete student records stored in a local JSON file. The README is written to be beginner friendly for people using Git and GitHub from the terminal for the first time.

## Objectives
- Practice using Git and GitHub from the terminal.
- Build a working program with input/output handling and file storage.
- Practice data validation and error handling.
- Write clear documentation and share the project on GitHub.

## Features / Functionality
- Add new student records (name, id, email).
- List all student records.
- Update and delete records.
- Persistent storage using a local JSON file.
- Simple, user-friendly CLI commands.
- Added a dashboard for easy tracking.

## Installation Instructions (for beginners)
Follow these steps in your terminal. These commands assume you have Git installed. If you don't, see the Install Git step below.

1. Install Git (if needed)
   - macOS (Homebrew): `brew install git`
   - Ubuntu/Debian: `sudo apt update && sudo apt install git`
   - Windows: Install Git for Windows from https://gitforwindows.org/

2. Configure Git (one-time setup)
```bash
git config --global user.name "Jurycko"
git config --global user.email "your.email@example.com"
```

3. Clone this repository (if you want a local copy)
```bash
git clone https://github.com/Jurycko/GIt-Activity.git
cd GIt-Activity
```

4. OR create the README locally and push it to the remote (exact commands)
```bash
# Create README.md locally (run from the repo root folder)
cat > README.md <<'EOF'
# Midterm Project: Student Record Manager

## Description / Overview
This midterm project is a simple Student Record Manager CLI application that demonstrates the skills learned in the course. It lets you add, list, search, update, and delete student records stored in a local JSON file. The README is written to be beginner friendly for people using Git and GitHub from the terminal for the first time.

## Objectives
- Practice using Git and GitHub from the terminal.
- Build a working program with input/output handling and file storage.
- Practice data validation and error handling.
- Write clear documentation and share the project on GitHub.

## Features / Functionality
- Add new student records (name, id, email).
- List all student records.
- Search records by ID or name.
- Update and delete records.
- Persistent storage using a local JSON file.
- Simple, user-friendly CLI commands.

## Usage
# Example (Python CLI)
python main.py
# Inside the CLI: add, list, search, update, delete
EOF

# Stage and commit the README.md
git add README.md
git commit -m "Add README.md for midterm project"

# Add remote if not already set (replace if needed)
git remote add origin https://github.com/Jurycko/GIt-Activity.git

# Ensure branch name is main and push
git branch -M main
git push -u origin main
```

## Usage
Run the program (example for a Python CLI):
```bash
python main.py
```
Use commands like `add`, `list`, `search <id>`, `delete <id>` inside the program.

## Screenshots or Code Snippets
- Add images to `assets/` and reference them like: `![screenshot](assets/screenshot.png)`

- Example code snippet (Python):
```python
import json
from pathlib import Path

DATA_FILE = Path("students.json")

def load_students():
    if DATA_FILE.exists():
        return json.loads(DATA_FILE.read_text())
    return []

def save_students(students):
    DATA_FILE.write_text(json.dumps(students, indent=2))
```
- (PHP):
```xxxx_create_sections_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('sections', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('room');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
```
```xxxx_create_students_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->foreignId('section_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
```
- (json):
```dashboard.blade.php
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
```
## Contributors
- Jurycko — main developer

## License
This project is available under the MIT License. See the LICENSE file for details.
