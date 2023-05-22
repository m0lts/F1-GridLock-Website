// ***********
//NAV BAR
const menuBtn = document.querySelector('.menu-btn');
const navScreen = document.querySelector('.nav-screen');
//functionality
const showNavBar = () => {
    navScreen.classList.toggle('active');
}
menuBtn.addEventListener('click', showNavBar);
// **********








// ***********
// TAKE PRE-PROGRAMMED OBJECTS FROM DRIVERS.JS TO FILL RELEVANT BOXES
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






// BACKUP PREDICTIONS
// aliPred.innerHTML = verstappenCard + leclercCard + perezCard + alonsoCard + sainzCard + hamiltonCard + strollCard + russellCard + norrisCard + gaslyCard;
// edPred.innerHTML = verstappenCard + perezCard + leclercCard + russellCard + hamiltonCard + sainzCard + alonsoCard + norrisCard + oconCard + piastriCard;
// jackPred.innerHTML = leclercCard + verstappenCard + perezCard + sainzCard + russellCard + hamiltonCard + norrisCard + alonsoCard + strollCard + bottasCard;
// tobyPred.innerHTML = verstappenCard + leclercCard + perezCard + sainzCard + hamiltonCard + russellCard + oconCard + gaslyCard + alonsoCard + norrisCard;
// tomPred.innerHTML = verstappenCard + perezCard + alonsoCard + leclercCard + sainzCard + hamiltonCard + strollCard + russellCard + norrisCard + oconCard;
// owenPred.innerHTML = verstappenCard + leclercCard + alonsoCard + perezCard + hamiltonCard + russellCard + gaslyCard + strollCard + oconCard + norrisCard;

// fill previous year result
// const prevYearResult = document.querySelector(".previous-year-result");
// prevYearResult.innerHTML = verstappenCard + perezCard + russellCard + hamiltonCard + gaslyAlphaTauriCard + vettelCard + alonsoAlpineCard + ricciardoMclarenCard + norrisCard + oconCard + bottasCard + albonCard + tsunodaCard + schumacherCard + latifiCard + strollCard + magnussenCard + zhouCard + leclercCard + sainzCard;

// fill previous race result
// const prevRaceResult = document.querySelector(".previous-race-result");
// prevRaceResult.innerHTML = verstappenCard + hamiltonCard + alonsoCard + strollCard + perezCard + norrisCard + hulkenbergCard + piastriCard + zhouCard + tsunodaCard + bottasCard + sainzCard + gaslyCard + oconCard + deVriesCard + sargeantCard + magnussenCard + russellCard + albonCard + leclercCard;

// fill standings boxes
// ali prev predictions

// ****************











// ****************
//SHOW PREDICTION FUNCTIONALITY
//get btns
const aliBtn = document.querySelector('.ali');
const edBtn = document.querySelector('.ed');
const jackBtn = document.querySelector('.jack');
const tobyBtn = document.querySelector('.toby');
const tomBtn = document.querySelector('.tom');
const owenBtn = document.querySelector('.owen');
// fill predictions
const aliPred = document.querySelector('.ali-pred');
const edPred = document.querySelector('.ed-pred');
const jackPred = document.querySelector('.jack-pred');
const tobyPred = document.querySelector('.toby-pred');
const tomPred = document.querySelector('.tom-pred');
const owenPred = document.querySelector('.owen-pred');
// logic
const togglePred = (btn, pred) => {
    const btns = [aliBtn, edBtn, jackBtn, tobyBtn, tomBtn, owenBtn];
    btns.forEach(b => {
        if (b == btn) {
            b.classList.add('active');
        } else {
            b.classList.remove('active');
        }
    });
    const preds = [aliPred, edPred, jackPred, tobyPred, tomPred, owenPred];
    preds.forEach(p => {
        if (p == pred) {
            p.classList.add('show');
        } else {
            p.classList.remove('show');
        }
    });
    };
if(aliBtn) {
    aliBtn.addEventListener('click', () => togglePred(aliBtn, aliPred));
};
if(edBtn) {
    edBtn.addEventListener('click', () => togglePred(edBtn, edPred));
};
if(jackBtn) {
    jackBtn.addEventListener('click', () => togglePred(jackBtn, jackPred));
};
if(tobyBtn) {
    tobyBtn.addEventListener('click', () => togglePred(tobyBtn, tobyPred));
};
if(tomBtn) {
    tomBtn.addEventListener('click', () => togglePred(tomBtn, tomPred))
};
if(owenBtn) {
    owenBtn.addEventListener('click', () => togglePred(owenBtn, owenPred));
};
// ****************











// ***************
//ARROW ROTATION AND SHOW BUTTON SELECTED
const h3Titles = document.querySelectorAll('.stats-h3');

h3Titles.forEach(title => {
    title.addEventListener('click', function() {
        //selecting respective arrows for rotation
        const arrow = title.querySelector('.right-arrow');
        arrow.classList.toggle('rotate');
        //showing tabs when clicked
        let nextSibling = title.nextElementSibling;
        nextSibling.classList.toggle('show');
    })
})
//SHOW PREDICTIONS / STATS BOX
const statsTab = document.querySelector('.stats');
const predictionsTab = document.querySelector('.predictions');
const statsBox = document.querySelector('.stats-box');
const predictionsBox = document.querySelector('.predictions-box');


const showStatsTab = () => {
    statsBox.classList.remove('hide');
    predictionsBox.classList.remove('show');
    statsTab.classList.remove('hide');
    predictionsTab.classList.remove('show');
}

const showPredictionsTab = () => {
    statsBox.classList.add('hide');
    predictionsBox.classList.add('show');
    statsTab.classList.add('hide');
    predictionsTab.classList.add('show');
}

