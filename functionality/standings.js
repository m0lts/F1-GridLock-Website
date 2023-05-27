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
    if (item.innerHTML === null) {
        item.style.display = 'none';
    }
})