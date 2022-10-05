<!--start content-->
<style>
    .text-large {
        font-size: 100%;
    }
</style>
<?php

function random_color_part() {
    return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

$q = "select sum(cr_cost_og) as t_cost from master_campaign_report where cr_report_date='" . date('Y-m-d', strtotime("-1 days")) . "'";
$total_spend_yesterday = $this->db->query($q)->row()->t_cost;
//        echo $total_spend_yesterday; die;
$camp_array = array();
$ttl_spend = 0;
foreach ($managers as $key => $row) {
    $q = "select sum(master_campaign_report.cr_cost_og) as spend from master_campaign_report "
            . " left join master_campaign on master_campaign.c_id=master_campaign_report.cr_c_id"
            . " where master_campaign_report.cr_report_date='" . date('Y-m-d', strtotime("-1 days"))
            . "' and  master_campaign.c_adword_account_manager_id=" . $row['loginID'];
    $spend = $this->db->query($q)->row()->spend;
    $ttl_spend += $spend;
    $camp_array[$key]['spend'] = ($spend != '') ? round($spend) : 0;
    $camp_array[$key]['m_id'] = $row['loginID'];
    $camp_array[$key]['m_name'] = "'" . $row['name'] . "'";
    $camp_array[$key]['m_color'] = "'#" . random_color() . "'";
    $camp_array[$key]['m_color2'] = "'#" . random_color() . "'";
}
//print_r($camp_array);
//die;
?>

<main class="page-content">
    <!--breadcrumb-->

    <!--end breadcrumb-->

    <!--    <h6 class="mb-0 text-uppercase"></h6>
        <hr>-->
    <div class="row">
        <div class="row col-sm-6">
            <h6 class="mb-0 text-uppercase">SubCategory</h6>
            <hr>
            <div class="col">
                <div class="card radius-10 bg-tiffany">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                            <i class="bi bi-bookmark-fill"></i>
                        </div>
                        <h3 class="text-white"><?= $subcat_cnt->all_ ?></h3>
                        <p class="mb-0 text-white">Total</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-success">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                            <i class="bi bi-toggle2-on"></i>
                        </div>
                        <h3 class="text-white"><?= $subcat_cnt->active_ ?></h3>
                        <p class="mb-0 text-white">Active</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-orange">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                            <i class="bi bi-toggle2-off"></i>
                        </div>
                        <h3 class="text-white"><?= $subcat_cnt->deactive_ ?></h3>
                        <p class="mb-0 text-white">Deactive</p>
                    </div>
                </div>
            </div>           
        </div>
        <div class="row col-sm-6">
            <h6 class="mb-0 text-uppercase">Package</h6>
            <hr>
            <div class="col">
                <div class="card radius-10 bg-tiffany">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h3 class="text-white"><?= $package_cnt->all_ ?></h3>
                        <p class="mb-0 text-white">Total</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-success">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                            <i class="bi bi-toggle2-on"></i>
                        </div>
                        <h3 class="text-white"><?= $package_cnt->active_ ?></h3>
                        <p class="mb-0 text-white">Active</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-orange">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                            <i class="bi bi-toggle2-off"></i>
                        </div>
                        <h3 class="text-white"><?= $package_cnt->deactive_ ?></h3>
                        <p class="mb-0 text-white">Deactive</p>
                    </div>
                </div>
            </div>            
        </div>
        <!--</div>-->       
    </div><!--end row-->
    <div class="row">
        <div class="row col-sm-6">
            <h6 class="mb-0 text-uppercase">campaign</h6>
            <hr>
            <div class="col">
                <a href="<?= base_url("admin/manage_campaign") ?>">
                    <div class="card radius-10 bg-tiffany">
                        <div class="card-body text-center">
                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                <i class="bi bi-person-circle"></i>
                            </div>
                            <h3 class="text-white"><?= $camp_cnt->all_ ?></h3>
                            <p class="mb-0 text-white">Total</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="<?= base_url("admin/manage_campaign?active=1") ?>">
                    <div class="card radius-10 bg-success">
                        <div class="card-body text-center">
                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                <i class="bi bi-toggle2-on"></i>
                            </div>
                            <h3 class="text-white"><?= $camp_cnt->active_ ?></h3>
                            <p class="mb-0 text-white">Active</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="<?= base_url("admin/manage_campaign?active=0") ?>">
                    <div class="card radius-10 bg-orange">
                        <div class="card-body text-center">
                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                <i class="bi bi-toggle2-off"></i>
                            </div>
                            <h3 class="text-white"><?= $camp_cnt->deactive_ ?></h3>
                            <p class="mb-0 text-white">Deactive</p>
                        </div>
                    </div>
                </a>
            </div>           
        </div>
        <div class="row col-sm-6">
            <h6 class="mb-0 text-uppercase">&nbsp;</h6>
            <hr>
            <div class="col">
                <a href="<?= base_url("admin/manage_campaign?status=1") ?>">
                    <div class="card radius-10 bg-info">
                        <div class="card-body text-center">
                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                <i class="bi bi-play-btn-fill"></i>
                            </div>
                            <h3 class="text-white"><?= $camp_cnt->live_ ?></h3>
                            <p class="mb-0 text-white">Live</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="<?= base_url("admin/manage_campaign?status=0") ?>">
                    <div class="card radius-10 bg-warning">
                        <div class="card-body text-center">
                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                <i class="bi bi-pause-btn-fill"></i>
                            </div>
                            <h3 class="text-white"><?= $camp_cnt->pause_ ?></h3>
                            <p class="mb-0 text-white">Paused</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <div class="card radius-10 bg-danger">
                    <div class="card-body text-center">
                        <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                            <i class="bi bi-trash-fill"></i>
                        </div>
                        <h3 class="text-white"><?= $camp_cnt->del_ ?></h3>
                        <p class="mb-0 text-white">Deleted</p>
                    </div>
                </div>
            </div>            
        </div>
        <!--</div>-->       
    </div><!--end row-->


    <h6 class="mb-0 text-uppercase">Daily Leads Count</h6>
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <div class="card radius-10 border-0 border-start border-tiffany border-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Call Leads</p>
                            <h4 class="mb-0 text-tiffany"><?= $call_l_cnt ?></h4>
                        </div>
                        <div class="ms-auto widget-icon bg-tiffany text-white">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card radius-10 border-0 border-start border-success border-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Website Leads</p>
                            <h4 class="mb-0 text-success"><?= $web_l_count ?></h4>
                        </div>
                        <div class="ms-auto widget-icon bg-success text-white">
                            <i class="bi bi-globe"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <h6 class="mb-0 text-uppercase">Campaign Reports</h6>
    <hr>
    <div class="row">
        <div class="col-12 col-lg-12 col-xl-12 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent">
                    <div class="row g-3 align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Yesterday Spend</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="daily_spend"></div>
                </div>
                <ul class="list-group list-group-flush mb-0">
                    <li class="text-large  list-group-item d-flex justify-content-between align-items-center bg-transparent">Total
                        <span class="text-large badge bg-primary badge-pill"><?= round($ttl_spend) ?></span>
                    </li>
                    <?php foreach ($camp_array as $key => $row) { ?>
                        <li class="text-large  list-group-item d-flex justify-content-between align-items-center bg-transparent"><?= str_replace("'", "",$row['m_name']) ?>
                            <span class="text-large badge badge-pill" style="background:<?= str_replace("'", "", $row['m_color2']) ?> !important"><?= $row['spend'] ?></span>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
        for ($i = 0; $i < count($managers); $i++) {
            $q = " select sum(c_campaign_status=1 AND active!=2) as live_,sum(active !=2 AND c_campaign_status=0) as pause_,sum(active=2) as del_";
            $q .= " ,count(c_id) as ttl_ from master_campaign where c_adword_account_manager_id= " . $managers[$i]['loginID'];
            $camp_rpt = $this->db->query($q)->row();
            if ($i % 2 == 0 && $i != 0) {
                ?>
            </div>
            <div class="row">
            <?php } ?>
            <div class="col-12 col-lg-12 col-xl-12 col-xxl-6 d-flex">
                <a href="<?= base_url('admin/manage_campaign?manager=' . $managers[$i]['loginID']) ?>">
                    <div class="card radius-10 w-100">
                        <div class="card-header bg-transparent">
                            <div class="row g-3 align-items-center">
                                <div class="col">
                                    <h5 class="mb-0"><?= $managers[$i]['name'] ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-lg-flex align-items-center justify-content-center gap-4">
                                <div id="manager<?= $i ?>"></div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="bi bi-circle-fill text-primary me-1"></i> Total: <span class="me-1"><?= $camp_rpt->ttl_ ?></span></li>
                                    <li class="list-group-item"><i class="bi bi-circle-fill text-info me-1"></i> Live: <span class="me-1"><?= $camp_rpt->live_ ?></span></li>
                                    <li class="list-group-item"><i class="bi bi-circle-fill text-warning me-1"></i> Paused: <span class="me-1"><?= $camp_rpt->pause_ ?></span></li>
                                    <li class="list-group-item"><i class="bi bi-circle-fill text-danger me-1"></i> Deleted: <span class="me-1"><?= $camp_rpt->del_ ?></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div><!--end row-->
    <script src="<?= base_url() ?>assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <!--<script src="<?= base_url() ?>assets/js/index5.js"></script>-->
    <script>

        $(function () {
            "use strict";
            var options;
            var chart;

            //  YESTERDAY SPEND 
            options = {
                series: [<?= implode(",", array_column($camp_array, 'spend')) ?>],
                chart: {
                    height: 250,
                    type: 'pie',
                },
                labels: [<?= implode(",", array_column($camp_array, 'm_name')) ?>],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        type: "vertical",
                        shadeIntensity: 0.5,
                        gradientToColors: [<?= implode(",", array_column($camp_array, 'm_color')) ?>],
//                        gradientToColors: ["#00c6fb", "#ff6a00", "#98ec2d"],
                        inverseColors: true,
                        opacityFrom: 1,
                        opacityTo: 1,
                        //stops: [0, 50, 100],
                        //colorStops: []
                    }
                },
                colors: [<?= implode(",", array_column($camp_array, 'm_color2')) ?>],
//                colors: ["#005bea", "#ee0979", "#17ad37"],
                legend: {
                    show: false,
                    position: 'top',
                    horizontalAlign: 'left',
                    offsetX: -20
                },
                responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                height: 270
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
            };

            chart = new ApexCharts(document.querySelector("#daily_spend"), options);
            chart.render();



            // chart 3
<?php
for ($i = 0; $i < count($managers); $i++) {
    $q = " select sum(active=1 AND c_campaign_status=1) as live_,sum(active=1 AND c_campaign_status=0) as pause_,sum(active=2) as del_";
    $q .= " from master_campaign where c_adword_account_manager_id= " . $managers[$i]['loginID'];
    $camp_rpt = $this->db->query($q)->row();
    ?>
                options = {
                    series: [<?= $camp_rpt->live_ ?>, <?= $camp_rpt->pause_ ?>, <?= $camp_rpt->del_ ?>],
                    chart: {
                        width: 340,
                        type: 'donut',
                    },
                    labels: ["Live", "Paused", "Deleted"],
                    colors: ["#32bfff", "#ffcb32", "#e72e2e"],
                    legend: {
                        show: false,
                        position: 'top',
                        horizontalAlign: 'left',
                        offsetX: -20
                    },
                    responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    height: 260
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                };

                chart = new ApexCharts(document.querySelector("#manager<?= $i ?>"), options);
                chart.render();
<?php } ?>


        });
    </script>





</main>
<!--end page main-->

