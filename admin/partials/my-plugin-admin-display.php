<?php

/*****************************************
* Admin display content
/****************************************/

?>

<div class="wrap">
  <h2>Snazzy Slider</h2>

  <!-- Submits to core WP file that controls the settings -->
  <form method="post" action="options.php">

    <!-- Sets up the settings fields using the options group name -->
    <?php settings_fields('myplugin_settings_group'); ?>

    <h4>Enable<h4>
    <p>
      <input id="myplugin_settings[enable]" name="myplugin_settings[enable]" type="checkbox" value="1"<?php checked( '1', $myplugin_options['enable'] ); ?>>
      <label class="description" for="myplugin_settings[enable]">Dislpay the Follow Me on Twitter link</label>
    </p>

    <h4>Twitter Information<h4>
    <p>
      <input id="myplugin_settings[twitter_url]" name="myplugin_settings[twitter_url]" type="text" value="<?php echo $myplugin_options['twitter_url'] ?>">
      <label class="description" for="myplugin_settings[twitter_url]">Enter your Twitter URL</label>
    </p>

    <h4>Theme<h4>
    <p>
      <select id="myplugin_settings[theme]" name="myplugin_settings[theme]">

        <?php $styles = array('blue', 'red'); ?>

        <?php foreach ($styles as $style) : ?>

          <?php
            if ( $style === $myplugin_options['theme'] ) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
          ?>

          <option value="<?php echo $style; ?>" <?php echo $selected; ?>><?php echo $style; ?></option>

        <?php endforeach ?>

      </select>
    </p>

    <p class="submit">
      <input class="button-primary" type="submit" value="Save Options">
    </p>

  </form>
</div>
