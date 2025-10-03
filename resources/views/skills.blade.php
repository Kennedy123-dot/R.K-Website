<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Skills - Rukundo Kennedy</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900 text-white min-h-screen">
    <div class="max-w-4xl mx-auto px-6 py-12">
        <a href="/" class="text-blue-400 hover:underline mb-6 inline-block">&larr; Back to Home</a>
        <h1 class="text-3xl font-bold mb-8">My Technical Skills</h1>

        @foreach($skills as $category => $items)
        <div class="mb-10">
            <h2 class="text-2xl font-semibold mb-4 flex items-center">
                <span class="w-3 h-3 bg-blue-500 rounded-full mr-2"></span>
                {{ $category }}
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($items as $skill)
                <div class="bg-slate-800 p-4 rounded-lg">
                    <div class="font-medium">{{ $skill->name }}</div>
                    <div class="mt-2 w-full bg-slate-700 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: {{ $skill->proficiency }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>