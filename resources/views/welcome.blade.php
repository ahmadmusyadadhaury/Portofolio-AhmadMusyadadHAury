<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio of Ahmad Musyadad Haury, a Front-End Developer passionate about building modern, responsive, and user-friendly web applications.">
    <title>Ahmad Musyadad Haury | Front-End Developer</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Boxicons for modern icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        h1, h2, h3, h4, h5, h6, .outfit { font-family: 'Outfit', sans-serif; }
        
        /* Glassmorphism utilities */
        .glass-nav {
            background: rgba(9, 9, 14, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .glass-card:hover {
            border-color: rgba(0, 245, 212, 0.4);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px -10px rgba(0, 245, 212, 0.2);
        }
        
        /* Glowing & Gradient utilities */
        .text-gradient {
            background: linear-gradient(135deg, #00f5d4 0%, #9d4edd 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Background patterns */
        .bg-grid {
            background-size: 40px 40px;
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #09090e; }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #00f5d4; }

        /* Timeline */
        .timeline-line {
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: rgba(255, 255, 255, 0.1);
        }
        .timeline-dot {
            position: relative;
        }
        .timeline-dot::before {
            content: '';
            position: absolute;
            left: -33px;
            top: 6px;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #00f5d4;
            box-shadow: 0 0 15px #00f5d4;
            border: 3px solid #09090e;
            z-index: 10;
        }

        /* Cursor Glow Effect */
        .cursor-glow {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(157,78,221,0.08) 0%, rgba(0,0,0,0) 60%);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            transform: translate(-50%, -50%);
            transition: width 0.2s, height 0.2s;
        }

        /* Scroll Progress */
        #scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: linear-gradient(90deg, var(--color-neon-purple), var(--color-neon-magenta));
            z-index: 10000;
        }

        /* Loading Screen */
        #loader {
            position: fixed;
            inset: 0;
            background: #09090e;
            z-index: 99999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.5s ease;
        }
        .loader-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }
        .spinner {
            width: 40px;
            height: 40px;
            border: 3px solid rgba(0, 245, 212, 0.2);
            border-radius: 50%;
            border-top-color: var(--color-neon-cyan);
            animation: spin 1s ease-in-out infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-dark-bg text-slate-300 antialiased overflow-x-hidden selection:bg-neon-cyan/30 selection:text-white">
    
    <!-- Loading Screen -->
    <div id="loader">
        <div class="loader-content">
            <div class="spinner"></div>
            <div class="text-neon-cyan font-medium tracking-widest text-sm outfit animate-pulse">LOADING</div>
        </div>
    </div>

    <!-- Cursor Glow -->
    <div class="cursor-glow hidden md:block" id="cursor-glow"></div>

    <!-- Scroll Progress -->
    <div id="scroll-progress"></div>

    <!-- Background Layers -->
    <div class="fixed inset-0 z-[-1] bg-grid pointer-events-none opacity-30"></div>
    <div class="fixed top-[-20%] left-[-10%] w-[60%] h-[60%] bg-neon-cyan/10 blur-[120px] rounded-full pointer-events-none"></div>
    <div class="fixed bottom-[-20%] right-[-10%] w-[60%] h-[60%] bg-[#9d4edd]/10 blur-[120px] rounded-full pointer-events-none"></div>

    <!-- Navbar -->
    <header class="fixed top-0 w-full z-50 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-6 md:px-12 h-20 flex items-center justify-between">
            <a href="#" class="text-2xl font-bold tracking-tighter text-white outfit flex items-center gap-2 group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-neon-purple to-neon-magenta p-[1px] group-hover:shadow-[0_0_15px_rgba(0,245,212,0.5)] transition-all">
                    <div class="w-full h-full bg-dark-bg rounded-xl flex items-center justify-center">
                        <span class="text-gradient">A</span>
                    </div>
                </div>
                Haury<span class="text-neon-cyan">.</span>
            </a>
            
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
                <a href="#home" class="hover:text-neon-cyan transition-colors">Home</a>
                <a href="#about" class="hover:text-neon-cyan transition-colors">About</a>
                <a href="#skills" class="hover:text-neon-cyan transition-colors">Skills</a>
                <a href="#projects" class="hover:text-neon-cyan transition-colors">Projects</a>
                <a href="#experience" class="hover:text-neon-cyan transition-colors">Experience</a>
                <a href="#contact" class="px-5 py-2.5 rounded-full border border-neon-cyan/50 text-neon-cyan hover:bg-neon-cyan/10 transition-all">Contact</a>
            </nav>
            
            <button class="md:hidden text-2xl text-white focus:outline-none" id="mobile-menu-btn">
                <i class='bx bx-menu'></i>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div class="md:hidden hidden glass-nav absolute top-20 left-0 w-full flex-col py-6 px-6 gap-6" id="mobile-menu">
            <a href="#home" class="hover:text-neon-cyan transition-colors text-center">Home</a>
            <a href="#about" class="hover:text-neon-cyan transition-colors text-center">About</a>
            <a href="#skills" class="hover:text-neon-cyan transition-colors text-center">Skills</a>
            <a href="#projects" class="hover:text-neon-cyan transition-colors text-center">Projects</a>
            <a href="#experience" class="hover:text-neon-cyan transition-colors text-center">Experience</a>
            <a href="#contact" class="hover:text-neon-cyan transition-colors text-center">Contact</a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 md:px-12">
        
        <!-- Hero Section -->
        <section id="home" class="min-h-screen flex flex-col justify-center pt-20 relative">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1 flex flex-col gap-6" data-aos="fade-up" data-aos-duration="1000">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-neon-cyan/30 bg-neon-cyan/5 w-max">
                        <span class="w-2 h-2 rounded-full bg-neon-cyan animate-pulse"></span>
                        <span class="text-neon-cyan text-sm font-medium">Available for work</span>
                    </div>
                    
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-[1.1] outfit">
                        Hi, I'm <br>
                        <span class="text-gradient">Ahmad Musyadad</span> <br>
                        Haury.
                    </h1>
                    
                    <h2 class="text-2xl md:text-3xl font-medium text-slate-300 outfit h-10">
                        <span class="typed-text text-neon-cyan drop-shadow-[0_0_8px_rgba(0,245,212,0.8)]"></span>
                    </h2>
                    
                    <p class="text-lg text-slate-400 max-w-lg leading-relaxed">
                        Passionate Front-End Developer specializing in building responsive, modern, and user-friendly web applications.
                    </p>
                    
                    <div class="flex flex-wrap items-center gap-4 mt-4">
                        <a href="#contact" class="px-8 py-3.5 rounded-full bg-gradient-to-r from-neon-purple to-neon-magenta hover:from-neon-magenta hover:to-neon-purple text-white font-semibold hover:shadow-[0_0_20px_rgba(157,78,221,0.4)] transition-all flex items-center gap-2">
                            <i class='bx bx-paper-plane'></i> Contact Me
                        </a>
                        <a href="#projects" class="px-8 py-3.5 rounded-full border border-slate-700 hover:border-neon-cyan text-white hover:bg-neon-cyan/5 transition-all flex items-center gap-2">
                            <i class='bx bx-briefcase'></i> View Projects
                        </a>
                        <a href="{{ asset('CV_Ahmad_Musyadad_Haury.pdf') }}" target="_blank" download class="px-8 py-3.5 rounded-full border border-slate-700 hover:border-neon-cyan text-white hover:bg-neon-cyan/5 transition-all flex items-center gap-2">
                            <i class='bx bx-download'></i> Download CV
                        </a>
                    </div>
                </div>
                
                <div class="order-1 lg:order-2 flex justify-center lg:justify-end relative" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="relative w-[300px] h-[300px] md:w-[450px] md:h-[450px] flex items-center justify-center">
                        <div class="absolute inset-0 border border-neon-cyan/20 rounded-full animate-[spin_20s_linear_infinite]"></div>
                        <div class="absolute inset-6 border border-dashed border-[#9d4edd]/30 rounded-full animate-[spin_15s_linear_infinite_reverse]"></div>
                        
                        <div class="absolute inset-12 bg-gradient-to-tr from-white/10 to-transparent rounded-full border border-white/10 overflow-hidden shadow-2xl flex items-center justify-center">
                            <!-- Letakkan foto Anda di folder public/images dengan nama profile.jpg -->
                            <img src="{{ asset('images/profile.jpg') }}" alt="Ahmad Musyadad Haury" class="w-full h-full object-cover opacity-90 transition-all duration-500 hover:scale-105" onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=Ahmad+Musyadad+Haury&size=512&background=0b1120&color=38bdf8';">
                        </div>
                        
                        <!-- Floating Tech Icons -->
                        <div class="absolute top-[10%] left-[10%] glass-card p-3 rounded-2xl animate-bounce" style="animation-duration: 3s;">
                            <i class='bx bxl-react text-4xl text-[#61DAFB] drop-shadow-[0_0_8px_rgba(97,218,251,0.5)]'></i>
                        </div>
                        <div class="absolute bottom-[20%] right-[5%] glass-card p-3 rounded-2xl animate-bounce" style="animation-duration: 4s; animation-delay: 1s;">
                            <i class='bx bxl-vuejs text-4xl text-[#4FC08D] drop-shadow-[0_0_8px_rgba(79,192,141,0.5)]'></i>
                        </div>
                        <div class="absolute bottom-[10%] left-[15%] glass-card p-3 rounded-2xl animate-bounce" style="animation-duration: 3.5s; animation-delay: 0.5s;">
                            <i class='bx bxl-tailwind-css text-4xl text-[#38B2AC] drop-shadow-[0_0_8px_rgba(56,178,172,0.5)]'></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce flex flex-col items-center gap-2">
                <span class="text-sm text-slate-400">Scroll Down</span>
                <i class='bx bx-chevron-down text-2xl text-neon-cyan'></i>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-24">
            <div class="flex items-center gap-4 mb-16" data-aos="fade-right">
                <h2 class="text-3xl md:text-4xl font-bold text-white outfit">About Me</h2>
                <div class="h-[1px] bg-gradient-to-r from-neon-purple to-transparent flex-grow max-w-[200px]"></div>
            </div>
            
            <div class="grid lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7 glass-card p-8 md:p-10 rounded-3xl relative overflow-hidden group" data-aos="fade-up">
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-neon-cyan/10 blur-[80px] rounded-full group-hover:bg-neon-cyan/20 transition-all duration-700"></div>
                    <p class="text-slate-300 leading-relaxed text-lg mb-6">
                        Front-End Developer with hands-on experience in developing responsive and scalable web applications for educational institutions and provincial-scale digital systems. Skilled in building modern user interfaces using <span class="text-neon-cyan font-medium">Vue.js, ReactJS, Next.js, JavaScript, Laravel, and REST API integration.</span>
                    </p>
                </div>
                
                <div class="lg:col-span-5 grid grid-cols-2 gap-4" data-aos="fade-left">
                    <div class="glass-card p-6 rounded-2xl flex flex-col justify-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-neon-cyan/10 flex items-center justify-center text-neon-cyan">
                            <i class='bx bx-briefcase text-2xl'></i>
                        </div>
                        <h3 class="text-3xl font-bold text-white outfit">2+ <span class="text-lg text-slate-400 font-normal">Years</span></h3>
                        <p class="text-sm text-slate-400">Experience</p>
                    </div>
                    <div class="glass-card p-6 rounded-2xl flex flex-col justify-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-neon-cyan/10 flex items-center justify-center text-neon-cyan">
                            <i class='bx bx-folder-open text-2xl'></i>
                        </div>
                        <h3 class="text-3xl font-bold text-white outfit">10+ <span class="text-lg text-slate-400 font-normal">Projects</span></h3>
                        <p class="text-sm text-slate-400">Completed</p>
                    </div>
                    <div class="glass-card p-6 rounded-2xl col-span-2 flex flex-col justify-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-neon-cyan/10 flex items-center justify-center text-neon-cyan">
                            <i class='bx bx-code-alt text-2xl'></i>
                        </div>
                        <h3 class="text-xl font-bold text-white outfit">Technologies</h3>
                        <p class="text-sm text-slate-400">ReactJS, VueJS, Laravel, Tailwind CSS</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tech Stack Section -->
        <section id="skills" class="py-24">
            <div class="flex items-center gap-4 mb-16" data-aos="fade-right">
                <h2 class="text-3xl md:text-4xl font-bold text-white outfit">Tech Stack</h2>
                <div class="h-[1px] bg-gradient-to-r from-neon-purple to-transparent flex-grow max-w-[200px]"></div>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                <!-- Tech Cards -->
                @php
                    $techs = [
                        ['name' => 'HTML', 'icon' => 'bxl-html5', 'color' => '#E34F26'],
                        ['name' => 'CSS', 'icon' => 'bxl-css3', 'color' => '#1572B6'],
                        ['name' => 'JavaScript', 'icon' => 'bxl-javascript', 'color' => '#F7DF1E'],
                        ['name' => 'ReactJS', 'icon' => 'bxl-react', 'color' => '#61DAFB'],
                        ['name' => 'VueJS', 'icon' => 'bxl-vuejs', 'color' => '#4FC08D'],
                        ['name' => 'Laravel', 'icon' => 'bxl-php', 'color' => '#FF2D20'],
                        ['name' => 'PHP', 'icon' => 'bxl-php', 'color' => '#777BB4'],
                        ['name' => 'Tailwind CSS', 'icon' => 'bxl-tailwind-css', 'color' => '#38B2AC'],
                        ['name' => 'Bootstrap', 'icon' => 'bxl-bootstrap', 'color' => '#7952B3'],
                        ['name' => 'MySQL', 'icon' => 'bxs-data', 'color' => '#4479A1'],
                        ['name' => 'GitHub', 'icon' => 'bxl-github', 'color' => '#ffffff'],
                        ['name' => 'Figma', 'icon' => 'bxl-figma', 'color' => '#F24E1E']
                    ];
                @endphp

                @foreach($techs as $index => $tech)
                <div class="glass-card p-6 rounded-2xl flex flex-col items-center justify-center gap-4 group cursor-pointer" data-aos="fade-up" data-aos-delay="{{ ($index % 4) * 100 }}">
                    <i class='bx {{ $tech['icon'] }} text-5xl transition-transform duration-300 group-hover:scale-110 group-hover:drop-shadow-[0_0_10px_{{ $tech['color'] }}]' style="color: {{ $tech['color'] }}"></i>
                    <span class="text-sm font-medium text-slate-300 group-hover:text-white transition-colors">{{ $tech['name'] }}</span>
                </div>
                @endforeach
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="py-24">
            <div class="flex items-center gap-4 mb-16" data-aos="fade-right">
                <h2 class="text-3xl md:text-4xl font-bold text-white outfit">Featured Projects</h2>
                <div class="h-[1px] bg-gradient-to-r from-neon-purple to-transparent flex-grow max-w-[200px]"></div>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Project 1 -->
                <div class="glass-card rounded-3xl overflow-hidden flex flex-col group" data-aos="fade-up">
                    <div class="h-56 relative overflow-hidden bg-dark-bg p-6 flex items-end justify-center">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#09090e] to-transparent z-10"></div>
                        <!-- Browser Mockup -->
                        <div class="w-full h-full bg-white/5 rounded-t-lg border border-white/10 border-b-0 relative z-0 transform transition-transform duration-500 group-hover:-translate-y-2 group-hover:scale-105">
                            <div class="h-6 border-b border-white/10 flex items-center px-3 gap-1.5">
                                <div class="w-2.5 h-2.5 rounded-full bg-red-500/80"></div>
                                <div class="w-2.5 h-2.5 rounded-full bg-yellow-500/80"></div>
                                <div class="w-2.5 h-2.5 rounded-full bg-green-500/80"></div>
                            </div>
                            <div class="w-full h-full bg-cover bg-top" style="background-image: url('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=2070&auto=format&fit=crop');"></div>
                        </div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow relative z-20">
                        <h3 class="text-2xl font-bold text-white mb-3 outfit group-hover:text-neon-cyan transition-colors">SIT Al Madinah Bogor</h3>
                        <p class="text-slate-400 text-sm mb-6 flex-grow leading-relaxed">
                            Official school profile website with responsive modern interface and educational information system.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-8">
                            <span class="px-3 py-1 bg-neon-cyan/10 text-neon-cyan text-xs font-medium rounded-full">Laravel</span>
                            <span class="px-3 py-1 bg-neon-cyan/10 text-neon-cyan text-xs font-medium rounded-full">VueJS</span>
                            <span class="px-3 py-1 bg-neon-cyan/10 text-neon-cyan text-xs font-medium rounded-full">Tailwind</span>
                        </div>
                        <div class="flex items-center gap-4 mt-auto">
                            <a href="https://almadinahbogor.sch.id" target="_blank" class="flex-1 text-center py-2.5 rounded-xl bg-white text-dark-bg font-semibold hover:bg-neon-cyan transition-colors flex items-center justify-center gap-2 text-sm">
                                <i class='bx bx-link-external'></i> Live Preview
                            </a>
                            <a href="https://github.com/ahmadmusyadadhaury" target="_blank" class="w-10 h-10 rounded-xl border border-white/10 flex items-center justify-center hover:bg-white/5 transition-colors text-white">
                                <i class='bx bxl-github text-xl'></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Project 2 -->
                <div class="glass-card rounded-3xl overflow-hidden flex flex-col group" data-aos="fade-up" data-aos-delay="100">
                    <div class="h-56 relative overflow-hidden bg-dark-bg p-6 flex items-end justify-center">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#09090e] to-transparent z-10"></div>
                        <div class="w-full h-full bg-white/5 rounded-t-lg border border-white/10 border-b-0 relative z-0 transform transition-transform duration-500 group-hover:-translate-y-2 group-hover:scale-105">
                            <div class="h-6 border-b border-white/10 flex items-center px-3 gap-1.5">
                                <div class="w-2.5 h-2.5 rounded-full bg-red-500/80"></div>
                                <div class="w-2.5 h-2.5 rounded-full bg-yellow-500/80"></div>
                                <div class="w-2.5 h-2.5 rounded-full bg-green-500/80"></div>
                            </div>
                            <div class="w-full h-full bg-cover bg-top" style="background-image: url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=2070&auto=format&fit=crop');"></div>
                        </div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow relative z-20">
                        <h3 class="text-2xl font-bold text-white mb-3 outfit group-hover:text-neon-cyan transition-colors">SIPPRA Jabar</h3>
                        <p class="text-slate-400 text-sm mb-6 flex-grow leading-relaxed">
                            Web-based information system with responsive dashboard and digital management features.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-8">
                            <span class="px-3 py-1 bg-neon-cyan/10 text-neon-cyan text-xs font-medium rounded-full">ReactJS</span>
                            <span class="px-3 py-1 bg-neon-cyan/10 text-neon-cyan text-xs font-medium rounded-full">Laravel</span>
                            <span class="px-3 py-1 bg-neon-cyan/10 text-neon-cyan text-xs font-medium rounded-full">MySQL</span>
                        </div>
                        <div class="flex items-center gap-4 mt-auto">
                            <a href="https://sippra-jabar.com" target="_blank" class="flex-1 text-center py-2.5 rounded-xl bg-white text-dark-bg font-semibold hover:bg-neon-cyan transition-colors flex items-center justify-center gap-2 text-sm">
                                <i class='bx bx-link-external'></i> Live Preview
                            </a>
                            <a href="https://github.com/ahmadmusyadadhaury" target="_blank" class="w-10 h-10 rounded-xl border border-white/10 flex items-center justify-center hover:bg-white/5 transition-colors text-white">
                                <i class='bx bxl-github text-xl'></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="glass-card rounded-3xl overflow-hidden flex flex-col group" data-aos="fade-up" data-aos-delay="200">
                    <div class="h-56 relative overflow-hidden bg-dark-bg p-6 flex items-end justify-center">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#09090e] to-transparent z-10"></div>
                        <div class="w-full h-full bg-white/5 rounded-t-lg border border-white/10 border-b-0 relative z-0 transform transition-transform duration-500 group-hover:-translate-y-2 group-hover:scale-105">
                            <div class="h-6 border-b border-white/10 flex items-center px-3 gap-1.5">
                                <div class="w-2.5 h-2.5 rounded-full bg-red-500/80"></div>
                                <div class="w-2.5 h-2.5 rounded-full bg-yellow-500/80"></div>
                                <div class="w-2.5 h-2.5 rounded-full bg-green-500/80"></div>
                            </div>
                            <div class="w-full h-full bg-cover bg-top" style="background-image: url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=2072&auto=format&fit=crop');"></div>
                        </div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow relative z-20">
                        <h3 class="text-2xl font-bold text-white mb-3 outfit group-hover:text-neon-cyan transition-colors">PMB SIT Al Madinah</h3>
                        <p class="text-slate-400 text-sm mb-6 flex-grow leading-relaxed">
                            Modern student registration landing page with clean responsive design.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-8">
                            <span class="px-3 py-1 bg-neon-cyan/10 text-neon-cyan text-xs font-medium rounded-full">VueJS</span>
                            <span class="px-3 py-1 bg-neon-cyan/10 text-neon-cyan text-xs font-medium rounded-full">Tailwind</span>
                            <span class="px-3 py-1 bg-neon-cyan/10 text-neon-cyan text-xs font-medium rounded-full">API</span>
                        </div>
                        <div class="flex items-center gap-4 mt-auto">
                            <a href="https://pmbsit.almadinahbogor.sch.id" target="_blank" class="flex-1 text-center py-2.5 rounded-xl bg-white text-dark-bg font-semibold hover:bg-neon-cyan transition-colors flex items-center justify-center gap-2 text-sm">
                                <i class='bx bx-link-external'></i> Live Preview
                            </a>
                            <a href="https://github.com/ahmadmusyadadhaury" target="_blank" class="w-10 h-10 rounded-xl border border-white/10 flex items-center justify-center hover:bg-white/5 transition-colors text-white">
                                <i class='bx bxl-github text-xl'></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Experience Section -->
        <section id="experience" class="py-24">
            <div class="flex items-center gap-4 mb-16" data-aos="fade-right">
                <h2 class="text-3xl md:text-4xl font-bold text-white outfit">Experience</h2>
                <div class="h-[1px] bg-gradient-to-r from-neon-purple to-transparent flex-grow max-w-[200px]"></div>
            </div>
            
            <div class="max-w-3xl relative pl-10 md:pl-12" data-aos="fade-up">
                <div class="timeline-line"></div>
                
                <!-- Exp 1 -->
                <div class="timeline-dot mb-12 glass-card p-6 md:p-8 rounded-3xl relative">
                    <span class="text-neon-cyan text-sm font-semibold tracking-wider uppercase mb-2 block">Present</span>
                    <h3 class="text-2xl font-bold text-white outfit mb-1">Front-End Developer</h3>
                    <h4 class="text-slate-400 font-medium mb-4">Freelance / Remote</h4>
                    <p class="text-slate-300 leading-relaxed text-sm md:text-base">
                        Mengembangkan aplikasi web responsif dan interaktif menggunakan ReactJS dan VueJS. Berfokus pada implementasi UI/UX yang modern, integrasi API, dan optimalisasi performa frontend.
                    </p>
                </div>

                <!-- Exp 2 -->
                <div class="timeline-dot mb-12 glass-card p-6 md:p-8 rounded-3xl relative">
                    <span class="text-neon-cyan text-sm font-semibold tracking-wider uppercase mb-2 block">2024 - 2025</span>
                    <h3 class="text-2xl font-bold text-white outfit mb-1">Web Developer</h3>
                    <h4 class="text-slate-400 font-medium mb-4">SIT Al Madinah Bogor</h4>
                    <p class="text-slate-300 leading-relaxed text-sm md:text-base">
                        Membangun sistem informasi akademik dan landing page PPDB. Bertanggung jawab dari tahap desain hingga deployment menggunakan ekosistem Laravel dan Tailwind CSS.
                    </p>
                </div>

                <!-- Exp 3 -->
                <div class="timeline-dot glass-card p-6 md:p-8 rounded-3xl relative">
                    <span class="text-neon-cyan text-sm font-semibold tracking-wider uppercase mb-2 block">2023 - 2024</span>
                    <h3 class="text-2xl font-bold text-white outfit mb-1">IT Staff</h3>
                    <h4 class="text-slate-400 font-medium mb-4">Instansi Pendidikan</h4>
                    <p class="text-slate-300 leading-relaxed text-sm md:text-base">
                        Memelihara infrastruktur IT, mengelola jaringan, dan memberikan dukungan teknis. Mulai mempelajari dan mengimplementasikan solusi berbasis web untuk manajemen internal.
                    </p>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-24 mb-10">
            <div class="glass-card p-8 md:p-16 rounded-[3rem] relative overflow-hidden" data-aos="zoom-in">
                <!-- Abstract Elements -->
                <div class="absolute -top-32 -right-32 w-96 h-96 bg-[#9d4edd]/20 blur-[100px] rounded-full"></div>
                <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-neon-cyan/20 blur-[100px] rounded-full"></div>
                
                <div class="relative z-10 grid lg:grid-cols-2 gap-16">
                    <div>
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-neon-cyan/30 bg-neon-cyan/5 w-max mb-6">
                            <i class='bx bx-envelope text-neon-cyan'></i>
                            <span class="text-neon-cyan text-sm font-medium">Contact Me</span>
                        </div>
                        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 outfit leading-tight">Let's build something <span class="text-gradient">awesome</span> together!</h2>
                        <p class="text-slate-400 mb-10 text-lg leading-relaxed">
                            Saya terbuka untuk peluang kerja full-time, part-time, maupun freelance. Jika Anda memiliki proyek yang membutuhkan sentuhan Frontend modern, mari diskusikan.
                        </p>
                        
                        <div class="flex flex-col gap-6">
                            <a href="mailto:ahmadmusyadadhaury@gmail.com" class="flex items-center gap-4 group">
                                <div class="w-14 h-14 rounded-2xl bg-white/5 flex items-center justify-center border border-white/5 group-hover:border-neon-cyan/50 group-hover:bg-neon-cyan/10 group-hover:shadow-[0_0_15px_rgba(0,245,212,0.3)] transition-all">
                                    <i class='bx bx-envelope text-2xl text-slate-300 group-hover:text-neon-cyan'></i>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-400 mb-1">Email</p>
                                    <p class="text-white font-medium group-hover:text-neon-cyan transition-colors">ahmadmusyadadhaury@gmail.com</p>
                                </div>
                            </a>
                            <a href="https://wa.me/6289507135674" target="_blank" class="flex items-center gap-4 group">
                                <div class="w-14 h-14 rounded-2xl bg-white/5 flex items-center justify-center border border-white/5 group-hover:border-neon-cyan/50 group-hover:bg-neon-cyan/10 group-hover:shadow-[0_0_15px_rgba(0,245,212,0.3)] transition-all">
                                    <i class='bx bxl-whatsapp text-2xl text-slate-300 group-hover:text-neon-cyan'></i>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-400 mb-1">WhatsApp</p>
                                    <p class="text-white font-medium group-hover:text-neon-cyan transition-colors">0895-0713-5674</p>
                                </div>
                            </a>
                        </div>

                        <div class="flex items-center gap-4 mt-10">
                            <a href="https://github.com/ahmadmusyadadhaury" target="_blank" class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center border border-white/5 hover:border-neon-cyan/50 hover:bg-neon-cyan/10 hover:shadow-[0_0_15px_rgba(0,245,212,0.3)] text-slate-300 hover:text-neon-cyan transition-all hover:-translate-y-1">
                                <i class='bx bxl-github text-xl'></i>
                            </a>
                            <a href="https://www.linkedin.com/in/ahmad-musyadad-haury-9232a3311" target="_blank" class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center border border-white/5 hover:border-neon-cyan/50 hover:bg-neon-cyan/10 hover:shadow-[0_0_15px_rgba(0,245,212,0.3)] text-slate-300 hover:text-neon-cyan transition-all hover:-translate-y-1">
                                <i class='bx bxl-linkedin text-xl'></i>
                            </a>
                            <a href="#" class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center border border-white/5 hover:border-neon-cyan/50 hover:bg-neon-cyan/10 hover:shadow-[0_0_15px_rgba(0,245,212,0.3)] text-slate-300 hover:text-neon-cyan transition-all hover:-translate-y-1">
                                <i class='bx bx-globe text-xl'></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Contact Form -->
                    <div class="bg-dark-bg/50 p-8 rounded-3xl border border-white/5 backdrop-blur-md">
                        <h3 class="text-2xl font-bold text-white outfit mb-6">Send a Message</h3>
                        <form class="flex flex-col gap-4">
                            <div>
                                <label class="text-sm text-slate-400 mb-2 block">Your Name</label>
                                <input type="text" placeholder="John Doe" class="w-full bg-white/5 border border-white/5 rounded-xl px-4 py-3.5 text-white focus:outline-none focus:border-neon-cyan/50 focus:ring-1 focus:ring-neon-cyan/50 transition-all">
                            </div>
                            <div>
                                <label class="text-sm text-slate-400 mb-2 block">Your Email</label>
                                <input type="email" placeholder="john@example.com" class="w-full bg-white/5 border border-white/5 rounded-xl px-4 py-3.5 text-white focus:outline-none focus:border-neon-cyan/50 focus:ring-1 focus:ring-neon-cyan/50 transition-all">
                            </div>
                            <div>
                                <label class="text-sm text-slate-400 mb-2 block">Message</label>
                                <textarea rows="4" placeholder="How can I help you?" class="w-full bg-white/5 border border-white/5 rounded-xl px-4 py-3.5 text-white focus:outline-none focus:border-neon-cyan/50 focus:ring-1 focus:ring-neon-cyan/50 transition-all resize-none"></textarea>
                            </div>
                            <button type="submit" class="mt-2 w-full py-4 rounded-xl bg-gradient-to-r from-neon-purple to-neon-magenta hover:from-neon-magenta hover:to-neon-purple text-white font-bold hover:shadow-[0_0_20px_rgba(157,78,221,0.4)] transition-all flex items-center justify-center gap-2">
                                Send Message <i class='bx bx-send'></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
    </main>

    <footer class="border-t border-white/5 py-8 text-center relative z-10 bg-dark-bg">
        <p class="text-slate-500 text-sm flex items-center justify-center gap-1">
            Made with <i class='bx bxs-heart text-red-500'></i> by <span class="text-white font-medium">Ahmad Musyadad Haury</span> &copy; 2026
        </p>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>
        // Loading Screen
        window.addEventListener('load', () => {
            const loader = document.getElementById('loader');
            setTimeout(() => {
                loader.style.opacity = '0';
                setTimeout(() => {
                    loader.style.display = 'none';
                    // Initialize AOS after loader is gone
                    AOS.init({
                        once: true,
                        offset: 50,
                        duration: 800,
                        easing: 'ease-out-cubic',
                    });
                }, 500);
            }, 1000);
        });

        // Typing Animation
        if(document.querySelector('.typed-text')) {
            new Typed('.typed-text', {
                strings: ['Front-End Developer', 'ReactJS Developer', 'Web Developer', 'UI/UX Enthusiast'],
                typeSpeed: 50,
                backSpeed: 30,
                backDelay: 2000,
                loop: true
            });
        }

        // Scroll Progress
        window.addEventListener('scroll', () => {
            const scrollProgress = document.getElementById('scroll-progress');
            if (scrollProgress) {
                const scrollPx = document.documentElement.scrollTop;
                const winHeightPx = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrolled = `${scrollPx / winHeightPx * 100}%`;
                scrollProgress.style.width = scrolled;
            }
        });

        // Cursor Glow
        const cursorGlow = document.getElementById('cursor-glow');
        if (cursorGlow) {
            document.addEventListener('mousemove', (e) => {
                cursorGlow.style.left = e.clientX + 'px';
                cursorGlow.style.top = e.clientY + 'px';
            });
        }

        // Navbar Blur on Scroll
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (navbar) {
                if (window.scrollY > 50) {
                    navbar.classList.add('glass-nav');
                } else {
                    navbar.classList.remove('glass-nav');
                }
            }
        });

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuBtn && mobileMenu) {
            const icon = mobileMenuBtn.querySelector('i');
            
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                mobileMenu.classList.toggle('flex');
                if (mobileMenu.classList.contains('hidden')) {
                    icon.classList.remove('bx-x');
                    icon.classList.add('bx-menu');
                } else {
                    icon.classList.remove('bx-menu');
                    icon.classList.add('bx-x');
                }
            });

            // Hide mobile menu on link click
            document.querySelectorAll('#mobile-menu a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('flex');
                    icon.classList.remove('bx-x');
                    icon.classList.add('bx-menu');
                });
            });
        }
    </script>
</body>
</html>
