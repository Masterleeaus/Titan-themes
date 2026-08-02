# Titan Themes

Canonical layered theme system for Titan Zero field and home service businesses.

## Architecture

Titan Themes separates two development avenues:

1. **Platform themes** — shared Titan Zero shell, design tokens, components, surfaces and experience variants.
2. **Vertical overlays** — industry terminology, workflows, forms, checklists, widgets and AI actions layered over the platform.

The initial foundation includes Titan Zero Core, five platform variants, a complete cleaning reference vertical, and starter manifests for plumbing, electrical, HVAC, landscaping, pest control, painting and property maintenance.

## Working branch

Initial development is on `feature/titan-theme-foundation`.

## Source package

The complete extracted foundation is stored at `releases/titan-themes-source.zip`. It contains the editable source tree, architecture documents, validation tests and implementation plan.

## Validate

```bash
unzip releases/titan-themes-source.zip -d titan-themes-source
cd titan-themes-source
python tests/validate-foundation.py
```
