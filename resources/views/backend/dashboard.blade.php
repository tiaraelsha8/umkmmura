@extends('backend.layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">DATA UMKM KABUPATEN MURUNG RAYA</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total UMKM di Murung Raya</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_umkm }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Data KBLI</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_kbli }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data UMKM Per Kecamatan</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body d-flex justify-content-center align-items-center" style="height: 400px;">
                        <div class="chart-area" style="width: 60%; max-width: 400px;">
                            <canvas id="myChartkec"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data UMKM Per Kelurahan/Desa</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body d-flex justify-content-center align-items-center" style="height: 400px;">
                        <div class="chart-area" style="width: 60%; max-width: 400px;">
                            <canvas id="myChartkel"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <!-- Area Chart -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data KBLI Terbanyak</h6>
                        {{-- <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div> --}}
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myChartkbli"></canvas>
                        </div>
                    </div>
                </div>
            </div>




        </div>

        <div class="row">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        {{-- Filter Kecamatan & Kelurahan --}}
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="filterKecamatan">Filter Kecamatan</label>
                                <select id="filterKecamatan" class="form-control">
                                    <option value="">-- Semua Kecamatan --</option>
                                    @foreach ($dataUmums->pluck('kecamatan')->unique() as $kecamatan)
                                        <option value="{{ $kecamatan }}">{{ $kecamatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="filterKelurahan">Filter Kelurahan</label>
                                <select id="filterKelurahan" class="form-control">
                                    <option value="">-- Semua Kelurahan/Desa --</option>
                                    @foreach ($dataUmums->pluck('kelurahan')->unique() as $kelurahan)
                                        <option value="{{ $kelurahan }}">{{ $kelurahan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="filterKbli">Filter Kode KBLI</label>
                                <select id="filterKbli" class="form-control">
                                    <option value="">-- Semua Kode KBLI --</option>
                                    @foreach ($kblis as $kbli)
                                        <option value="{{ $kbli->kode }}">{{ $kbli->kode }} - {{ $kbli->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIB</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Uraian Jenis</th>
                                    <th>Alamat</th>
                                    <th>Kelurahan/Desa</th>
                                    <th>Kecamatan</th>
                                    <th>Nilai Investasi</th>
                                    <th>Kode KBLI</th>
                                    <th>Judul KBLI</th>
                                    <th>Izin NIB</th>
                                    <th>Izin Usaha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dataUmums as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->nib }}</td>
                                        <td>{{ $value->nama_perusahaan }}</td>
                                        <td>{{ $value->uraian_jenis }}</td>
                                        <td>{{ $value->alamat }}</td>
                                        <td>{{ $value->kelurahan }}</td>
                                        <td>{{ $value->kecamatan }}</td>
                                        <td>{{ number_format($value->nilai_investasi ?? 0, 0, ',', '.') }}</td>

                                        {{-- Data KBLI --}}
                                        <td>{{ $value->kblis->pluck('kode')->implode(', ') }}</td>
                                        <td>{{ $value->kblis->pluck('nama')->implode(', ') }}</td>

                                        {{-- Status izin dari pivot --}}
                                        <td class="text-center">
                                            {!! $value->izin_nib == 1 ? '✅' : '❌' !!}
                                        </td>
                                        <td class="text-center">
                                            {!! $value->izin_usaha == 1 ? '✅' : '❌' !!}
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="13" class="text-center text-muted">Belum ada data umum</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <script>
        const ctx = document.getElementById('myChartkec');

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($namakecamatan) !!},
                datasets: [{
                    label: 'UMKM Per Kecamatan',
                    data: {!! json_encode($jmlhkecamatan) !!},
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    datalabels: {
                        color: '#fff',
                        font: {
                            weight: 'bold'
                        },
                        formatter: (value, context) => {
                            const dataArr = context.chart.data.datasets[0].data;
                            const total = dataArr.reduce((acc, val) => acc + val, 0);
                            const percentage = ((value / total) * 100).toFixed(1) + '%';
                            return percentage;
                        }
                    },
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((acc, val) => acc + val, 0);
                                const value = context.parsed;
                                const percentage = ((value / total) * 100).toFixed(1);
                                return `${context.label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });

        const ctx2 = document.getElementById('myChartkel');

        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: {!! json_encode($namakelurahan) !!},
                datasets: [{
                    label: 'UMKM Per Kelurahan',
                    data: {!! json_encode($jmlhkelurahan) !!},
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    datalabels: {
                        color: '#fff',
                        font: {
                            weight: 'bold'
                        },
                        formatter: (value, context) => {
                            const dataArr = context.chart.data.datasets[0].data;
                            const total = dataArr.reduce((acc, val) => acc + val, 0);
                            const percentage = ((value / total) * 100).toFixed(1) + '%';
                            return percentage;
                        }
                    },
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((acc, val) => acc + val, 0);
                                const value = context.parsed;
                                const percentage = ((value / total) * 100).toFixed(1);
                                return `${context.label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]

        });

        const kbli = document.getElementById('myChartkbli');

        new Chart(kbli, {
            type: 'bar',
            data: {
                labels: {!! json_encode($namakbli) !!},
                datasets: [{
                    label: 'KBLI',
                    data: {!! json_encode($jmlhkbli) !!},
                    borderWidth: 1
                }]
            },

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const $kec = document.getElementById('filterKecamatan');
            const $kel = document.getElementById('filterKelurahan');
            const $kb = document.getElementById('filterKbli');
            const $rows = Array.from(document.querySelectorAll('#dataTable tbody tr'));

            function normalize(s) {
                return (s || '').toString().trim().toLowerCase();
            }

            function applyFilter() {
                const selKec = normalize($kec?.value);
                const selKel = normalize($kel?.value);
                const selKb = normalize($kb?.value);

                $rows.forEach(row => {
                    // ambil teks dari kolom kecamatan (kolom index 6), kelurahan (5), kode KBLI (8)
                    // sesuaikan index jika kolommu berbeda
                    const cols = row.querySelectorAll('td');
                    if (cols.length === 0) {
                        row.style.display = 'none';
                        return;
                    }

                    const txtKec = normalize(cols[6]?.textContent);
                    const txtKel = normalize(cols[5]?.textContent);
                    const txtKbli = normalize(cols[8]
                        ?.textContent); // bisa berisi "101, 102" -> kita cari substring

                    let visible = true;
                    if (selKec && !txtKec.includes(selKec)) visible = false;
                    if (selKel && !txtKel.includes(selKel)) visible = false;
                    if (selKb && !txtKbli.includes(selKb)) visible = false;

                    row.style.display = visible ? '' : 'none';
                });
            }

            [$kec, $kel, $kb].forEach(el => {
                if (!el) return;
                el.addEventListener('change', applyFilter);
                // jika pakai select2, juga jalankan event change dari select2
                if (window.jQuery && $(el).hasClass('select2-hidden-accessible')) {
                    $(el).on('select2:select select2:unselect change', applyFilter);
                }
            });

            // optional: reset filter button (jika ada)
            const resetBtn = document.getElementById('resetFilters');
            if (resetBtn) resetBtn.addEventListener('click', () => {
                if ($kec) $kec.value = '';
                if ($kel) $kel.value = '';
                if ($kb) $kb.value = '';
                if (window.jQuery) {
                    if ($kec) $($kec).trigger('change');
                    if ($kel) $($kel).trigger('change');
                    if ($kb) $($kb).trigger('change');
                }
                applyFilter();
            });

            // jalankan awal agar terlihat terfilter ketika page load
            applyFilter();
        });
    </script>
@endsection
