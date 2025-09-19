<div {{ $attributes->merge(['class' => "shadow-md hover:shadow-lg transition-shadow rounded-xl bg-white p-6 ".$class]) }}>
    <div class="flex items-center justify-between">
        <div class="space-y-1">
            <p class="text-sm font-medium text-gray-500">
                {{ $title }}
            </p>
            <p class="text-2xl font-bold">
                {{ $value }}
            </p>

            @if ($description)
                <p class="text-xs text-gray-400">
                    {{ $description }}
                </p>
            @endif

            @if ($trend)
                <div class="flex items-center text-xs font-medium {{ $trend['isPositive'] ? 'text-green-600' : 'text-red-600' }}">
                    <span>
                        {{ $trend['isPositive'] ? '+' : '' }}{{ $trend['value'] }}%
                    </span>
                    <span class="ml-1 text-gray-400">from last month</span>
                </div>
            @endif
        </div>

        <div class="h-12 w-12 rounded-lg bg-primary/10 flex items-center justify-center">
            @if ($icon)
                <i class="{{ $icon }} text-primary h-6 w-6"></i>
            @endif
        </div>
    </div>
</div>
