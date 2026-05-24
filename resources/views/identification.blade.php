@extends('layouts.app')
@section('title', 'Pesticide Identification')

@push('styles')
<style>
    @media (max-width: 768px) {
        /* Hero */
        .ident-hero h1 { font-size: 2.2rem !important; }
        .ident-hero p { font-size: 15px !important; }
        .ident-hero { padding: 80px 0 60px !important; }

        /* Form grid - 2 col to 1 col */
        .ident-form-grid {
            grid-template-columns: 1fr !important;
        }

        /* Form card */
        .ident-form-card {
            border-radius: 16px !important;
        }
        .ident-form-header {
            padding: 20px 24px !important;
        }
        .ident-form-body {
            padding: 24px !important;
        }

        /* Diagnostic Journey - 3 col to 1 col */
        .ident-journey-grid {
            grid-template-columns: 1fr !important;
            gap: 24px !important;
        }
    }

    @media (max-width: 640px) {
        .ident-hero h1 { font-size: 1.8rem !important; }
        .ident-hero { padding: 70px 0 50px !important; }
        section { padding: 48px 0 !important; }

        .ident-form-header {
            padding: 18px 20px !important;
        }
        .ident-form-header h2 { font-size: 1.2rem !important; }
        .ident-form-body {
            padding: 20px !important;
        }
    }
</style>
@endpush

@section('content')
<section class="ident-hero" style="position:relative;padding:100px 0 80px;overflow:hidden;">
    <img src="{{ asset('images/identification-hero.jpg') }}" alt="Crop field for pesticide identification" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;">
    <div style="position:absolute;inset:0;background:rgba(0,0,0,0.4);"></div>
    <div class="container" style="position:relative;z-index:1;text-align:center;">
        <span class="anim-slide-up" style="display:inline-block;font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:2px;color:var(--clr-mint);margin-bottom:16px;">Start Your Analysis</span>
        <h1 class="anim-slide-up anim-d1" style="font-family:var(--font-heading);font-size:3rem;color:#fff;margin:0 0 16px;">Crop Diagnostic Submission</h1>
        <p class="anim-slide-up anim-d2" style="font-size:17px;color:rgba(255,255,255,.65);max-width:560px;margin:0 auto;line-height:1.7;">Share your field data and let our specialists pinpoint chemical agents and craft a targeted remediation strategy.</p>
    </div>
</section>

