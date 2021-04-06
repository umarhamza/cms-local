import $ from './plugins/jquery';
import Locations from './locations';
import SmoothScroll from './smooth-scroll';

(($) => {
  const $locationPage = $('body.location-page');

  if ($locationPage && $locationPage.length > 0) {
    Locations.init($);
  }

  SmoothScroll.init($);
})($);
