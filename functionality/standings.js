// SHOW PREVIOUS PREDICTIONS IN STANDINGS BOX
// get elements
const playerListItem = document.querySelectorAll('.points-list-container');

playerListItem.forEach(item => {
    item.addEventListener('click', function() {
        const dropDown = item.querySelector('.previous-player-predictions');
        dropDown.classList.toggle('clicked');
    });
});


// Make prev-points list item invisible unless points are assigned to it

const prevPoints = document.querySelectorAll('.prev-points');

prevPoints.forEach(item => {
    if (item.textContent === 0) {
        item.style.display = 'none';
    }
});

const owenPoints = document.querySelectorAll('.owen-points');
const owenTotalPoints = document.querySelector('.owen-points-total');

let owenPointsSum = 0;

owenPoints.forEach(point => {
    const value = parseFloat(point.textContent);

    if (!isNaN(value)) {
        owenPointsSum += value;
    };
})

owenTotalPoints.innerHTML = owenPointsSum;