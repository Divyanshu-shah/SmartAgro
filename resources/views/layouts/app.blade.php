<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartAgro | @yield('title', 'Insect Pesticide Identification in Crops')</title>
    <meta name="description" content="@yield('meta_description', 'SmartAgro - Intelligent crop monitoring and chemical residue analysis platform driving sustainable farming across India.')">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --clr-forest: #183409;
            --clr-emerald: #5dd62c;
            --clr-leaf: #4ab821;
            --clr-mint: #93e86e;
            --clr-cream: #eefde4;
            --clr-gold: #e8a830;
            --clr-amber: #c78820;
            --clr-sand: #f5f7f2;
            --clr-dark: #0d1a05;
            --clr-text: #1e2b15;
            --clr-muted: #687a5e;
            --font-body: 'Inter', system-ui, sans-serif;
            --font-heading: 'DM Serif Display', Georgia, serif;
            --radius: 12px;
            --shadow-sm: 0 2px 8px rgba(0,0,0,.06);
            --shadow-md: 0 8px 30px rgba(0,0,0,.08);
            --shadow-lg: 0 20px 50px rgba(0,0,0,.12);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; scrollbar-width: none; -ms-overflow-style: none; }
        html::-webkit-scrollbar { display: none; }
        body { font-family: var(--font-body); color: var(--clr-text); background: var(--clr-sand); -webkit-font-smoothing: antialiased; }
        h1,h2,h3,.heading { font-family: var(--font-heading); }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }
        @keyframes slideUp { from{transform:translateY(40px);opacity:0}to{transform:translateY(0);opacity:1} }
        @keyframes fadeIn { from{opacity:0}to{opacity:1} }
        @keyframes float { 0%,100%{transform:translateY(0)}50%{transform:translateY(-8px)} }
        .anim-slide-up { animation: slideUp .7s ease-out both; }
        .anim-fade { animation: fadeIn .6s ease-out both; }
        .anim-float { animation: float 4s ease-in-out infinite; }
        .anim-d1 { animation-delay:.1s } .anim-d2 { animation-delay:.2s } .anim-d3 { animation-delay:.3s } .anim-d4 { animation-delay:.4s }
        /* Scroll reveal */
        .reveal { opacity:0; transform:translateY(30px); transition: all .7s cubic-bezier(.4,0,.2,1); }
        .reveal.visible { opacity:1; transform:translateY(0); }
        
        /* Navbar Links */
        .nav-link { padding:8px 18px; border-radius:50px; font-size:14px; font-weight:500; text-decoration:none; transition:all .25s; color:var(--clr-text); }
        .nav-link:hover { background:rgba(93,214,44,.1); }
        .nav-link.active { background:var(--clr-leaf) !important; color:#fff !important; }

        /* ==========================================
           RESPONSIVE / MOBILE STYLES
           ========================================== */

        /* --- Tablet (≤ 1024px) --- */
        @media (max-width: 1024px) {
            .container { padding: 0 20px; }
        }

        /* --- Small Tablet / Large Phone (≤ 768px) --- */
        @media (max-width: 768px) {

            /* Footer */
            .footer-grid {
                grid-template-columns: 1fr !important;
                gap: 40px !important;
            }
            .footer-links-grid {
                grid-template-columns: 1fr 1fr !important;
                gap: 24px !important;
            }
            footer h2 {
                font-size: 2.2rem !important;
            }
            .footer-bottom {
                flex-direction: column !important;
                align-items: center !important;
                text-align: center;
            }

            /* Chatbot */
            #chatbot-box {
                width: calc(100vw - 32px) !important;
                max-width: 360px !important;
                height: 480px !important;
                right: 0;
            }

            /* Navbar adjustments */
            #main-nav {
                width: 96% !important;
                padding: 10px 18px !important;
                top: 10px !important;
            }
        }

        /* --- Phone (≤ 640px) --- */
        @media (max-width: 640px) {
            .container { padding: 0 16px; }

            /* Footer */
            footer {
                padding: 48px 0 0 !important;
            }
            .footer-links-grid {
                grid-template-columns: 1fr !important;
            }
            footer h2 {
                font-size: 1.8rem !important;
            }
            footer h2 br { display: none; }

            /* Chatbot full-width on small phones */
            #chatbot-container {
                right: 8px !important;
                bottom: 16px !important;
            }
            #chatbot-box {
                width: calc(100vw - 16px) !important;
                max-width: none !important;
                height: 70vh !important;
                max-height: 520px;
            }

            /* Flash messages */
            #flash-message, #newsletter-flash {
                left: 16px !important;
                right: 16px !important;
                max-width: none !important;
            }

            /* Navbar */
            #main-nav {
                width: 97% !important;
                padding: 8px 14px !important;
                border-radius: 20px !important;
                top: 8px !important;
            }
            #nav-brand {
                font-size: 18px !important;
            }
        }

        /* --- Small Phone (≤ 480px) --- */
        @media (max-width: 480px) {
            .container { padding: 0 12px; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav id="main-nav" style="position:fixed;top:20px;left:50%;transform:translateX(-50%);width:95%;max-width:1200px;border-radius:50px;border:1px solid rgba(0,0,0,.05);z-index:1000;transition:all .4s;padding:12px 30px;background:rgba(255,255,255,.9);backdrop-filter:blur(20px);box-shadow:0 10px 40px rgba(0,0,0,.08);">
        <div style="display:flex;justify-content:space-between;align-items:center;width:100%;">
            <a href="{{ route('home') }}" style="display:flex;align-items:center;gap:10px;text-decoration:none;" id="nav-logo">
                <div style="width:42px;height:42px;background:var(--clr-emerald);border-radius:12px;display:flex;align-items:center;justify-content:center;transition:transform .3s;">
                    <i class="fas fa-leaf" style="color:#fff;font-size:18px;"></i>
                </div>
                <span style="font-family:var(--font-heading);font-size:22px;color:var(--clr-forest);letter-spacing:-.5px;" id="nav-brand">SmartAgro</span>
            </a>
            <div class="hidden md:flex" style="align-items:center;gap:6px;background:rgba(255,255,255,.7);backdrop-filter:blur(20px);border:1px solid rgba(0,0,0,.06);border-radius:50px;padding:6px;" id="nav-pill">
                @php $links = [['route'=>'home','label'=>'Home'],['route'=>'services','label'=>'Services'],['route'=>'identification','label'=>'Identification'],['route'=>'resources','label'=>'Resources'],['route'=>'contact','label'=>'Contact']]; @endphp
                @foreach($links as $link)
                <a href="{{ route($link['route']) }}" class="nav-link {{ request()->routeIs($link['route']) ? 'active' : '' }}">{{ $link['label'] }}</a>
                @endforeach
            </div>
            <div class="hidden md:flex" style="align-items:center;gap:12px;">
                @auth
                    <span style="font-size:14px;color:var(--clr-muted);display:flex;align-items:center;gap:6px;"><i class="fas fa-user-circle"></i>{{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">@csrf
                        <button type="submit" style="padding:8px 20px;border-radius:50px;border:1.5px solid #e5e7eb;background:#fff;font-size:13px;font-weight:600;color:var(--clr-text);cursor:pointer;transition:all .25s;">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" style="font-size:14px;font-weight:500;color:var(--clr-text);text-decoration:none;padding:8px 16px;">Login</a>
                    <a href="{{ route('register') }}" style="padding:10px 22px;border-radius:50px;background:var(--clr-leaf);color:#fff;font-size:13px;font-weight:600;text-decoration:none;transition:all .3s;box-shadow:0 2px 12px rgba(74,184,33,.25);" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(74,184,33,.35)'" onmouseout="this.style.transform='none';this.style.boxShadow='0 2px 12px rgba(74,184,33,.25)'">Get Started</a>
                @endauth
            </div>
            <button id="menu-toggle" class="md:hidden" style="background:none;border:none;cursor:pointer;padding:8px;">
                <div id="hamburger" style="display:flex;flex-direction:column;gap:5px;transition:all .3s;">
                    <span style="display:block;width:24px;height:2px;background:var(--clr-forest);border-radius:2px;transition:all .3s;" id="bar1"></span>
                    <span style="display:block;width:24px;height:2px;background:var(--clr-forest);border-radius:2px;transition:all .3s;" id="bar2"></span>
                    <span style="display:block;width:16px;height:2px;background:var(--clr-forest);border-radius:2px;transition:all .3s;" id="bar3"></span>
                </div>
            </button>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" style="display:none;opacity:0;transform:translateY(-10px);transition:all .35s ease;padding:20px 24px 28px;margin:12px 20px 0;background:rgba(255,255,255,.97);backdrop-filter:blur(20px);border-radius:20px;border:1px solid rgba(0,0,0,.06);box-shadow:var(--shadow-lg);">
            @foreach($links as $link)
            <a href="{{ route($link['route']) }}" style="display:block;padding:12px 16px;border-radius:12px;font-size:15px;font-weight:500;color:var(--clr-text);text-decoration:none;transition:background .2s;{{ request()->routeIs($link['route']) ? 'background:rgba(93,214,44,.1);color:var(--clr-leaf);font-weight:600;' : '' }}" onmouseover="this.style.background='rgba(93,214,44,.08)'" onmouseout="this.style.background='{{ request()->routeIs($link['route']) ? 'rgba(93,214,44,.1)' : 'transparent' }}'">{{ $link['label'] }}</a>
            @endforeach
            <div style="border-top:1px solid #e5e7eb;margin-top:12px;padding-top:16px;display:flex;gap:10px;">
                @auth
                    <span style="flex:1;font-size:14px;color:var(--clr-muted);display:flex;align-items:center;gap:6px;"><i class="fas fa-user-circle"></i>{{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">@csrf<button type="submit" style="padding:8px 20px;border-radius:50px;border:1.5px solid #e5e7eb;background:#fff;font-size:13px;cursor:pointer;">Logout</button></form>
                @else
                    <a href="{{ route('login') }}" style="flex:1;text-align:center;padding:10px;border-radius:12px;border:1.5px solid #e5e7eb;font-size:14px;font-weight:500;color:var(--clr-text);text-decoration:none;">Login</a>
                    <a href="{{ route('register') }}" style="flex:1;text-align:center;padding:10px;border-radius:12px;background:var(--clr-forest);color:#fff;font-size:14px;font-weight:600;text-decoration:none;">Register</a>
                @endauth
            </div>
        </div>
    </nav>
    <div style="height:74px;"></div>

    <!-- Flash Messages -->
    @if(session('success'))
    <div id="flash-message" style="position:fixed;top:90px;right:24px;z-index:999;max-width:420px;padding:16px 20px;background:#fff;border-radius:14px;border-left:4px solid var(--clr-emerald);box-shadow:var(--shadow-lg);display:flex;align-items:center;gap:12px;animation:slideUp .4s ease-out;" role="alert">
        <div style="width:36px;height:36px;background:#eefde4;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas fa-check" style="color:var(--clr-emerald);"></i></div>
        <div style="flex:1;"><p style="font-weight:600;font-size:14px;color:var(--clr-forest);margin:0;">Success</p><p style="font-size:13px;color:var(--clr-muted);margin:2px 0 0;">{{ session('success') }}</p></div>
        <button onclick="this.parentElement.style.opacity='0';setTimeout(()=>this.parentElement.remove(),300)" style="background:none;border:none;cursor:pointer;color:#9ca3af;padding:4px;"><i class="fas fa-times"></i></button>
    </div>
    @endif
    @if(session('newsletter_success'))
    <div id="newsletter-flash" style="position:fixed;top:90px;right:24px;z-index:999;max-width:420px;padding:16px 20px;background:#fff;border-radius:14px;border-left:4px solid var(--clr-emerald);box-shadow:var(--shadow-lg);display:flex;align-items:center;gap:12px;animation:slideUp .4s ease-out;" role="alert">
        <div style="width:36px;height:36px;background:#eefde4;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas fa-check" style="color:var(--clr-emerald);"></i></div>
        <div style="flex:1;"><p style="font-weight:600;font-size:14px;color:var(--clr-forest);margin:0;">Subscribed!</p><p style="font-size:13px;color:var(--clr-muted);margin:2px 0 0;">{{ session('newsletter_success') }}</p></div>
        <button onclick="this.parentElement.style.opacity='0';setTimeout(()=>this.parentElement.remove(),300)" style="background:none;border:none;cursor:pointer;color:#9ca3af;padding:4px;"><i class="fas fa-times"></i></button>
    </div>
    @endif

    <!-- Page Content -->
    @yield('content')
    <!-- Footer -->
    <footer style="background:var(--clr-forest);color:#fff;padding:72px 0 0;position:relative;overflow:hidden;">
        <div style="position:absolute;top:-60px;right:-60px;width:300px;height:300px;background:rgba(93,214,44,.08);border-radius:50%;"></div>
        <div style="position:absolute;bottom:-40px;left:-40px;width:200px;height:200px;background:rgba(232,168,48,.06);border-radius:50%;"></div>
        <div class="container" style="position:relative;z-index:1;">
            <div class="footer-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:80px;padding-bottom:40px;">
                <div>
                    <h2 style="font-family:var(--font-heading);font-size:3.5rem;color:#fff;margin:0 0 24px;line-height:1.1;">Nurturing every acre, <br><span style="color:var(--clr-gold);font-style:italic;">sustainably.</span></h2>
                    <p style="font-size:16px;color:rgba(255,255,255,.6);line-height:1.7;margin-bottom:32px;max-width:400px;">Empowering growers with intelligent crop diagnostics, chemical safety insights, and bio-friendly alternatives for a resilient agricultural future.</p>
                    <div style="display:flex;gap:12px;">
                        <a href="https://wwww.facebook.com/rajputanasingh846?sfnsn=wa" style="width:44px;height:44px;border-radius:50%;background:rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;color:#fff;text-decoration:none;transition:all .3s;" onmouseover="this.style.background='var(--clr-emerald)';this.style.transform='translateY(-4px)'" onmouseout="this.style.background='rgba(255,255,255,.1)';this.style.transform='none'"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://x.com/shah_divyanshu1" style="width:44px;height:44px;border-radius:50%;background:rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;color:#fff;text-decoration:none;transition:all .3s;" onmouseover="this.style.background='var(--clr-emerald)';this.style.transform='translateY(-4px)'" onmouseout="this.style.background='rgba(255,255,255,.1)';this.style.transform='none'"><i class="fab fa-twitter"></i></a>
                        <a href="http://www.linkedin.com/in/aditya-singh-a98775291" style="width:44px;height:44px;border-radius:50%;background:rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;color:#fff;text-decoration:none;transition:all .3s;" onmouseover="this.style.background='var(--clr-emerald)';this.style.transform='translateY(-4px)'" onmouseout="this.style.background='rgba(255,255,255,.1)';this.style.transform='none'"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="footer-links-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:40px;">
                    <div>
                        <h4 style="font-family:var(--font-body);font-size:14px;font-weight:700;text-transform:uppercase;letter-spacing:1.5px;color:var(--clr-mint);margin-bottom:24px;">Explore</h4>
                        <ul style="list-style:none;display:flex;flex-direction:column;gap:16px;padding:0;margin:0;">
                            @foreach([['route'=>'home','label'=>'Home'],['route'=>'services','label'=>'Services'],['route'=>'identification','label'=>'Identification'],['route'=>'resources','label'=>'Resources'],['route'=>'contact','label'=>'Contact']] as $fl)
                            <li><a href="{{ route($fl['route']) }}" style="color:rgba(255,255,255,.7);text-decoration:none;font-size:15px;transition:all .2s;" onmouseover="this.style.color='#fff';this.style.paddingLeft='8px'" onmouseout="this.style.color='rgba(255,255,255,.7)';this.style.paddingLeft='0'">{{ $fl['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h4 style="font-family:var(--font-body);font-size:14px;font-weight:700;text-transform:uppercase;letter-spacing:1.5px;color:var(--clr-mint);margin-bottom:24px;">Newsletter</h4>
                        <p style="font-size:14px;color:rgba(255,255,255,.6);line-height:1.6;margin-bottom:20px;">Get seasonal crop advisories and regulatory updates delivered to your inbox.</p>
                        <form action="{{ route('newsletter.store') }}" method="POST" style="display:flex;flex-direction:column;gap:12px;">
                            @csrf
                            <input type="email" name="email" placeholder="Your email address" required style="width:100%;padding:14px 20px;border:1px solid rgba(255,255,255,.2);border-radius:12px;background:rgba(255,255,255,.05);color:#fff;font-size:14px;outline:none;transition:all .3s;" onfocus="this.style.borderColor='var(--clr-mint)';this.style.background='rgba(255,255,255,.1)'" onblur="this.style.borderColor='rgba(255,255,255,.2)';this.style.background='rgba(255,255,255,.05)'">
                            <button type="submit" style="width:100%;padding:14px;background:var(--clr-emerald);color:#fff;font-weight:600;border:none;border-radius:12px;cursor:pointer;transition:background .3s;" onmouseover="this.style.background='var(--clr-leaf)'" onmouseout="this.style.background='var(--clr-emerald)'">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer-bottom" style="border-top:1px solid rgba(255,255,255,.08);margin-top:56px;padding:24px 0;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px;">
                <p style="font-size:13px;color:rgba(255,255,255,.4);">© {{ date('Y') }} SmartAgro. All rights reserved.</p>
                <div style="display:flex;gap:24px;">
                    <a href="#" style="font-size:13px;color:rgba(255,255,255,.4);text-decoration:none;transition:color .2s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,.4)'">Privacy Policy</a>
                    <a href="#" style="font-size:13px;color:rgba(255,255,255,.4);text-decoration:none;transition:color .2s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,.4)'">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Chatbot -->
    <div id="chatbot-container" style="position:fixed;bottom:24px;right:24px;z-index:50;">
        <div id="chatbot-box" style="display:none;width:360px;height:520px;background:#fff;border-radius:20px;box-shadow:0 20px 60px rgba(0,0,0,.15);border:1px solid rgba(0,0,0,.06);flex-direction:column;overflow:hidden;margin-bottom:16px;">
            <div style="background:linear-gradient(135deg,var(--clr-forest),var(--clr-emerald));padding:20px 24px;display:flex;justify-content:space-between;align-items:center;">
                <div style="display:flex;align-items:center;gap:10px;">
                    <div style="width:36px;height:36px;background:rgba(255,255,255,.15);border-radius:10px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-leaf" style="color:#fff;font-size:14px;"></i></div>
                    <div><h3 style="margin:0;font-size:15px;font-weight:600;color:#fff;font-family:var(--font-body);">SmartAgro Assistant</h3><p style="margin:0;font-size:11px;color:rgba(255,255,255,.6);">Online now</p></div>
                </div>
                <button id="close-chatbot" style="background:none;border:none;color:rgba(255,255,255,.7);cursor:pointer;font-size:16px;padding:4px;"><i class="fas fa-minus"></i></button>
            </div>
            <div id="chatbot-messages" style="flex:1;padding:16px;overflow-y:auto;display:flex;flex-direction:column;gap:12px;">
                <div style="background:#eefde4;border-radius:14px 14px 14px 4px;padding:12px 16px;font-size:13px;line-height:1.6;color:var(--clr-text);max-width:85%;">
                    Welcome! I'm here to help you navigate crop diagnostics, chemical safety, and sustainable farming practices. What can I assist you with?
                </div>
            </div>
            <div style="padding:14px 16px;border-top:1px solid #f3f4f6;">
                <div style="display:flex;gap:8px;">
                    <input type="text" id="chatbot-input" placeholder="Ask about crops..." style="flex:1;padding:10px 16px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:13px;outline:none;transition:border .3s;font-family:var(--font-body);" onfocus="this.style.borderColor='var(--clr-emerald)'" onblur="this.style.borderColor='#e5e7eb'">
                    <button id="send-message" style="width:40px;height:40px;border-radius:12px;background:var(--clr-emerald);color:#fff;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:background .2s;flex-shrink:0;" onmouseover="this.style.background='var(--clr-forest)'" onmouseout="this.style.background='var(--clr-emerald)'"><i class="fas fa-paper-plane" style="font-size:13px;"></i></button>
                </div>
                <div style="margin-top:10px;display:flex;flex-wrap:wrap;gap:6px;">
                    @foreach(['Wheat','Rice','Maize','Potato','Tomato','Apple'] as $crop)
                    <button class="quick-question" data-question="How to protect {{ strtolower($crop) }} crops?" style="padding:5px 12px;border-radius:20px;border:1px solid #e5e7eb;background:#fafafa;font-size:11px;color:var(--clr-muted);cursor:pointer;transition:all .2s;font-family:var(--font-body);" onmouseover="this.style.borderColor='var(--clr-mint)';this.style.color='var(--clr-emerald)'" onmouseout="this.style.borderColor='#e5e7eb';this.style.color='var(--clr-muted)'">{{ $crop }}</button>
                    @endforeach
                </div>
            </div>
        </div>
        <button id="chatbot-toggle" style="width:56px;height:56px;border-radius:16px;background:var(--clr-leaf);color:#fff;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;box-shadow:0 8px 30px rgba(74,184,33,.3);transition:all .3s;margin-left:auto;" onmouseover="this.style.transform='scale(1.05)';this.style.boxShadow='0 12px 40px rgba(74,184,33,.4)'" onmouseout="this.style.transform='none';this.style.boxShadow='0 8px 30px rgba(74,184,33,.3)'">
            <i class="fas fa-comment-dots" style="font-size:22px;"></i>
        </button>
    </div>

    <!-- JavaScript -->
    <script>
        // Mobile menu
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        let menuOpen = false;
        menuToggle.addEventListener('click', () => {
            menuOpen = !menuOpen;
            if (menuOpen) {
                mobileMenu.style.display = 'block';
                setTimeout(() => { mobileMenu.style.opacity = '1'; mobileMenu.style.transform = 'translateY(0)'; }, 10);
            } else {
                mobileMenu.style.opacity = '0';
                mobileMenu.style.transform = 'translateY(-10px)';
                setTimeout(() => { mobileMenu.style.display = 'none'; }, 350);
            }
        });

        // Scroll reveal
        const revealEls = document.querySelectorAll('.reveal');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); revealObserver.unobserve(e.target); }});
        }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
        revealEls.forEach(el => revealObserver.observe(el));

        // Chatbot
        document.addEventListener('DOMContentLoaded', function() {
            const chatbotToggle = document.getElementById('chatbot-toggle');
            const chatbotBox = document.getElementById('chatbot-box');
            const closeChatbot = document.getElementById('close-chatbot');
            const chatbotInput = document.getElementById('chatbot-input');
            const sendMessageBtn = document.getElementById('send-message');
            const chatbotMessages = document.getElementById('chatbot-messages');
            const quickQuestions = document.querySelectorAll('.quick-question');

            chatbotToggle.addEventListener('click', () => {
                const isHidden = chatbotBox.style.display === 'none';
                chatbotBox.style.display = isHidden ? 'flex' : 'none';
            });
            closeChatbot.addEventListener('click', () => { chatbotBox.style.display = 'none'; });

            function addMessage(text, isUser) {
                const d = document.createElement('div');
                d.style.cssText = 'display:flex;flex-direction:column;' + (isUser ? 'align-items:flex-end' : 'align-items:flex-start');
                d.innerHTML = isUser
                    ? `<div style="background:var(--clr-forest);color:#fff;border-radius:14px 14px 4px 14px;padding:10px 16px;font-size:13px;max-width:80%;line-height:1.5;">${text}</div>`
                    : `<div style="background:#eefde4;border-radius:14px 14px 14px 4px;padding:10px 16px;font-size:13px;max-width:80%;line-height:1.5;color:var(--clr-text);">${text}</div>`;
                chatbotMessages.appendChild(d);
                chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
            }

            const cropDatabase = {
                wheat: { pests: ["Aphids", "Armyworms", "Hessian fly"], protection: ["Use resistant varieties", "Practice crop rotation", "Monitor fields regularly"], pesticides: ["Imidacloprid", "Lambda-cyhalothrin", "Spinosad"] },
                maize: { pests: ["Corn earworm", "Fall armyworm", "Corn borers"], protection: ["Use Bt maize varieties", "Practice crop rotation", "Use pheromone traps"], pesticides: ["Bifenthrin", "Chlorantraniliprole", "Azadirachtin"] },
                rice: { pests: ["Rice stem borers", "Brown planthopper", "Rice leaf folder"], protection: ["Maintain proper water management", "Use resistant varieties", "Encourage natural enemies"], pesticides: ["Cartap hydrochloride", "Buprofezin", "Fipronil"] },
                potato: { pests: ["Colorado potato beetle", "Potato tuber moth", "Aphids"], protection: ["Use certified seed potatoes", "Practice crop rotation", "Use floating row covers"], pesticides: ["Spinetoram", "Abamectin", "Thiamethoxam"] },
                tomato: { pests: ["Tomato fruit worm", "Whiteflies", "Spider mites"], protection: ["Use reflective mulches", "Install yellow sticky traps", "Encourage beneficial insects"], pesticides: ["Indoxacarb", "Pyriproxyfen", "Abamectin"] },
                apple: { pests: ["Codling moth", "Apple maggot", "Aphids"], protection: ["Use pheromone traps", "Prune trees properly", "Remove dropped fruit"], pesticides: ["Acetamiprid", "Lambda-cyhalothrin", "Abamectin"] },
                orange: { pests: ["Asian citrus psyllid", "Citrus leafminer", "Scale insects"], protection: ["Monitor for early signs", "Use reflective mulches", "Prune infested branches"], pesticides: ["Imidacloprid", "Abamectin", "Buprofezin"] },
                banana: { pests: ["Banana weevil", "Thrips", "Nematodes"], protection: ["Use clean planting material", "Practice field sanitation", "Use pheromone traps"], pesticides: ["Carbofuran", "Imidacloprid", "Abamectin"] }
            };

            function generateResponse(userMessage) {
                const lowerMessage = userMessage.toLowerCase();
                for (const crop in cropDatabase) {
                    if (lowerMessage.includes(crop)) {
                        const info = cropDatabase[crop];
                        return `<strong>${crop.charAt(0).toUpperCase() + crop.slice(1)} Protection:</strong><br><u>Common Pests:</u> ${info.pests.join(", ")}<br><u>Protection:</u><br>• ${info.protection.join("<br>• ")}<br><u>Pesticides:</u><br>• ${info.pesticides.join("<br>• ")}<br><em>Always follow label instructions.</em>`;
                    }
                }
                if (lowerMessage.includes('residue') || lowerMessage.includes('identify')) return "Our lab runs multi-residue panels via GC-MS and LC-MS/MS. You can submit samples through our diagnostic portal or contact us directly.";
                if (lowerMessage.includes('organic')) return "Popular organic solutions include neem-based formulations, Beauveria bassiana, Trichoderma viride, and diatomaceous earth.";
                return "I can guide you on crop-specific pest management. Just name a crop — wheat, maize, rice, potato, tomato, apple, orange, or banana.";
            }

            function handleUserMessage() {
                const message = chatbotInput.value.trim();
                if (message) {
                    addMessage(message, true);
                    chatbotInput.value = '';
                    setTimeout(() => addMessage(generateResponse(message), false), 800);
                }
            }

            sendMessageBtn.addEventListener('click', handleUserMessage);
            chatbotInput.addEventListener('keypress', function(e) { if (e.key === 'Enter') handleUserMessage(); });
            quickQuestions.forEach(btn => btn.addEventListener('click', function() { chatbotInput.value = this.dataset.question; handleUserMessage(); }));
        });

        // Auto-dismiss flash messages
        setTimeout(() => { document.querySelectorAll('#flash-message,#newsletter-flash').forEach(el => { el.style.opacity = '0'; setTimeout(() => el.remove(), 300); }); }, 5000);
    </script>
    @stack('scripts')
</body>
</html>
