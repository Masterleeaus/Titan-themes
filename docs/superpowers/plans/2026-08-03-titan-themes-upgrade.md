# Titan Themes Multi-Step Upgrade Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task.

**Goal:** Convert the current foundation into a production-ready, installable and testable layered theme platform for Titan Zero field and home service businesses.

**Architecture:** Maintain one canonical `titan-zero-core` platform theme and layer industry-specific vertical overlays over it. Shared shell, tokens, components, accessibility, offline state and role/device adaptation remain platform-owned. Verticals register terminology, workflows, forms, checklists, widgets, AI actions and public-site content.

**Tech stack:** Laravel Blade, PHP 8.3+, CSS custom properties, progressive JavaScript, JSON manifests, Python validation and GitHub Actions.

## Global constraints

- Never duplicate WorkCore operational records inside themes or verticals.
- Every vertical declares `"extends": "titan-zero-core"` and `"type": "vertical-overlay"`.
- Verticals cannot replace the platform shell, authentication, permissions, offline runtime or shared navigation.
- Safety, compliance, conflict and offline states override tenant branding.
- Field controls use at least 44px touch targets and remain functional offline.
- Public presets share semantic sections instead of copying complete pages.
- Every task includes automated validation and an independently reviewable commit.

---

## Milestone 1 — Authoritative repository source

### Task 1: Expand the source archive

**Files:** `releases/titan-themes-source.zip`, `themes/`, `verticals/`, `docs/`, `tests/`, `scripts/check-no-zip-drift.py`, `tests/validate-source-tree.py`

- [ ] Write a failing test requiring core theme, cleaning vertical and architecture docs directly in the repository.
- [ ] Extract and normalise all editable files; remove `__MACOSX`, `.DS_Store`, byte-order marks and duplicate generated files.
- [ ] Make tracked files authoritative and treat ZIP files only as generated release artefacts.
- [ ] Add SHA-256 drift checking between tracked source and generated archives.
- [ ] Run `python tests/validate-source-tree.py`, `validate-foundation.py` and `validate-architecture.py`.
- [ ] Commit: `chore: expand Titan themes source tree`.

### Task 2: Formalise manifests

**Files:** `packages/contracts/theme.schema.json`, `packages/contracts/vertical.schema.json`, `scripts/validate-manifests.py`, all theme and vertical manifests.

- [ ] Require theme fields: slug, name, version, type, surfaces and variants.
- [ ] Require vertical fields: slug, name, version, type, extends and WorkCore domains.
- [ ] Reject duplicate slugs, invalid inheritance, empty domain lists, unknown surfaces and unsafe override declarations.
- [ ] Add manifest validation to `.github/workflows/validate.yml`.
- [ ] Commit: `feat: formalize Titan theme manifest contracts`.

---

## Milestone 2 — Platform design system

### Task 3: Complete semantic tokens

**Files:** `themes/titan-zero-core/tokens/{tokens,semantic,density,motion,accessibility}.css`, `tests/validate-tokens.py`.

- [ ] Add success, warning, danger, information, offline, conflict, permission and disabled states.
- [ ] Add compact, standard and field density contracts.
- [ ] Add high-contrast and reduced-motion behaviour.
- [ ] Prohibit hard-coded operational state colours in components.
- [ ] Commit: `feat: complete Titan Zero semantic token system`.

### Task 4: Build the canonical shell

**Files:** `themes/titan-zero-core/shell/`, `themes/titan-zero-core/contracts/shell-slots.json`, `tests/validate-shell.py`.

- [ ] Define platform-owned slots: primary navigation, workspace, context, assistant and system status.
- [ ] Permit vertical extension only through registered navigation, workspace and context slots.
- [ ] Add persistent chat/voice composer, approval state and sync state.
- [ ] Fail validation if a vertical contains `shell/` or `app-shell.blade.php`.
- [ ] Commit: `feat: add canonical Titan Zero application shell`.

### Task 5: Expand shared components

**Files:** status badge, action card, job card, exception panel, approval card, evidence gallery, offline queue and empty-state components; update `component-contract.json`; add `tests/validate-components.py`.

- [ ] Define explicit props and allowed states for every component.
- [ ] Keep components data-source neutral; they receive view models and never query WorkCore directly.
- [ ] Cover loading, empty, permission-denied, offline, conflict and failed states.
- [ ] Add fixture-based rendering validation.
- [ ] Commit: `feat: expand shared operational component library`.

---

## Milestone 3 — Core product surfaces

### Task 6: Manager workspace

**Files:** `themes/titan-zero-core/surfaces/manager/`, `contracts/manager-slots.json`, `tests/validate-manager-surface.py`.

- [ ] Implement operational pulse, today's jobs, dispatch risks, approvals, quality/compliance exceptions, cash pulse and AI recommendations.
- [ ] Register bounded widget slots for vertical overlays.
- [ ] Render cleaning widgets through registry configuration instead of copied templates.
- [ ] Validate empty, permission, loading and failure states.
- [ ] Commit: `feat: complete manager operational surface`.

### Task 7: Titan Go field runner

**Files:** `themes/titan-zero-core/surfaces/field/`, `tests/validate-field-surface.py`.

