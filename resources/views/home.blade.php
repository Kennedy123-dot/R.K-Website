<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $siteDescription }}">
    <meta name="keywords" content="developer, portfolio, laravel, full-stack, rukundo kennedy">
    <meta name="author" content="Rukundo Kennedy">
    <meta property="og:title" content="{{ $siteTitle }}">
    <meta property="og:description" content="{{ $siteDescription }}">
    <meta property="og:image" content="{{ asset('storage/profile/rukundo-kennedy.jpg') }}">
    <meta property="og:url" content="{{ url('/') }}">

    <title>{{ $siteTitle }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        .dark body {
            background-color: #0f172a;
        }
        .floating {
            animation: floating 4s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        .skill-bar {
            transition: width 1.2s ease-in-out;
        }
        .nav-link.active {
            color: #1e40af !important;
            font-weight: 600;
        }
        .dark .nav-link.active {
            color: #60a5fa !important;
        }
    </style>
</head>
<body class="text-slate-900 dark:text-slate-100 transition-colors duration-300">

    <!-- Navigation -->
    <nav id="navbar" class="fixed top-0 w-full bg-white/90 dark:bg-slate-900/90 backdrop-blur-sm z-50 border-b border-slate-200 dark:border-slate-800 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-3">
                    <!-- Profile Image -->
                    <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-blue-600">
                        <img src="{{ asset('storage/profile/rukundo-kennedy.jpg') }}" alt="Rukundo Kennedy" class="w-full h-full object-cover">
                    </div>
                    <a href="/" class="text-xl font-bold text-slate-900 dark:text-white">Rukundo Kennedy</a>
                </div>
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#home" class="nav-link text-slate-700 dark:text-slate-300 hover:text-blue-800 dark:hover:text-blue-400 transition">Home</a>
                    <a href="#skills" class="nav-link text-slate-700 dark:text-slate-300 hover:text-blue-800 dark:hover:text-blue-400 transition">Skills</a>
                    <a href="#projects" class="nav-link text-slate-700 dark:text-slate-300 hover:text-blue-800 dark:hover:text-blue-400 transition">Projects</a>
                    <a href="#contact" class="nav-link text-slate-700 dark:text-slate-300 hover:text-blue-800 dark:hover:text-blue-400 transition">Contact</a>
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="text-blue-800 dark:text-blue-400 font-medium">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-blue-800 dark:text-blue-400 font-medium">Login</a>
                    @endauth
                    <button id="themeToggle" class="p-2 rounded-full bg-slate-200 dark:bg-slate-700">
                        <i id="themeIcon" class="fas fa-moon text-slate-700 dark:text-yellow-400"></i>
                    </button>
                </div>
                <div class="md:hidden">
                    <button id="mobileMenuButton" class="p-2 rounded-md text-slate-700 dark:text-slate-300">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="fixed inset-0 bg-white dark:bg-slate-900 z-50 hidden  flex-col items-center justify-center space-y-8 md:hidden">
        <a href="#home" class="text-2xl font-medium text-slate-900 dark:text-white">Home</a>
        <a href="#skills" class="text-2xl font-medium text-slate-900 dark:text-white">Skills</a>
        <a href="#projects" class="text-2xl font-medium text-slate-900 dark:text-white">Projects</a>
        <a href="#contact" class="text-2xl font-medium text-slate-900 dark:text-white">Contact</a>
        <button id="closeMobileMenu" class="absolute top-6 right-6 text-slate-700 dark:text-slate-300">
            <i class="fas fa-times text-2xl"></i>
        </button>
    </div>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-slate-900 dark:to-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 dark:opacity-10"></div>
        <div class="relative z-10 text-center px-6 max-w-4xl mx-auto">
            <div class="mb-6 flex justify-center">
                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white dark:border-slate-700 shadow-lg">
                    <img src="{{ asset('storage/profile/rukundo-kennedy.jpg') }}" alt="Rukundo Kennedy" class="w-full h-full object-cover">
                </div>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-4 text-slate-900 dark:text-white">
                Hi, I'm <span class="text-blue-800 dark:text-blue-400">Rukundo Kennedy</span>
            </h1>
            <h2 class="text-xl md:text-2xl mb-6 font-medium text-slate-700 dark:text-slate-300">
                Full-Stack Developer & UI/UX Designer
            </h2>
            <p class="text-lg md:text-xl mb-10 max-w-2xl mx-auto text-slate-600 dark:text-slate-400">
                Building digital solutions that are scalable, secure, and user-centered.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#projects" class="bg-blue-800 text-white px-8 py-3.5 rounded-lg font-semibold hover:bg-blue-900 transition transform hover:scale-105 shadow-md">
                    View My Work
                </a>
                <a href="#contact" class="border border-blue-800 text-blue-800 dark:text-blue-400 px-8 py-3.5 rounded-lg font-semibold hover:bg-blue-50 dark:hover:bg-slate-800 transition">
                    Hire Me
                </a>
            </div>
        </div>
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
            <a href="#skills" class="text-blue-800 dark:text-blue-400">
                <i class="fas fa-chevron-down text-2xl"></i>
            </a>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 bg-slate-50 dark:bg-slate-900">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 text-slate-900 dark:text-white">My Skills</h2>
            <p class="text-center text-slate-600 dark:text-slate-400 mb-12 max-w-2xl mx-auto">
                Organized by category for clarity and focus.
            </p>

            <div class="mb-10 max-w-md mx-auto">
                <div class="relative">
                    <input type="text" id="skillSearch" placeholder="Search skills..." class="w-full p-4 pl-12 border border-slate-300 dark:border-slate-700 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-700">
                    <i class="fas fa-search absolute left-4 top-4 text-slate-400"></i>
                </div>
            </div>

            @foreach($skills as $category => $categorySkills)
            <div class="mb-12">
                <h3 class="text-2xl font-semibold mb-6 text-slate-800 dark:text-white border-l-4 border-blue-800 dark:border-blue-500 pl-4">
                    {{ $category }}
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($categorySkills as $skill)
                    <div class="skill-item bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 hover:shadow-md transition">
                        <h3 class="font-semibold text-lg mb-3 text-slate-900 dark:text-white">{{ $skill->name }}</h3>
                        <div class="w-full bg-slate-200 dark:bg-slate-700 rounded-full h-2.5 mb-2">
                            <div class="skill-bar bg-blue-800 dark:bg-blue-500 h-2.5 rounded-full" style="width: {{ $skill->proficiency }}%"></div>
                        </div>
                        <span class="text-sm text-slate-600 dark:text-slate-400">{{ $skill->proficiency }}% Proficient</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-20 bg-white dark:bg-slate-900">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 text-slate-900 dark:text-white">Featured Projects</h2>
            <p class="text-center text-slate-600 dark:text-slate-400 mb-12 max-w-2xl mx-auto">
                Real-world applications built with modern tech stacks.
            </p>

            <div class="mb-10 max-w-md mx-auto">
                <div class="relative">
                    <input type="text" id="projectSearch" placeholder="Search projects..." class="w-full p-4 pl-12 border border-slate-300 dark:border-slate-700 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-700">
                    <i class="fas fa-search absolute left-4 top-4 text-slate-400"></i>
                </div>
            </div>

            <div id="projectsContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                <div class="project-item bg-white dark:bg-slate-800 rounded-xl overflow-hidden shadow-md hover:shadow-xl transition transform hover:-translate-y-1 floating border border-slate-200 dark:border-slate-700">
                    <div class="h-48 overflow-hidden">
                        @if($project->image && file_exists(public_path('storage/' . $project->image)))
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover transition duration-500 hover:scale-105">
                        @else
                            <!-- Fallback: Use a relevant icon if image missing -->
                            <div class="w-full h-full bg-gradient-to-r from-blue-700 to-indigo-800 flex items-center justify-center">
                                <span class="text-white text-4xl">
                                    @if(str_contains(strtolower($project->title), 'ecommerce'))
                                        <i class="fas fa-shopping-cart"></i>
                                    @elseif(str_contains(strtolower($project->title), 'ai'))
                                        <i class="fas fa-robot"></i>
                                    @elseif(str_contains(strtolower($project->title), 'portfolio'))
                                        <i class="fas fa-laptop-code"></i>
                                    @else
                                        <i class="fas fa-code"></i>
                                    @endif
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2 text-slate-900 dark:text-white">{{ $project->title }}</h3>
                        <p class="text-slate-600 dark:text-slate-400 mb-4 line-clamp-3">{{ $project->description }}</p>
                        <a href="{{ $project->link }}" target="_blank" class="inline-flex items-center text-blue-800 dark:text-blue-400 font-medium hover:text-blue-900 dark:hover:text-blue-300">
                            View Project →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-slate-50 dark:bg-slate-900">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-slate-900 dark:text-white">Let’s Work Together</h2>
            <p class="text-slate-600 dark:text-slate-400 mb-10">
                Have a project in mind? I’d love to hear from you.
            </p>

            @if(session('success'))
                <div class="mb-8 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg max-w-2xl mx-auto">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6 max-w-2xl mx-auto">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <input type="text" name="name" placeholder="Your Name" required class="p-4 border border-slate-300 dark:border-slate-700 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-700">
                    <input type="email" name="email" placeholder="Your Email" required class="p-4 border border-slate-300 dark:border-slate-700 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-700">
                </div>
                <textarea name="message" rows="5" placeholder="Your Message" required class="w-full p-4 border border-slate-300 dark:border-slate-700 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-700"></textarea>
                <button type="submit" class="w-full bg-blue-800 text-white py-4 rounded-lg font-semibold hover:bg-blue-900 transition transform hover:scale-105 shadow-md">
                    Send Message
                </button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-800 text-slate-300 py-12">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <div class="flex justify-center space-x-6 mb-6">
                <a href="{{ $settings['social_twitter'] ?? '#' }}" target="_blank" class="text-slate-400 hover:text-white transition text-xl"><i class="fab fa-twitter"></i></a>
                <a href="{{ $settings['social_github'] ?? '#' }}" target="_blank" class="text-slate-400 hover:text-white transition text-xl"><i class="fab fa-github"></i></a>
                <a href="mailto:{{ $settings['contact_email'] ?? '#' }}" class="text-slate-400 hover:text-white transition text-xl"><i class="fas fa-envelope"></i></a>
                <a href="#" class="text-slate-400 hover:text-white transition text-xl"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <p class="mb-2">&copy; {{ date('Y') }} Rukundo Kennedy. All rights reserved.</p>
            <p class="text-slate-500 text-sm">Crafted with precision using Laravel & Tailwind CSS</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Dark Mode
        const toggle = document.getElementById('themeToggle');
        const icon = document.getElementById('themeIcon');
        const html = document.documentElement;

        function setTheme(theme) {
            if (theme === 'dark') {
                html.classList.add('dark');
                icon.classList.replace('fa-moon', 'fa-sun');
            } else {
                html.classList.remove('dark');
                icon.classList.replace('fa-sun', 'fa-moon');
            }
            localStorage.setItem('theme', theme);
        }

        const saved = localStorage.getItem('theme');
        if (saved) {
            setTheme(saved);
        } else {
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            setTheme(prefersDark ? 'dark' : 'light');
        }

        toggle.addEventListener('click', () => {
            const isDark = html.classList.contains('dark');
            setTheme(isDark ? 'light' : 'dark');
        });

        // Mobile Menu
        document.getElementById('mobileMenuButton').addEventListener('click', () => {
            document.getElementById('mobileMenu').classList.remove('hidden');
        });
        document.getElementById('closeMobileMenu').addEventListener('click', () => {
            document.getElementById('mobileMenu').classList.add('hidden');
        });

        // Active Navigation Highlight
        window.addEventListener('scroll', () => {
            const sections = ['home', 'skills', 'projects', 'contact'];
            const scrollPos = window.scrollY + 100;

            sections.forEach(section => {
                const elem = document.getElementById(section);
                const link = document.querySelector(`a[href="#${section}"]`);
                if (elem && link) {
                    const offsetTop = elem.offsetTop;
                    const offsetHeight = elem.offsetHeight;
                    if (scrollPos >= offsetTop && scrollPos < offsetTop + offsetHeight) {
                        document.querySelectorAll('.nav-link').forEach(a => a.classList.remove('active'));
                        link.classList.add('active');
                    }
                }
            });
        });

        // Search
        document.getElementById('skillSearch').addEventListener('input', function() {
            const val = this.value.toLowerCase();
            document.querySelectorAll('.skill-item').forEach(el => {
                el.style.display = el.textContent.toLowerCase().includes(val) ? '' : 'none';
            });
        });

        document.getElementById('projectSearch').addEventListener('input', function() {
            const val = this.value.toLowerCase();
            document.querySelectorAll('.project-item').forEach(el => {
                el.style.display = el.textContent.toLowerCase().includes(val) ? '' : 'none';
            });
        });
    </script>

</body>
</html>