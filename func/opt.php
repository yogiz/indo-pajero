<?php 
/**
Kontak option
 */

function kontak_options_panel(){
  add_menu_page('Kontak Setting', 'Kontak', 'manage_options', 'kontak-option', 'kontak_func',$icon_url,50);
}
add_action('admin_menu', 'kontak_options_panel');

function kontak_func(){

	if (isset($_POST['hd_submit'])) {
    	update_option('kt_phone',$_POST['kt_phone']);
    	update_option('kt_email',$_POST['kt_email']);
    	update_option('kt_alamat1',$_POST['kt_alamat1']);
    	update_option('kt_alamat2',$_POST['kt_alamat2']);
    	update_option('kt_alamat3',$_POST['kt_alamat3']);
    }

	$kt_phone = get_option('kt_phone');
	$kt_email = get_option('kt_email');
	$kt_alamat1 = get_option('kt_alamat1');
	$kt_alamat2 = get_option('kt_alamat2');
	$kt_alamat3 = get_option('kt_alamat3');



    ?>
    <div class="wrap">
    	<!-- <div class="icon32"><br></div> -->
    <form id="kontak-option-form" class="form_admin_custom" method="post">
    	<h2>Header Option</h2>
    	<div>
    		<h3>Title</h3>
			<ul>
				<li>
					<label>Phone</label>
					<input name="kt_phone" type="text" value="<?php echo $kt_phone; ?>"></input>
				</li>
				<li>
					<label>Email</label>
					<input name="kt_email" type="email" value="<?php echo $kt_email; ?>"></input>
				</li>
				<li>
					<label>Alamat</label>
					<input name="kt_alamat1" type="text" value="<?php echo $kt_alamat1; ?>"></input>
					<input name="kt_alamat2" type="text" value="<?php echo $kt_alamat2; ?>"></input>
					<input name="kt_alamat3" type="text" value="<?php echo $kt_alamat3; ?>"></input>
				</li>
			</ul>
    	</div>
    	<input type="submit" class="button" name="hd_submit" value="save"></input>
    </form>
    </div>

    <?php
} ?>
