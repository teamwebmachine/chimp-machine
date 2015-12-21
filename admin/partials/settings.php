<?php
/**
 * The main admin page for chimp machine settings
 *
 * @link       http://webmachine.io/chimp-machine
 * @since      1.0.0
 *
 * @package    Chimp_Machine
 * @subpackage Chimp_Machine/admin/partials
 */

if (isset($_GET['tab'])) {
  $tab = $_GET['tab'];
} else {
  $tab = 'settings';
}

if ( $tab == 'settings' ) { 
  
/**
 * General Settings
 */

?>

<div class="wrap">
    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

    <h2 class="nav-tab-wrapper">
      <a class="nav-tab nav-tab-active" href="<?php echo admin_url() ?>options-general.php?page=chimp-machine&tab=settings">Settings</a>
      <a class="nav-tab" href="<?php echo admin_url() ?>options-general.php?page=chimp-machine&tab=createposts">Create Posts from Campaigns</a>
      <a class="nav-tab" href="<?php echo admin_url() ?>options-general.php?page=chimp-machine&tab=shortcodes">Shortcodes</a>
    </h2>

    <form class="chimp-machine-settings" action="options.php" method="post">
        <?php
            settings_fields( $this->Chimp_Machine );
            do_settings_sections( $this->Chimp_Machine );
            submit_button();
        ?>
    </form>



</div>

<?php
} else if ( $tab == 'createposts' ) { 
  
/**
 * Create Posts from campaigns
 */

?>

<div class="wrap">
    <h2>Create Posts from Mailchimp Campaigns</h2>

    <h2 class="nav-tab-wrapper">
      <a class="nav-tab" href="<?php echo admin_url() ?>options-general.php?page=chimp-machine&tab=settings">Settings</a>
      <a class="nav-tab nav-tab-active" href="<?php echo admin_url() ?>options-general.php?page=chimp-machine&tab=createposts">Create Posts from Campaigns</a>
      <a class="nav-tab" href="<?php echo admin_url() ?>options-general.php?page=chimp-machine&tab=shortcodes">Shortcodes</a>
    </h2>


    <?php 
      //echo $_POST['status']; 
      //echo $_POST['count'];
    ?>



    <div class="campaignFilter clearfix">
      <form action="" method="post">
        <div class="form-group">
          <label for="status">Status</label>
          <select name="status">
            <option value="sent">Sent</option>
            <option value="save">Saved</option>
            <option value="paused">Paused</option>
            <option value="schedule">Scheduled</option>
            <option value="sending">Sending</option>
          </select>
        </div>

        <div class="form-group">
          <label for="count">Number</label>
          <select name="count">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>
        </div>

        <div class="form-group">
          <input type="submit" value="Filter" class="button button-primary" />
        </div>

      </form>
    </div>

    <?php echo $this->chimp_machine_campaign_list(); ?>
    
</div>

<?php
} else if ( $tab == 'shortcodes' ) {
?>
  <div class="wrap">
    <h2>Shortcodes</h2>

    <h2 class="nav-tab-wrapper">
      <a class="nav-tab" href="<?php echo admin_url() ?>options-general.php?page=chimp-machine&tab=settings">Settings</a>
      <a class="nav-tab" href="<?php echo admin_url() ?>options-general.php?page=chimp-machine&tab=createposts">Create Posts from Campaigns</a>
      <a class="nav-tab nav-tab-active" href="<?php echo admin_url() ?>options-general.php?page=chimp-machine&tab=shortcodes">Shortcodes</a>
    </h2>

    <p>Coming soon...</p>
  </div>

<?php
}

