<div class="card">
	<h5 class="card-header">Sale List</h5>
	<div class="table-responsive text-nowrap">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Customer Name</th>
					<th>Sale Date</th>
					<th>Cat Name</th>
					<th>Customer Address</th>
					<th>Customer Phone</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				<?php foreach ($sales as $sale): ?>
				<tr>
					<td><?= $i++ ?></td>
					<td><?= $sale->customer_name_230012 ?></td>
					<td><?= $sale->sale_date_230012 ?></td>
					<td><?= $sale->name_230012 ?></td>
					<td><?= $sale->customer_address_230012 ?></td>
					<td><?= $sale->customer_phone_230012 ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<div class="my-3">
	<?= $pagination ?>
</div>