// Grab as much info as possible 
// outside the scroll handler for performace reasons.
var header             = document.querySelector('header'),
    header_height      = getComputedStyle(header).height.split('px')[0],
    title              = header.querySelector('h1'),
    title_height       = getComputedStyle(title).height.split('px')[0],
    fix_class          = 'is--fixed';

function stickyScroll(e) {

  if( window.pageYOffset > (header_height - title_height ) / 2 ) {
    title.classList.add(fix_class);
  }

  if( window.pageYOffset < (header_height - title_height ) / 2 ) {
    title.classList.remove(fix_class);
  }
}

// Scroll handler to toggle classes.
window.addEventListener('scroll', stickyScroll, false);