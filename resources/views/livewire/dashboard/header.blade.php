<div class="bg-white dark:bg-gray-900 shadow rounded-lg px-6 py-6 mb-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ $title }}</h1>
    </div>

    @if (!empty($breadcrumbs))
        <nav class="mt-2">
            <ol class="flex items-center space-x-2 text-sm text-gray-600 dark:text-gray-300">
                @foreach ($breadcrumbs as $crumb )
                    <li class="flex items-center">
                        @if (!$loop->last)
                            <a href="{{ $crumb['url'] ?? '#' }}" class="hover:text-green-300">{{ $crumb['label'] }}</a>
                            <span class="mx-2">/</span>
                        @else
                        <span class="font-medium text-gray-900 dark:text-gray-100">{{ $crumb['label'] }}</span>
                        @endif
                    </li>
                @endforeach
            </ol>
        </nav>
    @endif
</div>
