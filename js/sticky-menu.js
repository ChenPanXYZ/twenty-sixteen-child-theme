( function( $ ) {
  window.onscroll = function() {
    stickyMenu(lastPosition)
  }

  let header = document.getElementById("site-navigation")
  let sticky = header.offsetTop
  let lastPosition = 20
  
  function stickyMenu() {
    let st = window.pageYOffset
    if (st > sticky && st < lastPosition) {
      header.classList.add("sticky-nav")
    } 
    else {
      header.classList.remove("sticky-nav")
    }
    lastPosition = st <= 0 ? 0 : st
  }
})()