// RETRIEVE ERGAST DEVELOPER API FUNCTION

// export const fetchLastResult = (link) => {
//     fetch(link)
//     .then(res => res.json())
//     .then(data => {
//         console.log(data.MRData.RaceTable.Races[0].Results);
//         const raceResult = data.MRData.RaceTable.Races[0].Results;
//         for (let i = 0; i < raceResult.length; i++) {
//             const driverTeam = raceResult[i].Constructor.name;
//             const driverFirstName = raceResult[i].Driver.givenName;
//             const driverSecondName = raceResult[i].Driver.familyName;
//             const driverNumber = raceResult[i].Driver.permanentNumber;
//             const prevRaceResult = document.querySelector('.previous-race-result');
//             prevRaceResult.innerHTML = 
//                         `<li class="driver-container">
//                           <div class="driver-details">
//                             <div class="driver-number">
//                               <p>${driverNumber}</p>
//                             </div>
//                             <div class="driver-name">
//                               <p class="firstname">${driverFirstName}</p>
//                               <p class="surname">${driverSecondName}</p>
//                             </div>
//                           </div>
                          
//                         </li>`;
//                         // ONLY ADDING THE LAST ARRAY INDEX = NEED TO USE FOREACH FUNCTION TO ADD EACH LIST ITEM
//         }
//     })
//     .catch(err => console.log('Error retrieving data'))
// };

// export const fetchLastResult = (link) => {
//     fetch(link)
//     .then(res => res.json())
//     .then(data => {
//         console.log(data.MRData.RaceTable.Races[0].Results);
//         const raceResult = data.MRData.RaceTable.Races[0].Results;
//         raceResult.forEach(arr => {
//             const driverTeam = arr.Constructor.name;
//             const driverFirstName = arr.Driver.givenName;
//             const driverSecondName = arr.Driver.familyName;
//             const driverNumber = arr.Driver.permanentNumber;
//             const prevRaceResult = document.querySelector('.previous-race-result');
//             prevRaceResult.innerHTML = 
//                         `<li class="driver-container">
//                           <div class="driver-details">
//                             <div class="driver-number">
//                               <p>${driverNumber}</p>
//                             </div>
//                             <div class="driver-name">
//                               <p class="firstname">${driverFirstName}</p>
//                               <p class="surname">${driverSecondName}</p>
//                             </div>
//                           </div>
                          
//                         </li>`;
//         });
                        
//                         // ONLY ADDING THE LAST ARRAY INDEX = NEED TO USE FOREACH FUNCTION TO ADD EACH LIST ITEM
//     })
//     .catch(err => console.log('Error retrieving data'))
// };


export const fetchLastResult = (link) => {
    fetch(link)
    .then(res => res.json())
    .then(data => {
        console.log(data.MRData.RaceTable.Races[0].Results);
        const raceResult = data.MRData.RaceTable.Races[0].Results;
        for (let i = 0; i < raceResult.length; i++) {
            const driverTeam = raceResult[i].Constructor.name;
            const driverFirstName = raceResult[i].Driver.givenName;
            const driverSecondName = raceResult[i].Driver.familyName;
            const driverNumber = raceResult[i].Driver.permanentNumber;
            const prevRaceResult = document.querySelector('.previous-race-result');
            prevRaceResult.innerHTML = 
                        `<li class="driver-container">
                          <div class="driver-details">
                            <div class="driver-number">
                              <p>${driverNumber}</p>
                            </div>
                            <div class="driver-name">
                              <p class="firstname">${driverFirstName}</p>
                              <p class="surname">${driverSecondName}</p>
                            </div>
                          </div>
                          
                        </li>`;
                        // DO WITH INDIVIDUAL ARRAYS
        }
    })
    .catch(err => console.log('Error retrieving data'))
};