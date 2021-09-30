(function($) {

  function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
  $(document).ready(function() {
    $('.cookie-buttons .button').click(function($e) {
      var str = $(this).val().replace(' ', '_').toLowerCase();
      setCookie('acquia_a', str);
      window.location.reload();
    });
  });

})(jQuery);