if(statsTab) {
    statsTab.addEventListener('click', showStatsTab);
};
if(predictionsBox) {
    predictionsTab.addEventListener('click', showPredictionsTab);
};

// ********************











// RETRIEVE ERGAST DEVELOPER API

import { fetchLastResult } from "./ergast-retrieval.js";

const lastRaceResultLink = 'https://ergast.com/api/f1/current/last/results.json';
fetchLastResult(lastRaceResultLink, ".previous-race-result");

const lastYearResultLink = 'https://ergast.com/api/f1/2022/8/results.json'
fetchLastResult(lastYearResultLink, ".previous-year-result");


// retrieve next race details

import { fetchNextRace } from "./ergast-retrieval.js";

const nextRaceLink = 'https://ergast.com/api/f1/current/next.json';
fetchNextRace(nextRaceLink);







// AUTO FILL DRIVER DETAILS FROM PHP DATABASE RETRIEVAL
// const driverSurnameRetrieval = document.querySelectorAll('.surname');
// const driverNumberElement = document.querySelectorAll('.driver-number-p');
// const driverFirstNameElement = document.querySelectorAll('.firstname');
// const driverTeam = document.querySelectorAll('.team-img'); 


// // driver surname inner HTML
// driverSurnameRetrieval.forEach(surname => {
//     if (surname.textContent === "ocon") {
//         driverNumberElement.forEach(number => {
//             number.textContent = 31;
//         });
//         driverFirstNameElement.forEach(firstName => {
//             firstName.textContent = "Esteban";
//         });
//         driverTeam.forEach(img => {
//             img.src = './images/teams/alpine.png';
//         });
//     } else if (surname.textContent === "gasly") {
//         driverNumberElement.forEach(number => {
//             number.textContent = 10;
//         });
//         driverFirstNameElement.forEach(firstName => {
//             firstName.textContent = "Pierre";
//         });
//         driverTeam.forEach(img => {
//             img.src = './images/teams/alpine.png';
//         });
//     }



//     console.log(surname.textContent);
// })

const driverContainer = document.querySelectorAll('.driver-container');

driverContainer.forEach(container => {
    if (container.classList.contains('verstappen')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 1;
        driverFirstNameElement.textContent = "Max";
        driverSurname.textContent = "Verstappen";
        driverTeam.src = "./images/teams/red-bull.png";
    } else if (container.classList.contains('perez')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 11;
        driverFirstNameElement.textContent = "Sergio";
        driverSurname.textContent = "Perez";
        driverTeam.src = "./images/teams/red-bull.png";
    } else if (container.classList.contains('hamilton')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 44;
        driverFirstNameElement.textContent = "Lewis";
        driverSurname.textContent = "Hamilton";
        driverTeam.src = "./images/teams/mercedes.png";
    } else if (container.classList.contains('russell')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 63;
        driverFirstNameElement.textContent = "George";
        driverSurname.textContent = "Russell";
        driverTeam.src = "./images/teams/mercedes.png";
    } else if (container.classList.contains('leclerc')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 16;
        driverFirstNameElement.textContent = "Charles";
        driverSurname.textContent = "Leclerc";
        driverTeam.src = "./images/teams/ferrari.png";
    } else if (container.classList.contains('sainz')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 55;
        driverFirstNameElement.textContent = "Carlos";
        driverSurname.textContent = "Sainz";
        driverTeam.src = "./images/teams/ferrari.png";
    } else if (container.classList.contains('alonso')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 14;
        driverFirstNameElement.textContent = "Fernando";
        driverSurname.textContent = "Alonso";
        driverTeam.src = "./images/teams/aston.png";
    } else if (container.classList.contains('stroll')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 18;
        driverFirstNameElement.textContent = "Lance";
        driverSurname.textContent = "Stroll";
        driverTeam.src = "./images/teams/aston.png";
    } else if (container.classList.contains('norris')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 4;
        driverFirstNameElement.textContent = "Lando";
        driverSurname.textContent = "Norris";
        driverTeam.src = "./images/teams/mclaren.png";
    } else if (container.classList.contains('piastri')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 81;
        driverFirstNameElement.textContent = "Oscar";
        driverSurname.textContent = "Piastri";
        driverTeam.src = "./images/teams/mclaren.png";
    } else if (container.classList.contains('gasly')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 10;
        driverFirstNameElement.textContent = "Pierre";
        driverSurname.textContent = "Gasly";
        driverTeam.src = "./images/teams/alpine.png";
    } else if (container.classList.contains('ocon')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 31;
        driverFirstNameElement.textContent = "Esteban";
        driverSurname.textContent = "Ocon";
        driverTeam.src = "./images/teams/alpine.png";
    } else if (container.classList.contains('bottas')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 77;
        driverFirstNameElement.textContent = "Valterri";
        driverSurname.textContent = "Bottas";
        driverTeam.src = "./images/teams/alfa-romeo.png";
    } else if (container.classList.contains('zhou')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 24;
        driverFirstNameElement.textContent = "Guanyu";
        driverSurname.textContent = "Zhou";
        driverTeam.src = "./images/teams/alfa-romeo.png";
    } else if (container.classList.contains('devries')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 21;
        driverFirstNameElement.textContent = "Nyck";
        driverSurname.textContent = "de Vries";
        driverTeam.src = "./images/teams/alpha-tauri.png";
    } else if (container.classList.contains('tsunoda')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 22;
        driverFirstNameElement.textContent = "Yuki";
        driverSurname.textContent = "Tsunoda";
        driverTeam.src = "./images/teams/alpha-tauri.png";
    } else if (container.classList.contains('magnussen')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 20;
        driverFirstNameElement.textContent = "Kevin";
        driverSurname.textContent = "Magnussen";
        driverTeam.src = "./images/teams/haas.png";
    } else if (container.classList.contains('hulkenberg')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 27;
        driverFirstNameElement.textContent = "Niko";
        driverSurname.textContent = "Hulkenberg";
        driverTeam.src = "./images/teams/haas.png";
    } else if (container.classList.contains('albon')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 23;
        driverFirstNameElement.textContent = "Alexander";
        driverSurname.textContent = "Albon";
        driverTeam.src = "./images/teams/williams.png";
    } else if (container.classList.contains('sargeant')) {
        const driverNumberElement = document.querySelector('.driver-number-p');
        const driverFirstNameElement = document.querySelector('.firstname');
        const driverSurname = document.querySelector('.surname');
        const driverTeam = document.querySelector('.team-img');

        driverNumberElement.textContent = 2;
        driverFirstNameElement.textContent = "Logan";
        driverSurname.textContent = "Sargeant";
        driverTeam.src = "./images/teams/williams.png";
    }
});








