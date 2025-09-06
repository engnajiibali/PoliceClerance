<?php $__env->startSection('content'); ?>
<div class="content">

<!-- Breadcrumb -->
<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
    <div class="my-auto mb-2">
        <h2 class="mb-1">Dashboard</h2>
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.html"><i class="ti ti-smart-home"></i></a></li>
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Stats Cards -->
<div class="row">
    <div class="col-xl-3 col-sm-6 d-flex">
        <div class="card flex-fill">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <span class="avatar avatar-md bg-dark mb-3"><i class="ti ti-alert-triangle fs-16"></i></span>
                    <span class="badge bg-danger fw-normal mb-3">+5%</span>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h2 class="mb-1">120</h2>
                        <p class="fs-13">Total Crimes</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 d-flex">
        <div class="card flex-fill">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <span class="avatar avatar-md bg-dark mb-3"><i class="ti ti-police-badge fs-16"></i></span>
                    <span class="badge bg-warning fw-normal mb-3">-10%</span>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h2 class="mb-1">45</h2>
                        <p class="fs-13">Active Cases</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 d-flex">
        <div class="card flex-fill">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <span class="avatar avatar-md bg-dark mb-3"><i class="ti ti-check fs-16"></i></span>
                    <span class="badge bg-success fw-normal mb-3">+8%</span>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h2 class="mb-1">60</h2>
                        <p class="fs-13">Solved Cases</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 d-flex">
        <div class="card flex-fill">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <span class="avatar avatar-md bg-dark mb-3"><i class="ti ti-clock fs-16"></i></span>
                    <span class="badge bg-danger fw-normal mb-3">-3%</span>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h2 class="mb-1">15</h2>
                        <p class="fs-13">Pending Cases</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Stats Cards -->
    <div class="col-xl-3 col-sm-6 d-flex">
        <div class="card flex-fill">
            <div class="card-body">
                <span class="avatar avatar-md bg-dark mb-3"><i class="ti ti-users fs-16"></i></span>
                <div>
                    <h2 class="mb-1">80</h2>
                    <p class="fs-13">Arrested Suspects</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 d-flex">
        <div class="card flex-fill">
            <div class="card-body">
                <span class="avatar avatar-md bg-dark mb-3"><i class="ti ti-alert-circle fs-16"></i></span>
                <div>
                    <h2 class="mb-1">20</h2>
                    <p class="fs-13">High Priority Cases</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="row mt-4">
    <div class="col-lg-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header"><h5 class="mb-2">Cases by Type</h5></div>
            <div class="card-body"><canvas id="casesBarChart" width="400" height="200"></canvas></div>
        </div>
    </div>
    <div class="col-lg-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header"><h5 class="mb-2">Gender Distribution</h5></div>
            <div class="card-body"><canvas id="genderPieChart" width="400" height="200"></canvas></div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header"><h5 class="mb-2">Monthly Cases Trend</h5></div>
            <div class="card-body"><canvas id="monthlyLineChart" width="400" height="200"></canvas></div>
        </div>
    </div>
    <div class="col-lg-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header"><h5 class="mb-2">Crime Severity Distribution</h5></div>
            <div class="card-body"><canvas id="severityDoughnutChart" width="400" height="200"></canvas></div>
        </div>
    </div>
</div>

<!-- Tables Section -->
<div class="row mt-4">
    <div class="col-lg-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header"><h5 class="mb-2">Recent Crimes</h5></div>
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr><th>Date</th><th>Suspect</th><th>Crime Type</th><th>Status</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>14 Jan 2025</td><td>John Doe</td><td>Theft</td><td>Open</td></tr>
                        <tr><td>15 Jan 2025</td><td>Jane Smith</td><td>Assault</td><td>Closed</td></tr>
                        <tr><td>16 Jan 2025</td><td>Michael Brown</td><td>Fraud</td><td>Pending</td></tr>
                        <tr><td>17 Jan 2025</td><td>Emily Davis</td><td>Burglary</td><td>Open</td></tr>
                        <tr><td>18 Jan 2025</td><td>Robert Wilson</td><td>Traffic</td><td>Open</td></tr>
                        <tr><td>19 Jan 2025</td><td>Linda Johnson</td><td>Fraud</td><td>Closed</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header"><h5 class="mb-2">Top Crime Locations</h5></div>
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr><th>Location</th><th>Crime Count</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>Mogadishu</td><td>35</td></tr>
                        <tr><td>Hargeisa</td><td>25</td></tr>
                        <tr><td>Borama</td><td>15</td></tr>
                        <tr><td>Baidoa</td><td>12</td></tr>
                        <tr><td>Kismayo</td><td>10</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const casesCtx = document.getElementById('casesBarChart').getContext('2d');
const casesBarChart = new Chart(casesCtx, {
    type: 'bar',
    data: { labels: ['Theft','Assault','Fraud','Burglary','Traffic'], datasets:[{label:'Cases', data:[50,20,15,10,5], backgroundColor:'#36A2EB'}]},
    options: {responsive:true}
});

const genderCtx = document.getElementById('genderPieChart').getContext('2d');
const genderPieChart = new Chart(genderCtx, {
    type:'pie',
    data:{labels:['Male','Female'], datasets:[{data:[70,30], backgroundColor:['#FF6384','#36A2EB']}]},
    options:{responsive:true}
});

const monthlyCtx = document.getElementById('monthlyLineChart').getContext('2d');
const monthlyLineChart = new Chart(monthlyCtx,{
    type:'line',
    data:{labels:['Jan','Feb','Mar','Apr','May','Jun'], datasets:[{label:'Cases per Month', data:[20,25,30,15,35,40], borderColor:'#FFCE56', fill:false}]},
    options:{responsive:true}
});

const severityCtx = document.getElementById('severityDoughnutChart').getContext('2d');
const severityDoughnutChart = new Chart(severityCtx,{
    type:'doughnut',
    data:{labels:['Low','Medium','High'], datasets:[{data:[40,50,30], backgroundColor:['#36A2EB','#FF6384','#FFCE56']}]},
    options:{responsive:true}
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('include.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\policeclerance\resources\views/dashboard/index.blade.php ENDPATH**/ ?>