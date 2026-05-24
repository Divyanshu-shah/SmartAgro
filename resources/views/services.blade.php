@extends('layouts.app')
@section('title', 'Services')
@section('meta_description', 'SmartAgro services - Comprehensive crop diagnostics, chemical residue profiling, agronomist consultations, capacity building workshops, and farm audit programs.')

@push('styles')
<style>
    @media (max-width: 768px) {
        /* Hero */
        .services-hero h1 { font-size: 2.2rem !important; }
        .services-hero p { font-size: 15px !important; }
        .services-hero { padding: 80px 0 60px !important; }

        /* Main Services - 2 col to stacked */
        .services-main-list > div {
            grid-template-columns: 1fr !important;
            gap: 0 !important;
        }
        .services-main-list > div > div:first-child {
            order: 1 !important;
            height: 240px !important;
            border-radius: 24px 24px 0 0 !important;
        }
        .services-main-list > div > div:last-child {
            order: 2 !important;
            padding: 24px !important;
        }
        .services-main-list h2 { font-size: 1.8rem !important; }

        /* Additional Services - 3 col to 1 col */
        .services-extra-grid {
            grid-template-columns: 1fr !important;
            gap: 20px !important;
        }

        /* CTA */
        .services-cta h2 { font-size: 1.8rem !important; }
        .services-cta p { font-size: 15px !important; }
    }

    @media (max-width: 640px) {
        .services-hero h1 { font-size: 1.8rem !important; }
        .services-hero { padding: 70px 0 50px !important; }
        section { padding: 48px 0 !important; }

        .services-main-list > div > div:first-child {
            height: 200px !important;
        }
        .services-main-list h2 { font-size: 1.5rem !important; }
        .services-main-list > div > div:last-child {
            padding: 20px !important;
        }
    }
</style>
@endpush

