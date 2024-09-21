@extends('layouts.app')

@section('content')

<div class="py-5">
    <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
        <div class="container custom-container">
            <div class="col-12">
                <div class="mb-4">
                    <div class="col-12 row">
                        <div class="mb-4 col">
                            <a href="/penilaian/rapor" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                        <div class="mb-4 col d-flex justify-content-end">
                            <a href="#" class="btn btn-success mx-6" data-bs-toggle="modal"
                                data-bs-target="#chartModal">
                                Grafik
                            </a>
                            <a href="{{ route('average.create') }}" class="btn btn-primary">
                                Tambah
                            </a>
                        </div>
                        @if (session('success'))
                        <div class="alert alert-important alert-success alert-dismissible" role="alert">
                            <div class="d-flex">
                                <div>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="icon alert-icon">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l5 5l10 -10"></path>
                                    </svg>
                                </div>
                                <div>
                                    {{ session('success') }}
                                </div>
                            </div>
                            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Data Table -->
                <div class="card mt-4">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-vcenter table-mobile-md card-table">
                            <thead>
                                <tr>
                                    <th>Tahun Ajaran</th>
                                    <th>Kelas</th>
                                    <th>Semester</th>
                                    <th>PAI</th>
                                    <th>PKN</th>
                                    <th>B.Indo</th>
                                    <th>MTK</th>
                                    <th>Sejindo</th>
                                    <th>B.Ingg</th>
                                    <th>SBD</th>
                                    <th>PJOK</th>
                                    <th>SimDig</th>
                                    <th>Fisika</th>
                                    <th>Kimia</th>
                                    <th>SisKom</th>
                                    <th>KomJar</th>
                                    <th>ProgDas</th>
                                    <th>DDG</th>
                                    <th>IaaS</th>
                                    <th>PaaS</th>
                                    <th>SaaS</th>
                                    <th>SIoT</th>
                                    <th>SKJ</th>
                                    <th>PKK</th>
                                    <th>Rerata Total</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($averages as $item)
                                <tr>
                                    <td>{{ $item->tahun_ajaran }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td>{{ $item->semester }}</td>
                                    <td>{{ $item->pai }}</td>
                                    <td>{{ $item->pkn }}</td>
                                    <td>{{ $item->indo }}</td>
                                    <td>{{ $item->mtk }}</td>
                                    <td>{{ $item->sejindo }}</td>
                                    <td>{{ $item->bhs_asing }}</td>
                                    <td>{{ $item->sbd }}</td>
                                    <td>{{ $item->pjok }}</td>
                                    <td>{{ $item->simdig }}</td>
                                    <td>{{ $item->fis }}</td>
                                    <td>{{ $item->kim }}</td>
                                    <td>{{ $item->sis_kom }}</td>
                                    <td>{{ $item->komjar }}</td>
                                    <td>{{ $item->progdas }}</td>
                                    <td>{{ $item->ddg }}</td>
                                    <td>{{ $item->iaas }}</td>
                                    <td>{{ $item->paas }}</td>
                                    <td>{{ $item->saas }}</td>
                                    <td>{{ $item->siot }}</td>
                                    <td>{{ $item->skj }}</td>
                                    <td>{{ $item->pkk }}</td>
                                    <td>{{ number_format($item->totalAverage, 2) }}</td> <!-- Display the average -->
                                    <td>
                                        <a href="{{ route('average.edit', $item->id) }}">
                                            <i
                                                class="fa-regular fa-pen-to-square text-white text-xl bg-yellow p-2 rounded-lg"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="" data-bs-toggle="modal" data-bs-target="#modal-danger">
                                            <i class="far fa-trash-alt text-white text-xl bg-red p-2 rounded-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="27" class="text-center">
                                        Tidak ada Data
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Danger Modal --}}
@foreach ($averages as $item)
<form action="{{ route('average.destroy', $item->id) }}" method="post">
    @csrf
    @method('DELETE')
    <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 9v4"></path>
                        <path
                            d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z">
                        </path>
                        <path d="M12 16h.01"></path>
                    </svg>
                    <h3>Are you sure?</h3>
                    <div class="text-secondary">Do you really want to remove this files? What you've done cannot be
                        undone.</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col">
                                <a href="#" class="btn w-100" data-bs-dismiss="modal">Cancel</a>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-danger w-100"
                                    data-bs-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach

<!-- Chart Modal -->
<div class="modal fade" id="chartModal" tabindex="-1" aria-labelledby="chartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chartModalLabel">Average Total Scores</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Filter Inputs -->
                <div class="form-group mb-3">
                    <label for="filterTahunAjaranStart">Dari Tahun Ajaran</label>
                    <select id="filterTahunAjaranStart" class="form-control">
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="form-group my-3">
                    <label for="filterTahunAjaranEnd">Sampai Tahun Ajaran</label>
                    <select id="filterTahunAjaranEnd" class="form-control">
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="form-group my-3">
                    <label for="filterKelas">Kelas</label>
                    <select id="filterKelas" class="form-control">
                        <option value="all">All</option>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="form-group my-3">
                    <label for="filterSemester">Semester</label>
                    <select id="filterSemester" class="form-control">
                        <option value="all">All</option>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>
                <div class="form-group mt-2">
                    <button id="applyFilterBtn" class="btn btn-primary">Apply Filter</button>
                </div>
                <canvas id="modalAverageChart" style="display:none;"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    let averageChart = null;

        function updateChart(chart, data) {
            const ctx = document.getElementById('modalAverageChart').getContext('2d');
            if (chart) {
                chart.destroy(); // Destroy existing chart if it exists
            }
            return new Chart(ctx, {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // Populate filter dropdowns with unique values from the table
        function populateFilters() {
            const tableRows = document.querySelectorAll('#dataTable tbody tr');
            const tahunAjaranSet = new Set();
            const kelasSet = new Set();
            const semesterSet = new Set();

            tableRows.forEach(row => {
                tahunAjaranSet.add(row.cells[0].textContent.trim());
                kelasSet.add(row.cells[1].textContent.trim());
                semesterSet.add(row.cells[2].textContent.trim());
            });

            const populateDropdown = (id, values) => {
                const dropdown = document.getElementById(id);
                dropdown.innerHTML = '<option value="all">All</option>'; // Add "All" option
                values.forEach(value => {
                    dropdown.innerHTML += `<option value="${value}">${value}</option>`;
                });
            };

            // Populate Tahun Ajaran dropdown with unique values
            const tahunAjaranDropdownStart = document.getElementById('filterTahunAjaranStart');
            const tahunAjaranDropdownEnd = document.getElementById('filterTahunAjaranEnd');
            tahunAjaranDropdownStart.innerHTML = '<option value="all">All</option>';
            tahunAjaranDropdownEnd.innerHTML = '<option value="all">All</option>';

            [...tahunAjaranSet].forEach(value => {
                tahunAjaranDropdownStart.innerHTML += `<option value="${value}">${value}</option>`;
                tahunAjaranDropdownEnd.innerHTML += `<option value="${value}">${value}</option>`;
            });

            populateDropdown('filterKelas', [...kelasSet]);
            populateDropdown('filterSemester', [...semesterSet]);
        }

        document.addEventListener('DOMContentLoaded', populateFilters);

        // Apply filters and update the chart
        document.getElementById('applyFilterBtn').addEventListener('click', function() {
            // Get selected filter values
            const tahunAjaranStart = parseInt(document.getElementById('filterTahunAjaranStart').value, 10);
            const tahunAjaranEnd = parseInt(document.getElementById('filterTahunAjaranEnd').value, 10);
            const kelas = document.getElementById('filterKelas').value;
            const semester = document.getElementById('filterSemester').value;

            // Extract table data
            const tableRows = document.querySelectorAll('#dataTable tbody tr');
            const chartData = {
                labels: [],
                datasets: [{
                    label: 'Average Total Scores',
                    data: [],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            };

            // Filter table data based on selected filters
            tableRows.forEach(row => {
                const tahunAjaran = parseInt(row.cells[0].textContent.trim(), 10);
                const rowData = {
                    tahunAjaran: tahunAjaran,
                    kelas: row.cells[1].textContent.trim(),
                    semester: row.cells[2].textContent.trim(),
                    average: parseFloat(row.cells[24].textContent.trim()) // Rerata Total
                };

                const isMatch = (isNaN(tahunAjaranStart) || tahunAjaran >= tahunAjaranStart) &&
                                (isNaN(tahunAjaranEnd) || tahunAjaran <= tahunAjaranEnd) &&
                                (kelas === 'all' || rowData.kelas === kelas) &&
                                (semester === 'all' || rowData.semester === semester);

                if (isMatch) {
                    chartData.labels.push(`${rowData.tahunAjaran} - ${rowData.kelas} - ${rowData.semester}`);
                    chartData.datasets[0].data.push(rowData.average);
                }
            });

            // Update the chart with the filtered data
            averageChart = updateChart(averageChart, chartData);
            document.getElementById('modalAverageChart').style.display = 'block';
        });

        // Reset filters and hide the chart when the modal is closed
        document.getElementById('chartModal').addEventListener('hidden.bs.modal', function() {
            // Reset filter inputs
            document.getElementById('filterTahunAjaranStart').value = 'all';
            document.getElementById('filterTahunAjaranEnd').value = 'all';
            document.getElementById('filterKelas').value = 'all';
            document.getElementById('filterSemester').value = 'all';

            // Clear and hide the chart
            const chartCanvas = document.getElementById('modalAverageChart');
            chartCanvas.style.display = 'none';

            // Destroy the chart instance
            if (averageChart) {
                averageChart.destroy();
                averageChart = null;
            }
        });
</script>
@endsection
