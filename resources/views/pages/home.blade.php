@extends('layouts.marketing')

@section('title', 'ResidentialProperQuoteCraft — AI Estimate & Proposal Assistant for Residential Property Managers')
@section('meta_description', 'Draft itemized make-ready and maintenance quotes from intake details, approve owner proposals, create vendor work orders, and keep a fair-housing-aware audit trail. Modular Laravel Filament SaaS for residential property managers.')

@section('content')
<section class="wrap hero fade-up">
    <div>
        <div class="tag">Rank #22 · Residential Property Managers · Revenue Ops</div>
        <h1>ResidentialProperQuoteCraft</h1>
        <p class="lead">AI estimate & proposal assistant that turns maintenance and make-ready intakes into itemized owner quotes, routes human approval, and opens vendor work orders — with a full audit log.</p>
        <div class="cta-row">
            <a class="btn btn-primary" href="/admin">Open Admin Panel</a>
            <a class="btn btn-ghost" href="{{ route('features') }}">Explore Features</a>
        </div>
        <div class="stat-row">
            <div class="stat"><b>{{ $stats['intakes'] }}</b><span class="muted">Maintenance intakes</span></div>
            <div class="stat"><b>{{ $stats['quotes'] }}</b><span class="muted">Quotes drafted</span></div>
            <div class="stat"><b>{{ $stats['catalog'] }}</b><span class="muted">Catalog items</span></div>
            <div class="stat"><b>{{ $stats['modules_on'] }}</b><span class="muted">Modules ON</span></div>
        </div>
    </div>
    <div class="panel floaty">
        <h3>MVP workflow</h3>
        <p>1 intake trigger → AI draft → human approval → audit log</p>
        <div style="margin-top:1rem">
            <span class="chip">Maintenance Requests</span>
            <span class="chip">AI Quote Drafting</span>
            <span class="chip">Proposal Approval</span>
            <span class="chip">Vendor Work Orders</span>
            <span class="chip">Fair Housing</span>
            <span class="chip">Audit Log</span>
        </div>
        <p style="margin-top:1.5rem;opacity:.9">Integrations ready: AppFolio · Buildium · Email · Accounting</p>
    </div>
</section>

<section class="wrap section">
    <h2>Built for residential property managers</h2>
    <p class="muted">Stop rewriting the same unit-turn and vendor-scope proposals. Capture intake once, draft with AI, approve, and dispatch — while keeping tenant privacy and fair-housing notes in the loop.</p>
    <div class="grid-3" style="margin-top:1.5rem">
        <div class="card">
            <h3>Itemized AI quotes</h3>
            <p class="muted">Match intake keywords to your make-ready and maintenance catalog for labor, materials, inspections, and dispatch fees.</p>
        </div>
        <div class="card">
            <h3>Human approval gate</h3>
            <p class="muted">Ops leads approve before anything reaches owners — MED/HIGH housing, fair-housing and tenant privacy aware.</p>
        </div>
        <div class="card">
            <h3>Modular by design</h3>
            <p class="muted">Enable or disable modules for properties, residents, consent, vendors, integrations, and follow-ups.</p>
        </div>
    </div>
</section>

<section class="wrap section">
    <h2>Feature modules at a glance</h2>
    <div class="grid-2" style="margin-top:1rem">
        @foreach(collect($modules)->take(8) as $module)
            <div class="card">
                <span class="tag {{ $module['enabled'] ? 'on' : 'off' }}">{{ $module['enabled'] ? 'ON' : 'OFF' }}</span>
                <h3 style="margin-top:.6rem">{{ $module['name'] }}</h3>
                <p class="muted">{{ $module['description'] }}</p>
            </div>
        @endforeach
    </div>
    <div class="cta-row"><a class="btn btn-ghost" href="{{ route('modules') }}">View all modules</a></div>
</section>
@endsection
