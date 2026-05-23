@extends('layouts.app')
@section('title', 'Contact Us')

@push('styles')
<style>
    .contact-cards-grid { display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-bottom:48px; }
    .contact-main-grid { display:grid;grid-template-columns:1.2fr 1fr;gap:36px;align-items:start; }
    @media(max-width:900px) {
        .contact-cards-grid { grid-template-columns:1fr; }
        .contact-main-grid { grid-template-columns:1fr; }
    }
    @media(min-width:601px) and (max-width:900px) {
        .contact-cards-grid { grid-template-columns:repeat(2,1fr); }
    }
</style>
@endpush

@section('content')
<section style="position:relative;padding:100px 0 80px;overflow:hidden;">
    <img src="{{ asset('images/contact-hero.jpg') }}" alt="Agricultural farmland" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;">
    <div style="position:absolute;inset:0;background:rgba(0,0,0,0.4);"></div>
    <div class="container" style="position:relative;z-index:1;text-align:center;">
        <div class="anim-slide-up" style="display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,.1);backdrop-filter:blur(10px);padding:8px 18px;border-radius:50px;margin-bottom:20px;border:1px solid rgba(255,255,255,.12);">
            <i class="fas fa-headset" style="color:var(--clr-mint);font-size:14px;"></i>
            <span style="font-size:13px;color:rgba(255,255,255,.8);font-weight:500;">Dedicated support team</span>
        </div>
        <h1 class="anim-slide-up anim-d1" style="font-family:var(--font-heading);font-size:3rem;color:#fff;margin:0 0 16px;">Speak With Our <span style="color:var(--clr-gold);">Specialists</span></h1>
        <p class="anim-slide-up anim-d2" style="font-size:17px;color:rgba(255,255,255,.65);max-width:560px;margin:0 auto 28px;line-height:1.7;">Whether you need guidance on residue testing or want to discuss a custom farm audit, our agricultural experts are just a message away.</p>
        <div class="anim-slide-up anim-d3" style="display:flex;justify-content:center;gap:28px;flex-wrap:wrap;">
            @foreach(['Same-Day Reply','Certified Agronomists','No-Cost Initial Consult'] as $badge)
            <div style="display:flex;align-items:center;gap:6px;"><i class="fas fa-check-circle" style="color:#5dd62c;font-size:14px;"></i><span style="font-size:13px;color:rgba(255,255,255,.7);">{{ $badge }}</span></div>
            @endforeach
        </div>
    </div>
</section>

