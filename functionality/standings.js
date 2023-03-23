// SHOW PREVIOUS PREDICTIONS IN STANDINGS BOX
// get elements
const playerListItem = document.querySelectorAll('.points-list-container');

playerListItem.forEach(item => {
    item.addEventListener('click', function() {
        const dropDown = item.querySelector('.previous-player-predictions');
        dropDown.classList.toggle('clicked');
    });
});

// SHOW DRIVERS/CONSTRUCTORS TAB
const driversTab = document.querySelector('.drivers');
const constructorsTab = document.querySelector('.constructors');
const driversList = document.querySelector('.drivers-list');
const constructorsList = document.querySelector('.constructors-list');

const showConstructorsTab = () => {
    driversList.classList.add('hide');
    constructorsList.classList.add('show');
}
const showDriversTab = () => {
    driversList.classList.remove('hide');
    constructorsList.classList.remove('show');
}

if (driversTab) {
    driversTab.addEventListener('click', showDriversTab);
}

constructorsTab.addEventListener('click', showConstructorsTab);