// PREDICTIONS ENTRY LOGIC
// retrieve form from doc
// ali miami
// const aliMiamiPred = document.querySelector(".ali-miami-pred");

// if(aliMiamiPred) {
//     aliMiamiPred.addEventListener("submit", event => {

//     const formData = new FormData(aliMiamiPred);
//     const data = Object.fromEntries(formData);
//     const dataJson = JSON.stringify(data);

//     localStorage.setItem("Ali Miami", dataJson);
    
// })
// };

// const aliData = (dataName) => {
//     const dataJson = localStorage.getItem(dataName);
//     const data = JSON.parse(dataJson);
//     const p1 = data.p1;
//     const p2 = data.p2;
//     const p3 = data.p3;
//     const p4 = data.p4;
//     const p5 = data.p5;
//     const p6 = data.p6;
//     const p7 = data.p7;
//     const p8 = data.p8;
//     const p9 = data.p9;
//     const p10 = data.p10;
    
//     const aliPredBox = document.querySelector(".ali-pred");

//     const drivers = {
//         verstappen: {
//             number: 1,
//             firstName: 'max',
//             secondName: 'verstappen',
//             team: './images/teams/red-bull.png'
//         },
//         perez: {
//             number: 11,
//             firstName: 'sergio',
//             secondName: 'perez',
//             team: './images/teams/red-bull.png'
//         },
//         hamilton: {
//             number: 44,
//             firstName: 'lewis',
//             secondName: 'hamilton',
//             team: './images/teams/mercedes.png'
//         },
//         russell: {
//             number: 63,
//             firstName: 'george',
//             secondName: 'russell',
//             team: './images/teams/mercedes.png'
//         },
//         leclerc: {
//             number: 16,
//             firstName: 'charles',
//             secondName: 'leclerc',
//             team: './images/teams/ferrari.png'
//         },
//         sainz: {
//             number: 55,
//             firstName: 'carlos',
//             secondName: 'sainz',
//             team: './images/teams/ferrari.png'
//         },
//         alonso: {
//             number: 14,
//             firstName: 'fernando',
//             secondName: 'alonso',
//             team: './images/teams/aston.png'
//         },
//         stroll: {
//             number: 18,
//             firstName: 'lance',
//             secondName: 'stroll',
//             team: './images/teams/aston.png'
//         },
//         norris: {
//             number: 4,
//             firstName: 'lando',
//             secondName: 'norris',
//             team: './images/teams/mclaren.png'
//         },
//         piastri: {
//             number: 81,
//             firstName: 'oscar',
//             secondName: 'piastri',
//             team: './images/teams/mclaren.png'
//         },
//         gasly: {
//             number: 10,
//             firstName: 'pierre',
//             secondName: 'gasly',
//             team: './images/teams/alpine.png'
//         },
//         ocon: {
//             number: 31,
//             firstName: 'esteban',
//             secondName: 'ocon',
//             team: './images/teams/alpine.png'
//         },
//         bottas: {
//             number: 77,
//             firstName: 'valterri',
//             secondName: 'bottas',
//             team: './images/teams/alfa-romeo.png'
//         },
//         zhou: {
//             number: 24,
//             firstName: 'guanyu',
//             secondName: 'zhou',
//             team: './images/teams/alfa-romeo.png'
//         },
//         devries: {
//             number: 21,
//             firstName: 'nyck',
//             secondName: 'de vries',
//             team: './images/teams/alpha-tauri.png'
//         },
//         tsunoda: {
//             number: 22,
//             firstName: 'yuki',
//             secondName: 'tsunoda',
//             team: './images/teams/alpha-tauri.png'
//         },
//         magnussen: {
//             number: 20,
//             firstName: 'kevin',
//             secondName: 'magnussen',
//             team: './images/teams/haas.png'
//         },
//         hulkenberg: {
//             number: 27,
//             firstName: 'niko',
//             secondName: 'hulkenberg',
//             team: './images/teams/haas.png'
//         },
//         albon: {
//             number: 23,
//             firstName: 'alexander',
//             secondName: 'albon',
//             team: './images/teams/williams.png'
//         },
//         sargeant: {
//             number: 2,
//             firstName: 'logan',
//             secondName: 'sargeant',
//             team: './images/teams/williams.png'
//         }
//     };

//     const createDriverCard = (driver) => {
//         return `<li class="driver-container">
//                   <div class="driver-details">
//                     <div class="driver-number">
//                       <p>${driver.number}</p>
//                     </div>
//                     <div class="driver-name">
//                       <p class="firstname">${driver.firstName}</p>
//                       <p class="surname">${driver.secondName}</p>
//                     </div>
//                   </div>
//                   <figure class="driver-img">
//                     <img src="${driver.team}" alt="">
//                   </figure>
//                 </li>`;
//       };

