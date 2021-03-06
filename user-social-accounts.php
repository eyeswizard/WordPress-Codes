/**
 * Add user's social accounts
 *
 */
add_action( 'show_user_profile', 'inlife_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'inlife_show_extra_profile_fields' );
	function inlife_show_extra_profile_fields( $user ) {
		?>
		<h3><?php esc_html_e( 'Social Networking', 'inlife' ) ?></h3>
		<table class="form-table">
			<tr>
				<th><label for="facebook"><?php esc_html_e( 'FaceBook URL', 'inlife' ); ?></label></th>
				<td>
					<input type="text" name="facebook" id="facebook"
					       value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>"
					       class="regular-text"/><br/>
				</td>
			</tr>
			<tr>
				<th><label for="twitter"><?php esc_html_e( 'Twitter URL', 'inlife' ); ?></label></th>
				<td>
					<input type="text" name="twitter" id="twitter"
					       value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>"
					       class="regular-text"/><br/>
				</td>
			</tr>
			<tr> 
				<th><label for="google"><?php esc_html_e( 'Google + URL', 'inlife' ); ?></label></th>
				<td>
					<input type="text" name="google" id="google"
					       value="<?php echo esc_attr( get_the_author_meta( 'google', $user->ID ) ); ?>"
					       class="regular-text"/><br/>
				</td>
			</tr>
			<tr>
				<th><label for="dribbble"><?php esc_html_e( 'Dribbble URL', 'inlife' ); ?></label></th>
				<td>
					<input type="text" name="dribbble" id="dribbble"
					       value="<?php echo esc_attr( get_the_author_meta( 'dribbble', $user->ID ) ); ?>"
					       class="regular-text"/><br/>
				</td>
			</tr>
			<tr>
				<th><label for="github"><?php esc_html_e( 'Github URL', 'inlife' ); ?></label></th>
				<td>
					<input type="text" name="github" id="github"
					       value="<?php echo esc_attr( get_the_author_meta( 'github', $user->ID ) ); ?>"
					       class="regular-text"/><br/>
				</td>
			</tr>
			<tr> 
				<th><label for="instagram"><?php esc_html_e( 'Instagram URL', 'inlife' ); ?></label></th>
				<td>
					<input type="text" name="instagram" id="instagram"
					       value="<?php echo esc_attr( get_the_author_meta( 'instagram', $user->ID ) ); ?>"
					       class="regular-text"/><br/>
				</td>
			</tr>
			<tr>
				<th><label for="linkedin"><?php esc_html_e( 'linkedIn URL', 'inlife' ); ?></label></th>
				<td>
					<input type="text" name="linkedin" id="linkedin"
					       value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>"
					       class="regular-text"/><br/>
				</td>
			</tr>
			<tr>
				<th><label for="tumblr"><?php esc_html_e( 'Tumblr URL', 'inlife' ); ?></label></th>
				<td>
					<input type="text" name="tumblr" id="tumblr"
					       value="<?php echo esc_attr( get_the_author_meta( 'tumblr', $user->ID ) ); ?>"
					       class="regular-text"/><br/>
				</td>
			</tr>
			<tr>
				<th><label for="flickr"><?php esc_html_e( 'Flickr URL', 'inlife' ); ?></label></th>
				<td>
					<input type="text" name="flickr" id="flickr"
					       value="<?php echo esc_attr( get_the_author_meta( 'flickr', $user->ID ) ); ?>"
					       class="regular-text"/><br/>
				</td>
			</tr>
			<tr>
				<th><label for="pinterest"><?php esc_html_e( 'Pinterest URL', 'inlife' ); ?></label></th>
				<td>
					<input type="text" name="pinterest" id="pinterest"
					       value="<?php echo esc_attr( get_the_author_meta( 'pinterest', $user->ID ) ); ?>"
					       class="regular-text"/><br/>
				</td>
			</tr>
			<tr>
				<th><label for="vimeo"><?php esc_html_e( 'Vimeo URL', 'inlife' ); ?></label></th>
				<td>
					<input type="text" name="vimeo" id="vimeo"
					       value="<?php echo esc_attr( get_the_author_meta( 'vimeo', $user->ID ) ); ?>"
					       class="regular-text"/><br/>
				</td>
			</tr>
			<tr>
				<th><label for="youtube"><?php esc_html_e( 'YouTube URL', 'inlife' ); ?></label></th>
				<td>
					<input type="text" name="youtube" id="youtube"
					       value="<?php echo esc_attr( get_the_author_meta( 'youtube', $user->ID ) ); ?>"
					       class="regular-text"/><br/>
				</td>
			</tr>
		</table>
		<?php
	}



/**
 * Save user's social accounts
 * */
add_action( 'personal_options_update', 'inlife_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'inlife_save_extra_profile_fields' );

	function inlife_save_extra_profile_fields( $user_id ) {
		if ( ! current_user_can( 'edit_user', $user_id ) ) {
			return false;
		}
		update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
		update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
		update_user_meta( $user_id, 'google', $_POST['google'] );
		update_user_meta( $user_id, 'dribbble', $_POST['dribbble'] );
		update_user_meta( $user_id, 'github', $_POST['github'] );
		update_user_meta( $user_id, 'instagram', $_POST['instagram'] );
		update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
		update_user_meta( $user_id, 'tumblr', $_POST['tumblr'] );
		update_user_meta( $user_id, 'flickr', $_POST['flickr'] );
		update_user_meta( $user_id, 'pinterest', $_POST['pinterest'] );
		update_user_meta( $user_id, 'vimeo', $_POST['vimeo'] );
		update_user_meta( $user_id, 'youtube', $_POST['youtube'] );
}
