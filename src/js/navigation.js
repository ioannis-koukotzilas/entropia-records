/**
 *
 * store Flyout Menu
 *
 */


function navigation() {
  const mainMenu = document.querySelector('.site-header');

  const recordsBtn = mainMenu.querySelector('#menu-item-733');
  const recordsFlyout = mainMenu.querySelector('#store-flyout');

  function flyoutOpen() {
    recordsFlyout.classList.add('active');
  }

  function flyoutClose() {
    recordsFlyout.classList.remove('active');
  }

  recordsBtn.addEventListener('mouseover', () => {
    flyoutOpen();
  });

  recordsBtn.addEventListener('mouseleave', () => {
    flyoutClose();
  });

  recordsFlyout.addEventListener('mouseover', () => {
    flyoutOpen();
  });

  recordsFlyout.addEventListener('mouseleave', () => {
    flyoutClose();
  });
}

navigation();
