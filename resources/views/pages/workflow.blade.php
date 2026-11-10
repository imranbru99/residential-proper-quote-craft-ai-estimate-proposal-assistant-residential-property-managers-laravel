@extends('layouts.marketing')
@section('title', 'Workflow — Intake to Approved Property Proposal')
@section('content')
<section class="wrap section fade-up">
    <h1>Estimate & proposal workflow</h1>
    <p class="lead">Designed around the revenue-ops problem: draft itemized quotes or proposals from intake details for approval; operate on properties, residents, maintenance requests and vendor work orders.</p>
    <div class="steps" style="margin-top:2rem">
        <div class="step card"><div><h3>Intake trigger</h3><p class="muted">Phone, owner portal, or PMS lead becomes a Maintenance Request with property/unit context, job type, hours, and site access details.</p></div></div>
        <div class="step card"><div><h3>AI draft action</h3><p class="muted">ResidentialProperQuoteCraft matches catalog keywords and builds line items, tax, totals, and a proposal narrative with confidence score — plus fair-housing scope notes.</p></div></div>
        <div class="step card"><div><h3>Human approval</h3><p class="muted">Owner/ops lead reviews, edits line items, and approves. Messaging consent, vendor licenses, and tenant privacy checks stay visible.</p></div></div>
        <div class="step card"><div><h3>Work order + audit</h3><p class="muted">Approved quotes spawn vendor work orders. Every draft/approve/send is recorded in the audit log.</p></div></div>
    </div>
</section>
@endsection