- [ ] Implement stable flow: arrival → safety/access → tasks → evidence → variation → completion → sync.
- [ ] Enforce minimum touch targets and stable step order.
- [ ] Add voice-note, photo, signature and offline queue slots.
- [ ] Add explicit conflict resolution for concurrent completion updates.
- [ ] Commit: `feat: build Titan Go field job runner`.

### Task 8: Customer and public surfaces

**Files:** `themes/titan-zero-core/surfaces/customer/`, `themes/titan-zero-core/surfaces/public/`, `tests/validate-public-surfaces.py`.

- [ ] Build customer quote approval, appointment status, evidence, reports, invoice and Titan Pay views.
- [ ] Build semantic public sections: hero, trust, services, process, service areas, evidence, testimonials, FAQ and quote CTA.
- [ ] Convert Modern, Dark and Creative donors into presets of shared sections.
- [ ] Fail validation when a preset duplicates a complete page.
- [ ] Commit: `feat: add customer and public theme surfaces`.

---

## Milestone 4 — Cleaning reference vertical

### Task 9: Complete Cleaning

**Files:** `verticals/cleaning/terminology.json`, `navigation.json`, `job-types.json`, `widgets.json`, `forms/`, `checklists/`, `ai-actions.json`, `public-site.json`, `tests/validate-cleaning-vertical.py`.

- [ ] Define recurring clean, deep clean, end-of-lease, inspection, emergency and re-clean job types.
- [ ] Define room/area checklists and before/after evidence rules.
- [ ] Register manager widgets and field workflow through platform slots.
- [ ] Define AI actions strictly as WorkCore API requests.
- [ ] Add complete fixtures and validation.
- [ ] Commit: `feat: complete cleaning reference vertical`.

---

## Milestone 5 — Vertical catalogue

### Task 10: Expand seven vertical overlays

- [ ] Plumbing: fixtures, leaks, pressure readings, parts and repair choices.
- [ ] Electrical: circuits, isolation, test readings, defects, licences and certificates.
- [ ] HVAC: assets, serials, refrigerant, filters, readings and service intervals.
- [ ] Landscaping: zones, plants, treatments, irrigation, routes and weather constraints.
- [ ] Pest control: pest types, treatment zones, products, bait stations and follow-ups.
- [ ] Painting: surfaces, preparation, coatings, colours, finishes and stage completion.
- [ ] Property maintenance: defects, triage, approvals, trade dependencies and SLA risks.
- [ ] Add common `tests/validate-verticals.py` and commit each vertical independently.

---

## Milestone 6 — Runtime integration

### Task 11: Laravel registry and resolver

**Files:** `packages/registry/ThemeRegistry.php`, `VerticalRegistry.php`, `ThemeResolver.php`, `SlotRegistry.php`, `StatePriorityResolver.php`, `tests/php/ThemeRegistryTest.php`.

Required precedence:

```text
core → platform variant → vertical overlay → tenant brand → accessibility → role/device → operational state
```

- [ ] Write failing resolution and boundary tests.
- [ ] Implement deterministic resolution.
- [ ] Reject unsafe slot replacement and safety-state colour overrides.
- [ ] Add Laravel service-provider integration.
- [ ] Commit: `feat: add layered theme runtime registry`.

---

## Milestone 7 — Visual and accessibility quality

### Task 12: Preview and regression suite

**Files:** `preview/`, `tests/browser/`, `.github/workflows/visual-regression.yml`, `docs/testing/visual-regression.md`.

- [ ] Build fixture-driven previews for manager, field, customer and public surfaces.
- [ ] Capture mobile, tablet and desktop snapshots.
- [ ] Test keyboard navigation, focus visibility, contrast, reduced motion and touch targets.
- [ ] Upload screenshot differences as CI artefacts.
- [ ] Commit: `test: add visual and accessibility regression suite`.

---

## Milestone 8 — Packaging, releases and authoring SDK

### Task 13: Reproducible packages

**Files:** `scripts/build-theme-package.py`, `build-vertical-package.py`, `generate-checksums.py`, `.github/workflows/package-release.yml`, `CHANGELOG.md`, `docs/releasing.md`.

- [ ] Build deterministic archives from tracked source.
- [ ] Exclude donor packages, fixtures and development-only files.
- [ ] Generate SHA-256 checksums.
- [ ] Validate archive contents before release.
- [ ] Publish release assets from version tags.
- [ ] Commit: `build: automate Titan theme packaging and releases`.

### Task 14: Vertical authoring SDK

**Files:** `docs/architecture/`, `docs/vertical-authoring/`, `docs/migration/from-legacy-theme.md`, `templates/new-vertical/`.

- [ ] Document platform and vertical development avenues.
- [ ] Document every manifest field, component contract and extension slot.
- [ ] Add a complete new-vertical template.
- [ ] Add donor-theme migration guidance.
- [ ] Validate documentation examples in CI.
- [ ] Commit: `docs: add Titan vertical authoring SDK`.

---

## Definition of done

- Editable source exists directly in the repository.
- Every manifest validates against canonical schemas.
- No vertical replaces the shell or duplicates WorkCore records.
- All surfaces render through common component contracts.
- Cleaning is production-complete as the reference vertical.
- Other verticals satisfy the same validation contract.
- Offline, conflict, safety, permission, empty, loading and failure states are covered.
- Visual regression and accessibility checks run in CI.
- Packages are generated reproducibly from Git tags with checksums.
- A developer can create a new vertical without copying platform templates.
