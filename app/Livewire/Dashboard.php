<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $totalParcels = 120;
    public $totalCustomers = 45;
    public $totalStaffs = 15;
    public $totalBranches = 6;
    public $totalRevenue = 245000;
    public $totalUsers = 10;

    public $revenuesByBranches = [
        ['branch' => 'Karachi', 'total' => 85000],
        ['branch' => 'Lahore', 'total' => 60000],
        ['branch' => 'Islamabad', 'total' => 40000],
        ['branch' => 'Multan', 'total' => 20000],
        ['branch' => 'Quetta', 'total' => 10000],
    ];

    public $revenuesByStaffs = [
        ['staff' => 'Ali', 'total' => 50000],
        ['staff' => 'Sara', 'total' => 30000],
        ['staff' => 'Ahmed', 'total' => 25000],
        ['staff' => 'Fatima', 'total' => 20000],
    ];


    public $recentParcels = [
        ['id' => 'P-101', 'customer' => 'John Doe', 'status' => 'Delivered', 'amount' => 2000],
        ['id' => 'P-102', 'customer' => 'Jane Smith', 'status' => 'In Transit', 'amount' => 1500],
        ['id' => 'P-103', 'customer' => 'Ali Khan', 'status' => 'Pending', 'amount' => 1800],
    ];

    public function render()
    {

        return view('livewire.dashboard');
    }
}
