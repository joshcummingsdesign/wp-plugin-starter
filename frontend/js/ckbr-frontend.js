/* global Cookies */
/* global settings */

(function ($) {
  'use strict';

  /**
   * Shows and hides cookie banner
   * @return {undefined}
   */
  var cookieBanner = function () {

    // Return early if cookie is set
    if (Cookies.get('ckbr_verify')) {
      return;
    } else {

      // Otherwise prompt the user to accept the terms
      var $banner  = $('#ckbr_banner'),
          $confirm = $('#ckbr_confirm'),
          expires  = parseInt(settings.expires) || 30,
          path     = settings.path || '/';

      $banner.removeClass('ckbr_hidden');

      // If user confirms, hide banner
      $confirm.click(function (e) {
        e.preventDefault();
        Cookies.set('ckbr_verify', 'true', {expires: expires, path: path});
        $banner.addClass('ckbr_hidden');
      });
    }
  };

  /**
   * Checks for js-cookie and initializes
   * @return {undefined}
   */
  var ckbrInit = function () {
    if (typeof(Cookies) === 'undefined') {
      $.getScript(settings.jsCookie, cookieBanner);
    } else {
      cookieBanner();
    }
  };

  $(document).ready(function () {
    ckbrInit();
  });

})(jQuery);
