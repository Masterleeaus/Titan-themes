import json
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]

required = [
    ROOT / "themes/titan-zero-core/theme.json",
    ROOT / "themes/titan-zero-core/tokens/tokens.css",
    ROOT / "themes/titan-zero-core/components/component-contract.json",
    ROOT / "verticals/cleaning/vertical.json",
]
for path in required:
    assert path.exists(), f"Missing {path}"

core = json.loads(required[0].read_text())
assert core["slug"] == "titan-zero-core"
assert set(core["surfaces"]) == {"manager", "field", "customer", "public"}
cleaning = json.loads(required[3].read_text())
assert cleaning["extends"] == "titan-zero-core"
assert "operations" in cleaning["workcoreDomains"]
print("Titan Themes foundation valid")
