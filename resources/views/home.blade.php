@extends('layouts.app')

@section('title', 'Home')
@section('meta_description', 'SmartAgro - Intelligent crop monitoring and pesticide analysis platform. Safeguard your fields with data-driven insights and sustainable farming practices.')

@section('content')
    <!-- Hero Section -->
    <section id="hero-section" style="position:relative;min-height:92vh;display:flex;align-items:center;overflow:hidden;">
        <div style="position:absolute;inset:0;z-index:0;">
            <!-- Poster image shows instantly while video loads -->
            <img id="hero-poster" src="{{ asset('images/hero-poster.png') }}" alt="" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;z-index:1;transition:opacity 1s ease;">
            <!-- Video loads lazily in background -->
            <video id="hero-video" muted loop playsinline preload="none" style="width:100%;height:100%;object-fit:cover;opacity:0;transition:opacity 1s ease;" poster="{{ asset('images/hero-poster.png') }}">
                <source data-src="{{ asset('images/vid.mp4') }}" type="video/mp4">
            </video>
            <div style="position:absolute;inset:0;background:rgba(0,0,0,0.4);z-index:2;"></div>
        </div>
        <div class="container" style="position:relative;z-index:1;display:flex;flex-direction:column;justify-content:center;align-items:center;text-align:center;padding-top:80px;padding-bottom:80px;">
            <div style="max-width:800px;">
                <div class="anim-slide-up" style="display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,.1);backdrop-filter:blur(10px);padding:10px 24px;border-radius:50px;margin-bottom:32px;border:1px solid rgba(255,255,255,.15);">
                    <div style="width:10px;height:10px;background:#5dd62c;border-radius:50%;box-shadow:0 0 10px #5dd62c;"></div>
                    <span style="font-size:14px;color:rgba(255,255,255,.9);font-weight:600;letter-spacing:1px;text-transform:uppercase;">Empowering 8,000+ Growers Nationwide</span>
                </div>
                <h1 class="anim-slide-up anim-d1" style="font-family:var(--font-heading);font-size:4.5rem;line-height:1.05;color:#fff;margin:0 0 32px;">
                    Smart Monitoring <br>for <span style="color:var(--clr-gold);font-style:italic;">Resilient Harvests</span>
                </h1>
                <p class="anim-slide-up anim-d2" style="font-size:19px;line-height:1.7;color:rgba(255,255,255,.8);margin:0 auto 48px;max-width:600px;">
                    Analyze soil health, track chemical exposure in real time, and unlock sustainable alternatives that keep your yield thriving season after season.
                </p>
                <div class="anim-slide-up anim-d3" style="display:flex;gap:20px;justify-content:center;flex-wrap:wrap;">
                    <a href="{{ route('identification') }}" style="display:inline-flex;align-items:center;gap:12px;padding:18px 40px;background:#fff;color:var(--clr-forest);border-radius:50px;font-size:16px;font-weight:700;text-decoration:none;transition:all .3s;box-shadow:0 10px 30px rgba(0,0,0,.2);" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 15px 40px rgba(0,0,0,.3)'" onmouseout="this.style.transform='none';this.style.boxShadow='0 10px 30px rgba(0,0,0,.2)'">
                        <i class="fas fa-search"></i> Analyze Your Crop
                    </a>
                    <a href="#resources" style="display:inline-flex;align-items:center;gap:12px;padding:18px 40px;border:2px solid rgba(255,255,255,.4);color:#fff;border-radius:50px;font-size:16px;font-weight:600;text-decoration:none;transition:all .3s;backdrop-filter:blur(5px);" onmouseover="this.style.background='rgba(255,255,255,.15)';this.style.borderColor='rgba(255,255,255,.6)'" onmouseout="this.style.background='transparent';this.style.borderColor='rgba(255,255,255,.4)'">
                        <i class="fas fa-play-circle"></i> Explore Platform
                    </a>
                </div>
            </div>
        </div>
        <div style="position:absolute;bottom:0;left:0;right:0;height:80px;background:linear-gradient(transparent,var(--clr-sand));z-index:1;"></div>
    </section>

    <!-- Crop Protection Cards -->
    <section style="padding:80px 0;background:var(--clr-sand);">
        <div class="container">
            <div class="reveal" style="text-align:center;margin-bottom:56px;">
                <span style="display:inline-block;font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:2px;color:var(--clr-emerald);margin-bottom:12px;">Field Intelligence</span>
                <h2 style="font-family:var(--font-heading);font-size:2.5rem;color:var(--clr-forest);margin:0;">Safeguarding India's Staple Crops</h2>
            </div>
            <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:40px;">
                @foreach([
                    ['img'=>'rice.jpeg','name'=>'Paddy Shield','desc'=>'Triazophos, Monocrotophos, Phorate','slug'=>'rice','link'=>'Residue Monitoring'],
                    ['img'=>'wheat.jpeg','name'=>'Wheat Guard','desc'=>'Chlorpyrifos, Pendimethalin, Sulfosulfuron','slug'=>'wheat','link'=>'Green Alternatives'],
                    ['img'=>'corn.jpeg','name'=>'Maize Defense','desc'=>'Fipronil, Thiamethoxam, Tembotrione','slug'=>'corn','link'=>'Exposure Reports'],
                    ['img'=>'vege.jpeg','name'=>'Horticulture Care','desc'=>'Profenofos, Triazophos, Hexaconazole','slug'=>'vege','link'=>'Bio-Control Options']
                ] as $i => $crop)
                <div class="reveal" style="animation-delay:{{ $i * 0.1 }}s;background:#fff;border-radius:24px;overflow:hidden;border:1px solid rgba(0,0,0,.04);transition:all .4s cubic-bezier(.4,0,.2,1);cursor:pointer;display:grid;grid-template-columns:1fr 1.2fr;" onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 20px 50px rgba(0,0,0,.1)'" onmouseout="this.style.transform='none';this.style.boxShadow='none'">
                    <div style="height:100%;overflow:hidden;position:relative;">
                        <img src="{{ asset('images/' . $crop['img']) }}" alt="{{ $crop['name'] }}" style="width:100%;height:100%;object-fit:cover;transition:transform .6s;" onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='none'">
                    </div>
                    <div style="padding:40px;">
                        <h3 style="font-family:var(--font-heading);font-size:1.6rem;color:var(--clr-forest);margin:0 0 12px;">{{ $crop['name'] }}</h3>
                        <p style="font-size:14px;color:var(--clr-muted);line-height:1.7;margin:0 0 24px;">Frequently detected chemicals: {{ $crop['desc'] }}. Our platform maps contamination patterns across growing regions.</p>
                        <a href="{{ route('crop.show', $crop['slug']) }}" style="font-size:14px;font-weight:700;color:var(--clr-emerald);text-decoration:none;display:inline-flex;align-items:center;gap:8px;padding:12px 24px;border-radius:50px;background:var(--clr-cream);transition:all .3s;" onmouseover="this.style.background='var(--clr-emerald)';this.style.color='#fff'" onmouseout="this.style.background='var(--clr-cream)';this.style.color='var(--clr-emerald)'">{{ $crop['link'] }} <i class="fas fa-arrow-right" style="font-size:12px;"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Technology Section -->
    <section id="services" style="padding:100px 0;background:#fff;">
        <div class="container">
            <div style="display:grid;grid-template-columns:1fr 1.1fr;gap:80px;align-items:center;">
                <div class="reveal">
                    <div style="position:relative;">
                        <img src="{{ asset('images/ai-technology.jpg') }}" alt="AI Technology" style="width:100%;border-radius:20px;box-shadow:var(--shadow-lg);">
                        <div style="position:absolute;bottom:-20px;right:-20px;width:120px;height:120px;background:var(--clr-cream);border-radius:16px;display:flex;align-items:center;justify-content:center;box-shadow:var(--shadow-md);">
                            <div style="text-align:center;"><p style="font-family:var(--font-heading);font-size:2.5rem;color:var(--clr-forest);margin:0;">99%</p><p style="font-size:13px;color:var(--clr-muted);margin:0;">Precision</p></div>
                        </div>
                    </div>
                </div>
                <div class="reveal">
                    <span style="font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:2px;color:var(--clr-emerald);margin-bottom:12px;display:block;">Innovation</span>
                    <h2 style="font-family:var(--font-heading);font-size:2.8rem;color:var(--clr-forest);margin:0 0 32px;line-height:1.2;">Next-Generation Crop Analysis Engine</h2>
                    <div style="display:flex;flex-direction:column;gap:24px;">
                        @foreach([
                            ['icon'=>'fa-microscope','color'=>'#4ab821','bg'=>'#eefde4','title'=>'Chromatographic Profiling','desc'=>'Multi-residue scanning through gas and liquid chromatography to pinpoint chemical traces at parts-per-billion sensitivity.'],
                            ['icon'=>'fa-robot','color'=>'#7c3aed','bg'=>'#f5f3ff','title'=>'Deep-Learning Classification','desc'=>'Neural networks trained on over 50,000 field samples to classify contaminants and predict degradation timelines.'],
                            ['icon'=>'fa-mobile-alt','color'=>'#0891b2','bg'=>'#ecfeff','title'=>'Field-Ready Dashboard','desc'=>'Access diagnostic results on any device with geo-tagged reports and automated compliance alerts.']
                        ] as $feat)
                        <div style="display:flex;gap:16px;padding:20px;border-radius:14px;border:1px solid rgba(0,0,0,.04);transition:all .4s cubic-bezier(.4,0,.2,1);" onmouseover="this.style.background='{{ $feat['bg'] }}';this.style.transform='translateX(6px)'" onmouseout="this.style.background='transparent';this.style.transform='none'">
                            <div style="width:56px;height:56px;background:{{ $feat['bg'] }};border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas {{ $feat['icon'] }}" style="color:{{ $feat['color'] }};font-size:22px;"></i></div>
                            <div><h3 style="font-family:var(--font-body);font-size:18px;font-weight:600;color:var(--clr-forest);margin:0 0 8px;">{{ $feat['title'] }}</h3><p style="font-size:15px;color:var(--clr-muted);line-height:1.6;margin:0;">{{ $feat['desc'] }}</p></div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Timeline -->
    <section style="padding:80px 0;background:var(--clr-sand);">
        <div class="container">
            <div class="reveal" style="text-align:center;margin-bottom:56px;">
                <span style="font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:2px;color:var(--clr-emerald);margin-bottom:12px;display:block;">Our Workflow</span>
                <h2 style="font-family:var(--font-heading);font-size:2.5rem;color:var(--clr-forest);margin:0;">From Field Sample to Actionable Insight</h2>
            </div>
            <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:40px;max-width:900px;margin:0 auto;position:relative;">
                @foreach([
                    ['icon'=>'fa-camera','title'=>'Capture & Upload','desc'=>'Photograph affected leaves or collect a soil sample and upload through our secure portal.'],
                    ['icon'=>'fa-flask','title'=>'Diagnostic Testing','desc'=>'Automated GC-MS and LC-MS/MS workflows screen for 400+ active ingredients simultaneously.'],
                    ['icon'=>'fa-file-alt','title'=>'Risk Assessment Report','desc'=>'Receive a color-coded risk matrix within 24 hours showing contaminant levels vs. permissible limits.'],
                    ['icon'=>'fa-lightbulb','title'=>'Remediation Roadmap','desc'=>'A personalized action plan with bio-pesticide alternatives and withdrawal period guidelines.']
                ] as $i => $step)
                <div class="reveal" style="display:flex;align-items:center;gap:24px;background:#fff;padding:32px;border-radius:24px;box-shadow:var(--shadow-sm);border:1px solid rgba(0,0,0,.03);animation-delay:{{ $i * 0.1 }}s;transition:all .3s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='var(--shadow-md)'" onmouseout="this.style.transform='none';this.style.boxShadow='var(--shadow-sm)'">
                    <div style="width:72px;height:72px;background:var(--clr-cream);border-radius:20px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fas {{ $step['icon'] }}" style="font-size:28px;color:var(--clr-emerald);"></i>
                    </div>
                    <div>
                        <span style="display:inline-block;padding:4px 10px;border-radius:8px;background:rgba(93,214,44,.1);color:var(--clr-leaf);font-size:12px;font-weight:700;margin-bottom:8px;">Step {{ $i + 1 }}</span>
                        <h3 style="font-family:var(--font-heading);font-size:1.3rem;color:var(--clr-forest);margin:0 0 8px;">{{ $step['title'] }}</h3>
                        <p style="font-size:14px;color:var(--clr-muted);line-height:1.6;margin:0;">{{ $step['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Safety Spotlight -->
    <section id="resources" style="padding:80px 0;background:#fff;">
        <div class="container">
            <div class="reveal" style="max-width:1000px;margin:0 auto;background:var(--clr-sand);border-radius:24px;overflow:hidden;border:1px solid rgba(0,0,0,.04);display:grid;grid-template-columns:1fr 1.2fr;">
                <div style="overflow:hidden;">
                    <img src="{{ asset('images/ind1.jpeg') }}" alt="Pesticide safety" style="width:100%;height:100%;object-fit:cover;">
                </div>
                <div style="padding:48px 40px;">
                    <span style="display:inline-block;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:1.5px;color:var(--clr-gold);background:rgba(221,161,94,.1);padding:4px 12px;border-radius:6px;margin-bottom:16px;">Advisory Notice</span>
                    <h3 style="font-family:var(--font-heading);font-size:1.8rem;color:var(--clr-forest);margin:0 0 16px;">Organophosphate Exposure Warning</h3>
                    <p style="font-size:14px;color:var(--clr-muted);line-height:1.7;margin:0 0 24px;">Emerging research highlights long-term neurological and endocrine risks from prolonged organophosphate contact. Several compounds have faced regulatory restrictions across the EU and Southeast Asia.</p>
                    <div style="display:flex;flex-direction:column;gap:14px;margin-bottom:24px;">
                        <div style="display:flex;align-items:start;gap:12px;"><div style="width:32px;height:32px;border-radius:8px;background:#fef3c7;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas fa-exclamation-triangle" style="color:#d97706;font-size:13px;"></i></div><p style="margin:0;font-size:13px;color:var(--clr-text);line-height:1.6;"><strong>Chronic Hazards:</strong> Associated with respiratory disorders and reduced soil microbial activity</p></div>
                        <div style="display:flex;align-items:start;gap:12px;"><div style="width:32px;height:32px;border-radius:8px;background:#eefde4;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas fa-seedling" style="color:var(--clr-emerald);font-size:13px;"></i></div><p style="margin:0;font-size:13px;color:var(--clr-text);line-height:1.6;"><strong>Recommended Substitutes:</strong> Beauveria bassiana, Trichoderma viride, or Azadirachtin-based formulations</p></div>
                    </div>
                    <a href="{{ asset('pdfs/Pesticides_safety_guide.pdf') }}" download style="display:inline-flex;align-items:center;gap:8px;padding:12px 24px;background:var(--clr-forest);color:#fff;border-radius:10px;font-size:14px;font-weight:600;text-decoration:none;transition:all .3s;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(24,52,9,.25)'" onmouseout="this.style.transform='none';this.style.boxShadow='none'"><i class="fas fa-download" style="font-size:13px;"></i> Get Safety Handbook</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section style="padding:80px 0;background:var(--clr-forest);position:relative;overflow:hidden;">
        <div style="position:absolute;top:-100px;right:-100px;width:400px;height:400px;background:rgba(93,214,44,.06);border-radius:50%;"></div>
        <div class="container" style="position:relative;z-index:1;">
            <div class="reveal" style="text-align:center;margin-bottom:56px;">
                <span style="font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:2px;color:var(--clr-mint);margin-bottom:12px;display:block;">Community Voices</span>
                <h2 style="font-family:var(--font-heading);font-size:2.5rem;color:#fff;margin:0;">Stories From the Field</h2>
            </div>
            <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;">
                @foreach([
                    ['img'=>'ind2.jpeg','name'=>'Vikram Patel','role'=>'Organic Grower, Gujarat','text'=>'SmartAgro\'s residue mapping revealed contamination drifting from a neighbouring field. We adjusted buffer zones and my organic certification stayed intact.','stars'=>5],
                    ['img'=>'ind3.webp','name'=>'Sunil Yadav','role'=>'Export Farmer, Maharashtra','text'=>'Clearing EU MRL thresholds used to take weeks of back-and-forth with labs. Now I get pre-export compliance reports in under two days.','stars'=>5],
                    ['img'=>'ind4.jpeg','name'=>'Deepak Sharma','role'=>'Horticulture Specialist, MP','text'=>'The bio-control recommendations replaced three synthetic sprays on my mango orchard. Fruit quality improved and input costs dropped by 40%.','stars'=>4]
                ] as $i => $t)
                <div class="reveal" style="background:rgba(255,255,255,.05);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,.08);border-radius:20px;padding:32px;transition:all .4s cubic-bezier(.4,0,.2,1);animation-delay:{{ $i * 0.1 }}s;" onmouseover="this.style.background='rgba(255,255,255,.1)';this.style.transform='translateY(-4px)'" onmouseout="this.style.background='rgba(255,255,255,.05)';this.style.transform='none'">
                    <div style="display:flex;gap:4px;margin-bottom:20px;">@for($s=0;$s<$t['stars'];$s++)<i class="fas fa-star" style="color:var(--clr-gold);font-size:14px;"></i>@endfor @if($t['stars']<5)<i class="fas fa-star-half-alt" style="color:var(--clr-gold);font-size:14px;"></i>@endif</div>
                    <p style="font-size:15px;color:rgba(255,255,255,.75);line-height:1.7;margin:0 0 24px;font-style:italic;">"{{ $t['text'] }}"</p>
                    <div style="display:flex;align-items:center;gap:14px;border-top:1px solid rgba(255,255,255,.08);padding-top:20px;">
                        <img src="{{ asset('images/' . $t['img']) }}" alt="{{ $t['name'] }}" style="width:44px;height:44px;border-radius:12px;object-fit:cover;">
                        <div><p style="font-size:14px;font-weight:600;color:#fff;margin:0;">{{ $t['name'] }}</p><p style="font-size:12px;color:rgba(255,255,255,.5);margin:2px 0 0;">{{ $t['role'] }}</p></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const video = document.getElementById('hero-video');
            const poster = document.getElementById('hero-poster');
            if (video && poster) {
                const source = video.querySelector('source');
                if (source && source.dataset.src) {
                    source.src = source.dataset.src;
                    video.load();
                    
                    // When video has loaded the first frame
                    video.addEventListener('loadeddata', () => {
                        video.play().then(() => {
                            // Smoothly transition from poster to video
                            video.style.opacity = '1';
                            setTimeout(() => {
                                poster.style.opacity = '0';
                            }, 1000);
                        }).catch(err => {
                            console.log("Autoplay prevented or failed:", err);
                        });
                    }, { once: true });
                }
            }
        });
    </script>
    @endpush
@endsection