//     const p1sub = createDriverCard(drivers[p1]);
//     const p2sub = createDriverCard(drivers[p2]);
//     const p3sub = createDriverCard(drivers[p3]);
//     const p4sub = createDriverCard(drivers[p4]);
//     const p5sub = createDriverCard(drivers[p5]);
//     const p6sub = createDriverCard(drivers[p6]);
//     const p7sub = createDriverCard(drivers[p7]);
//     const p8sub = createDriverCard(drivers[p8]);
//     const p9sub = createDriverCard(drivers[p9]);
//     const p10sub = createDriverCard(drivers[p10]);

//     aliPredBox.innerHTML = `${p1sub} ${p2sub} ${p3sub} ${p4sub} ${p5sub} ${p6sub} ${p7sub} ${p8sub} ${p9sub} ${p10sub}`;
// }

// aliData("Ali Miami");

// // ed miami
// const edMiamiPred = document.querySelector(".ed-miami-pred");

// if(edMiamiPred) {
//     edMiamiPred.addEventListener("submit", event => {

//     const formData = new FormData(edMiamiPred);
//     const data = Object.fromEntries(formData);
//     const dataJson = JSON.stringify(data);

//     localStorage.setItem("Ed Miami", dataJson);

// })
// };

// const edData = (dataName) => {
//     const dataJson = localStorage.getItem(dataName);
//     const data = JSON.parse(dataJson);
//     const p1 = data.p1;
//     const p2 = data.p2;
//     const p3 = data.p3;
//     const p4 = data.p4;
//     const p5 = data.p5;
//     const p6 = data.p6;
//     const p7 = data.p7;
//     const p8 = data.p8;
//     const p9 = data.p9;
//     const p10 = data.p10;

//     const edPredBox = document.querySelector(".ed-pred");

//     const drivers = {
//         verstappen: {
//             number: 1,
//             firstName: 'max',
//             secondName: 'verstappen',
//             team: './images/teams/red-bull.png'
//         },
//         perez: {
//             number: 11,
//             firstName: 'sergio',
//             secondName: 'perez',
//             team: './images/teams/red-bull.png'
//         },
//         hamilton: {
//             number: 44,
//             firstName: 'lewis',
//             secondName: 'hamilton',
//             team: './images/teams/mercedes.png'
//         },
//         russell: {
//             number: 63,
//             firstName: 'george',
//             secondName: 'russell',
//             team: './images/teams/mercedes.png'
//         },
//         leclerc: {
//             number: 16,
//             firstName: 'charles',
//             secondName: 'leclerc',
//             team: './images/teams/ferrari.png'
//         },
//         sainz: {
//             number: 55,
//             firstName: 'carlos',
//             secondName: 'sainz',
//             team: './images/teams/ferrari.png'
//         },
//         alonso: {
//             number: 14,
//             firstName: 'fernando',
//             secondName: 'alonso',
//             team: './images/teams/aston.png'
//         },
//         stroll: {
//             number: 18,
//             firstName: 'lance',
//             secondName: 'stroll',
//             team: './images/teams/aston.png'
//         },
//         norris: {
//             number: 4,
//             firstName: 'lando',
//             secondName: 'norris',
//             team: './images/teams/mclaren.png'
//         },
//         piastri: {
//             number: 81,
//             firstName: 'oscar',
//             secondName: 'piastri',
//             team: './images/teams/mclaren.png'
//         },
//         gasly: {
//             number: 10,
//             firstName: 'pierre',
//             secondName: 'gasly',
//             team: './images/teams/alpine.png'
//         },
//         ocon: {
//             number: 31,
//             firstName: 'esteban',
//             secondName: 'ocon',
//             team: './images/teams/alpine.png'
//         },
//         bottas: {
//             number: 77,
//             firstName: 'valterri',
//             secondName: 'bottas',
//             team: './images/teams/alfa-romeo.png'
//         },
//         zhou: {
//             number: 24,
//             firstName: 'guanyu',
//             secondName: 'zhou',
//             team: './images/teams/alfa-romeo.png'
//         },
//         devries: {
//             number: 21,
//             firstName: 'nyck',
//             secondName: 'de vries',
//             team: './images/teams/alpha-tauri.png'
//         },
//         tsunoda: {
//             number: 22,
//             firstName: 'yuki',
//             secondName: 'tsunoda',
//             team: './images/teams/alpha-tauri.png'
//         },
//         magnussen: {
//             number: 20,
//             firstName: 'kevin',
//             secondName: 'magnussen',
//             team: './images/teams/haas.png'
//         },
//         hulkenberg: {
//             number: 27,
//             firstName: 'niko',
//             secondName: 'hulkenberg',
//             team: './images/teams/haas.png'
//         },
//         albon: {
//             number: 23,
//             firstName: 'alexander',
//             secondName: 'albon',
//             team: './images/teams/williams.png'
//         },
//         sargeant: {
//             number: 2,
//             firstName: 'logan',
//             secondName: 'sargeant',
//             team: './images/teams/williams.png'
//         }
//     };
    
//     const createDriverCard = (driver) => {
//         return `<li class="driver-container">
//                   <div class="driver-details">
//                     <div class="driver-number">
//                       <p>${driver.number}</p>
//                     </div>
//                     <div class="driver-name">
//                       <p class="firstname">${driver.firstName}</p>
//                       <p class="surname">${driver.secondName}</p>
//                     </div>
//                   </div>
//                   <figure class="driver-img">
//                     <img src="${driver.team}" alt="">
//                   </figure>
//                 </li>`;
//       };

