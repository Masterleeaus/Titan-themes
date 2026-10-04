![Titan Themes — source foundation for tokens, component contracts, surface patterns, and vertical overlays](docs/images/titan-themes-banner.svg)

# Titan-themes — Titan Design System

> A versioned design-system foundation for Titan Zero field and home-service experiences, where shared primitives stay consistent while vertical overlays change the language and workflow.

## Overview

Titan-themes gives a product team a concrete place to define platform tokens, component contracts, surface patterns, and industry-specific manifests. It is designed for a host application that needs cleaning, electrical, HVAC, landscaping, painting, pest-control, plumbing, and property-maintenance experiences without duplicating the visual foundation.


## Measured evidence

Titan Themes is a **design-system and contract repository**, so its evidence is structural rather than model or product-performance benchmarking.

| Measured property | Current source state | Reproduce / inspect |
| --- | ---: | --- |
| Vertical overlays | **8** | cleaning, electrical, HVAC, landscaping, painting, pest control, plumbing, property maintenance |
| Core platform surfaces | **4** | manager, field, customer, public |
| Core theme variants | **5** | standard, compact, executive, field, night |
| Declared component slots | **10** | component contract |
| Operational state-priority levels | **6** | critical → danger → warning → success → brand → neutral |
| Deterministic validator scripts | **2** | foundation + architecture boundary checks |
| CI validation lane | runs both Python validators on PRs and main/feature pushes | `.github/workflows/validate.yml` |
| Browser visual regression | **Not established** | future evidence needed |
| Accessibility conformance benchmark | **Not established** | future evidence needed |
| Live host integration | **Not established** | host-specific validation required |

Reproduce the checked-in structural gates:

```bash
python tests/validate-foundation.py
python tests/validate-architecture.py
```

The foundation validator confirms the core manifest, token sheet, component contract and cleaning overlay baseline. The architecture validator checks required implementation examples and prevents vertical overlays from replacing platform-owned `shell`, `themes`, `auth` or `database` areas.

## What is new

The technical signature is a **declarative vertical-overlay model**: industry-specific terminology and workflow presentation can change while the host application's shell and authority boundaries remain stable.

```text
Titan Zero platform core
      ├── tokens
      ├── component contracts
      ├── shared surfaces
      └── state semantics
              ↓
       vertical overlay
      ├── terminology
      ├── workflow labels
      ├── forms/checklists
      ├── widgets
      └── declared AI actions
              ↓
         host application
```

The key design constraint is that a vertical overlay may contribute content and experience metadata, but it may **not** become a second application architecture. Host-owned authentication, tenancy, database, approval and execution concerns stay outside the theme layer.

<p align="center">
  <img src="docs/images/titan-themes-architecture.svg" alt="Titan Themes layers Titan Zero Core tokens and component contracts with versioned vertical overlays and experience surfaces, validated by Python scripts." width="100%" />
</p>

## Product problem

Home-service software often drifts into a set of one-off screens: each vertical gets its own labels, forms, checklists, and widgets, and the platform loses consistency. Titan-themes separates the stable platform layer from controlled vertical variation so a host application can evolve both without replacing its authority, tenancy, or security boundaries.

## Architecture

Titan-themes has two deliberate layers:

1. **Platform core** — Titan Zero theme manifest, design tokens, component contracts, reusable components, and surface examples.
2. **Vertical overlays** — versioned manifests for industry terminology, workflows, forms, checklists, widgets, and declared AI actions.

The overlay model keeps variation declarative. A vertical can describe how a shared surface should read and behave without becoming a second application or taking ownership of host-side approval and tenancy rules.

The current source includes the Titan Zero Core manifest and eight reference/foundation vertical overlays for cleaning, electrical, HVAC, landscaping, painting, pest control, plumbing, and property maintenance.

## Verified capabilities and source map

- themes/titan-zero-core/theme.json — platform theme manifest
- themes/titan-zero-core/tokens/tokens.css — checked-in design tokens
- themes/titan-zero-core/components/component-contract.json — component contract
- themes/titan-zero-core/components/ and themes/titan-zero-core/surfaces/ — implementation examples
- verticals/*/vertical.json — versioned overlay declarations for the supported service industries
- docs/ — implementation plans and architecture notes
- tests/ — structural foundation and architecture checks
- releases/titan-themes-source.zip — packaged source snapshot

## Reproducible verification

Run the repository checks with Python 3:

~~~
python tests/validate-foundation.py
python tests/validate-architecture.py
~~~

These scripts validate structural invariants in manifests, component contracts, and overlay declarations. They are intentionally narrower than browser, accessibility, package-install, and live-host integration testing.

## Evidence boundaries

- The core theme manifest and component contract show how shared platform primitives are declared.
- The token stylesheet, component stylesheet, Blade components, and surfaces provide concrete examples rather than only abstract design guidance.
- The vertical manifests demonstrate the overlay shape across cleaning, electrical, HVAC, landscaping, painting, pest control, plumbing, and property maintenance.
- The validation scripts provide repeatable checks for the source foundation.

## AI and host boundary

Some vertical manifests may declare AI actions as part of an experience contract. Titan-themes does not execute models or own provider credentials, host approvals, tenancy, or security. Those controls remain responsibilities of the host application; the value here is the explicit design and capability contract that the host can consume.

## Relationship to Titan Zero

Titan-themes is a supporting design-system project for [Titan Zero Field Service Workforce](https://github.com/Masterleeaus/Titan-Zero-Field-Service-Workforce). The host application owns runtime authority. Theme components and vertical overlays contribute through declared slots and contracts without replacing host boundaries.

## Distribution boundary

The repository contains a source foundation and packaged source snapshot. Review license and release metadata before redistribution, and verify package format, versioning, installation, rollback, and host compatibility before describing it as a released marketplace package.

## Banner

A checked-in project-specific banner is displayed above.
