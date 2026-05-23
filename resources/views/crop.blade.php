@extends('layouts.app')
@section('title', $crop['title'])
@section('content')
<section style="position:relative;padding:100px 0 80px;background:var(--clr-forest);overflow:hidden;">
    <div style="position:absolute;top:-60px;right:-60px;width:300px;height:300px;background:rgba(93,214,44,.08);border-radius:50%;"></div>
    <div class="container" style="position:relative;z-index:1;text-align:center;">
        <span class="anim-slide-up" style="display:inline-block;font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:2px;color:var(--clr-mint);margin-bottom:16px;">Crop Details</span>
        <h1 class="anim-slide-up anim-d1" style="font-family:var(--font-heading);font-size:2.8rem;color:#fff;margin:0;">{{ $crop['title'] }}</h1>
    </div>
</section>

<section style="padding:60px 0;background:var(--clr-sand);">
    <div style="max-width:800px;margin:0 auto;padding:0 24px;">
        <!-- Pesticides -->
        <div class="reveal" style="background:#fff;border-radius:20px;padding:36px;border:1px solid rgba(0,0,0,.04);margin-bottom:24px;">
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:24px;">
                <div style="width:44px;height:44px;background:#fef3c7;border-radius:12px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-flask" style="color:#d97706;font-size:18px;"></i></div>
                <h2 style="font-family:var(--font-heading);font-size:1.4rem;color:var(--clr-forest);margin:0;">Common Pesticides</h2>
            </div>
            <div style="display:flex;flex-direction:column;gap:14px;">
                @foreach($crop['pesticides'] as $pesticide)
                <div style="display:flex;gap:12px;padding:14px 16px;background:var(--clr-sand);border-radius:12px;">
                    <div style="width:8px;height:8px;background:var(--clr-gold);border-radius:50%;margin-top:7px;flex-shrink:0;"></div>
                    <div><strong style="color:var(--clr-forest);">{{ $pesticide['name'] }}</strong><span style="color:var(--clr-muted);font-size:14px;"> — {{ $pesticide['desc'] }}</span></div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Methods -->
        <div class="reveal" style="background:#fff;border-radius:20px;padding:36px;border:1px solid rgba(0,0,0,.04);border-left:4px solid var(--clr-emerald);margin-bottom:24px;">
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:24px;">
                <div style="width:44px;height:44px;background:#eefde4;border-radius:12px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-microscope" style="color:var(--clr-emerald);font-size:18px;"></i></div>
                <h2 style="font-family:var(--font-heading);font-size:1.4rem;color:var(--clr-forest);margin:0;">{{ $crop['methods_title'] }}</h2>
            </div>
            <div style="display:flex;flex-direction:column;gap:14px;">
                @foreach($crop['methods'] as $method)
                <div style="display:flex;gap:12px;padding:14px 16px;background:#eefde4;border-radius:12px;">
                    <div style="width:20px;height:20px;background:var(--clr-emerald);border-radius:6px;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px;"><i class="fas fa-check" style="color:#fff;font-size:10px;"></i></div>
                    <div><strong style="color:var(--clr-forest);">{{ $method['name'] }}:</strong><span style="color:var(--clr-muted);font-size:14px;"> {{ $method['desc'] }}</span></div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Tips -->
        <div class="reveal" style="background:#fff;border-radius:20px;padding:36px;border:1px solid rgba(0,0,0,.04);margin-bottom:32px;">
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:24px;">
                <div style="width:44px;height:44px;background:#eff6ff;border-radius:12px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-lightbulb" style="color:#2563eb;font-size:18px;"></i></div>
                <h2 style="font-family:var(--font-heading);font-size:1.4rem;color:var(--clr-forest);margin:0;">Additional Protection Tips</h2>
            </div>
            <div style="display:flex;flex-direction:column;gap:10px;">
                @foreach($crop['tips'] as $tip)
                <div style="display:flex;gap:12px;padding:10px 0;font-size:14px;color:var(--clr-text);line-height:1.6;">
                    <i class="fas fa-arrow-right" style="color:var(--clr-mint);margin-top:4px;font-size:12px;flex-shrink:0;"></i>
                    <span>{{ $tip }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <div style="text-align:center;">
            <a href="{{ route('home') }}" style="display:inline-flex;align-items:center;gap:8px;padding:14px 28px;background:var(--clr-forest);color:#fff;border-radius:12px;font-size:15px;font-weight:600;text-decoration:none;transition:all .3s;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(24,52,9,.25)'" onmouseout="this.style.transform='none';this.style.boxShadow='none'"><i class="fas fa-arrow-left" style="font-size:13px;"></i> Back to All Crops</a>
        </div>
    </div>
</section>
@endsection
