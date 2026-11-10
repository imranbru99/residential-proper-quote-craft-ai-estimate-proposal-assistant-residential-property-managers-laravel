@extends('layouts.marketing')
@section('title', 'Demo Users — ResidentialProperQuoteCraft')
@section('content')
<section class="wrap section fade-up">
    <h1>Demo access</h1>
    <p class="lead">Use these seeded accounts to explore the Filament admin at <a href="/admin"><strong>/admin</strong></a>. Password for all: <code>password</code></p>
    <div class="grid-2" style="margin-top:1.5rem">
        <div class="demo-box"><strong>Admin</strong><br>admin@residentialproperquotecraft.test<br>Full module control</div>
        <div class="demo-box"><strong>Owner / Ops Lead</strong><br>owner@residentialproperquotecraft.test<br>Approvals & revenue ops</div>
        <div class="demo-box"><strong>Staff</strong><br>staff@residentialproperquotecraft.test<br>Intake & AI drafting</div>
        <div class="demo-box"><strong>Vendor Technician</strong><br>tech@residentialproperquotecraft.test<br>Work orders & profile</div>
        <div class="demo-box"><strong>Owner Contact (portal demo)</strong><br>customer@residentialproperquotecraft.test<br>No admin panel access</div>
    </div>
    <div class="cta-row" style="margin-top:1.5rem">
        <a class="btn btn-primary" href="/admin/login">Login to Admin</a>
    </div>
</section>
@endsection
