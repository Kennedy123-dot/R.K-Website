<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ \App\Models\Setting::where('key', 'site_description')->value('value') }}">
    <title>{{ \App\Models\Setting::where('key', 'site_title')->value('value') }}</title>
    <script src="https://kit.fontawesome.com/YOUR_KIT.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">

    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-xl font-bold text-indigo-600 dark:text-indigo-400">Rukundo Kennedy</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#skills" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600">Skills</a>
                    <a href="#services" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600">Services</a>
                    <a href="#projects" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600">Projects</a>
                    <a href="#contact" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600">Contact</a>
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="text-indigo-600 font-medium">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-indigo-600 font-medium">Login</a>
                    @endauth
                    <!-- Dark Mode Toggle -->
                    <button id="themeToggle" class="p-2 rounded-full bg-gray-200 dark:bg-gray-700">
                        <i id="themeIcon" class="fas fa-moon text-gray-700 dark:text-yellow-300"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-20">
        <div class="max-w-4xl mx-auto text-center px-4">
            <h1 class="text-5xl font-extrabold mb-4">Hi, I'm Rukundo Kennedy</h1>
            <p class="text-xl mb-8">Full-Stack Developer & UI/UX Designer Crafting Digital Excellence</p>
            <a href="#contact" class="bg-white text-indigo-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition">Hire Me</a>
        </div>
    </header>

    <!-- Skills Section -->
    <section id="skills" class="py-16 bg-white dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800 dark:text-white">My Skills</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach(\App\Models\Skill::all() as $skill)
                <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow">
                    <h3 class="font-bold text-lg mb-2 text-gray-800 dark:text-white">{{ $skill->name }}</h3>
                    <div class="w-full bg-gray-300 rounded-full h-2.5 dark:bg-gray-600">
                        <div class="bg-indigo-600 h-2.5 rounded-full" style="width: {{ $skill->proficiency }}%"></div>
                    </div>
                    <span class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $skill->proficiency }}%</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800 dark:text-white">My Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach(\App\Models\Service::all() as $service)
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow hover:shadow-lg transition">
                    <div class="text-4xl mb-4 text-indigo-600 dark:text-indigo-400">
                        <i class="{{ $service->icon }}"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800 dark:text-white">{{ $service->title }}</h3>
                    <p class="text-gray-600 dark:text-gray-300">{{ $service->description }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-16 bg-white dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800 dark:text-white">Featured Projects</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach(\App\Models\Project::all() as $project)
                <div class="bg-gray-100 dark:bg-gray-700 rounded-lg overflow-hidden shadow">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-800 dark:text-white">{{ $project->title }}</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $project->description }}</p>
                        <a href="{{ $project->link }}" class="text-indigo-600 font-medium">View Project →</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-3xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-800 dark:text-white">Let’s Work Together</h2>
            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-1">Name</label>
                    <input type="text" name="name" required class="w-full p-3 border border-gray-300 dark:border-gray-700 rounded bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-1">Email</label>
                    <input type="email" name="email" required class="w-full p-3 border border-gray-300 dark:border-gray-700 rounded bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-1">Message</label>
                    <textarea name="message" rows="5" required class="w-full p-3 border border-gray-300 dark:border-gray-700 rounded bg-white dark:bg-gray-800 text-gray-800 dark:text-white"></textarea>
                </div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded font-semibold hover:bg-indigo-700 transition">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Rukundo Kennedy. All rights reserved.</p>
            <div class="flex justify-center space-x-4 mt-4">
                <a href="{{ \App\Models\Setting::where('key', 'social_twitter')->value('value') }}" target="_blank" class="hover:text-indigo-400"><i class="fab fa-twitter"></i></a>
                <a href="{{ \App\Models\Setting::where('key', 'social_github')->value('value') }}" target="_blank" class="hover:text-indigo-400"><i class="fab fa-github"></i></a>
                <a href="mailto:{{ \App\Models\Setting::where('key', 'contact_email')->value('value') }}" class="hover:text-indigo-400"><i class="fas fa-envelope"></i></a>
            </div>
        </div>
    </footer>

    <!-- Dark Mode Script -->
    <script>
        const toggle = document.getElementById('themeToggle');
        const icon = document.getElementById('themeIcon');
        const html = document.documentElement;

        // Check saved preference
        if (localStorage.getItem('theme') === 'dark' || 
            (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
            icon.classList.replace('fa-moon', 'fa-sun');
        }

        toggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            if (html.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
                icon.classList.replace('fa-moon', 'fa-sun');
            } else {
                localStorage.setItem('theme', 'light');
                icon.classList.replace('fa-sun', 'fa-moon');
            }
        });
    </script>

    <script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>

</body>
</html>