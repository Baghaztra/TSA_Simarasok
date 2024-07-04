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
                    <div class="card-header">Berita</div>
                    <div class="card-body">
                        <h3>{{ $pcount }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Destinasi</div>
                    <div class="card-body">
                        <h3>{{ $dcount }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Penginapan</div>
                    <div class="card-body">
                        <h3>{{ $hcount }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Kuliner</div>
                    <div class="card-body">
                        <h3>{{ $ucount }}</h3>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- <div class="row mt-4">
            <!-- Grafik Booking -->
            @php
                $bookings = json_encode(array_values($monthlyBookings));
                $months = json_encode($months);
            @endphp
            <div class="col-md-6">
                <canvas id="bookingChart"></canvas>
            </div>
        </div>
     
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var ctx = document.getElementById('bookingChart').getContext('2d');
                var bookingChart = new Chart(ctx, {
                    type: 'bar', // Tipe grafik, bisa diganti dengan 'line' atau lainnya
                    data: {
                        labels: {!! $months !!},
                        datasets: [{
                            label: 'Number of Bookings',
                            data: {!! $bookings !!},
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
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
        </script> --}}
    </div>
@endsection