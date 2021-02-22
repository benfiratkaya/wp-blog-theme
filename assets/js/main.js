/* COMMENTS */
$('.logged-in-as').insertAfter('#formHeader').css('display', 'block');

/* CONTACT FORM */
function showContactFormAlert(status, message) {
  var alertClass = 'alert alert-' + status;
  $('.wpcf7-form').closest('article').prepend('<div class="wpcf7-form-result"><div class="' + alertClass + '">' + message + '</div></div>');
}
$('.wpcf7-submit').on('click', function() {
  $('.wpcf7-form-result').remove();
});
document.addEventListener('wpcf7submit', function(event) {
  $('html, body').animate({
    scrollTop: $('.wpcf7-form-result').offset().top
  });
}, false);
document.addEventListener('wpcf7invalid', function(event) {
  showContactFormAlert('danger', event.detail.apiResponse.message);
}, false);
document.addEventListener('wpcf7spam', function(event) {
  showContactFormAlert('danger', event.detail.apiResponse.message);
}, false);
document.addEventListener('wpcf7mailfailed', function(event) {
  showContactFormAlert('danger', event.detail.apiResponse.message);
}, false);
document.addEventListener('wpcf7mailsent', function(event) {
  showContactFormAlert('success', event.detail.apiResponse.message);
}, false);

$(document).ready(function() {
  /* SYNTAX */
  $('.enlighter-btn-copy').attr('title', 'Kopyala');
  $('.enlighter-btn-window').attr('title', 'Kodu Göster');

  /* FANCYBOX */
  $('.article-content img').fancybox({
    idleTime: false
  });

  /* OWL CAROUSEL */
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    navText: [
      "<i class='fas fa-angle-left'></i>",
      "<i class='fas fa-angle-right'></i>"
    ],
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 2
      }
    }
  });

  /* NEW TAB */
  $('a[rel="external"]').attr('target', '_blank');

  $(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });

  $('.navbar-toggler').on('click', function() {
    $('.toggle-icon').toggleClass('open');
  });

  let searchbarStatus = false;

  $('.searchbar').on('click', function(e) {
    e.stopPropagation();
    if (searchbarStatus === false) {
      e.preventDefault();
      searchbarStatus = true;
      $(this).addClass('active');
      $('#header .nav-item:not(.nav-search, .nav-search-mobile)').css('display', 'none');
    }
  });

  $(document).on('click', function(e) {
    if (searchbarStatus === true) {
      searchbarStatus = false;
      $('.searchbar').removeClass('active');
      $('#header .nav-item:not(.nav-search, .nav-search-mobile)').delay(500).queue(function(next) {
        $(this).css('display', 'block');
        next();
      });
    }
  });
});