<section style="padding:60px 0;background:var(--clr-sand);">
    <div style="max-width:1100px;margin:0 auto;padding:0 24px;">
        <div class="reveal contact-cards-grid">
            @foreach([
                ['icon'=>'fa-map-marker-alt','color'=>'#4ab821','bg'=>'#eefde4','title'=>'Head Office','line1'=>'xxx, xxx','line2'=>'Punjab, India'],
                ['icon'=>'fa-phone-alt','color'=>'#2563eb','bg'=>'#eff6ff','title'=>'Helpline','line1'=>'<a href="tel:+917878787878" style="color:#2563eb;text-decoration:none;">+91 7878787878</a>','line2'=>'Mon-Fri: 8AM – 6PM IST'],
                ['icon'=>'fa-envelope','color'=>'#d97706','bg'=>'#fffbeb','title'=>'Email','line1'=>'<a href="mailto:shahdivyanshu5009@gmail.com" style="color:#d97706;text-decoration:none;">shahdivyanshu5009@gmail.com</a>','line2'=>'All enquiries welcome']
            ] as $card)
            <div style="background:#fff;border-radius:16px;padding:24px;border:1px solid rgba(0,0,0,.04);transition:all .35s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 32px rgba(0,0,0,.08)'" onmouseout="this.style.transform='none';this.style.boxShadow='none'">
                <div style="display:flex;align-items:flex-start;gap:16px;">
                    <div style="width:48px;height:48px;background:{{ $card['bg'] }};border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas {{ $card['icon'] }}" style="color:{{ $card['color'] }};font-size:18px;"></i></div>
                    <div>
                        <h3 style="margin:0 0 6px;font-size:16px;font-weight:700;color:var(--clr-forest);">{{ $card['title'] }}</h3>
                        <p style="margin:0;font-size:14px;color:var(--clr-muted);line-height:1.6;">{!! $card['line1'] !!}<br>{{ $card['line2'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="contact-main-grid">
            <div class="reveal" style="background:#fff;border-radius:20px;overflow:hidden;border:1px solid rgba(0,0,0,.04);box-shadow:var(--shadow-sm);">
                <div style="background:linear-gradient(135deg,var(--clr-forest),var(--clr-emerald));padding:28px 32px;">
                    <h2 style="font-family:var(--font-heading);font-size:1.4rem;color:#fff;margin:0 0 4px;">Drop Us a Line</h2>
                    <p style="margin:0;font-size:14px;color:rgba(255,255,255,.6);">Complete the form and a team member will respond within one business day.</p>
                </div>
                <div style="padding:28px 32px;">
                    @if(session('success'))
                    <div style="padding:14px 18px;background:#eefde4;border:1px solid #93e86e;border-radius:12px;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
                        <i class="fas fa-check-circle" style="color:var(--clr-emerald);"></i><span style="font-size:14px;color:var(--clr-forest);font-weight:500;">{{ session('success') }}</span>
                    </div>
                    @endif
                    @if($errors->any())
                    <div style="padding:14px 18px;background:#fef2f2;border:1px solid #fca5a5;border-radius:12px;margin-bottom:20px;">
                        <ul style="margin:0;padding-left:18px;font-size:14px;color:#991b1b;">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div style="margin-bottom:18px;">
                            <label for="name" style="display:block;font-size:13px;font-weight:600;color:var(--clr-text);margin-bottom:6px;">Full Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Your full name" style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;background:#fafafa;outline:none;transition:all .3s;box-sizing:border-box;font-family:var(--font-body);" onfocus="this.style.borderColor='var(--clr-emerald)';this.style.background='#fff';this.style.boxShadow='0 0 0 4px rgba(45,106,79,.08)'" onblur="this.style.borderColor='#e5e7eb';this.style.background='#fafafa';this.style.boxShadow='none'">
                        </div>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:18px;">
                            <div>
                                <label for="email" style="display:block;font-size:13px;font-weight:600;color:var(--clr-text);margin-bottom:6px;">Email *</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="you@example.com" style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;background:#fafafa;outline:none;transition:all .3s;box-sizing:border-box;font-family:var(--font-body);" onfocus="this.style.borderColor='var(--clr-emerald)';this.style.background='#fff';this.style.boxShadow='0 0 0 4px rgba(45,106,79,.08)'" onblur="this.style.borderColor='#e5e7eb';this.style.background='#fafafa';this.style.boxShadow='none'">
                            </div>
                            <div>
                                <label for="phone" style="display:block;font-size:13px;font-weight:600;color:var(--clr-text);margin-bottom:6px;">Phone</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+91 00000 00000" style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;background:#fafafa;outline:none;transition:all .3s;box-sizing:border-box;font-family:var(--font-body);" onfocus="this.style.borderColor='var(--clr-emerald)';this.style.background='#fff'" onblur="this.style.borderColor='#e5e7eb';this.style.background='#fafafa'">
                            </div>
                        </div>
                        <div style="margin-bottom:18px;">
                            <label for="subject" style="display:block;font-size:13px;font-weight:600;color:var(--clr-text);margin-bottom:6px;">Topic *</label>
                            <select id="subject" name="subject" required style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;background:#fafafa;outline:none;transition:all .3s;box-sizing:border-box;font-family:var(--font-body);appearance:auto;" onfocus="this.style.borderColor='var(--clr-emerald)'" onblur="this.style.borderColor='#e5e7eb'">
                                <option value="">Pick a topic</option>
                                <option value="general" {{ old('subject')=='general'?'selected':'' }}>General Enquiry</option>
                                <option value="service" {{ old('subject')=='service'?'selected':'' }}>Service Details</option>
                                <option value="technical" {{ old('subject')=='technical'?'selected':'' }}>Lab & Technical Help</option>
                                <option value="billing" {{ old('subject')=='billing'?'selected':'' }}>Pricing & Invoices</option>
                                <option value="other" {{ old('subject')=='other'?'selected':'' }}>Something Else</option>
                            </select>
                        </div>
                        <div style="margin-bottom:18px;">
                            <label for="message" style="display:block;font-size:13px;font-weight:600;color:var(--clr-text);margin-bottom:6px;">Your Message *</label>
                            <textarea id="message" name="message" rows="5" required placeholder="Describe what you need help with..." style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;background:#fafafa;outline:none;transition:all .3s;box-sizing:border-box;font-family:var(--font-body);resize:vertical;" onfocus="this.style.borderColor='var(--clr-emerald)';this.style.background='#fff'" onblur="this.style.borderColor='#e5e7eb';this.style.background='#fafafa'">{{ old('message') }}</textarea>
                        </div>
                        <div style="display:flex;align-items:center;gap:8px;margin-bottom:22px;">
                            <input type="checkbox" id="consent" required style="width:18px;height:18px;accent-color:var(--clr-emerald);cursor:pointer;">
                            <label for="consent" style="font-size:14px;color:var(--clr-muted);cursor:pointer;">I accept the <a href="#" style="color:var(--clr-emerald);text-decoration:underline;">Privacy Policy</a></label>
                        </div>
                        <button type="submit" style="width:100%;padding:14px;background:linear-gradient(135deg,var(--clr-forest),var(--clr-leaf));color:#fff;font-size:15px;font-weight:700;border:none;border-radius:12px;cursor:pointer;transition:all .35s;font-family:var(--font-body);" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 24px rgba(74,184,33,.3)'" onmouseout="this.style.transform='none';this.style.boxShadow='none'">
                            <i class="fas fa-paper-plane" style="margin-right:8px;"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>

            <div class="reveal" style="animation-delay:.15s;">
                <div style="margin-bottom:28px;">
                    <h3 style="font-size:16px;font-weight:700;color:var(--clr-forest);margin:0 0 16px;display:flex;align-items:center;gap:8px;"><i class="fas fa-building" style="color:var(--clr-emerald);font-size:14px;"></i> Branch Offices</h3>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
                        @foreach([['name'=>'North Zone Lab','loc'=>'XXXXXXXX','phone'=>'+91 7878787878'],['name'=>'International Desk','loc'=>'XXXXX, XXXXX','phone'=>'+971 555 1234']] as $office)
                        <div style="background:#fff;border:1px solid rgba(0,0,0,.04);border-radius:14px;padding:18px;transition:all .3s;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(0,0,0,.06)'" onmouseout="this.style.transform='none';this.style.boxShadow='none'">
                            <h4 style="margin:0 0 6px;font-size:14px;font-weight:600;color:var(--clr-forest);">{{ $office['name'] }}</h4>
                            <p style="margin:0;font-size:13px;color:var(--clr-muted);line-height:1.6;">{{ $office['loc'] }}<br>{{ $office['phone'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div style="margin-bottom:28px;">
                    <h3 style="font-size:16px;font-weight:700;color:var(--clr-forest);margin:0 0 16px;display:flex;align-items:center;gap:8px;"><i class="fas fa-map" style="color:var(--clr-emerald);font-size:14px;"></i> Locate Us</h3>
                    <div style="border-radius:16px;overflow:hidden;border:1px solid rgba(0,0,0,.04);height:200px;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.0!2d80.99!3d26.85!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjbCsDUxJzAwLjAiTiA4MMKwNTknMjQuMCJF!5e0!3m2!1sen!2sin!4v1" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div style="background:#fff;border-radius:16px;border:1px solid rgba(0,0,0,.04);padding:22px;">
                    <h3 style="font-size:16px;font-weight:700;color:var(--clr-forest);margin:0 0 16px;display:flex;align-items:center;gap:8px;"><i class="fas fa-clock" style="color:var(--clr-emerald);font-size:14px;"></i> Working Hours</h3>
                    @foreach([['day'=>'Monday – Friday','time'=>'8:00 AM – 6:00 PM','color'=>'var(--clr-emerald)'],['day'=>'Saturday','time'=>'9:00 AM – 1:00 PM','color'=>'#d97706'],['day'=>'Sunday','time'=>'Closed','color'=>'#dc2626']] as $i => $hr)
                    <div style="display:flex;justify-content:space-between;padding:10px 0;{{ $i < 2 ? 'border-bottom:1px solid #f3f4f6;' : '' }}">
                        <span style="font-size:14px;color:var(--clr-text);">{{ $hr['day'] }}</span>
                        <span style="font-size:14px;font-weight:600;color:{{ $hr['color'] }};">{{ $hr['time'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section style="padding:60px 0;background:#fff;">
    <div style="max-width:800px;margin:0 auto;padding:0 24px;">
        <div class="reveal" style="text-align:center;margin-bottom:40px;">
            <span style="display:inline-block;padding:6px 16px;background:#eefde4;color:var(--clr-leaf);border-radius:50px;font-size:13px;font-weight:600;margin-bottom:12px;"><i class="fas fa-question-circle" style="margin-right:4px;"></i> FAQ</span>
            <h2 style="font-family:var(--font-heading);font-size:2rem;color:var(--clr-forest);margin:0 0 8px;">Frequently Asked Questions</h2>
            <p style="font-size:14px;color:var(--clr-muted);margin:0;">Answers to the queries we hear most often.</p>
        </div>
        <div style="display:flex;flex-direction:column;gap:12px;">
            @foreach([
                ['q'=>'How soon will I hear back after submitting a form?','a'=>'Our team aims to respond within one working day. For time-sensitive issues, call our helpline for immediate assistance.'],
                ['q'=>'What details help you diagnose my crop issue faster?','a'=>'Include the crop variety, growth stage, recent spray history, and clear photographs of affected plant parts.'],
                ['q'=>'Can your team visit my farm for an on-site assessment?','a'=>'Absolutely. We conduct field visits across northern and central India. Get in touch to schedule a convenient date.'],
                ['q'=>'Are lab services available outside regular hours?','a'=>'Standard turnaround is within business hours. However, our laboratory can process emergency samples around the clock upon request.']
            ] as $i => $faq)
            <div class="reveal" style="background:var(--clr-sand);border-radius:14px;border:1px solid rgba(0,0,0,.04);overflow:hidden;transition:all .3s;animation-delay:{{ 0.05 * $i }}s;" onmouseover="this.style.borderColor='var(--clr-mint)'" onmouseout="this.style.borderColor='rgba(0,0,0,.04)'">
                <button onclick="const c=document.getElementById('faq-c-{{$i}}');const ic=document.getElementById('faq-i-{{$i}}');c.style.maxHeight=c.style.maxHeight==='0px'||!c.style.maxHeight?c.scrollHeight+'px':'0px';c.style.paddingBottom=c.style.maxHeight!=='0px'?'18px':'0';ic.style.transform=c.style.maxHeight!=='0px'?'rotate(180deg)':'none'" style="width:100%;padding:18px 24px;display:flex;justify-content:space-between;align-items:center;background:none;border:none;cursor:pointer;text-align:left;">
                    <h3 style="margin:0;font-size:15px;font-weight:600;color:var(--clr-forest);font-family:var(--font-body);">{{ $faq['q'] }}</h3>
                    <i class="fas fa-chevron-down" id="faq-i-{{ $i }}" style="color:var(--clr-emerald);font-size:13px;transition:transform .3s;flex-shrink:0;margin-left:16px;"></i>
                </button>
                <div id="faq-c-{{ $i }}" style="max-height:0;overflow:hidden;transition:all .4s ease;padding:0 24px;">
                    <p style="margin:0;font-size:14px;color:var(--clr-muted);line-height:1.7;">{{ $faq['a'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
