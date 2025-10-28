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

## Contributors
- Jurycko — main developer

## License
This project is available under the MIT License. See the LICENSE file for details.