@section('content')
    <!-- Hero -->
    <section class="services-hero" style="position:relative;padding:100px 0 80px;overflow:hidden;">
        <img src="{{ asset('images/s1.avif') }}" alt="Agricultural fields" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;">
        <div style="position:absolute;inset:0;background:rgba(0,0,0,0.4);"></div>
        <div class="container" style="position:relative;z-index:1;text-align:center;">
            <span class="anim-slide-up" style="display:inline-block;font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:2px;color:var(--clr-mint);margin-bottom:16px;">Our Capabilities</span>
            <h1 class="anim-slide-up anim-d1" style="font-family:var(--font-heading);font-size:3rem;color:#fff;margin:0 0 16px;">End-to-End Crop Protection Services</h1>
            <p class="anim-slide-up anim-d2" style="font-size:17px;color:rgba(255,255,255,.7);max-width:560px;margin:0 auto;line-height:1.7;">From laboratory-grade chemical profiling to on-ground agronomist support, we deliver every layer of protection your farm demands.</p>
        </div>
    </section>

    <!-- Main Services -->
    <section style="padding:80px 0;background:var(--clr-sand);">
        <div class="container">
            <div class="services-main-list" style="display:flex;flex-direction:column;gap:80px;">
                @foreach([
                    ['img'=>'pesticide.jpg','icon'=>'fa-search','title'=>'Chemical Residue Profiling','desc'=>'Our multi-residue screening panels detect over 400 active compounds across fruits, grains, and vegetables with industry-leading sensitivity.','features'=>['Trace-level detection below 0.01 mg/kg','Full spectrum organophosphate and carbamate coverage','Simultaneous screening for herbicides, fungicides, and insecticides'],'link'=>route('identification'),'btn'=>'Start Profiling'],
                    ['img'=>'laboratory.jpg','icon'=>'fa-chart-line','title'=>'Regulatory Compliance Testing','desc'=>'Stay ahead of domestic and international food safety mandates with turnkey compliance verification.','features'=>['FSSAI and Codex Alimentarius MRL benchmarking','Export documentation for EU, US, and Gulf markets','Organic and GAP certification lab support'],'link'=>route('contact'),'btn'=>'Request Quote']
                ] as $i => $svc)
                <div class="reveal" style="display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center;animation-delay:{{ $i * 0.15 }}s;">
                    <div style="order:{{ $i % 2 == 0 ? 1 : 2 }};height:400px;border-radius:24px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,.08);">
                        <img src="{{ asset('images/' . $svc['img']) }}" alt="{{ $svc['title'] }}" style="width:100%;height:100%;object-fit:cover;transition:transform .5s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='none'">
                    </div>
                    <div style="order:{{ $i % 2 == 0 ? 2 : 1 }};padding:{{ $i % 2 == 0 ? '0 0 0 20px' : '0 20px 0 0' }};">
                        <div style="width:64px;height:64px;background:#eefde4;border-radius:16px;display:flex;align-items:center;justify-content:center;margin-bottom:24px;">
                            <i class="fas {{ $svc['icon'] }}" style="color:var(--clr-emerald);font-size:24px;"></i>
                        </div>
                        <h2 style="font-family:var(--font-heading);font-size:2.4rem;color:var(--clr-forest);margin:0 0 16px;">{{ $svc['title'] }}</h2>
                        <p style="font-size:16px;color:var(--clr-muted);line-height:1.7;margin:0 0 32px;">{{ $svc['desc'] }}</p>
                        <ul style="list-style:none;display:flex;flex-direction:column;gap:16px;margin:0 0 40px;padding:0;">
                            @foreach($svc['features'] as $f)
                            <li style="display:flex;align-items:center;gap:12px;font-size:15px;color:var(--clr-text);"><div style="width:24px;height:24px;border-radius:50%;background:var(--clr-emerald);display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas fa-check" style="font-size:10px;color:#fff;"></i></div>{{ $f }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ $svc['link'] }}" style="display:inline-flex;align-items:center;gap:8px;padding:16px 32px;background:var(--clr-forest);color:#fff;border-radius:50px;font-size:15px;font-weight:600;text-decoration:none;transition:all .3s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 10px 20px rgba(24,52,9,.2)'" onmouseout="this.style.transform='none';this.style.boxShadow='none'">{{ $svc['btn'] }} <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Additional Services -->
    <section style="padding:80px 0;background:#fff;">
        <div class="container">
            <div class="reveal" style="text-align:center;margin-bottom:56px;">
                <span style="font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:2px;color:var(--clr-emerald);margin-bottom:12px;display:block;">Extended Support</span>
                <h2 style="font-family:var(--font-heading);font-size:2.3rem;color:var(--clr-forest);margin:0;">Specialized Farm Programs</h2>
            </div>
            <div class="services-extra-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;">
                @foreach([
                    ['img'=>'s2.avif','icon'=>'fa-lightbulb','color'=>'#f59e0b','bg'=>'#fffbeb','title'=>'Agronomist On-Call','desc'=>'One-on-one advisory sessions with certified agronomists covering IPM strategies and seasonal spray calendars.'],
                    ['img'=>'s3.avif','icon'=>'fa-graduation-cap','color'=>'#7c3aed','bg'=>'#f5f3ff','title'=>'Farmer Skill Workshops','desc'=>'Hands-on field training covering safe handling, calibration of sprayers, and biological control techniques.'],
                    ['img'=>'s4.avif','icon'=>'fa-clipboard-check','color'=>'#0891b2','bg'=>'#ecfeff','title'=>'Farm Compliance Audits','desc'=>'Third-party evaluation of your chemical management systems to meet GAP and organic standards.']
                ] as $i => $svc)
                <div class="reveal" style="background:var(--clr-sand);border-radius:20px;overflow:hidden;border:1px solid rgba(0,0,0,.04);transition:all .4s;animation-delay:{{ $i * 0.1 }}s;" onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 16px 40px rgba(0,0,0,.08)'" onmouseout="this.style.transform='none';this.style.boxShadow='none'">
                    <div style="height:180px;overflow:hidden;">
                        <img src="{{ asset('images/' . $svc['img']) }}" alt="{{ $svc['title'] }}" style="width:100%;height:100%;object-fit:cover;transition:transform .6s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='none'">
                    </div>
                    <div style="padding:28px;">
                        <div style="width:44px;height:44px;background:{{ $svc['bg'] }};border-radius:12px;display:flex;align-items:center;justify-content:center;margin-bottom:16px;"><i class="fas {{ $svc['icon'] }}" style="color:{{ $svc['color'] }};font-size:18px;"></i></div>
                        <h3 style="font-family:var(--font-heading);font-size:1.2rem;color:var(--clr-forest);margin:0 0 10px;">{{ $svc['title'] }}</h3>
                        <p style="font-size:14px;color:var(--clr-muted);line-height:1.7;margin:0;">{{ $svc['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="services-cta" style="padding:80px 0;background:var(--clr-forest);position:relative;overflow:hidden;">
        <div style="position:absolute;top:-50px;right:-50px;width:250px;height:250px;background:rgba(93,214,44,.08);border-radius:50%;"></div>
        <div class="container reveal" style="text-align:center;position:relative;z-index:1;">
            <h2 style="font-family:var(--font-heading);font-size:2.3rem;color:#fff;margin:0 0 16px;">Looking for a Custom Analysis Package?</h2>
            <p style="font-size:17px;color:rgba(255,255,255,.65);max-width:520px;margin:0 auto 32px;line-height:1.7;">Tell us about your crop portfolio and volume, and we'll design a testing plan tailored to your farm's unique requirements.</p>
            <a href="{{ route('contact') }}" style="display:inline-flex;align-items:center;gap:8px;padding:16px 36px;background:#fff;color:var(--clr-forest);border-radius:12px;font-size:15px;font-weight:600;text-decoration:none;transition:all .3s;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 30px rgba(0,0,0,.25)'" onmouseout="this.style.transform='none';this.style.boxShadow='none'"><i class="fas fa-paper-plane" style="font-size:14px;"></i> Reach Our Team</a>
        </div>
    </section>
@endsection
