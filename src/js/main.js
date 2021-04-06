import $ from './plugins/jquery';
import Locations from './locations';
import Forms from './forms';
import SmoothScroll from './smooth-scroll';


(($) => {
  const $locationPage = $('body.location-page');
  const $forms = $('form');

  if ($locationPage && $locationPage.length > 0) {
    Locations.init($);
  }

  if ($forms.length > 0) {
    Forms.init($);
  }

  SmoothScroll.init($);
})($);
