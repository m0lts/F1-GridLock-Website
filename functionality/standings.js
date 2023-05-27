// SHOW PREVIOUS PREDICTIONS IN STANDINGS BOX
// get elements
const playerListItem = document.querySelectorAll('.points-list-container');

playerListItem.forEach(item => {
    item.addEventListener('click', function() {
        const dropDown = item.querySelector('.previous-player-predictions');
        dropDown.classList.toggle('clicked');
    });
});


// Tally up points for each user

function calculatePoints(classNames, totalPointsElement) {
    const points = document.querySelectorAll(classNames);
    let pointsSum = 0;
  
    points.forEach(point => {
      const value = parseFloat(point.textContent);
  
      if (!isNaN(value)) {
        pointsSum += value;
      }
    });
  
    totalPointsElement.innerHTML = pointsSum;
  }
  
  // OWEN
  const owenTotalPoints = document.querySelector('.owen-points-total');
  calculatePoints('.owen-points', owenTotalPoints);
  
  // TOM
  const tomTotalPoints = document.querySelector('.tom-points-total');
  calculatePoints('.tom-points', tomTotalPoints);

  // TOBY
  const tobyTotalPoints = document.querySelector('.toby-points-total');
  calculatePoints('.toby-points', tobyTotalPoints);

  // ALI
  const aliTotalPoints = document.querySelector('.ali-points-total');
  calculatePoints('.ali-points', aliTotalPoints);

  // ED
  const edTotalPoints = document.querySelector('.ed-points-total');
  calculatePoints('.ed-points', edTotalPoints);

  // TOBY
  const jackTotalPoints = document.querySelector('.jack-points-total');
  calculatePoints('.jack-points', jackTotalPoints);