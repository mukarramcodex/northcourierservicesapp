@csrf
<div class="mx-auto">
    <form action="{{ route('parcels.store') }}" method="POST" class="space-y-6">
        @csrf
        @if ($errors->any())
            <div class="bg-red-200 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Customer Information Column --}}
            <div class="p-4 rounded-lg shadow bg-white">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">
                    Customer Information
                </h3>
                <div>
                    
                </div>
            </div>
        </div>
    </form>
</div>
