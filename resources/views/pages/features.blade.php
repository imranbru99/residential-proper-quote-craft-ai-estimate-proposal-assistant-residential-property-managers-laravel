@extends('layouts.marketing')
@section('title', 'Features — ResidentialProperQuoteCraft AI Quoting for Residential Property Managers')
@section('content')
<section class="wrap section fade-up">
    <h1>Everything in ResidentialProperQuoteCraft</h1>
    <p class="lead">Complete estimate & proposal assistant covering maintenance intake, AI drafting, owner approval, vendor work orders, fair-housing notes, and optional AppFolio / Buildium integrations.</p>
    <div class="grid-3" style="margin-top:2rem">
        @foreach($modules as $module)
            <div class="card">
                <span class="tag {{ $module['enabled'] ? 'on' : 'off' }}">{{ $module['enabled'] ? 'Enabled' : 'Optional' }}</span>
                @if(!empty($module['core']))<span class="tag">Core</span>@endif
                <h3 style="margin-top:.7rem">{{ $module['name'] }}</h3>
                <p class="muted">{{ $module['description'] }}</p>
            </div>
        @endforeach
    </div>
    <div class="kw">
        <span>property management estimate software</span><span>make-ready quoting</span><span>unit turnover proposal</span>
        <span>maintenance request AI</span><span>vendor work order software</span><span>Laravel Filament SaaS</span>
        <span>AppFolio quoting</span><span>Buildium proposal module</span><span>fair housing compliance notes</span>
    </div>
</section>
@endsection
