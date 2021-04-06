import axios from 'axios';
import Glide from '@glidejs/glide';

const Locations = {
  init($) {
    window.$ = window.jQuery = $;
    this.$carousel = $('#carousel');
    this.$carouselContainer = this.$carousel.find('.container-fluid');
    this.carouselHTML = this.$carouselContainer.html();
    this.locations = [
      'Harrington',
      'Cornwall',
      'Southwell',
      'Mews',
      'Kensington',
      'Tourist',
      'Apartments',
    ];

    this.getImages();
  },

  getImages() {
    const images = axios
      .get('https://jsonplaceholder.typicode.com/photos')
      .then(({ data }) => {
        this.buildCarousel(data);
      })
      .catch((err) => {
        console.error('sorry there has been an error', err);
      });
  },

  buildCarousel(images) {
    this.$carouselContainer.removeClass('d-none').empty();

    this.locations.forEach((location, index) => {
      const $carousel = $(this.carouselHTML).clone();
      const $glide = $carousel.find('.glide');
      const $glideSlides = $glide.find('.glide__slides');
      const $title = $carousel.find('h2');
      const glideClass = `glide-${index}`;

      $title.text(location);
      $glide.addClass(glideClass);

      for (let i = 0; i < 5; i++) {
        const image = images[i];
        $glideSlides.append(
          `<li class="glide__slide">
            <figure>
              <img src="${image.url}" />
              <figcaption>${image.title}</figcaption>
            </figure>
        </li>`
        );
      }

      this.$carouselContainer.append($carousel);

      var glide = new Glide(`.${glideClass}`, {
        type: 'carousel',
        perView: 4,
        focusAt: 'center',
        breakpoints: {
          800: {
            perView: 2,
          },
          480: {
            perView: 1,
          },
        },
      });

      glide.mount();
    });
  },
};

export default Locations;