//     const p1sub = createDriverCard(drivers[p1]);
//     const p2sub = createDriverCard(drivers[p2]);
//     const p3sub = createDriverCard(drivers[p3]);
//     const p4sub = createDriverCard(drivers[p4]);
//     const p5sub = createDriverCard(drivers[p5]);
//     const p6sub = createDriverCard(drivers[p6]);
//     const p7sub = createDriverCard(drivers[p7]);
//     const p8sub = createDriverCard(drivers[p8]);
//     const p9sub = createDriverCard(drivers[p9]);
//     const p10sub = createDriverCard(drivers[p10]);

//     edPredBox.innerHTML = `${p1sub} ${p2sub} ${p3sub} ${p4sub} ${p5sub} ${p6sub} ${p7sub} ${p8sub} ${p9sub} ${p10sub}`;
// }

// edData("Ed Miami");

// // jack miami
// const jackMiamiPred = document.querySelector(".jack-miami-pred");

// if(jackMiamiPred) {
//     jackMiamiPred.addEventListener("submit", event => {

//     const formData = new FormData(jackMiamiPred);
//     const data = Object.fromEntries(formData);
//     const dataJson = JSON.stringify(data);

//     localStorage.setItem("Jack Miami", dataJson);

// })
// };

// const jackData = (dataName) => {
//     const dataJson = localStorage.getItem(dataName);
//     const data = JSON.parse(dataJson);
//     const p1 = data.p1;
//     const p2 = data.p2;
//     const p3 = data.p3;
//     const p4 = data.p4;
//     const p5 = data.p5;
//     const p6 = data.p6;
//     const p7 = data.p7;
//     const p8 = data.p8;
//     const p9 = data.p9;
//     const p10 = data.p10;

//     const predBox = document.querySelector(".jack-pred");

//     const drivers = {
//         verstappen: {
//             number: 1,
//             firstName: 'max',
//             secondName: 'verstappen',
//             team: './images/teams/red-bull.png'
//         },
//         perez: {
//             number: 11,
//             firstName: 'sergio',
//             secondName: 'perez',
//             team: './images/teams/red-bull.png'
//         },
//         hamilton: {
//             number: 44,
//             firstName: 'lewis',
//             secondName: 'hamilton',
//             team: './images/teams/mercedes.png'
//         },
//         russell: {
//             number: 63,
//             firstName: 'george',
//             secondName: 'russell',
//             team: './images/teams/mercedes.png'
//         },
//         leclerc: {
//             number: 16,
//             firstName: 'charles',
//             secondName: 'leclerc',
//             team: './images/teams/ferrari.png'
//         },
//         sainz: {
//             number: 55,
//             firstName: 'carlos',
//             secondName: 'sainz',
//             team: './images/teams/ferrari.png'
//         },
//         alonso: {
//             number: 14,
//             firstName: 'fernando',
//             secondName: 'alonso',
//             team: './images/teams/aston.png'
//         },
//         stroll: {
//             number: 18,
//             firstName: 'lance',
//             secondName: 'stroll',
//             team: './images/teams/aston.png'
//         },
//         norris: {
//             number: 4,
//             firstName: 'lando',
//             secondName: 'norris',
//             team: './images/teams/mclaren.png'
//         },
//         piastri: {
//             number: 81,
//             firstName: 'oscar',
//             secondName: 'piastri',
//             team: './images/teams/mclaren.png'
//         },
//         gasly: {
//             number: 10,
//             firstName: 'pierre',
//             secondName: 'gasly',
//             team: './images/teams/alpine.png'
//         },
//         ocon: {
//             number: 31,
//             firstName: 'esteban',
//             secondName: 'ocon',
//             team: './images/teams/alpine.png'
//         },
//         bottas: {
//             number: 77,
//             firstName: 'valterri',
//             secondName: 'bottas',
//             team: './images/teams/alfa-romeo.png'
//         },
//         zhou: {
//             number: 24,
//             firstName: 'guanyu',
//             secondName: 'zhou',
//             team: './images/teams/alfa-romeo.png'
//         },
//         devries: {
//             number: 21,
//             firstName: 'nyck',
//             secondName: 'de vries',
//             team: './images/teams/alpha-tauri.png'
//         },
//         tsunoda: {
//             number: 22,
//             firstName: 'yuki',
//             secondName: 'tsunoda',
//             team: './images/teams/alpha-tauri.png'
//         },
//         magnussen: {
//             number: 20,
//             firstName: 'kevin',
//             secondName: 'magnussen',
//             team: './images/teams/haas.png'
//         },
//         hulkenberg: {
//             number: 27,
//             firstName: 'niko',
//             secondName: 'hulkenberg',
//             team: './images/teams/haas.png'
//         },
//         albon: {
//             number: 23,
//             firstName: 'alexander',
//             secondName: 'albon',
//             team: './images/teams/williams.png'
//         },
//         sargeant: {
//             number: 2,
//             firstName: 'logan',
//             secondName: 'sargeant',
//             team: './images/teams/williams.png'
//         }
//     };
    
//     const createDriverCard = (driver) => {
//         return `<li class="driver-container">
//                   <div class="driver-details">
//                     <div class="driver-number">
//                       <p>${driver.number}</p>
//                     </div>
//                     <div class="driver-name">
//                       <p class="firstname">${driver.firstName}</p>
//                       <p class="surname">${driver.secondName}</p>
//                     </div>
//                   </div>
//                   <figure class="driver-img">
//                     <img src="${driver.team}" alt="">
//                   </figure>
//                 </li>`;
//       };

//     const p1sub = createDriverCard(drivers[p1]);
//     const p2sub = createDriverCard(drivers[p2]);
//     const p3sub = createDriverCard(drivers[p3]);
//     const p4sub = createDriverCard(drivers[p4]);
//     const p5sub = createDriverCard(drivers[p5]);
//     const p6sub = createDriverCard(drivers[p6]);
//     const p7sub = createDriverCard(drivers[p7]);
//     const p8sub = createDriverCard(drivers[p8]);
//     const p9sub = createDriverCard(drivers[p9]);
//     const p10sub = createDriverCard(drivers[p10]);

