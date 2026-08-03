#!/usr/bin/env python3
from __future__ import annotations

import json
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
CORE = ROOT / "themes" / "titan-zero-core"
VERTICALS = ROOT / "verticals"


def load_json(path: Path) -> dict:
    with path.open(encoding="utf-8-sig") as handle:
        return json.load(handle)


def main() -> None:
    contract = load_json(CORE / "components" / "component-contract.json")
    assert contract["statePriority"][0] == "critical"
    assert "brand" in contract["statePriority"]

    required_components = [
        CORE / "components" / "components.css",
        CORE / "components" / "metric-card.blade.php",
        CORE / "components" / "sync-indicator.blade.php",
        CORE / "surfaces" / "manager" / "workspace.blade.php",
        CORE / "surfaces" / "field" / "next-job.blade.php",
    ]
    for path in required_components:
        assert path.exists(), f"Missing component: {path.relative_to(ROOT)}"

    forbidden_vertical_paths = {"shell", "themes", "auth", "database"}
    for vertical in VERTICALS.iterdir():
        if not vertical.is_dir():
            continue
        children = {child.name for child in vertical.iterdir() if child.is_dir()}
        overlap = children & forbidden_vertical_paths
        assert not overlap, f"{vertical.name} replaces platform-owned paths: {sorted(overlap)}"

        manifest = load_json(vertical / "vertical.json")
        assert manifest.get("extends") == "titan-zero-core"
        assert manifest.get("type") == "vertical-overlay"

    print("Titan Themes architecture valid")


if __name__ == "__main__":
    main()
