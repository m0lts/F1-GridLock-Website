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
// const driversTab = document.querySelector('.drivers');
// const constructorsTab = document.querySelector('.constructors');
// const driversList = document.querySelector('.drivers-list');
// const constructorsList = document.querySelector('.constructors-list');

// const showConstructorsTab = () => {
//     driversList.classList.add('hide');
//     constructorsList.classList.add('show');
// }
// const showDriversTab = () => {
//     driversList.classList.remove('hide');
//     constructorsList.classList.remove('show');
// }

// if (driversTab) {
//     driversTab.addEventListener('click', showDriversTab);
// }

// constructorsTab.addEventListener('click', showConstructorsTab);


// ******************
// FILL IN PREVIOUS PREDICTIONS TABS
import { verstappenCard,
    perezCard,
    hamiltonCard,
    russellCard,
    leclercCard,
    sainzCard,
    alonsoCard,
    strollCard,
    norrisCard,
    piastriCard,
    oconCard,
    gaslyCard,
    albonCard,
    sargeantCard,
    bottasCard,
    zhouCard,
    deVriesCard,
    tsunodaCard,
    magnussenCard,
    hulkenbergCard,
    ricciardoMclarenCard,
    gaslyAlphaTauriCard,
    schumacherCard,
    alonsoAlpineCard,
    vettelCard,
    latifiCard } from './drivers.js';

    // ali prev predictions
const aliBahrainPred = document.querySelector(".ali-bahrain-pred");
const aliSaudiPred = document.querySelector(".ali-saudi-pred");
aliBahrainPred.innerHTML = verstappenCard + perezCard + alonsoCard + leclercCard + sainzCard + hamiltonCard + russellCard + norrisCard + strollCard + gaslyCard;
aliSaudiPred.innerHTML = verstappenCard + perezCard + alonsoCard + sainzCard + strollCard + russellCard + hamiltonCard + oconCard + gaslyCard + albonCard;

// jack prev predictions
const jackBahrainPred = document.querySelector(".jack-bahrain-pred");
const jackSaudiPred = document.querySelector(".jack-saudi-pred");
jackBahrainPred.innerHTML = verstappenCard + leclercCard + russellCard + perezCard + sainzCard + norrisCard + hamiltonCard + strollCard + gaslyCard + oconCard;
jackSaudiPred.innerHTML = leclercCard + verstappenCard + perezCard + russellCard + hamiltonCard + alonsoCard + sainzCard + norrisCard + strollCard + gaslyCard;

// tom prev predictions
const tomBahrainPred = document.querySelector(".tom-bahrain-pred");
const tomSaudiPred = document.querySelector(".tom-saudi-pred");
tomBahrainPred.innerHTML = verstappenCard + alonsoCard + perezCard + leclercCard + sainzCard + hamiltonCard + russellCard + norrisCard + oconCard + gaslyCard;
tomSaudiPred.innerHTML = verstappenCard + alonsoCard + perezCard + strollCard + hamiltonCard + leclercCard + russellCard + sainzCard + gaslyCard + albonCard;

// owen prev predictions
const owenBahrainPred = document.querySelector(".owen-bahrain-pred");
const owenSaudiPred = document.querySelector(".owen-saudi-pred");
owenBahrainPred.innerHTML = verstappenCard + leclercCard + alonsoCard + perezCard + russellCard + hamiltonCard + gaslyCard + strollCard + oconCard + norrisCard;
owenSaudiPred.innerHTML = verstappenCard + alonsoCard + perezCard + leclercCard + hamiltonCard + russellCard + sainzCard + strollCard + gaslyCard + norrisCard;

// ed prev predictions
const edBahrainPred = document.querySelector(".ed-bahrain-pred");
const edSaudiPred = document.querySelector(".ed-saudi-pred");
edBahrainPred.innerHTML = verstappenCard + perezCard + leclercCard + russellCard + hamiltonCard + sainzCard + alonsoCard + norrisCard + oconCard + piastriCard;
edSaudiPred.innerHTML = verstappenCard + leclercCard + perezCard + sainzCard + hamiltonCard + alonsoCard + russellCard + gaslyCard + bottasCard + albonCard;

// toby prev predictions
const tobyBahrainPred = document.querySelector(".toby-bahrain-pred");
const tobySaudiPred = document.querySelector(".toby-saudi-pred");
tobyBahrainPred.innerHTML = verstappenCard + leclercCard + perezCard + russellCard + hamiltonCard + sainzCard + alonsoCard + oconCard + strollCard + magnussenCard;
tobySaudiPred.innerHTML = verstappenCard + leclercCard + perezCard + sainzCard + hamiltonCard + russellCard + oconCard + gaslyCard + alonsoCard + norrisCard;