//     predBox.innerHTML = `${p1sub} ${p2sub} ${p3sub} ${p4sub} ${p5sub} ${p6sub} ${p7sub} ${p8sub} ${p9sub} ${p10sub}`;
// }

// jackData("Jack Miami");


// // toby miami
// const tobyMiamiPred = document.querySelector(".toby-miami-pred");

// if(tobyMiamiPred) {
//     tobyMiamiPred.addEventListener("submit", event => {

//     const formData = new FormData(tobyMiamiPred);
//     const data = Object.fromEntries(formData);
//     const dataJson = JSON.stringify(data);

//     localStorage.setItem("Toby Miami", dataJson);

// })
// };

// const tobyData = (dataName) => {
//     const dataJson = localStorage.getItem(dataName);
//     const data = JSON.parse(dataJson);
//     const p1 = data.p1;
//     const p2 = data.p2;
//     const p3 = data.p3;
//     const p4 = data.p4;
//     const p5 = data.p5;
//     const p6 = data.p6;
//     const p7 = data.p7;
//     const p8 = data.p8;
//     const p9 = data.p9;
//     const p10 = data.p10;

//     const predBox = document.querySelector(".toby-pred");

//     const drivers = {
//         verstappen: {
//             number: 1,
//             firstName: 'max',
//             secondName: 'verstappen',
//             team: './images/teams/red-bull.png'
//         },
//         perez: {
//             number: 11,
//             firstName: 'sergio',
//             secondName: 'perez',
//             team: './images/teams/red-bull.png'
//         },
//         hamilton: {
//             number: 44,
//             firstName: 'lewis',
//             secondName: 'hamilton',
//             team: './images/teams/mercedes.png'
//         },
//         russell: {
//             number: 63,
//             firstName: 'george',
//             secondName: 'russell',
//             team: './images/teams/mercedes.png'
//         },
//         leclerc: {
//             number: 16,
//             firstName: 'charles',
//             secondName: 'leclerc',
//             team: './images/teams/ferrari.png'
//         },
//         sainz: {
//             number: 55,
//             firstName: 'carlos',
//             secondName: 'sainz',
//             team: './images/teams/ferrari.png'
//         },
//         alonso: {
//             number: 14,
//             firstName: 'fernando',
//             secondName: 'alonso',
//             team: './images/teams/aston.png'
//         },
//         stroll: {
//             number: 18,
//             firstName: 'lance',
//             secondName: 'stroll',
//             team: './images/teams/aston.png'
//         },
//         norris: {
//             number: 4,
//             firstName: 'lando',
//             secondName: 'norris',
//             team: './images/teams/mclaren.png'
//         },
//         piastri: {
//             number: 81,
//             firstName: 'oscar',
//             secondName: 'piastri',
//             team: './images/teams/mclaren.png'
//         },
//         gasly: {
//             number: 10,
//             firstName: 'pierre',
//             secondName: 'gasly',
//             team: './images/teams/alpine.png'
//         },
//         ocon: {
//             number: 31,
//             firstName: 'esteban',
//             secondName: 'ocon',
//             team: './images/teams/alpine.png'
//         },
//         bottas: {
//             number: 77,
//             firstName: 'valterri',
//             secondName: 'bottas',
//             team: './images/teams/alfa-romeo.png'
//         },
//         zhou: {
//             number: 24,
//             firstName: 'guanyu',
//             secondName: 'zhou',
//             team: './images/teams/alfa-romeo.png'
//         },
//         devries: {
//             number: 21,
//             firstName: 'nyck',
//             secondName: 'de vries',
//             team: './images/teams/alpha-tauri.png'
//         },
//         tsunoda: {
//             number: 22,
//             firstName: 'yuki',
//             secondName: 'tsunoda',
//             team: './images/teams/alpha-tauri.png'
//         },
//         magnussen: {
//             number: 20,
//             firstName: 'kevin',
//             secondName: 'magnussen',
//             team: './images/teams/haas.png'
//         },
//         hulkenberg: {
//             number: 27,
//             firstName: 'niko',
//             secondName: 'hulkenberg',
//             team: './images/teams/haas.png'
//         },
//         albon: {
//             number: 23,
//             firstName: 'alexander',
//             secondName: 'albon',
//             team: './images/teams/williams.png'
//         },
//         sargeant: {
//             number: 2,
//             firstName: 'logan',
//             secondName: 'sargeant',
//             team: './images/teams/williams.png'
//         }
//     };
    
//     const createDriverCard = (driver) => {
//         return `<li class="driver-container">
//                   <div class="driver-details">
//                     <div class="driver-number">
//                       <p>${driver.number}</p>
//                     </div>
//                     <div class="driver-name">
//                       <p class="firstname">${driver.firstName}</p>
//                       <p class="surname">${driver.secondName}</p>
//                     </div>
//                   </div>
//                   <figure class="driver-img">
//                     <img src="${driver.team}" alt="">
//                   </figure>
//                 </li>`;
//       };

//     const p1sub = createDriverCard(drivers[p1]);
//     const p2sub = createDriverCard(drivers[p2]);
//     const p3sub = createDriverCard(drivers[p3]);
//     const p4sub = createDriverCard(drivers[p4]);
//     const p5sub = createDriverCard(drivers[p5]);
//     const p6sub = createDriverCard(drivers[p6]);
//     const p7sub = createDriverCard(drivers[p7]);
//     const p8sub = createDriverCard(drivers[p8]);
//     const p9sub = createDriverCard(drivers[p9]);
//     const p10sub = createDriverCard(drivers[p10]);

