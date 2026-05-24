@extends('layouts.app')
@section('title', 'Resources')

@push('styles')
<style>
    @media (max-width: 768px) {
        /* Hero */
        .res-hero h1 { font-size: 2.2rem !important; }
        .res-hero p { font-size: 15px !important; }
        .res-hero { padding: 80px 0 60px !important; }

        /* Resource Directory - 3 col to 1 col */
        .res-dir-grid {
            grid-template-columns: 1fr !important;
            gap: 16px !important;
        }

        /* Downloadable Handbooks - 3 col to 1 col */
        .res-guides-grid {
            grid-template-columns: 1fr !important;
            gap: 20px !important;
        }

        /* Pest Atlas - 2 col to stacked */
        .res-pest-grid {
            grid-template-columns: 1fr !important;
            gap: 24px !important;
        }

        /* Damage Gallery */
        .res-damage-grid {
            grid-template-columns: 1fr 1fr !important;
        }

        /* Regulatory Framework - 3 col to stacked */
        .res-reg-grid {
            grid-template-columns: 1fr !important;
        }
        .res-reg-grid > div {
            border-right: none !important;
            border-bottom: 1px solid rgba(0,0,0,.06);
        }
        .res-reg-grid > div:last-child {
            border-bottom: none;
        }

        /* Newsletter form */
        .res-newsletter-form {
            flex-direction: column !important;
            gap: 10px !important;
        }
        .res-newsletter-form input {
            border-right: 1.5px solid rgba(255,255,255,.15) !important;
            border-radius: 12px !important;
        }
        .res-newsletter-form button {
            border-radius: 12px !important;
        }
    }

    @media (max-width: 640px) {
        .res-hero h1 { font-size: 1.8rem !important; }
        .res-hero { padding: 70px 0 50px !important; }
        section { padding: 48px 0 !important; }
        section h2 { font-size: 1.8rem !important; }

        .res-damage-grid {
            grid-template-columns: 1fr !important;
        }

        .res-reg-grid > div {
            padding: 24px !important;
        }
    }
</style>
@endpush

@section('content')
<section class="res-hero" style="position:relative;padding:100px 0 80px;overflow:hidden;">
    <img src="{{ asset('images/resources-hero.jpg') }}" alt="Agricultural landscape" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;">
    <div style="position:absolute;inset:0;background:rgba(0,0,0,0.4);"></div>
    <div class="container" style="position:relative;z-index:1;text-align:center;">
        <span class="anim-slide-up" style="display:inline-block;font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:2px;color:var(--clr-mint);margin-bottom:16px;">Learning Center</span>
        <h1 class="anim-slide-up anim-d1" style="font-family:var(--font-heading);font-size:3rem;color:#fff;margin:0 0 16px;">Farmer Knowledge Library</h1>
        <p class="anim-slide-up anim-d2" style="font-size:17px;color:rgba(255,255,255,.65);max-width:560px;margin:0 auto;line-height:1.7;">Explore curated materials on chemical safety protocols, integrated pest strategies, and eco-conscious farming techniques.</p>
    </div>
</section>

