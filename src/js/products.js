/*
Facets
*/

// Reset button
document.addEventListener('facetwp-loaded', () => {
  console.log('DOM fully loaded and parsed');

  const qs = FWP.buildQueryString();
  const resetButton = document.querySelector('.facetwp-reset-button');

  if (resetButton) {
    if ('' === qs) {
      // no facets are selected

      resetButton.style.display = 'none';
    } else {
      resetButton.style.display = 'block';
    }
  }
});
