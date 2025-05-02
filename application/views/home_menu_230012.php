<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row">
	<div class="col-xxl-8 mb-6 order-0">
		<div class="card">
			<div class="d-flex align-items-start row">
				<div class="col-sm-7">
					<div class="card-body">
						<h5 class="card-title text-primary mb-3">Welcome
							<?= $this->session->userdata('fullname_230012') ?>, you are login as
							<?= $this->session->userdata('usertype_230012') ?></h5>
					</div>
				</div>
				<div class="col-sm-5 text-center text-sm-left">
					<div class="card-body pb-0 px-0 px-md-6">
						<img src="<?= base_url('assets/img/illustrations/man-with-laptop.png') ?>" height="175"
							alt="View Badge User" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xxl-4 col-lg-12 col-md-4 order-1">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-6 mb-6">
				<div class="card h-100">
					<div class="card-body">
						<div class="card-title d-flex align-items-start justify-content-between mb-4">
							<div class="avatar flex-shrink-0">
								<img src="<?= base_url('assets/img/icons/unicons/chart-success.png') ?>"
									alt="chart success" class="rounded" />
							</div>
							<div class="dropdown">
								<button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
									aria-haspopup="true" aria-expanded="false">
									<i class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
								</button>
								<div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
									<a class="dropdown-item" href="javascript:void(0);">View More</a>
									<a class="dropdown-item" href="javascript:void(0);">Delete</a>
								</div>
							</div>
						</div>
						<p class="mb-1">Profit</p>
						<h4 class="card-title mb-3">Rp<?= number_format($profit, 0, ',', '.') ?></h4>
						<small class="text-success fw-medium">
							<i class="icon-base bx bx-up-arrow-alt"></i>
							Rp<?= number_format($last_sale_price, 0, ',', '.') ?>
						</small>

					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12 col-6 mb-6">
				<div class="card h-100">
					<div class="card-body">
						<div class="card-title d-flex align-items-start justify-content-between mb-4">
							<div class="avatar flex-shrink-0">
								<img src="<?= base_url('assets/img/icons/unicons/wallet-info.png') ?>" alt="wallet info"
									class="rounded" />
							</div>
							<div class="dropdown">
								<button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
									aria-haspopup="true" aria-expanded="false">
									<i class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
								</button>
								<div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
									<a class="dropdown-item" href="javascript:void(0);">View More</a>
									<a class="dropdown-item" href="javascript:void(0);">Delete</a>
								</div>
							</div>
						</div>
						<p class="mb-1">Sold</p>
						<h4 class="card-title mb-3"><?= $sold ?></h4>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Expense Overview -->
	<div class="order-2 order-md-3 order-xxl-2 mb-6 total-revenue">
		<div class="card h-100">
			<div class="card-body">
				<div class="tab-content p-0">
					<div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
						<div class="d-flex mb-6">
							<div class="avatar flex-shrink-0 me-3">
								<img src="<?= base_url('assets/img/icons/unicons/wallet.png') ?>" alt="User" />
							</div>
							<div>
								<p class="mb-0">Total Balance</p>
								<div class="d-flex align-items-center">
									<h6 class="mb-0 me-1">Rp<?= number_format($profit, 0, ',', '.') ?></h6>
									<small class="text-success fw-medium">
										<i class="icon-base bx bx-chevron-up icon-lg"></i>
										Rp<?= number_format($last_sale_price, 0, ',', '.') ?>
									</small>
								</div>
							</div>
						</div>
						<div id="incomeChart"></div>
						<div class="d-flex align-items-center justify-content-center mt-6 gap-3">
							<div class="flex-shrink-0">
								<div id="expensesOfWeek"	></div>
							</div>
							<div>
								<h6 class="mb-0">Income this week</h6>
								<small>$39k less than last week</small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ Expense Overview -->

	<script>
		const salePercentage = <?= $sale_percentage ?>;
		const saleCount = <?= $sale_count ?>;
		const incomeChartLabels = <?= $chart_labels ?>;
 		const incomeChartValues = <?= $chart_values ?>;
	</script>

</div>
