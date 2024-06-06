@extends('admin.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            Selamat {{ date('H')>=5&&date('H')<12?'pagi':(date('H')>=12&&date('H')<18?'siang':'malam') }}, {{ Auth::user()->name }}!
        </h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Jumlah Destinasi</div>
                    <div class="card-body">
                        <h3>{{ App\Models\DestinasiPariwisata::count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Jumlah UMKM</div>
                    <div class="card-body">
                        <h3>{{ App\Models\UMKM::count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Jumlah Homestay</div>
                    <div class="card-body">
                        <h3>{{ App\Models\Homestay::count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <!-- Grafik Booking -->
            @php
                $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                $bookings = [];
                foreach ($months as $month) {
                    $bookings[$month] = rand(0, 100); // Angka random antara 0 dan 100
                }
            @endphp
            <div class="col-md-6">
                <canvas id="bookingChart"></canvas>
            </div>
        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var ctx = document.getElementById('bookingChart').getContext('2d');
                var bookingChart = new Chart(ctx, {
                    type: 'bar', // Tipe grafik, bisa 'line', 'bar', dll.
                    data: {
                        labels: {!! json_encode(array_keys($bookings)) !!}, // Bulan sebagai label
                        datasets: [{
                            label: 'Jumlah Booking',
                            data: {!! json_encode(array_values($bookings)) !!}, // Jumlah booking per bulan
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>
    </div>
@endsection