//     predBox.innerHTML = `${p1sub} ${p2sub} ${p3sub} ${p4sub} ${p5sub} ${p6sub} ${p7sub} ${p8sub} ${p9sub} ${p10sub}`;
// }

// tobyData("Toby Miami");


// // tom miami
// const tomMiamiPred = document.querySelector(".tom-miami-pred");

// if(tomMiamiPred) {
//     tomMiamiPred.addEventListener("submit", event => {

//     const formData = new FormData(tomMiamiPred);
//     const data = Object.fromEntries(formData);
//     const dataJson = JSON.stringify(data);

//     localStorage.setItem("Tom Miami", dataJson);

// })
// };

// const tomData = (dataName) => {
//     const dataJson = localStorage.getItem(dataName);
//     const data = JSON.parse(dataJson);
//     const p1 = data.p1;
//     const p2 = data.p2;
//     const p3 = data.p3;
//     const p4 = data.p4;
//     const p5 = data.p5;
//     const p6 = data.p6;
//     const p7 = data.p7;
//     const p8 = data.p8;
//     const p9 = data.p9;
//     const p10 = data.p10;

//     const predBox = document.querySelector(".tom-pred");

//     const drivers = {
//         verstappen: {
//             number: 1,
//             firstName: 'max',
//             secondName: 'verstappen',
//             team: './images/teams/red-bull.png'
//         },
//         perez: {
//             number: 11,
//             firstName: 'sergio',
//             secondName: 'perez',
//             team: './images/teams/red-bull.png'
//         },
//         hamilton: {
//             number: 44,
//             firstName: 'lewis',
//             secondName: 'hamilton',
//             team: './images/teams/mercedes.png'
//         },
//         russell: {
//             number: 63,
//             firstName: 'george',
//             secondName: 'russell',
//             team: './images/teams/mercedes.png'
//         },
//         leclerc: {
//             number: 16,
//             firstName: 'charles',
//             secondName: 'leclerc',
//             team: './images/teams/ferrari.png'
//         },
//         sainz: {
//             number: 55,
//             firstName: 'carlos',
//             secondName: 'sainz',
//             team: './images/teams/ferrari.png'
//         },
//         alonso: {
//             number: 14,
//             firstName: 'fernando',
//             secondName: 'alonso',
//             team: './images/teams/aston.png'
//         },
//         stroll: {
//             number: 18,
//             firstName: 'lance',
//             secondName: 'stroll',
//             team: './images/teams/aston.png'
//         },
//         norris: {
//             number: 4,
//             firstName: 'lando',
//             secondName: 'norris',
//             team: './images/teams/mclaren.png'
//         },
//         piastri: {
//             number: 81,
//             firstName: 'oscar',
//             secondName: 'piastri',
//             team: './images/teams/mclaren.png'
//         },
//         gasly: {
//             number: 10,
//             firstName: 'pierre',
//             secondName: 'gasly',
//             team: './images/teams/alpine.png'
//         },
//         ocon: {
//             number: 31,
//             firstName: 'esteban',
//             secondName: 'ocon',
//             team: './images/teams/alpine.png'
//         },
//         bottas: {
//             number: 77,
//             firstName: 'valterri',
//             secondName: 'bottas',
//             team: './images/teams/alfa-romeo.png'
//         },
//         zhou: {
//             number: 24,
//             firstName: 'guanyu',
//             secondName: 'zhou',
//             team: './images/teams/alfa-romeo.png'
//         },
//         devries: {
//             number: 21,
//             firstName: 'nyck',
//             secondName: 'de vries',
//             team: './images/teams/alpha-tauri.png'
//         },
//         tsunoda: {
//             number: 22,
//             firstName: 'yuki',
//             secondName: 'tsunoda',
//             team: './images/teams/alpha-tauri.png'
//         },
//         magnussen: {
//             number: 20,
//             firstName: 'kevin',
//             secondName: 'magnussen',
//             team: './images/teams/haas.png'
//         },
//         hulkenberg: {
//             number: 27,
//             firstName: 'niko',
//             secondName: 'hulkenberg',
//             team: './images/teams/haas.png'
//         },
//         albon: {
//             number: 23,
//             firstName: 'alexander',
//             secondName: 'albon',
//             team: './images/teams/williams.png'
//         },
//         sargeant: {
//             number: 2,
//             firstName: 'logan',
//             secondName: 'sargeant',
//             team: './images/teams/williams.png'
//         }
//     };
    
//     const createDriverCard = (driver) => {
//         return `<li class="driver-container">
//                   <div class="driver-details">
//                     <div class="driver-number">
//                       <p>${driver.number}</p>
//                     </div>
//                     <div class="driver-name">
//                       <p class="firstname">${driver.firstName}</p>
//                       <p class="surname">${driver.secondName}</p>
//                     </div>
//                   </div>
//                   <figure class="driver-img">
//                     <img src="${driver.team}" alt="">
//                   </figure>
//                 </li>`;
//       };

//     const p1sub = createDriverCard(drivers[p1]);
//     const p2sub = createDriverCard(drivers[p2]);
//     const p3sub = createDriverCard(drivers[p3]);
//     const p4sub = createDriverCard(drivers[p4]);
//     const p5sub = createDriverCard(drivers[p5]);
//     const p6sub = createDriverCard(drivers[p6]);
//     const p7sub = createDriverCard(drivers[p7]);
//     const p8sub = createDriverCard(drivers[p8]);
//     const p9sub = createDriverCard(drivers[p9]);
//     const p10sub = createDriverCard(drivers[p10]);