<section style="padding:80px 0;background:var(--clr-sand);">
    <div class="container">
        <div class="reveal" style="text-align:center;margin-bottom:48px;">
            <span style="display:inline-block;padding:6px 16px;background:#eefde4;color:var(--clr-leaf);border-radius:50px;font-size:13px;font-weight:600;margin-bottom:12px;">Explore by Topic</span>
            <h2 style="font-family:var(--font-heading);font-size:2.3rem;color:var(--clr-forest);margin:0;">Resource Directory</h2>
        </div>
        <div class="res-dir-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;">
            @foreach([
                ['href'=>'#guides','icon'=>'fa-book-open','color'=>'#4ab821','bg'=>'#eefde4','title'=>'Field Handbooks','desc'=>'Step-by-step manuals covering pesticide handling, storage best practices, and IPM implementation.'],
                ['href'=>'#pest-id','icon'=>'fa-bug','color'=>'#d97706','bg'=>'#fffbeb','title'=>'Insect & Disease Atlas','desc'=>'Visual reference libraries with high-resolution imagery to identify crop threats quickly.'],
                ['href'=>'#regulations','icon'=>'fa-balance-scale','color'=>'#7c3aed','bg'=>'#f5f3ff','title'=>'Policy & Standards','desc'=>'Up-to-date regulatory frameworks, permissible residue limits, and certification pathways.']
            ] as $i => $cat)
            <a href="{{ $cat['href'] }}" class="reveal" style="text-decoration:none;background:#fff;padding:36px 28px;border-radius:20px;border:1px solid rgba(0,0,0,.04);transition:all .4s;text-align:center;animation-delay:{{ $i * 0.1 }}s;" onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 16px 40px rgba(0,0,0,.08)';this.style.borderColor='var(--clr-mint)'" onmouseout="this.style.transform='none';this.style.boxShadow='none';this.style.borderColor='rgba(0,0,0,.04)'">
                <div style="width:64px;height:64px;background:{{ $cat['bg'] }};border-radius:16px;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;"><i class="fas {{ $cat['icon'] }}" style="color:{{ $cat['color'] }};font-size:24px;"></i></div>
                <h3 style="font-family:var(--font-heading);font-size:1.2rem;color:var(--clr-forest);margin:0 0 10px;">{{ $cat['title'] }}</h3>
                <p style="font-size:14px;color:var(--clr-muted);line-height:1.6;margin:0;">{{ $cat['desc'] }}</p>
            </a>
            @endforeach
        </div>
    </div>
</section>