<section style="padding:80px 0;background:var(--clr-sand);">
    <div class="container">
        <div class="reveal ident-form-card" style="max-width:780px;margin:0 auto;background:#fff;border-radius:24px;overflow:hidden;border:1px solid rgba(0,0,0,.04);box-shadow:var(--shadow-md);">
            <div class="ident-form-header" style="background:linear-gradient(135deg,var(--clr-forest),var(--clr-emerald));padding:28px 36px;">
                <h2 style="font-family:var(--font-heading);font-size:1.5rem;color:#fff;margin:0 0 4px;">Diagnostic Intake Form</h2>
                <p style="font-size:14px;color:rgba(255,255,255,.6);margin:0;">Provide your field details below and our lab team will begin the assessment.</p>
            </div>
            <div class="ident-form-body" style="padding:36px;">
                @if(session('success'))
                <div style="padding:14px 18px;background:#eefde4;border:1px solid #93e86e;border-radius:12px;margin-bottom:24px;display:flex;align-items:center;gap:10px;">
                    <i class="fas fa-check-circle" style="color:var(--clr-emerald);"></i>
                    <span style="font-size:14px;color:var(--clr-forest);font-weight:500;">{{ session('success') }}</span>
                </div>
                @endif
                @if($errors->any())
                <div style="padding:14px 18px;background:#fef2f2;border:1px solid #fca5a5;border-radius:12px;margin-bottom:24px;">
                    <ul style="margin:0;padding-left:18px;font-size:14px;color:#991b1b;">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
                @endif
                <form action="{{ route('identification.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="ident-form-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:20px;">
                        <div>
                            <label for="name" style="display:block;font-size:13px;font-weight:600;color:var(--clr-text);margin-bottom:6px;">Full Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;background:#fafafa;outline:none;transition:all .3s;box-sizing:border-box;font-family:var(--font-body);" onfocus="this.style.borderColor='var(--clr-emerald)';this.style.background='#fff';this.style.boxShadow='0 0 0 4px rgba(45,106,79,.08)'" onblur="this.style.borderColor='#e5e7eb';this.style.background='#fafafa';this.style.boxShadow='none'">
                        </div>
                        <div>
                            <label for="email" style="display:block;font-size:13px;font-weight:600;color:var(--clr-text);margin-bottom:6px;">Email Address *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;background:#fafafa;outline:none;transition:all .3s;box-sizing:border-box;font-family:var(--font-body);" onfocus="this.style.borderColor='var(--clr-emerald)';this.style.background='#fff';this.style.boxShadow='0 0 0 4px rgba(45,106,79,.08)'" onblur="this.style.borderColor='#e5e7eb';this.style.background='#fafafa';this.style.boxShadow='none'">
                        </div>
                    </div>
                    <div class="ident-form-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:20px;">
                        <div>
                            <label for="phone" style="display:block;font-size:13px;font-weight:600;color:var(--clr-text);margin-bottom:6px;">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;background:#fafafa;outline:none;transition:all .3s;box-sizing:border-box;font-family:var(--font-body);" onfocus="this.style.borderColor='var(--clr-emerald)';this.style.background='#fff';this.style.boxShadow='0 0 0 4px rgba(45,106,79,.08)'" onblur="this.style.borderColor='#e5e7eb';this.style.background='#fafafa';this.style.boxShadow='none'">
                        </div>
                        <div>
                            <label for="farm_size" style="display:block;font-size:13px;font-weight:600;color:var(--clr-text);margin-bottom:6px;">Farm Size (acres)</label>
                            <input type="number" id="farm_size" name="farm_size" value="{{ old('farm_size') }}" style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;background:#fafafa;outline:none;transition:all .3s;box-sizing:border-box;font-family:var(--font-body);" onfocus="this.style.borderColor='var(--clr-emerald)';this.style.background='#fff';this.style.boxShadow='0 0 0 4px rgba(45,106,79,.08)'" onblur="this.style.borderColor='#e5e7eb';this.style.background='#fafafa';this.style.boxShadow='none'">
                        </div>
                    </div>
                    <div style="margin-bottom:20px;">
                        <label for="crop_type" style="display:block;font-size:13px;font-weight:600;color:var(--clr-text);margin-bottom:6px;">Crop Category *</label>
                        <select id="crop_type" name="crop_type" required style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;background:#fafafa;outline:none;transition:all .3s;box-sizing:border-box;font-family:var(--font-body);appearance:auto;" onfocus="this.style.borderColor='var(--clr-emerald)'" onblur="this.style.borderColor='#e5e7eb'">
                            <option value="">Choose a Crop Category</option>
                            <option value="cereals" {{ old('crop_type')=='cereals'?'selected':'' }}>Cereals (Wheat, Rice, Maize)</option>
                            <option value="vegetables" {{ old('crop_type')=='vegetables'?'selected':'' }}>Vegetables</option>
                            <option value="fruits" {{ old('crop_type')=='fruits'?'selected':'' }}>Fruits</option>
                            <option value="legumes" {{ old('crop_type')=='legumes'?'selected':'' }}>Legumes</option>
                            <option value="cash-crops" {{ old('crop_type')=='cash-crops'?'selected':'' }}>Cash Crops</option>
                            <option value="other" {{ old('crop_type')=='other'?'selected':'' }}>Other</option>
                        </select>
                    </div>
                    <div style="margin-bottom:20px;">
                        <label for="pest_problem" style="display:block;font-size:13px;font-weight:600;color:var(--clr-text);margin-bottom:6px;">Describe the Issue *</label>
                        <textarea id="pest_problem" name="pest_problem" rows="3" required style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;background:#fafafa;outline:none;transition:all .3s;box-sizing:border-box;font-family:var(--font-body);resize:vertical;" onfocus="this.style.borderColor='var(--clr-emerald)';this.style.background='#fff'" onblur="this.style.borderColor='#e5e7eb';this.style.background='#fafafa'">{{ old('pest_problem') }}</textarea>
                    </div>
                    <div style="margin-bottom:20px;">
                        <label for="symptoms" style="display:block;font-size:13px;font-weight:600;color:var(--clr-text);margin-bottom:6px;">Visible Crop Symptoms *</label>
                        <textarea id="symptoms" name="symptoms" rows="3" required style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;background:#fafafa;outline:none;transition:all .3s;box-sizing:border-box;font-family:var(--font-body);resize:vertical;" onfocus="this.style.borderColor='var(--clr-emerald)';this.style.background='#fff'" onblur="this.style.borderColor='#e5e7eb';this.style.background='#fafafa'">{{ old('symptoms') }}</textarea>
                    </div>
                    <div style="margin-bottom:20px;">
                        <label for="pesticide_used" style="display:block;font-size:13px;font-weight:600;color:var(--clr-text);margin-bottom:6px;">Chemicals Previously Applied (if known)</label>
                        <input type="text" id="pesticide_used" name="pesticide_used" value="{{ old('pesticide_used') }}" style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;background:#fafafa;outline:none;transition:all .3s;box-sizing:border-box;font-family:var(--font-body);" onfocus="this.style.borderColor='var(--clr-emerald)';this.style.background='#fff'" onblur="this.style.borderColor='#e5e7eb';this.style.background='#fafafa'">
                    </div>
                    <div style="margin-bottom:24px;">
                        <label for="images" style="display:block;font-size:13px;font-weight:600;color:var(--clr-text);margin-bottom:6px;">Attach Field Photos (Max 5 images, 5MB each)</label>
                        <div id="dropZone" style="padding:24px;border:2px dashed #d1d5db;border-radius:12px;text-align:center;background:#fafafa;transition:border .3s, background .3s;cursor:pointer;" onmouseover="this.style.borderColor='var(--clr-mint)'" onmouseout="this.style.borderColor='#d1d5db'" onclick="document.getElementById('images').click()">
                            <i class="fas fa-cloud-upload-alt" style="font-size:28px;color:var(--clr-muted);margin-bottom:8px;display:block;"></i>
                            <p style="font-size:14px;color:var(--clr-muted);margin:0;">Click here to select images of damaged foliage or wilting stems</p>
                            <p style="font-size:12px;color:#9ca3af;margin:6px 0 0;">Supported: JPG, PNG, GIF, WebP</p>
                            <input type="file" id="images" name="images[]" multiple accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" style="display:none;" onchange="previewImages(this)">
                        </div>
                        <div id="imagePreview" style="display:none;margin-top:12px;display:flex;flex-wrap:wrap;gap:10px;"></div>
                    </div>
                    <script>
                    function previewImages(input) {
                        const preview = document.getElementById('imagePreview');
                        preview.innerHTML = '';
                        if (input.files && input.files.length > 0) {
                            if (input.files.length > 5) {
                                alert('You can upload a maximum of 5 images.');
                                input.value = '';
                                preview.style.display = 'none';
                                return;
                            }
                            preview.style.display = 'flex';
                            Array.from(input.files).forEach(file => {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    const div = document.createElement('div');
                                    div.style.cssText = 'position:relative;width:80px;height:80px;border-radius:8px;overflow:hidden;border:1px solid #e5e7eb;';
                                    div.innerHTML = '<img src="' + e.target.result + '" style="width:100%;height:100%;object-fit:cover;">' +
                                        '<span style="position:absolute;bottom:0;left:0;right:0;background:rgba(0,0,0,.5);color:#fff;font-size:9px;padding:2px 4px;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;">' + file.name + '</span>';
                                    preview.appendChild(div);
                                };
                                reader.readAsDataURL(file);
                            });
                        } else {
                            preview.style.display = 'none';
                        }
                    }
                    </script>
                    <div style="display:flex;align-items:center;gap:10px;margin-bottom:28px;">
                        <input type="checkbox" id="consent" name="consent" required style="width:18px;height:18px;accent-color:var(--clr-emerald);cursor:pointer;">
                        <label for="consent" style="font-size:14px;color:var(--clr-muted);cursor:pointer;">I acknowledge the <a href="#" style="color:var(--clr-emerald);text-decoration:underline;">Data Usage Policy</a></label>
                    </div>
                    <button type="submit" style="width:100%;padding:14px;background:linear-gradient(135deg,var(--clr-forest),var(--clr-leaf));color:#fff;font-size:15px;font-weight:700;border:none;border-radius:12px;cursor:pointer;transition:all .35s;font-family:var(--font-body);" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 24px rgba(74,184,33,.3)'" onmouseout="this.style.transform='none';this.style.boxShadow='none'">
                        <i class="fas fa-paper-plane" style="margin-right:8px;"></i> Submit for Diagnosis
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<section style="padding:80px 0;background:#fff;">
    <div class="container">
        <div class="reveal" style="text-align:center;margin-bottom:56px;">
            <span style="font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:2px;color:var(--clr-emerald);display:block;margin-bottom:12px;">After You Submit</span>
            <h2 style="font-family:var(--font-heading);font-size:2.3rem;color:var(--clr-forest);margin:0;">Your Diagnostic Journey</h2>
        </div>
        <div class="ident-journey-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:32px;max-width:900px;margin:0 auto;">
            @foreach([
                ['icon'=>'fa-envelope','color'=>'#4ab821','bg'=>'#eefde4','title'=>'Acknowledgement Notice','desc'=>'A confirmation with your unique case reference number arrives within minutes.'],
                ['icon'=>'fa-clipboard-list','color'=>'#7c3aed','bg'=>'#f5f3ff','title'=>'Collection Guidance','desc'=>'If physical samples are needed, we send step-by-step packaging and shipping instructions.'],
                ['icon'=>'fa-file-alt','color'=>'#0891b2','bg'=>'#ecfeff','title'=>'Report Delivery','desc'=>'Expect a detailed findings document with MRL comparisons within 3-5 working days.']
            ] as $i => $step)
            <div class="reveal" style="text-align:center;animation-delay:{{ $i * 0.1 }}s;">
                <div style="width:64px;height:64px;background:{{ $step['bg'] }};border-radius:16px;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;">
                    <i class="fas {{ $step['icon'] }}" style="color:{{ $step['color'] }};font-size:22px;"></i>
                </div>
                <h3 style="font-family:var(--font-heading);font-size:1.15rem;color:var(--clr-forest);margin:0 0 8px;">{{ $step['title'] }}</h3>
                <p style="font-size:14px;color:var(--clr-muted);line-height:1.7;margin:0;">{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
