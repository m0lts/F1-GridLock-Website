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
const aliAusPred = document.querySelector(".ali-aus-pred");
const aliBakuPred = document.querySelector(".ali-baku-pred");
aliBahrainPred.innerHTML = verstappenCard + perezCard + alonsoCard + leclercCard + sainzCard + hamiltonCard + russellCard + norrisCard + strollCard + gaslyCard;
aliSaudiPred.innerHTML = verstappenCard + perezCard + alonsoCard + sainzCard + strollCard + russellCard + hamiltonCard + oconCard + gaslyCard + albonCard;
aliAusPred.innerHTML = verstappenCard + perezCard + alonsoCard + leclercCard + strollCard + hamiltonCard + sainzCard + russellCard + oconCard + albonCard;
aliBakuPred.innerHTML = verstappenCard + perezCard + leclercCard + sainzCard + alonsoCard + strollCard + albonCard + hamiltonCard + norrisCard + deVriesCard;

// jack prev predictions
const jackBahrainPred = document.querySelector(".jack-bahrain-pred");
const jackSaudiPred = document.querySelector(".jack-saudi-pred");
const jackAusPred = document.querySelector(".jack-aus-pred");
const jackBakuPred = document.querySelector(".jack-baku-pred");
jackBahrainPred.innerHTML = verstappenCard + leclercCard + russellCard + perezCard + sainzCard + norrisCard + hamiltonCard + strollCard + gaslyCard + oconCard;
jackSaudiPred.innerHTML = leclercCard + verstappenCard + perezCard + russellCard + hamiltonCard + alonsoCard + sainzCard + norrisCard + strollCard + gaslyCard;
jackAusPred.innerHTML = leclercCard + verstappenCard + perezCard + sainzCard + russellCard + hamiltonCard + norrisCard + alonsoCard + strollCard + bottasCard;
jackBakuPred.innerHTML = verstappenCard + perezCard + leclercCard + hamiltonCard + alonsoCard + strollCard + sainzCard + russellCard + gaslyCard + norrisCard;

// tom prev predictions
const tomBahrainPred = document.querySelector(".tom-bahrain-pred");
const tomSaudiPred = document.querySelector(".tom-saudi-pred");
const tomAusPred = document.querySelector(".tom-aus-pred");
const tomBakuPred = document.querySelector(".tom-baku-pred");
tomBahrainPred.innerHTML = verstappenCard + alonsoCard + perezCard + leclercCard + sainzCard + hamiltonCard + russellCard + norrisCard + oconCard + gaslyCard;
tomSaudiPred.innerHTML = verstappenCard + alonsoCard + perezCard + strollCard + hamiltonCard + leclercCard + russellCard + sainzCard + gaslyCard + albonCard;
tomAusPred.innerHTML = verstappenCard + perezCard + leclercCard + alonsoCard + hamiltonCard + russellCard + sainzCard + strollCard + oconCard + norrisCard;
tomBakuPred.innerHTML = verstappenCard + perezCard + alonsoCard + hamiltonCard + russellCard + strollCard + albonCard + leclercCard + gaslyCard + sainzCard;

// owen prev predictions
const owenBahrainPred = document.querySelector(".owen-bahrain-pred");
const owenSaudiPred = document.querySelector(".owen-saudi-pred");
const owenAusPred = document.querySelector(".owen-aus-pred");
const owenBakuPred = document.querySelector(".owen-baku-pred");
owenBahrainPred.innerHTML = verstappenCard + leclercCard + alonsoCard + perezCard + russellCard + hamiltonCard + gaslyCard + strollCard + oconCard + norrisCard;
owenSaudiPred.innerHTML = verstappenCard + alonsoCard + perezCard + leclercCard + hamiltonCard + russellCard + sainzCard + strollCard + gaslyCard + norrisCard;
owenAusPred.innerHTML = verstappenCard + leclercCard + perezCard + alonsoCard + sainzCard + russellCard + hamiltonCard + strollCard + gaslyCard + oconCard;
owenBakuPred.innerHTML = verstappenCard + leclercCard + alonsoCard + perezCard + hamiltonCard + russellCard + gaslyCard + strollCard + oconCard + norrisCard;


// ed prev predictions
const edBahrainPred = document.querySelector(".ed-bahrain-pred");
const edSaudiPred = document.querySelector(".ed-saudi-pred");
const edAusPred = document.querySelector(".ed-aus-pred");
const edBakuPred = document.querySelector(".ed-baku-pred");
edBahrainPred.innerHTML = verstappenCard + perezCard + leclercCard + russellCard + hamiltonCard + sainzCard + alonsoCard + norrisCard + oconCard + piastriCard;
edSaudiPred.innerHTML = verstappenCard + leclercCard + perezCard + sainzCard + hamiltonCard + alonsoCard + russellCard + gaslyCard + bottasCard + albonCard;
edAusPred.innerHTML = verstappenCard + perezCard + leclercCard + russellCard + hamiltonCard + sainzCard + alonsoCard + norrisCard + oconCard + piastriCard;
edBakuPred.innerHTML = verstappenCard + perezCard + alonsoCard + sainzCard + strollCard + hamiltonCard + gaslyCard + russellCard + leclercCard + norrisCard;

// toby prev predictions
const tobyBahrainPred = document.querySelector(".toby-bahrain-pred");
const tobySaudiPred = document.querySelector(".toby-saudi-pred");
const tobyAusPred = document.querySelector(".toby-aus-pred");
const tobyBakuPred = document.querySelector(".toby-baku-pred");
tobyBahrainPred.innerHTML = verstappenCard + leclercCard + perezCard + russellCard + hamiltonCard + sainzCard + alonsoCard + oconCard + strollCard + magnussenCard;
tobySaudiPred.innerHTML = verstappenCard + leclercCard + perezCard + sainzCard + hamiltonCard + russellCard + oconCard + gaslyCard + alonsoCard + norrisCard;
tobyAusPred.innerHTML = verstappenCard + perezCard + alonsoCard + hamiltonCard + leclercCard + russellCard + sainzCard + strollCard + oconCard + norrisCard;
tobyBakuPred.innerHTML = verstappenCard + perezCard + leclercCard + alonsoCard + hamiltonCard + strollCard + sainzCard + russellCard + gaslyCard + albonCard;