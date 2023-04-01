const drivers = {
    verstappen: {
        number: 1,
        firstName: 'max',
        secondName: 'verstappen',
        team: './images/teams/red-bull.png'
    },
    perez: {
        number: 11,
        firstName: 'sergio',
        secondName: 'perez',
        team: './images/teams/red-bull.png'
    },
    hamilton: {
        number: 44,
        firstName: 'lewis',
        secondName: 'hamilton',
        team: './images/teams/mercedes.png'
    },
    russell: {
        number: 63,
        firstName: 'george',
        secondName: 'russell',
        team: './images/teams/mercedes.png'
    },
    leclerc: {
        number: 16,
        firstName: 'charles',
        secondName: 'leclerc',
        team: './images/teams/ferrari.png'
    },
    sainz: {
        number: 55,
        firstName: 'carlos',
        secondName: 'sainz',
        team: './images/teams/ferrari.png'
    },
    alonso: {
        number: 14,
        firstName: 'fernando',
        secondName: 'alonso',
        team: './images/teams/aston.png'
    },
    stroll: {
        number: 18,
        firstName: 'lance',
        secondName: 'stroll',
        team: './images/teams/aston.png'
    },
    norris: {
        number: 4,
        firstName: 'lando',
        secondName: 'norris',
        team: './images/teams/mclaren.png'
    },
    piastri: {
        number: 81,
        firstName: 'oscar',
        secondName: 'piastri',
        team: './images/teams/mclaren.png'
    },
    gasly: {
        number: 10,
        firstName: 'pierre',
        secondName: 'gasly',
        team: './images/teams/alpine.png'
    },
    ocon: {
        number: 31,
        firstName: 'esteban',
        secondName: 'ocon',
        team: './images/teams/alpine.png'
    },
    bottas: {
        number: 77,
        firstName: 'valterri',
        secondName: 'bottas',
        team: './images/teams/alfa-romeo.png'
    },
    zhou: {
        number: 24,
        firstName: 'guanyu',
        secondName: 'zhou',
        team: './images/teams/alfa-romeo.png'
    },
    deVries: {
        number: 21,
        firstName: 'nyck',
        secondName: 'de vries',
        team: './images/teams/alpha-tauri.png'
    },
    tsunoda: {
        number: 22,
        firstName: 'yuki',
        secondName: 'tsunoda',
        team: './images/teams/alpha-tauri.png'
    },
    magnussen: {
        number: 20,
        firstName: 'kevin',
        secondName: 'magnussen',
        team: './images/teams/haas.png'
    },
    hulkenberg: {
        number: 27,
        firstName: 'niko',
        secondName: 'hulkenberg',
        team: './images/teams/haas.png'
    },
    albon: {
        number: 23,
        firstName: 'alexander',
        secondName: 'albon',
        team: './images/teams/williams.png'
    },
    sargeant: {
        number: 2,
        firstName: 'logan',
        secondName: 'sargeant',
        team: './images/teams/williams.png'
    },

    // EX-DRIVERS AND PREVIOUS TEAMS
    ricciardoMclaren: {
        number: 3,
        firstName: 'daniel',
        secondName: 'ricciardo',
        team: './images/teams/mclaren.png'
    },
    gaslyAlphaTauri: {
        number: 10,
        firstName: 'pierre',
        secondName: 'gasly',
        team: './images/teams/alpha-tauri.png'
    },
    schumacher: {
        number: 47,
        firstName: 'mick',
        secondName: 'schumacher',
        team: './images/teams/haas.png'
    },
    alonsoAlpine: {
        number: 14,
        firstName: 'fernando',
        secondName: 'alonso',
        team: './images/teams/alpine.png'
    },
    vettel: {
        number: 10,
        firstName: 'sebastian',
        secondName: 'vettel',
        team: './images/teams/aston.png'
    },
    latifi: {
        number: 6,
        firstName: 'nicholas',
        secondName: 'latifi',
        team: './images/teams/williams.png'
    }
}


const createDriverCard = (driver) => {
    return `<li class="driver-container">
              <div class="driver-details">
                <div class="driver-number">
                  <p>${driver.number}</p>
                </div>
                <div class="driver-name">
                  <p class="firstname">${driver.firstName}</p>
                  <p class="surname">${driver.secondName}</p>
                </div>
              </div>
              <figure class="driver-img">
                <img src="${driver.team}" alt="">
              </figure>
            </li>`;
  };
  
  export const verstappenCard = createDriverCard(drivers.verstappen);
  export const perezCard = createDriverCard(drivers.perez);
  export const hamiltonCard = createDriverCard(drivers.hamilton);
  export const russellCard = createDriverCard(drivers.russell);
  export const leclercCard = createDriverCard(drivers.leclerc);
  export const sainzCard = createDriverCard(drivers.sainz);
  export const alonsoCard = createDriverCard(drivers.alonso);
  export const strollCard = createDriverCard(drivers.stroll);
  export const norrisCard = createDriverCard(drivers.norris);
  export const piastriCard = createDriverCard(drivers.piastri);
  export const oconCard = createDriverCard(drivers.ocon);
  export const gaslyCard = createDriverCard(drivers.gasly);
  export const albonCard = createDriverCard(drivers.albon);
  export const sargeantCard = createDriverCard(drivers.sargeant);
  export const bottasCard = createDriverCard(drivers.bottas);
  export const zhouCard = createDriverCard(drivers.zhou);
  export const deVriesCard = createDriverCard(drivers.deVries);
  export const tsunodaCard = createDriverCard(drivers.tsunoda);
  export const magnussenCard = createDriverCard(drivers.magnussen);
  export const hulkenbergCard = createDriverCard(drivers.hulkenberg);
  export const ricciardoMclarenCard = createDriverCard(drivers.ricciardoMclaren);
  export const gaslyAlphaTauriCard = createDriverCard(drivers.gaslyAlphaTauri);
  export const schumacherCard = createDriverCard(drivers.schumacher);
  export const alonsoAlpineCard = createDriverCard(drivers.alonsoAlpine);
  export const vettelCard = createDriverCard(drivers.vettel);
  export const latifiCard = createDriverCard(drivers.latifi);
  
