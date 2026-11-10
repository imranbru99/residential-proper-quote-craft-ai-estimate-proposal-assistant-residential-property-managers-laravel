<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Feature modules — toggle ON/OFF per property management business needs
    |--------------------------------------------------------------------------
    */
    'quote_intake' => [
        'enabled' => env('MODULE_QUOTE_INTAKE', true),
        'name' => 'Quote Intake',
        'description' => 'Capture maintenance and make-ready intake details that feed AI quote drafting.',
        'core' => true,
    ],
    'ai_quote_drafting' => [
        'enabled' => env('MODULE_AI_QUOTE_DRAFTING', true),
        'name' => 'AI Quote Drafting',
        'description' => 'Draft itemized property estimates and owner proposals from intake details using AI.',
        'core' => true,
    ],
    'proposal_approval' => [
        'enabled' => env('MODULE_PROPOSAL_APPROVAL', true),
        'name' => 'Proposal Approval',
        'description' => 'Human-in-the-loop approval workflow before quotes go to owners or vendors.',
        'core' => true,
    ],
    'audit_log' => [
        'enabled' => env('MODULE_AUDIT_LOG', true),
        'name' => 'Audit Log',
        'description' => 'Immutable activity trail for intake, drafts, approvals and sends (fair-housing aware).',
        'core' => true,
    ],
    'service_requests' => [
        'enabled' => env('MODULE_SERVICE_REQUESTS', true),
        'name' => 'Maintenance Requests',
        'description' => 'Track resident maintenance requests across properties and units.',
        'core' => true,
    ],
    'job_tickets' => [
        'enabled' => env('MODULE_JOB_TICKETS', true),
        'name' => 'Vendor Work Orders',
        'description' => 'Convert approved proposals into vendor work orders for field execution.',
        'core' => true,
    ],
    'field_technicians' => [
        'enabled' => env('MODULE_FIELD_TECHNICIANS', true),
        'name' => 'Maintenance Vendors',
        'description' => 'Manage vendor profiles, licenses, specialties and assignment readiness.',
        'core' => true,
    ],
    'properties_portfolio' => [
        'enabled' => env('MODULE_PROPERTIES_PORTFOLIO', true),
        'name' => 'Properties Portfolio',
        'description' => 'Multifamily, SFR and condo assets used as context for quote intake.',
        'core' => true,
    ],
    'residents_leases' => [
        'enabled' => env('MODULE_RESIDENTS_LEASES', true),
        'name' => 'Residents & Contacts',
        'description' => 'Owner and resident contacts with messaging consent and privacy flags.',
        'core' => true,
    ],
    'price_catalog' => [
        'enabled' => env('MODULE_PRICE_CATALOG', true),
        'name' => 'Price Catalog',
        'description' => 'Make-ready, turnover and maintenance price book for itemized quotes.',
        'core' => false,
    ],
    'customer_portal' => [
        'enabled' => env('MODULE_CUSTOMER_PORTAL', false),
        'name' => 'Owner Portal',
        'description' => 'Let owners view proposals and accept quotes online.',
        'core' => false,
    ],
    'integrations_hub' => [
        'enabled' => env('MODULE_INTEGRATIONS_HUB', false),
        'name' => 'Integrations Hub',
        'description' => 'Connect AppFolio, Buildium, email and accounting systems.',
        'core' => false,
    ],
    'pdf_proposals' => [
        'enabled' => env('MODULE_PDF_PROPOSALS', true),
        'name' => 'PDF Proposals',
        'description' => 'Generate branded Unicode-ready PDF proposals for any language.',
        'core' => false,
    ],
    'messaging_consent' => [
        'enabled' => env('MODULE_MESSAGING_CONSENT', true),
        'name' => 'Messaging Consent',
        'description' => 'Track SMS/email consent before resident or owner outreach.',
        'core' => false,
    ],
    'fair_housing_privacy' => [
        'enabled' => env('MODULE_FAIR_HOUSING_PRIVACY', true),
        'name' => 'Fair Housing & Privacy',
        'description' => 'Review gates and notes for housing, fair-housing and tenant privacy risk.',
        'core' => false,
    ],
    'licensing_safety' => [
        'enabled' => env('MODULE_LICENSING_SAFETY', true),
        'name' => 'Vendor Licensing & Safety',
        'description' => 'Track vendor licenses, COI and safety checklists.',
        'core' => false,
    ],
    'calendar_scheduling' => [
        'enabled' => env('MODULE_CALENDAR_SCHEDULING', false),
        'name' => 'Calendar Scheduling',
        'description' => 'Schedule unit access, inspections and proposal walkthroughs.',
        'core' => false,
    ],
    'attendance_hub' => [
        'enabled' => env('MODULE_ATTENDANCE_HUB', false),
        'name' => 'Attendance Hub',
        'description' => 'Optional time clock integration for on-site maintenance staff.',
        'core' => false,
    ],
    'follow_up_autopilot' => [
        'enabled' => env('MODULE_FOLLOW_UP_AUTOPILOT', false),
        'name' => 'Follow-Up Autopilot',
        'description' => 'Automated reminder sequences for pending owner proposals.',
        'core' => false,
    ],
    'ai_catalog_scrape' => [
        'enabled' => env('MODULE_AI_CATALOG_SCRAPE', false),
        'name' => 'AI Catalog Enrichment',
        'description' => 'Enrich price catalog from online supply and parts data.',
        'core' => false,
    ],
    'slug_engine' => [
        'enabled' => env('MODULE_SLUG_ENGINE', true),
        'name' => 'Universal Slug Engine',
        'description' => 'SEO-friendly multi-language slugs for proposals and pages.',
        'core' => false,
    ],
];
