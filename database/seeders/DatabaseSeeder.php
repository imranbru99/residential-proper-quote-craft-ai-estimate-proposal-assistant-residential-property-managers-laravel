<?php

namespace Database\Seeders;

use App\Models\AttendanceRecord;
use App\Models\AuditLog;
use App\Models\CatalogItem;
use App\Models\ConsentRecord;
use App\Models\Customer;
use App\Models\IntegrationSetting;
use App\Models\JobTicket;
use App\Models\ModuleSetting;
use App\Models\ServiceRequest;
use App\Models\Technician;
use App\Models\User;
use App\Services\AiQuoteDrafter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::query()->updateOrCreate(
            ['email' => 'admin@residentialproperquotecraft.test'],
            ['name' => 'Alex Admin', 'password' => Hash::make('password'), 'role' => User::ROLE_ADMIN, 'phone' => '555-0100', 'is_active' => true]
        );
        $owner = User::query()->updateOrCreate(
            ['email' => 'owner@residentialproperquotecraft.test'],
            ['name' => 'Olivia Ops Lead', 'password' => Hash::make('password'), 'role' => User::ROLE_OWNER, 'phone' => '555-0101', 'is_active' => true]
        );
        $staff = User::query()->updateOrCreate(
            ['email' => 'staff@residentialproperquotecraft.test'],
            ['name' => 'Sam Staff', 'password' => Hash::make('password'), 'role' => User::ROLE_STAFF, 'phone' => '555-0102', 'is_active' => true]
        );
        $techUser = User::query()->updateOrCreate(
            ['email' => 'tech@residentialproperquotecraft.test'],
            ['name' => 'Taylor Vendor Tech', 'password' => Hash::make('password'), 'role' => User::ROLE_TECHNICIAN, 'phone' => '555-0103', 'is_active' => true]
        );
        User::query()->updateOrCreate(
            ['email' => 'customer@residentialproperquotecraft.test'],
            ['name' => 'Casey Owner Contact', 'password' => Hash::make('password'), 'role' => User::ROLE_CUSTOMER, 'phone' => '555-0199', 'is_active' => true]
        );

        foreach (config('modules', []) as $key => $meta) {
            ModuleSetting::query()->updateOrCreate(
                ['key' => $key],
                [
                    'name' => $meta['name'],
                    'description' => $meta['description'] ?? null,
                    'enabled' => (bool) ($meta['enabled'] ?? false),
                    'is_core' => (bool) ($meta['core'] ?? false),
                ]
            );
        }

        $tech = Technician::query()->updateOrCreate(
            ['user_id' => $techUser->id],
            [
                'employee_code' => 'VND-07',
                'license_number' => 'TX-GC-44821',
                'license_expires_on' => now()->addYear()->toDateString(),
                'specialty' => 'Unit turns, HVAC & appliance make-ready',
                'is_available' => true,
                'safety_certified' => true,
                'notes' => 'Preferred make-ready vendor — fair-housing trained',
            ]
        );

        $catalog = [
            ['sku' => 'LAB-MR', 'name' => 'Make-ready labor', 'category' => 'labor', 'unit' => 'hr', 'unit_price' => 75, 'keywords' => 'labor,make-ready,turnover,paint,clean'],
            ['sku' => 'LAB-MT', 'name' => 'Maintenance tech labor', 'category' => 'labor', 'unit' => 'hr', 'unit_price' => 65, 'keywords' => 'labor,maintenance,repair,troubleshoot'],
            ['sku' => 'TURN-FULL', 'name' => 'Full unit turnover package', 'category' => 'materials', 'unit' => 'ea', 'unit_price' => 1450, 'keywords' => 'turnover,make-ready,unit turn,vacancy'],
            ['sku' => 'PAINT-INT', 'name' => 'Interior paint refresh', 'category' => 'materials', 'unit' => 'unit', 'unit_price' => 520, 'keywords' => 'paint,interior,refresh,walls'],
            ['sku' => 'APPL-FR', 'name' => 'Fridge replacement install', 'category' => 'materials', 'unit' => 'ea', 'unit_price' => 890, 'keywords' => 'appliance,fridge,refrigerator'],
            ['sku' => 'HVAC-FLT', 'name' => 'HVAC filter + coil clean', 'category' => 'materials', 'unit' => 'ea', 'unit_price' => 145, 'keywords' => 'hvac,filter,coil,air'],
            ['sku' => 'PLUMB-FIX', 'name' => 'Plumbing fixture repair kit', 'category' => 'materials', 'unit' => 'ea', 'unit_price' => 185, 'keywords' => 'plumbing,leak,faucet,fixture'],
            ['sku' => 'CARP-DOOR', 'name' => 'Interior door / hardware set', 'category' => 'materials', 'unit' => 'ea', 'unit_price' => 210, 'keywords' => 'door,hardware,carpentry'],
            ['sku' => 'INSP-FEE', 'name' => 'Move-out inspection fee', 'category' => 'fees', 'unit' => 'ea', 'unit_price' => 95, 'keywords' => 'inspection,move-out,walkthrough'],
            ['sku' => 'TRIP', 'name' => 'Vendor dispatch / diagnostic visit', 'category' => 'fees', 'unit' => 'visit', 'unit_price' => 89, 'keywords' => 'service,troubleshoot,diagnostic,dispatch'],
        ];

        foreach ($catalog as $row) {
            CatalogItem::query()->updateOrCreate(['sku' => $row['sku']], array_merge($row, ['is_active' => true]));
        }

        $customers = [
            [
                'name' => 'Jordan Rivera (Owner)', 'email' => 'jordan@oakridgepm.test', 'phone' => '555-2001',
                'address' => '418 Maple Ave — Oakridge Flats #2B', 'city' => 'Austin', 'state' => 'TX', 'zip' => '78702',
                'customer_type' => 'residential', 'messaging_consent' => true,
            ],
            [
                'name' => 'Cedar Peak HOA', 'email' => 'ops@cedarpeakhoa.test', 'phone' => '555-2002', 'company' => 'Cedar Peak Community Assoc.',
                'address' => '90 Commerce Blvd — Clubhouse / Common Areas', 'city' => 'Round Rock', 'state' => 'TX', 'zip' => '78664',
                'customer_type' => 'commercial', 'messaging_consent' => true,
            ],
            [
                'name' => 'Morgan Lee (Resident)', 'email' => 'morgan@homesample.test', 'phone' => '555-2003',
                'address' => '12 Cedar Trail — Unit 4A', 'city' => 'Cedar Park', 'state' => 'TX', 'zip' => '78613',
                'customer_type' => 'residential', 'messaging_consent' => false,
            ],
        ];

        $customerModels = [];
        foreach ($customers as $c) {
            $customerModels[] = Customer::query()->updateOrCreate(['email' => $c['email']], $c);
        }

        foreach ($customerModels as $c) {
            if ($c->messaging_consent) {
                ConsentRecord::query()->updateOrCreate(
                    ['customer_id' => $c->id, 'channel' => 'sms'],
                    ['consented' => true, 'source' => 'web_form', 'captured_at' => now()->subDays(3)]
                );
            }
        }

        $sr1 = ServiceRequest::query()->updateOrCreate(
            ['request_number' => 'SR-DEMO-001'],
            [
                'customer_id' => $customerModels[0]->id,
                'assigned_technician_id' => $tech->id,
                'intake_by' => $staff->id,
                'title' => 'Full unit make-ready + appliance turn',
                'description' => 'Vacant unit needs full make-ready turnover: paint refresh, HVAC filter + coil clean, fridge replacement, and move-out inspection. Owner approval required before vendor dispatch. Fair-housing note: scope is unit condition only — no resident screening content.',
                'job_type' => 'make_ready',
                'priority' => 'high',
                'status' => 'intake',
                'site_address' => '418 Maple Ave, Oakridge Flats #2B, Austin TX',
                'preferred_date' => now()->addDays(5)->toDateString(),
                'estimated_hours' => 12,
                'outlet_count' => 0,
                'panel_amps' => null,
                'source' => 'web',
                'raw_intake' => ['channel' => 'owner_portal', 'property' => 'Oakridge Flats', 'unit' => '2B', 'fair_housing' => 'scope_only'],
            ]
        );

        $sr2 = ServiceRequest::query()->updateOrCreate(
            ['request_number' => 'SR-DEMO-002'],
            [
                'customer_id' => $customerModels[1]->id,
                'assigned_technician_id' => $tech->id,
                'intake_by' => $staff->id,
                'title' => 'Clubhouse plumbing fixture repairs',
                'description' => 'HOA clubhouse needs plumbing fixture repair kits and maintenance tech labor for restroom faucets and common-area leaks.',
                'job_type' => 'maintenance',
                'priority' => 'normal',
                'status' => 'intake',
                'site_address' => '90 Commerce Blvd, Round Rock TX',
                'preferred_date' => now()->addDays(8)->toDateString(),
                'estimated_hours' => 6,
                'outlet_count' => 0,
                'source' => 'phone',
            ]
        );

        ServiceRequest::query()->updateOrCreate(
            ['request_number' => 'SR-DEMO-003'],
            [
                'customer_id' => $customerModels[2]->id,
                'intake_by' => $staff->id,
                'title' => 'Resident HVAC intermittent issue',
                'description' => 'Maintenance request: troubleshoot living room HVAC that underperforms under load. Vendor diagnostic visit. Tenant privacy: contact via consented channels only.',
                'job_type' => 'troubleshooting',
                'priority' => 'normal',
                'status' => 'intake',
                'site_address' => '12 Cedar Trail Unit 4A, Cedar Park TX',
                'preferred_date' => now()->addDays(2)->toDateString(),
                'estimated_hours' => 2,
                'source' => 'phone',
            ]
        );

        $drafter = app(AiQuoteDrafter::class);
        $quote1 = $drafter->draftFromRequest($sr1->fresh(['customer']), $staff->id);
        $quote1->update(['status' => 'pending_approval']);
        AuditLog::record('quote.submitted_approval', \App\Models\Quote::class, $quote1->id, $staff->id);

        $quote2 = $drafter->draftFromRequest($sr2->fresh(['customer']), $staff->id);
        $quote2->approve($owner);

        JobTicket::query()->updateOrCreate(
            ['ticket_number' => 'WO-DEMO-001'],
            [
                'service_request_id' => $sr2->id,
                'quote_id' => $quote2->id,
                'technician_id' => $tech->id,
                'title' => 'Clubhouse plumbing fixtures — Cedar Peak HOA',
                'status' => 'scheduled',
                'scheduled_for' => now()->addDays(4),
                'notes' => 'Created from approved demo quote',
            ]
        );

        AttendanceRecord::query()->updateOrCreate(
            ['technician_id' => $tech->id, 'clock_in' => now()->startOfDay()->addHours(7)],
            ['clock_out' => now()->startOfDay()->addHours(16), 'source' => 'manual', 'notes' => 'Demo attendance']
        );

        foreach ([
            ['provider' => 'appfolio', 'label' => 'AppFolio', 'notes' => 'Sync properties, work orders, owner charges'],
            ['provider' => 'buildium', 'label' => 'Buildium', 'notes' => 'PMS resident / property sync'],
            ['provider' => 'email', 'label' => 'Email', 'notes' => 'Proposal delivery and approval notices'],
            ['provider' => 'accounting', 'label' => 'Accounting', 'notes' => 'Owner charge / GL handoff after acceptance'],
        ] as $integration) {
            IntegrationSetting::query()->updateOrCreate(
                ['provider' => $integration['provider']],
                ['label' => $integration['label'], 'is_enabled' => false, 'notes' => $integration['notes']]
            );
        }

        AuditLog::record('demo.seeded', null, null, $admin->id, ['app' => 'ResidentialProperQuoteCraft']);
    }
}
