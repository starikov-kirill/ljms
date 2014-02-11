<?php $this->load->view('admin/include/header')?>
<?php $this->load->view('admin/include/admin_menu')?>
<h2 class="title_admin">Add System User</h2>
	<?php 
		$attributes = array('id' => 'add_user');
		echo form_open_multipart('admin/system_users/add', $attributes);
	?>
		<div class="add_form">
		<h3 class="title_form">User information</h3>
			<div class="form-group">
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>First Name *</label>
					</div>
					<div class="hilf_width_col">
						<?php echo form_input('first_name'); ?>
					</div>
				</div>
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>Last Name *</label>
					</div>
					<div class="hilf_width_col">
						<?php echo form_input('last_name'); ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>Address *</label>
					</div>
					<div class="hilf_width_col">
						<?php echo form_input('address'); ?>
					</div>
				</div>
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>City *</label>
					</div>
					<div class="hilf_width_col">
						<?php echo form_input('city'); ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>State *</label>
					</div>
					<div class="hilf_width_col">
						<?php
							$setting = 'class= "select_wide"';
							$options[''] =  'Select one';
							foreach($states as $item) :
								$options[$item['id']] =  $item['name'];
							endforeach;
							echo form_dropdown('state_id', $options, '',$setting);
						?>
					</div>
				</div>
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>Zipcode *</label>
					</div>
					<div class="hilf_width_col">
						<?php echo form_input('zipcode'); ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>Email *</label>
					</div>
					<div class="hilf_width_col">
						<?php echo form_input('email'); ?>
					</div>
				</div>
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>Home Phone *</label>
					</div>
					<div class="hilf_width_col">
						<?php echo form_input('home_phone'); ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>Email Confirm *</label>
					</div>
					<div class="hilf_width_col">
						<?php echo form_input('repeat_email'); ?>
					</div>
				</div>
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>Cell Phone </label>
					</div>
					<div class="hilf_width_col">
						<?php echo form_input('cell_phone'); ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>Password *</label>
					</div>
					<div class="hilf_width_col">
						<?php echo form_input('password'); ?>
					</div>
				</div>
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>Alternitive Phone </label>
					</div>
					<div class="hilf_width_col">
						<?php echo form_input('alt_phone'); ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>Password Confirm*</label>
					</div>
					<div class="hilf_width_col">
						<?php echo form_input('repassword'); ?>
					</div>
				</div>				
			</div>			
		</div>
		<div class="add_form">
		<h3 class="title_form">Alt Contact</h3>
			<div class="form-group">
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>First Name</label>
					</div>
					<div class="hilf_width_col">
						<?php echo form_input('alt_first_name'); ?>
					</div>
				</div>
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>Last Name</label>
					</div>
					<div class="hilf_width_col">
						<?php echo form_input('alt_first_name'); ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>Email</label>
					</div>
					<div class="hilf_width_col">
						<?php echo form_input('alt_email'); ?>
					</div>
				</div>
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>Alt Phone</label>
					</div>
					<div class="hilf_width_col">
						<?php echo form_input('alt_phone_2'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="add_form">
		<h3 class="title_form">User Roles</h3>
			<div class="form-group">
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>Assign Roles</label>
					</div>
					<div class="hilf_width_col">
						<?php
							$setting_rol = 'class= "select_wide control_button"';
							$options_roles[''] =  'Select';
							foreach($roles as $item) :
								$options_roles[$item['id']] =  $item['name'];
							endforeach;
							echo form_dropdown('roles', $options_roles, '',$setting_rol);
						?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>Assign Divisions</label>
					</div>
					<div class="hilf_width_col">
						<?php
							$setting_div = 'class="select_wide assign_division" disabled="disabled"';
							$options_div[''] =  'Select';
							foreach($divisions as $item) :
							$options_div[$item['id']] =  htmlspecialchars($item['name']);
							endforeach;
						echo form_dropdown('division', $options_div, '',$setting_div);
						?>
					</div>
				</div>
				<div class="hilf_width_col">
					<div class="hilf_width_col">
						<label>Assign Teams</label>
					</div>
					<div class="hilf_width_col">
						<?php
							$setting_team = 'class="select_wide assign_team" disabled="disabled"';
							$options_team[''] =  'Select';
						echo form_dropdown('team', $options_team, '',$setting_team);
						?>
					</div>
				</div>
			</div>
				<table style="display: none">
					<?php $this->load->view('admin/templates/role_block') ?>
				</table>
				<table class="user_roles">
					<thead>
						<tr>
							<th class="quarter"><p>Current Roles</p></th>
							<th class="quarter"><p>Division</p></th>
							<th class="quarter"><p>Team</p></th>
							<th class="quarter"></th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
				<a  class="inactive_button">Add Role</a>
			</div>
		<div class="text_center">
			<?php
				$data = array('value' => 'Save', 'class'=> 'button');
				echo form_submit($data);
			?>
		</div>
	<?php echo form_close()?>
	<div class="right_button">
		<a class="button" href="<?=base_url('admin/system_users')?>">Back</a>
	</div>
<?php $this->load->view('admin/include/footer')?>