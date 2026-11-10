# ResidentialProperQuoteCraft — AI Estimate & Proposal Assistant for Residential Property Managers

**ResidentialProperQuoteCraft** is a modular Laravel + Filament SaaS that helps residential property managers draft itemized make-ready and maintenance quotes from intake details, route human approval, open vendor work orders, and keep a fair-housing-aware audit log.

## SEO Title / H1

# ResidentialProperQuoteCraft | AI Make-Ready Quotes, Maintenance Proposals & Vendor Work Orders for Residential Property Managers

## SEO / Related Keywords

residential property manager software, AI estimate software, property management proposal assistant, itemized make-ready quotes, unit turnover estimate, maintenance request quoting, vendor work order software, owner charge proposal, AppFolio integration, Buildium quoting, email proposal delivery, accounting handoff, fair housing compliance notes, tenant privacy workflow, residential property managers revenue operations, multifamily estimate automation, HOA maintenance proposals, Laravel Filament SaaS, modular feature toggles, AI business automation, real estate property ops, price catalog labor materials, Unicode PDF proposals, multi-role property admin, intake to approval audit trail, make-ready turnover pricing, apartment turnover quoting, property ops estimate draft, owner approval workflow, vendor dispatch tickets, residential PM SaaS, AI proposal drafting, maintenance catalog pricing, consent-aware messaging, fair-housing review gates, Docker Laravel Filament demo

## Problem & MVP

For residential property managers: draft itemized quotes or proposals from intake details for approval; operate on properties, residents, maintenance requests and vendor work orders.

**MVP:** 1 intake trigger → AI draft/action → human approval → audit log

**Risk / compliance:** MED/HIGH — housing, fair-housing and tenant privacy. Demo content keeps proposal scope on property work only and surfaces consent / privacy notes.

## Feature Modules

| Module | Default | Purpose |
|--------|---------|---------|
| Quote Intake | ON (core) | Capture maintenance / make-ready intake |
| AI Quote Drafting | ON (core) | Itemized AI estimate from intake + catalog |
| Proposal Approval | ON (core) | Human-in-the-loop owner/ops approval |
| Audit Log | ON (core) | Immutable draft → approve → send trail |
| Maintenance Requests | ON (core) | Resident / unit service requests |
| Vendor Work Orders | ON (core) | Field tickets from approved quotes |
| Maintenance Vendors | ON (core) | Vendor roster, licenses, specialties |
| Properties Portfolio | ON (core) | Asset context for quoting |
| Residents & Contacts | ON (core) | Owner/resident contacts + consent |
| Price Catalog | ON | Make-ready / maintenance price book |
| Owner Portal | OFF | Owner view/accept proposals |
| Integrations Hub | OFF | AppFolio / Buildium / email / accounting |
| PDF Proposals | ON | Unicode-ready proposal PDFs |
| Messaging Consent | ON | SMS/email consent before outreach |
| Fair Housing & Privacy | ON | Review gates and housing risk notes |
| Vendor Licensing & Safety | ON | Licenses / COI / safety |
| Calendar Scheduling | OFF | Access & inspection scheduling |
| Attendance Hub | OFF | On-site staff time clock |
| Follow-Up Autopilot | OFF | Pending proposal reminders |
| AI Catalog Enrichment | OFF | Supply data enrichment |
| UniversalSlug Engine | ON | Multi-language proposal slugs |

Toggle modules in Filament → Feature Modules (or `config/modules.php` / env flags).

## Demo Users

Password for all: `password`

| Role | Email |
|------|-------|
| Admin | admin@residentialproperquotecraft.test |
| Owner / Ops Lead | owner@residentialproperquotecraft.test |
| Staff | staff@residentialproperquotecraft.test |
| Vendor Technician | tech@residentialproperquotecraft.test |
| Owner Contact | customer@residentialproperquotecraft.test |

## Docker Run

```bash
docker compose up -d --build
```

- App: http://localhost:8122
- Admin: http://localhost:8122/admin
- MySQL host port: `33092`
- Redis host port: `63812`

Entrypoint waits for MySQL, runs migrations, and seeds demo data once. PHP image installs `ext-intl` for Filament. Prefer Docker Desktop; host Composer is not required.

## Public Pages

- `/` — Home / product hero
- `/features` — All modules
- `/modules` — Module ON/OFF board
- `/workflow` — Intake → draft → approve → audit
- `/pricing` — Pilot $299–$1,499/mo
- `/demo` — Demo credentials

## Screenshots

See `docs/screenshots/` for product captures:

- `home.png` — Marketing home
- `features.png` — Features / modules gallery
- `admin-login.png` — Filament admin login
- `admin-dashboard.png` — Ops dashboard with quote pipeline stats
- `quotes.png` — AI quotes list with approve / job ticket actions

## Tech Stack

- PHP 8.4 + Laravel + Filament admin
- MySQL 8.4 + Redis
- Docker Compose (`ext-intl` enabled for Filament)
- Local AI quote drafting, PDF, slug, and attendance equivalents (Packagist `imrandevbd/*` packages may be private/unavailable)

## Integrations (stubs)

AppFolio · Buildium · Email · Accounting

## Contact / Hire

- Developer: Imran Ahmed (IMRAN Dev BD)
- Website: https://imrandev.bd/contact
- Email: me@imrandev.bd
- GitHub: https://github.com/imranbru99
