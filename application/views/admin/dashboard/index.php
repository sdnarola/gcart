<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4></i><span class="text-semibold"><?php _el('dashboard');?></span></h4>
		</div>
	</div>
	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home2 position-left"></i><?php _el('dashboard');?> </a>
			</li>
		</ul>
	</div>
</div>
<!-- /Page header -->
<!-- Content area -->
<div class="content">

	<div class="row">
		<div class="col-md-3">
			<div class="panel bg-teal-400">
				<div class="panel-body">
					<h3 class="no-margin">Total Customers ! <span class="label pull-right"><i class="icon-users"></i></span></h3>
					<h4 class="no-margin"><?php echo $total_users; ?></h4>
					<div class="mt-10"><a href="#" class="btn btn-sm bg-teal-300">View All <i class="icon-arrow-right14 position-right"></i></a></div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel bg-danger-400">
				<div class="panel-body">
					<h3 class="no-margin">Total Orders ! <span class="label pull-right"><i class="icon-list-ordered"></i></span></h3>
					<h4 class="no-margin"><?php echo $total_orders; ?></h4>
					<div class="mt-10"><a href="#" class="btn btn-sm bg-danger-300">View All <i class="icon-arrow-right14 position-right"></i></a></div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel bg-orange-400">
				<div class="panel-body">
			        <h3 class="no-margin">Total Products ! <span class="label pull-right"><i class="icon-cart5"></i></span></h3>
					<h4 class="no-margin"><?php echo $total_products; ?></h4>
					<div class="mt-10"><a href="#" class="btn btn-sm bg-orange-300">View All <i class="icon-arrow-right14 position-right"></i></a></div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel bg-info-400">
				<div class="panel-body">
					<h3 class="no-margin">Total Vendors ! <span class="label pull-right"><i class="icon-user-tie"></i></span></h3>
					<h4 class="no-margin"><?php echo $total_vendors; ?></h4>
					<div class="mt-10"><a href="#" class="btn btn-sm bg-info-300">View All <i class="icon-arrow-right14 position-right"></i></a></div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-white">
				<div class="panel-heading">
					<h6 class="panel-title">Recent Order(s)</h6>
					<div class="heading-elements">
						<ul class="icons-list">
					        <li><a data-action="collapse" class=""></a></li>
					        <li><a data-action="reload"></a></li>
					    </ul>
				    </div>
				    <a class="heading-elements-toggle"><i class="icon-more"></i></a>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover table-sm table-striped rounded">
						<thead>
							<tr class="bg-slate-700">
								<th>Order No</th>
								<th>Order Date</th>
								<th>Details</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>11111</td>
								<td>22222</td>
								<td>33333</td>
							</tr>
							<tr>
								<td>11111</td>
								<td>22222</td>
								<td>33333</td>
							</tr>
							<tr>
								<td>11111</td>
								<td>22222</td>
								<td>33333</td>
							</tr>
							<tr>
								<td>11111</td>
								<td>22222</td>
								<td>33333</td>
							</tr>
							<tr>
								<td>11111</td>
								<td>22222</td>
								<td>33333</td>
							</tr>
						</tbody>
					</table>
			    </div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-white">
				<div class="panel-heading">
					<h6 class="panel-title">Recent Customer(s)</h6>
					<div class="heading-elements">
						<ul class="icons-list">
					        <li><a data-action="collapse" class=""></a></li>
					        <li><a data-action="reload"></a></li>
					    </ul>
				    </div>
				    <a class="heading-elements-toggle"><i class="icon-more"></i></a>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover table-sm table-striped rounded">
						<thead>
							<tr class="bg-slate-700">
								<th>Email</th>
								<th>Joining Date</th>
								<th>Details</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>11111</td>
								<td>22222</td>
								<td>33333</td>
							</tr>
							<tr>
								<td>11111</td>
								<td>22222</td>
								<td>33333</td>
							</tr>
							<tr>
								<td>11111</td>
								<td>22222</td>
								<td>33333</td>
							</tr>
							<tr>
								<td>11111</td>
								<td>22222</td>
								<td>33333</td>
							</tr>
							<tr>
								<td>11111</td>
								<td>22222</td>
								<td>33333</td>
							</tr>
						</tbody>
					</table>
			    </div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-heading">
					<h6 class="panel-title">Popular Product(s)</h6>
					<div class="heading-elements">
						<ul class="icons-list">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#"><i class="icon-file-stats"></i> View statement</a></li>
									<li><a href="#"><i class="icon-file-text2"></i> Edit campaign</a></li>
									<li><a href="#"><i class="icon-file-locked"></i> Disable campaign</a></li>
									<li><a href="#"><i class="icon-gear"></i> Settings</a></li>
								</ul>
							</li>
					        <li><a data-action="collapse" class=""></a></li>
					        <li><a data-action="reload"></a></li>
					    </ul>
				    </div>
				    <a class="heading-elements-toggle"><i class="icon-more"></i></a>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover table-sm table-striped rounded">
						<thead>
							<tr class="bg-slate-700">
								<th>Image</th>
								<th>Name</th>
								<th>Category</th>
								<th>Brand</th>
								<th>Price</th>
								<th>Details</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>11111</td>
								<td>22222</td>
								<td>33333</td>
								<td>44444</td>
								<td>55555</td>
								<td>66666</td>
							</tr>
							<tr>
								<td>11111</td>
								<td>22222</td>
								<td>33333</td>
								<td>44444</td>
								<td>55555</td>
								<td>66666</td>
							</tr>
							<tr>
								<td>11111</td>
								<td>22222</td>
								<td>33333</td>
								<td>44444</td>
								<td>55555</td>
								<td>66666</td>
							</tr>
						</tbody>
					</table>
			    </div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-heading">
					<h6 class="panel-title">Total Sales in Last 30 Days</h6>
					<div class="heading-elements">
						<ul class="icons-list">
					        <li><a data-action="collapse" class=""></a></li>
					        <li><a data-action="reload"></a></li>
					    </ul>
				    </div>
				    <a class="heading-elements-toggle"><i class="icon-more"></i></a>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="chart-container">
								<div class="chart has-fixed-height" id="connect_pie"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="chart-container">
								<div class="chart has-fixed-height" id="connect_column"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /Content area -->