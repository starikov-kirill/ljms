<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/admin_menu')?>
<div class="admin_menu_info">
	<h2>Teams</h2>
	<?php echo ($this->session->flashdata('item')); ?>
</div>
	<?php 
		$attributes = array('id' => 'filter',  'method' => 'get');
		echo form_open_multipart('admin/teams/', $attributes);
	?>
<div class="filter">
	<form>
		<b>Filter by:</b> Division:
		<?php
			$options[''] =  'All';
			foreach($list as $item) :
			$options[$item['id']] =  $item['name'];
			endforeach;
		echo form_dropdown('id', $options, $filter['id']);
		?>
		League type:
		<?php $options = array(
			''  => 'Select',
			'1'    => 'LJMS Teams',
			'2' => 'Non conference Teams
			',
		);
		echo form_dropdown('league_type_id', $options, $filter['league_type_id']);
		?>
		Status:
		<?php $options = array(
			''  => 'All',
			'1'    => 'Active',
			'0' => 'Inactive',
			);
		echo form_dropdown('status', $options, $filter['status']);
		?>
		<input type="submit" class="button" value="Filter">
	</form>
</div>
<?php echo form_close()?>
<div class="right_button">
	<a class="button" href="<?=base_url('admin/teams/add')?>">Add team</a>
</div>
<div class="right_button pagination total_rows">
	<a href="<?=base_url('admin/teams/?').$filter_data.'limit=10'?>">10</a>
	<a href="<?=base_url('admin/teams/?').$filter_data.'limit=20'?>">20</a>
	<a href="<?=base_url('admin/teams/?').$filter_data.'limit=30'?>">30</a>
	<a href="<?=base_url('admin/teams/?').$filter_data.'limit=all'?>">All</a>
</div>
	<?php 
		$attributes = array('id' => 'action_select');
		echo form_open_multipart('admin/teams/action', $attributes);
	?>
<div class="action_select">
	<?php $options = array(
		''  => 'Select',
		'delete'    => 'Delete',
		'active' => 'Active',
		'inactive' => 'Inactive',
		);
	echo form_dropdown('action', $options);
	?>
	<input type="submit" class="button" value="Action">
</div>
<?php echo form_close()?>
<table class="full_width_table">
	<thead>
		<tr>
			<th class ="checkbox_col" ><input class="check_all" type="checkbox" name="#"></th>
	<th class="team_col"><p>TEAM</p></th>
			<th class="divis_col"><p>DIVISION</p></th>
	<th class="coach_col"><p>COACH</p></th>
	<th class="wins_col"><p>WINS</p></th>
	<th class="loses_col"><p>LOSES</p></th>
	<th class="ties_col"><p>TIES</p></th>
	<th class="average_col"><p>AVERAGE</p></th>
	<th class="league_col"><p>LEAGUE TYPE</p></th>
			<th class="action_col"><p>ACTION</p></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($divisions as $item) :?>
			<tr>
				<td class ="checkbox_col"><input data-item-id="<?php echo ($item['id']);?>" class="check_div" type="checkbox"></td>
				<td  class="team_col"><p><?php echo htmlspecialchars($item['team_name']);?></p></td>
				<td class="divis_col"><p><?php echo htmlspecialchars($item['division_name']);?></p></td>
				<td class="coach_col"><p>COACH</p></td>
				<td class="wins_col"><p>0</p></td>
				<td class="loses_col"><p>0</p></td>
				<td class="ties_col"><p>0</p></td>
				<td class="average_col"><p>0</p></td>
				<td class="league_col"><p><?php echo htmlspecialchars($item['league_name']);?></p></td>
				<td class="action_col">
					<a class="button" href="<?=base_url('admin/team/add')?>">Assign players</a>
					<a href="<?php echo base_url('admin/teams/edit').'?'.'id='.($item['id'])?>" class="edit"><img src="<?=base_url('images/edit.png')?>"></a>
					<a href="#delete" data-item-id="<?php echo ($item['id']);?>" class="delete"><img src="<?=base_url('images/delete.png')?>"></a>
				</td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>
<div class="pagination">
<?php echo $this->pagination->create_links(); ?>
</div>

<?php $this->load->view('admin/include/footer')?>