/**
 *
 * store Flyout Menu
 *
 */

// Create the top level function
function monoscopicNav(target) {
  // Get the HTML elements

  const nav = document.querySelector(target);
  const navItem = nav.querySelectorAll('.has-panel > a');
  const panel = nav.querySelectorAll('.panel');

  // Loop through nav items
  for (let i = 0; i < navItem.length; i++) {
    // Create mouseover event for each nav item
    navItem[i].onmouseover = () => {
      for (let t = 0; t < navItem.length; t++) {
        if (i == t) {
          navItem[t].classList.add('active');
          panel[t].classList.add('active');
        }
      }
    };

    // Create mouseleave event for each nav item
    navItem[i].onmouseleave = () => {
      for (let t = 0; t < navItem.length; t++) {
        if (i == t) {
          navItem[t].classList.remove('active');
          panel[t].classList.remove('active');
        }
      }
    };
  }

  // Loop through panels
  for (let i = 0; i < panel.length; i++) {
    // Create mouseover event for each panel
    panel[i].onmouseover = () => {
      for (let t = 0; t < panel.length; t++) {
        if (i == t) {
          navItem[t].classList.add('active');
          panel[t].classList.add('active');
        }
      }
    };

    // Create mouseleave event for each panel
    panel[i].onmouseleave = () => {
      for (let t = 0; t < panel.length; t++) {
        if (i == t) {
          navItem[t].classList.remove('active');
          panel[t].classList.remove('active');
        }
      }
    };
  }
}

// Init menu
monoscopicNav('.site-header');
