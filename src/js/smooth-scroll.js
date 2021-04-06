const SmoothScroll = {
  init($) {
    $('a.smooth-scroll').on('click', function (event) {
      if (this.hash !== '') {
        event.preventDefault();

        var hash = this.hash;

        $('html, body').animate(
          {
            scrollTop: $(hash).offset().top,
          },
          100,
          function () {
            window.location.hash = hash;
          }
        );
      } 
    });
  },
};

export default SmoothScroll;