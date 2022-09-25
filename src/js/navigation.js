/**
 *
 * store Flyout Menu
 *
 */

// // store Flyout Variables
// var storeFlyoutButton = document.getElementById('store-flyout-button');
// var storeFlyout = document.getElementById('store-flyout');

// // store Flyout Button Click Event
// storeFlyoutButton.addEventListener('click', () => {
//   storeFlyoutButton.classList.toggle('active');
//   storeFlyout.classList.toggle('active');
// });

// Detect Clicks Outside of Elements
// document.addEventListener('click', function (event) {
//   // If user clicks inside the element, do nothing
//   if (event.target.closest('#store-flyout-button') || event.target.closest('#store-flyout'))
//     return;
//   // If user clicks outside the element, remove it
//   storeFlyoutButton.classList.remove('active');
//   storeFlyout.classList.remove('active');
// });

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
