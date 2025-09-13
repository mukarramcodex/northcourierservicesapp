<div class="p-6 space-y-6">
    <!-- Top Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4">
        <div class="p-4 bg-[#017236] shadow rounded-2xl text-white">
            <h3 class="text-sm font-semibold">Parcels</h3>
            <p class="text-2xl font-bold">{{ $totalParcels }}</p>
        </div>
        <div class="p-4 bg-[#017236] shadow rounded-2xl text-white">
            <h3 class="text-sm font-semibold ">Customers</h3>
            <p class="text-2xl font-bold">{{ $totalCustomers }}</p>
        </div>
        <div class="p-4 bg-[#017236] shadow rounded-2xl text-white">
            <h3 class="text-sm font-semibold ">Staffs</h3>
            <p class="text-2xl font-bold">{{ $totalStaffs }}</p>
        </div>
        <div class="p-4 bg-[#017236] shadow rounded-2xl text-white">
            <h3 class="text-sm font-semibold ">Branches</h3>
            <p class="text-2xl font-bold">{{ $totalBranches }}</p>
        </div>
        <div class="p-4 bg-[#017236] shadow rounded-2xl text-white">
            <h3 class="text-sm font-semibold ">Revenue</h3>
            <p class="text-2xl font-bold">Rs {{ number_format($totalRevenue) }}</p>
        </div>
        <div class="p-4 bg-[#017236] shadow rounded-2xl text-white">
            <h3 class="text-sm font-semibold ">Users</h3>
            <p class="text-2xl font-bold">{{ $totalUsers }}</p>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Revenue by Branches -->
        <div class="bg-primary p-4 shadow rounded-2xl" x-data="{
            init() {
                new Chart(this.$refs.canvas, {
                    type: 'bar',
                    data: {
                        labels: @js(collect($revenuesByBranches)->pluck('branch')),
                        datasets: [{
                            label: 'Revenue',
                            data: @js(collect($revenuesByBranches)->pluck('total')),
                            backgroundColor: '#3b82f6'
                        }]
                    }
                });
            }
        }">
            <h2 class="text-lg font-semibold mb-2 text-[#017236]">Revenue by Branches</h2>
            <canvas x-ref="canvas"></canvas>
        </div>

        <!-- Revenue by Staffs -->
        <div class="bg-primary p-4 shadow rounded-2xl" x-data="{
            init() {
                new Chart(this.$refs.canvas, {
                    type: 'doughnut',
                    data: {
                        labels: @js(collect($revenuesByStaffs)->pluck('staff')),
                        datasets: [{
                            label: 'Revenue',
                            data: @js(collect($revenuesByStaffs)->pluck('total')),
                            backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444']
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false } // hide default legend
                        }
                    }
                });
            }
        }">
            <h2 class="text-lg font-semibold mb-2 text-[#017236]">Revenue by Staffs</h2>
            <div class="grid grid-cols-2 gap-4 items-center">
                <!-- Staff names (left side) -->
                <ul class="space-y-2 text-black">
                    @foreach ($revenuesByStaffs as $staff)
                        <li class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full"
                                style="background-color: {{ ['#3b82f6', '#10b981', '#f59e0b', '#ef4444'][$loop->index % 4] }}">
                            </span>
                            {{ $staff['staff'] }} - <span class="font-semibold">{{ $staff['total'] }}</span>
                        </li>
                    @endforeach
                </ul>

                <!-- Doughnut chart (right side) -->
                <div class="h-64">
                    <canvas x-ref="canvas" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Parcels -->
    {{-- <div class="bg-primary p-4 shadow rounded-2xl">
        <h2 class="text-lg font-semibold mb-4">Recent Parcels</h2>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-800">
                    <th class="p-2">Parcel ID</th>
                    <th class="p-2">Customer</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentParcels as $parcel)
                    <tr class="border-b">
                        <td class="p-2">{{ $parcel['id'] }}</td>
                        <td class="p-2">{{ $parcel['customer'] }}</td>
                        <td class="p-2">
                            <span
                                class="px-2 py-1 rounded text-xs font-semibold
                                    {{ $parcel['status'] === 'Delivered' ? 'bg-green-100 text-green-600' : '' }}
                                    {{ $parcel['status'] === 'In Transit' ? 'bg-blue-100 text-blue-600' : '' }}
                                    {{ $parcel['status'] === 'Pending' ? 'bg-yellow-100 text-yellow-600' : '' }}">
                                {{ $parcel['status'] }}
                            </span>
                        </td>
                        <td class="p-2">Rs {{ number_format($parcel['amount']) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> --}}

<!-- Import Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