<section id="guides" style="padding:80px 0;background:#fff;">
    <div class="container">
        <h2 class="reveal" style="font-family:var(--font-heading);font-size:2rem;color:var(--clr-forest);margin:0 0 40px;">Downloadable Field Handbooks</h2>
        <div class="res-guides-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;">
            @foreach([
                ['img'=>'s1.avif','title'=>'Holistic Pest Management Playbook','desc'=>'A farmer-friendly roadmap for reducing chemical dependency through biological controls.','pdf'=>'Pestmange.pdf'],
                ['img'=>'pesticide safety.jpeg','title'=>'Chemical Handling & Storage Manual','desc'=>'Critical protocols for safe transport, mixing, application, and disposal of agrochemicals.','pdf'=>'pesthandbook.pdf'],
                ['img'=>'r1.avif','title'=>'Non-Chemical Crop Defense Toolkit','desc'=>'Practical techniques including companion planting, pheromone traps, and microbial sprays.','pdf'=>'pestcontrol.pdf']
            ] as $i => $guide)
            <div class="reveal" style="background:var(--clr-sand);border-radius:20px;overflow:hidden;border:1px solid rgba(0,0,0,.04);transition:all .4s;animation-delay:{{ $i * 0.1 }}s;" onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 16px 40px rgba(0,0,0,.08)'" onmouseout="this.style.transform='none';this.style.boxShadow='none'">
                <div style="height:180px;overflow:hidden;"><img src="{{ asset('images/' . $guide['img']) }}" alt="{{ $guide['title'] }}" style="width:100%;height:100%;object-fit:cover;transition:transform .6s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='none'"></div>
                <div style="padding:24px;">
                    <h3 style="font-family:var(--font-heading);font-size:1.1rem;color:var(--clr-forest);margin:0 0 8px;">{{ $guide['title'] }}</h3>
                    <p style="font-size:13px;color:var(--clr-muted);line-height:1.6;margin:0 0 16px;">{{ $guide['desc'] }}</p>
                    <div style="display:flex;justify-content:space-between;align-items:center;">
                        <span style="font-size:12px;color:var(--clr-muted);background:#f3f4f6;padding:4px 10px;border-radius:6px;">PDF</span>
                        <a href="{{ asset('pdfs/' . $guide['pdf']) }}" download style="font-size:13px;font-weight:600;color:var(--clr-emerald);text-decoration:none;display:flex;align-items:center;gap:6px;transition:gap .3s;" onmouseover="this.style.gap='10px'" onmouseout="this.style.gap='6px'">Download <i class="fas fa-download" style="font-size:12px;"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="pest-id" style="padding:80px 0;background:var(--clr-sand);">
    <div class="container">
        <h2 class="reveal" style="font-family:var(--font-heading);font-size:2rem;color:var(--clr-forest);margin:0 0 40px;">Insect & Disease Atlas</h2>
        <div class="res-pest-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:32px;">
            <div class="reveal" style="background:#fff;padding:36px;border-radius:20px;border:1px solid rgba(0,0,0,.04);">
                <h3 style="font-family:var(--font-heading);font-size:1.3rem;color:var(--clr-forest);margin:0 0 8px;">Major Crop Threats by Category</h3>
                <p style="font-size:14px;color:var(--clr-muted);margin:0 0 24px;">Navigate our visual atlas to match symptoms with known pest species.</p>
                <div style="display:flex;flex-direction:column;gap:12px;">
                    @foreach([['icon'=>'fa-leaf','color'=>'#4ab821','bg'=>'#eefde4','title'=>'Cereal Crop Invaders','desc'=>'Stem borers, armyworms, and rust fungi in wheat and paddy'],['icon'=>'fa-apple-alt','color'=>'#dc2626','bg'=>'#fef2f2','title'=>'Orchard & Vine Pests','desc'=>'Fruit flies, codling moths, and powdery mildew in tree crops'],['icon'=>'fa-carrot','color'=>'#f59e0b','bg'=>'#fffbeb','title'=>'Kitchen-Garden Threats','desc'=>'Whiteflies, thrips, and leaf miners attacking vegetable plots']] as $pest)
                    <div style="display:flex;gap:14px;padding:14px;border-radius:12px;transition:background .3s;cursor:pointer;" onmouseover="this.style.background='{{ $pest['bg'] }}'" onmouseout="this.style.background='transparent'">
                        <div style="width:40px;height:40px;background:{{ $pest['bg'] }};border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas {{ $pest['icon'] }}" style="color:{{ $pest['color'] }};font-size:16px;"></i></div>
                        <div><h4 style="font-size:15px;font-weight:600;color:var(--clr-forest);margin:0 0 4px;">{{ $pest['title'] }}</h4><p style="font-size:13px;color:var(--clr-muted);margin:0;">{{ $pest['desc'] }}</p></div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="reveal" style="background:#fff;padding:36px;border-radius:20px;border:1px solid rgba(0,0,0,.04);">
                <h3 style="font-family:var(--font-heading);font-size:1.3rem;color:var(--clr-forest);margin:0 0 8px;">Damage Recognition Gallery</h3>
                <p style="font-size:14px;color:var(--clr-muted);margin:0 0 24px;">Train your eye to spot early infestation signals before yield loss occurs.</p>
                <div class="res-damage-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                    @foreach([['img'=>'r2.jpeg','title'=>'Stem Borer Tunneling','url'=>'https://ipm.ucanr.edu/agriculture/corn/corn-earworm/'],['img'=>'r3.jpg','title'=>'Sap-Sucking Colonies','url'=>'https://ipm.ucanr.edu/PMG/PESTNOTES/pn7404.html'],['img'=>'r4.jpeg','title'=>'Defoliation Patterns','url'=>'https://vegento.russell.wisc.edu/pests/colorado-potato-beetle/'],['img'=>'r5.jpg','title'=>'Webbing & Stippling','url'=>'https://ipm.ucanr.edu/QT/spidermitescard.html']] as $pest)
                    <a href="{{ $pest['url'] }}" style="text-decoration:none;background:var(--clr-sand);border-radius:14px;overflow:hidden;transition:all .3s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 20px rgba(0,0,0,.08)'" onmouseout="this.style.transform='none';this.style.boxShadow='none'">
                        <div style="height:100px;overflow:hidden;"><img src="{{ asset('images/' . $pest['img']) }}" alt="{{ $pest['title'] }}" style="width:100%;height:100%;object-fit:cover;transition:transform .4s;" onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='none'"></div>
                        <p style="padding:10px 12px;margin:0;font-size:13px;font-weight:500;color:var(--clr-forest);">{{ $pest['title'] }}</p>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section id="regulations" style="padding:80px 0;background:#fff;">
    <div class="container">
        <h2 class="reveal" style="font-family:var(--font-heading);font-size:2rem;color:var(--clr-forest);margin:0 0 40px;">Indian Regulatory Framework</h2>
        <div class="reveal" style="background:var(--clr-sand);border-radius:20px;overflow:hidden;border:1px solid rgba(0,0,0,.04);">
            <div class="res-reg-grid" style="display:grid;grid-template-columns:repeat(3,1fr);">
                @foreach([
                    ['icon'=>'fa-flag','color'=>'#4ab821','title'=>'Central Legislation','items'=>['Insecticides Act, 1968 & Draft Pesticide Management Bill','FSSAI Maximum Residue Limit notifications','BIS standards for pesticide formulations']],
                    ['icon'=>'fa-globe-asia','color'=>'#7c3aed','title'=>'State-Level Directives','items'=>['Kerala & Punjab selective compound bans','KVK extension advisories on safe usage','State organic mission incentive programs']],
                    ['icon'=>'fa-calendar-alt','color'=>'#0891b2','title'=>'Recent Policy Updates','items'=>['2024 restricted-use pesticide list revisions','Revised MRL harmonization with Codex standards','PM-PRANAM scheme for balanced chemical use']]
                ] as $i => $reg)
                <div style="padding:36px;{{ $i < 2 ? 'border-right:1px solid rgba(0,0,0,.06);' : '' }}">
                    <div style="display:flex;align-items:center;gap:10px;margin-bottom:20px;">
                        <i class="fas {{ $reg['icon'] }}" style="color:{{ $reg['color'] }};font-size:18px;"></i>
                        <h3 style="font-family:var(--font-heading);font-size:1.1rem;color:var(--clr-forest);margin:0;">{{ $reg['title'] }}</h3>
                    </div>
                    <ul style="list-style:none;display:flex;flex-direction:column;gap:12px;">
                        @foreach($reg['items'] as $item)
                        <li style="display:flex;align-items:center;gap:10px;font-size:14px;color:var(--clr-muted);"><i class="fas fa-file-alt" style="color:var(--clr-mint);font-size:12px;"></i>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section style="padding:80px 0;background:var(--clr-forest);position:relative;overflow:hidden;">
    <div style="position:absolute;top:-50px;right:-50px;width:250px;height:250px;background:rgba(93,214,44,.06);border-radius:50%;"></div>
    <div class="container reveal" style="text-align:center;position:relative;z-index:1;">
        <h2 style="font-family:var(--font-heading);font-size:2.3rem;color:#fff;margin:0 0 12px;">Never Miss an Update</h2>
        <p style="font-size:17px;color:rgba(255,255,255,.6);max-width:480px;margin:0 auto 32px;">Join our mailing list for seasonal crop advisories, regulatory changes, and new research publications.</p>
        <form class="res-newsletter-form" action="{{ route('newsletter.store') }}" method="POST" style="display:flex;gap:0;max-width:440px;margin:0 auto;">
            @csrf
            <input type="email" name="email" placeholder="Enter your email" required style="flex:1;padding:14px 20px;border:1.5px solid rgba(255,255,255,.15);border-right:none;border-radius:12px 0 0 12px;background:rgba(255,255,255,.06);color:#fff;font-size:15px;outline:none;font-family:var(--font-body);" onfocus="this.style.borderColor='var(--clr-mint)'" onblur="this.style.borderColor='rgba(255,255,255,.15)'">
            <button type="submit" style="padding:14px 28px;background:var(--clr-emerald);color:#fff;border:none;border-radius:0 12px 12px 0;font-size:15px;font-weight:600;cursor:pointer;transition:background .3s;font-family:var(--font-body);" onmouseover="this.style.background='var(--clr-leaf)'" onmouseout="this.style.background='var(--clr-emerald)'">Subscribe</button>
        </form>
    </div>
</section>
@endsection
