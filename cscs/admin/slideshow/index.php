<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline rounded-0 card-navy">
	<div class="card-header">
		<h3 class="card-title">List of Slideshow</h3>
		<div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div>
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="20%">
					<col width="30%">
					<col width="15%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>Date Created</th>
						<th>Name</th>
						<th>Description</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
                <tbody>
					<?php 
					$i = 1;
					$qry = $conn->query("SELECT * FROM `slideshow_list` ORDER BY `name` ASC");
					while ($row = $qry->fetch_assoc()):
						// Correct the image path
						$imagePath = str_replace("http://localhost/cscs/admin/", "http://localhost/cscs/uploads/slideshow/", $row['image']);
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo date("Y-m-d H:i", strtotime($row['date_created'])) ?></td>
							<td><?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') ?></td>
							<td><p class="m-0 truncate-1"><?= htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8') ?></p></td>
							<td class="text-center">
								<?php 
								// Define the base path for slideshow images
								$imagePath = base_url . "uploads/slideshow/" . $row['image'];

								// Check if the image field is not empty and the file exists
								if (!empty($row['image']) && file_exists($_SERVER['DOCUMENT_ROOT'] . "/cscs/uploads/slideshow/" . $row['image'])): ?>
									<img src="<?= htmlspecialchars($imagePath, ENT_QUOTES, 'UTF-8') ?>" alt="Slideshow Image" style="width: 50px; height: auto;">
								<?php else: ?>
									<span>No Image</span>
								<?php endif; ?>
							</td>
							<td class="text-center">
								<?php if ($row['status'] == 1): ?>
									<span class="badge badge-success px-3 rounded-pill">Active</span>
								<?php else: ?>
									<span class="badge badge-danger px-3 rounded-pill">Inactive</span>
								<?php endif; ?>
							</td>
							<td align="center">
								<button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
									Action
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu" role="menu">
									<a class="dropdown-item view_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> View</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item edit_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
								</div>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this Slideshow permanently?","delete_slideshow",[$(this).attr('data-id')])
		})
		$('#create_new').click(function(){
			uni_modal("<i class='fa fa-plus'></i> Add New Slideshow","slideshow/manage_slideshow.php")
		})
		$('.view_data').click(function(){
			uni_modal("<i class='fa fa-bars'></i> Slideshow Details","slideshow/view_slideshow.php?id="+$(this).attr('data-id'))
		})
		$('.edit_data').click(function(){
			uni_modal("<i class='fa fa-edit'></i> Update Slideshow Details","slideshow/manage_slideshow.php?id="+$(this).attr('data-id'))
		})
		$('.table').dataTable({
			columnDefs: [
					{ orderable: false, targets: [4,5] }
			],
			order:[0,'asc']
		});
		$('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
	})
	function delete_slideshow($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_slideshow",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>