//     predBox.innerHTML = `${p1sub} ${p2sub} ${p3sub} ${p4sub} ${p5sub} ${p6sub} ${p7sub} ${p8sub} ${p9sub} ${p10sub}`;
// }

// tomData("Tom Miami");


// // owen miami
// const owenMiamiPred = document.querySelector(".owen-miami-pred");

// if(owenMiamiPred) {
//     owenMiamiPred.addEventListener("submit", event => {

//     const formData = new FormData(owenMiamiPred);
//     const data = Object.fromEntries(formData);
//     const dataJson = JSON.stringify(data);

//     localStorage.setItem("Owen Miami", dataJson);

// })
// };

// const owenData = (dataName) => {
//     const dataJson = localStorage.getItem(dataName);
//     const data = JSON.parse(dataJson);
//     const p1 = data.p1;
//     const p2 = data.p2;
//     const p3 = data.p3;
//     const p4 = data.p4;
//     const p5 = data.p5;
//     const p6 = data.p6;
//     const p7 = data.p7;
//     const p8 = data.p8;
//     const p9 = data.p9;
//     const p10 = data.p10;

//     const predBox = document.querySelector(".owen-pred");

//     const drivers = {
//         verstappen: {
//             number: 1,
//             firstName: 'max',
//             secondName: 'verstappen',
//             team: './images/teams/red-bull.png'
//         },
//         perez: {
//             number: 11,
//             firstName: 'sergio',
//             secondName: 'perez',
//             team: './images/teams/red-bull.png'
//         },
//         hamilton: {
//             number: 44,
//             firstName: 'lewis',
//             secondName: 'hamilton',
//             team: './images/teams/mercedes.png'
//         },
//         russell: {
//             number: 63,
//             firstName: 'george',
//             secondName: 'russell',
//             team: './images/teams/mercedes.png'
//         },
//         leclerc: {
//             number: 16,
//             firstName: 'charles',
//             secondName: 'leclerc',
//             team: './images/teams/ferrari.png'
//         },
//         sainz: {
//             number: 55,
//             firstName: 'carlos',
//             secondName: 'sainz',
//             team: './images/teams/ferrari.png'
//         },
//         alonso: {
//             number: 14,
//             firstName: 'fernando',
//             secondName: 'alonso',
//             team: './images/teams/aston.png'
//         },
//         stroll: {
//             number: 18,
//             firstName: 'lance',
//             secondName: 'stroll',
//             team: './images/teams/aston.png'
//         },
//         norris: {
//             number: 4,
//             firstName: 'lando',
//             secondName: 'norris',
//             team: './images/teams/mclaren.png'
//         },
//         piastri: {
//             number: 81,
//             firstName: 'oscar',
//             secondName: 'piastri',
//             team: './images/teams/mclaren.png'
//         },
//         gasly: {
//             number: 10,
//             firstName: 'pierre',
//             secondName: 'gasly',
//             team: './images/teams/alpine.png'
//         },
//         ocon: {
//             number: 31,
//             firstName: 'esteban',
//             secondName: 'ocon',
//             team: './images/teams/alpine.png'
//         },
//         bottas: {
//             number: 77,
//             firstName: 'valterri',
//             secondName: 'bottas',
//             team: './images/teams/alfa-romeo.png'
//         },
//         zhou: {
//             number: 24,
//             firstName: 'guanyu',
//             secondName: 'zhou',
//             team: './images/teams/alfa-romeo.png'
//         },
//         devries: {
//             number: 21,
//             firstName: 'nyck',
//             secondName: 'de vries',
//             team: './images/teams/alpha-tauri.png'
//         },
//         tsunoda: {
//             number: 22,
//             firstName: 'yuki',
//             secondName: 'tsunoda',
//             team: './images/teams/alpha-tauri.png'
//         },
//         magnussen: {
//             number: 20,
//             firstName: 'kevin',
//             secondName: 'magnussen',
//             team: './images/teams/haas.png'
//         },
//         hulkenberg: {
//             number: 27,
//             firstName: 'niko',
//             secondName: 'hulkenberg',
//             team: './images/teams/haas.png'
//         },
//         albon: {
//             number: 23,
//             firstName: 'alexander',
//             secondName: 'albon',
//             team: './images/teams/williams.png'
//         },
//         sargeant: {
//             number: 2,
//             firstName: 'logan',
//             secondName: 'sargeant',
//             team: './images/teams/williams.png'
//         }
//     };
    
//     const createDriverCard = (driver) => {
//         return `<li class="driver-container">
//                   <div class="driver-details">
//                     <div class="driver-number">
//                       <p>${driver.number}</p>
//                     </div>
//                     <div class="driver-name">
//                       <p class="firstname">${driver.firstName}</p>
//                       <p class="surname">${driver.secondName}</p>
//                     </div>
//                   </div>
//                   <figure class="driver-img">
//                     <img src="${driver.team}" alt="">
//                   </figure>
//                 </li>`;
//       };

//     const p1sub = createDriverCard(drivers[p1]);
//     const p2sub = createDriverCard(drivers[p2]);
//     const p3sub = createDriverCard(drivers[p3]);
//     const p4sub = createDriverCard(drivers[p4]);
//     const p5sub = createDriverCard(drivers[p5]);
//     const p6sub = createDriverCard(drivers[p6]);
//     const p7sub = createDriverCard(drivers[p7]);
//     const p8sub = createDriverCard(drivers[p8]);
//     const p9sub = createDriverCard(drivers[p9]);
//     const p10sub = createDriverCard(drivers[p10]);

//     predBox.innerHTML = `${p1sub} ${p2sub} ${p3sub} ${p4sub} ${p5sub} ${p6sub} ${p7sub} ${p8sub} ${p9sub} ${p10sub}`;
// }

// owenData("Owen Miami");




