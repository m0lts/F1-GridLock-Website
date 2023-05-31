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












// retrieve next race details

import { fetchNextRace } from "./ergast-retrieval.js";

const nextRaceLink = 'https://ergast.com/api/f1/current/1/results.json';
fetchNextRace(nextRaceLink);







// AUTO FILL DRIVER DETAILS FROM PHP DATABASE RETRIEVAL
const driverContainer = document.querySelectorAll('.driver-container');

driverContainer.forEach(container => {
    if (container.classList.contains('verstappen')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 1;
        driverFirstNameElement.textContent = "Max";
        driverSurname.textContent = "Verstappen";
        driverTeam.src = "./images/teams/red-bull.png";
    } else if (container.classList.contains('perez')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 11;
        driverFirstNameElement.textContent = "Sergio";
        driverSurname.textContent = "Perez";
        driverTeam.src = "./images/teams/red-bull.png";
    } else if (container.classList.contains('hamilton')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 44;
        driverFirstNameElement.textContent = "Lewis";
        driverSurname.textContent = "Hamilton";
        driverTeam.src = "./images/teams/mercedes.png";
    } else if (container.classList.contains('russell')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 63;
        driverFirstNameElement.textContent = "George";
        driverSurname.textContent = "Russell";
        driverTeam.src = "./images/teams/mercedes.png";
    } else if (container.classList.contains('leclerc')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 16;
        driverFirstNameElement.textContent = "Charles";
        driverSurname.textContent = "Leclerc";
        driverTeam.src = "./images/teams/ferrari.png";
    } else if (container.classList.contains('sainz')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 55;
        driverFirstNameElement.textContent = "Carlos";
        driverSurname.textContent = "Sainz";
        driverTeam.src = "./images/teams/ferrari.png";
    } else if (container.classList.contains('alonso')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 14;
        driverFirstNameElement.textContent = "Fernando";
        driverSurname.textContent = "Alonso";
        driverTeam.src = "./images/teams/aston.png";
    } else if (container.classList.contains('stroll')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 18;
        driverFirstNameElement.textContent = "Lance";
        driverSurname.textContent = "Stroll";
        driverTeam.src = "./images/teams/aston.png";
    } else if (container.classList.contains('norris')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 4;
        driverFirstNameElement.textContent = "Lando";
        driverSurname.textContent = "Norris";
        driverTeam.src = "./images/teams/mclaren.png";
    } else if (container.classList.contains('piastri')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 81;
        driverFirstNameElement.textContent = "Oscar";
        driverSurname.textContent = "Piastri";
        driverTeam.src = "./images/teams/mclaren.png";
    } else if (container.classList.contains('gasly')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 10;
        driverFirstNameElement.textContent = "Pierre";
        driverSurname.textContent = "Gasly";
        driverTeam.src = "./images/teams/alpine.png";
    } else if (container.classList.contains('ocon')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 31;
        driverFirstNameElement.textContent = "Esteban";
        driverSurname.textContent = "Ocon";
        driverTeam.src = "./images/teams/alpine.png";
    } else if (container.classList.contains('bottas')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 77;
        driverFirstNameElement.textContent = "Valterri";
        driverSurname.textContent = "Bottas";
        driverTeam.src = "./images/teams/alfa-romeo.png";
    } else if (container.classList.contains('zhou')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 24;
        driverFirstNameElement.textContent = "Guanyu";
        driverSurname.textContent = "Zhou";
        driverTeam.src = "./images/teams/alfa-romeo.png";
    } else if (container.classList.contains('devries')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 21;
        driverFirstNameElement.textContent = "Nyck";
        driverSurname.textContent = "de Vries";
        driverTeam.src = "./images/teams/alpha-tauri.png";
    } else if (container.classList.contains('tsunoda')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 22;
        driverFirstNameElement.textContent = "Yuki";
        driverSurname.textContent = "Tsunoda";
        driverTeam.src = "./images/teams/alpha-tauri.png";
    } else if (container.classList.contains('magnussen')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 20;
        driverFirstNameElement.textContent = "Kevin";
        driverSurname.textContent = "Magnussen";
        driverTeam.src = "./images/teams/haas.png";
    } else if (container.classList.contains('hulkenberg')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 27;
        driverFirstNameElement.textContent = "Niko";
        driverSurname.textContent = "Hulkenberg";
        driverTeam.src = "./images/teams/haas.png";
    } else if (container.classList.contains('albon')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 23;
        driverFirstNameElement.textContent = "Alexander";
        driverSurname.textContent = "Albon";
        driverTeam.src = "./images/teams/williams.png";
    } else if (container.classList.contains('sargeant')) {
        const driverNumberElement = container.querySelector('.driver-number-p');
        const driverFirstNameElement = container.querySelector('.firstname');
        const driverSurname = container.querySelector('.surname');
        const driverTeam = container.querySelector('.team-img');

        driverNumberElement.textContent = 2;
        driverFirstNameElement.textContent = "Logan";
        driverSurname.textContent = "Sargeant";
        driverTeam.src = "./images/teams/williams.png";
    }
});






// const checkObjectStructure = async (link) => {
//     try {
//       const response = await fetch(link);
//       const data = await response.json();
//       console.log(data.MRData.RaceTable.Races[0].Results);
//       const grid = data.MRData.RaceTable.Races[0].Results;
//       let newArray = [];
//       for (let i = 0; i < grid.length; i++) {
//         let driverSurname = grid[i].Driver.familyName;
//         newArray.push(driverSurname);
//       };
//       let normalisedArray = [];
//       for (let j = 0; j < newArray.length; j++) {
//         let normalisation = newArray[j].normalize('NFD').replace(/[\u0300-\u036f]/g, '');
//         let lowerCase = normalisation.toLowerCase();
//         normalisedArray.push(lowerCase);
//       };
//       console.log(normalisedArray);
//     } catch (error) {
//         console.log(error);
//     }
// };

// checkObjectStructure("https://ergast.com/api/f1/current/5/results.json");


// for (let i = 0; i < predictedTop10.length; i++) {
//     if (predictedTop10[i] === actualTop10[i]) {
//         points += 2;
//     }
// };
// for (let j = 0; j < predictedTop10.length; j++) {
//     for (let l = 0; l < actualTop10.length; l++) {
//         if (predictedTop10[j] === actualTop10[l]) {
//             points += 1;
//         }
//     }
// }