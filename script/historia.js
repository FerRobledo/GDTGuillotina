const data = [
    {
        title: `Liga Universitaria de Futbol 11`,
        periodo: `Apertura y Clausura 2022, categoria "B"`,
        desc: "Fase de grupos",
        photo: "./images/equipoLU3.png",
        summary: ` <p>Año 2022, un pequeño grupo de amigos oriundos de la ciudad de Olavarría decidió anotarse en la Liga Universitaria de Fútbol 11 de la UNICEN, el equipo fue formado por un grupo de desconocidos de la ciudad cementera, Azul, Rauch, Lincoln, Laprida, Barker, Juárez y tan solo un tandilense "El Colo" Hernández, su llegada al equipo fue por medio del amigo del amigo de alguno de los ya presentes en la lista, la primera vez que lo vimos fue en ese primer amistoso contra el Red Bull (jugó para el otro equipo, nos enteramos al otro día que fue al partido).</p>
        <p>El primer nombre que surgió fue "Barrilete Cósmico", por suerte ya había un equipo con ese nombre, la historia hubiera sido otra. Faltando solo unos pocos días para el inicio torneo, surge el nombre "La Guillotina", pocos se acuerdan, las teorías son muchas, lo cierto es que ese fue el "Primer Asado" en la casa de "Los de la Garibaldi".</p>
        <p>Lo único que se recuerda de este año fueron las goleadas recibidas y alguna que otra noche como "La Primer Previa", con presencias de personalidades como la de Matías Fleitas y Valentín Hermina, dos miembros fundadores que siguieron defendiendo los colores por muchos años. Lo que nadie sabía era que lo mejor estaba por venir.</p>`,
        goleadores: [
            { nombre: "Mateo Vitale", goles: 4 },
            { nombre: "Lautaro González", goles: 4 },
            { nombre: "Alan Steggel", goles: 2 },
            { nombre: "Enzo Amici", goles: 1 },
            { nombre: `<span class="bold">Total</span>`, goles: 11 },
        ]
    },
    {
        title: `Copa Cosa de Serranos`,
        periodo: `Apertura 2023, categoria "F"`,
        desc: "Semi finales",
        photo: "./images/equipoS2.jpeg",
        summary: `<p>Después de un año de muchos malos resultados, el equipo decidió probar suerte en otro torneo, así es como surgió "Ayer Salimos", fue algo así como la brigada B de La Guillotina.</p>
        <p>De la mano de la dupla delantera conformada por Bautista Pérez y Mateo Mangano el equipo llegó a las semifinales de la copa de oro. Esa tarde en la cancha del club Talleres llovía como nunca, ese partido se jugó brindando honor al nombre del equipo, y es que el dia anterior salimos. El 7 y goleador del equipo se lució con terrible golazo picándola en un tiro libre en el borde del área para empatar el partido 3 a 3 en el último minuto. Lamentablemente, el partido se nos escapó en los penales.</p>
        <p>Nos tocaba jugar la promoción para ascender a la categoría "E" en plenas vacaciones de invierno, primera vez que nos tocaba viajar para jugar, el resultado esta vez fue positivo logrando el ascenso en nuestro primer torneo.</p>`,
        goleadores: [
            { nombre: "Mateo Mangano", goles: 19 },
            { nombre: "Tomás Genco", goles: 6 },
            { nombre: "Bautista Pérez", goles: 4 },
            { nombre: "Fermín Robledo", goles: 4 },
            { nombre: "Mateo Tordelli", goles: 3 },
            { nombre: "Lucas Hernández", goles: 2 },
            { nombre: "Jonás Maletti", goles: 2 },
            { nombre: "Alan Steggel", goles: 1 },
            { nombre: "Parrás Emilio", goles: 1 },
            { nombre: `<span class="bold">Total</span>`, goles: 42 },
        ]
    },
    {
        title: `Liga Universitaria de Futbol 11`,
        periodo: `Apertura 2023, categoria "B"`,
        desc: "Campeones",
        photo: "./images/equipoLU4.jpeg",
        summary: `<p>El sentido de pertenencia de La Guillo y las ganas de competir, permitieron volver a ilusionarnos con la Liga Universitaria de Fútbol 11. Con la llegada de jugadores como Nicolás Miccio, Tomás Armendáriz, Bautista Fauret, Tomás Genco, Nacho Amado y Mateo Mangano (goleador histórico actualmente), y la llegada del DT Alexis "El Chupete" Durán, el equipo empezó a tomar forma, consiguiendo así su primer título, terminando el torneo sin perder ningún partido y sin recibir goles en 7 de 8 partidos.</p>
        <p>La mención es para el tridente legendario, "Son mejores que la MSN" se escuchaba por las canchas del edal. Fue conformado por el Batigol, el Manga y el Tanque González.</p>
        <p>La final fue contra Los Diegotes, el resultado fue tres tantos contra cero a favor de La Guillotina.</p>
        <p>La frutilla del postre es para Facundo Kolomietz, que segundeó una cámara de filmación para poder grabar el partido, dejándonos con uno de los videos más míticos de nuestro Instagram. Es importante destacar la actuación del Leo Paredes de La Guillo, Jonás Maletti, pieza clave para la obtención del título.</p>`,
        goleadores: [
            { nombre: "Mateo Mangano", goles: 8 },
            { nombre: "Bautista Fauret", goles: 7 },
            { nombre: "Mateo Vitale", goles: 3 },
            { nombre: "Alan Steggel", goles: 2 },
            { nombre: "Mateo Tordelli", goles: 2 },
            { nombre: "Lautaro González", goles: 1 },
            { nombre: "Facundo Kolomietz", goles: 1 },
            { nombre: "Valentín Hermina", goles: 1 },
            { nombre: `<span class="bold">Total</span>`, goles: 25 },
        ]
    },
    {
        title: `Liga Universitaria de Futbol 11`,
        periodo: `Clausura 2023, categoria "A"`,
        desc: "Campeones",
        photo: "./images/equipoLU5.jpeg",
        summary: `<p>Después de varias semanas de festejos, La Guillo volvía con las mismas ilusiones de siempre, esta vez con la llegada de jugadores como Martín Melo y David Alberdi. El primer partido fue contra Arte FC, en este encuentro se estrenó la casaca negra y gris tan conocida por toda la UNICEN.</p>
        <p>La Guillotina alcanzó un gran nivel, con grandes momentos como la mítica remontada contra Los Tordos y muy buenas actuaciones, por ejemplo, Mateo Vitale contra Receba FC por los cuartos de final, esa tarde el 10 de La Guillo se llevo la pelota convirtiendo 3 goles.</p>
        <p>La final fue contra La Jamoneta, ya teniamos un antecedente contra estos rivales, antes del partido nos acordabamos de la goleada y las cargadas recibidas por parte de los de "La J", entramos a la cancha con un hacha entre los dientes. El partido fue trabado, las situaciones no fueron claras, la aparicion de nuestro arquero Nacho Amado y la pelota parada fue clave esa tarde. Primero fue un tiro libre con destino a la cabeza del "Tanque" González, el cabezazo fue casi perfecto pero el arquero mando la pelota al corner. El autor de patear ese tiro de esquina fue Fauret, el destino, el mismo que apenas unos segundos atras (un arquero jugando de 3), el remate de cabeza esta vez si fue perfecto, estampando el 1 a 0 definitivo y logrando asi el titulo de la maxima categoria de la liga en nuestra primera participación.</p>
        <p>La mención es para Tomás Armendáriz, el segundo jugador nacido en Tandil, la llegada del Kaiser fue algo así como levantar una piedra y ver que abajo de esta nos estábamos encontrando con el mejor defensor central de UNICEN, algo parecido a lo que pasó con el Colo Hernández.</p>`,
        goleadores: [
            { nombre: "Mateo Mangano", goles: 5 },
            { nombre: "Mateo Vitale", goles: 4 },
            { nombre: "Bautista Fauret", goles: 3 },
            { nombre: "Lautaro González", goles: 3 },
            { nombre: "Mateo Tordelli", goles: 2 },
            { nombre: "David Alberdi", goles: 2 },
            { nombre: "Martín Melo", goles: 1 },
            { nombre: `<span class="bold">Total</span>`, goles: 20 },
        ]
    },
    {
        title: `Liga Universitaria de Futsal`,
        periodo: `Clausura 2023`,
        desc: "Subcampeones",
        photo: "./images/equipoFutsal.jpeg",
        summary: `<p>Las ganas de competir jugando a la pelota eran extremas, por eso es que el equipo decidió probar suerte en la Liga Universitaria de Futsal, lo único que sabíamos de este deporte era que se jugaba con los pies, pero La Guillotina no le tiene miedo a nada ni a nadie. El grupo aprendió muchísimo durante esta etapa y logró llegar a la final del torneo en su primera participación de la mano del "Chupete" Durán, la mente del equipo.</p>
        <p>Párrafo dedicado a Emilio Parrás, es el segundo jugador con más partidos, presente desde el minuto 0, en este torneo demostró ser un Killer en el área, regalándonos uno de los goles más lindos que se hicieron en el gimnasio del campus universitario.</p>`,
        goleadores: [
            { nombre: "Mateo Mangano", goles: 7 },
            { nombre: "Martín Melo", goles: 6 },
            { nombre: "Mateo Tordelli", goles: 5 },
            { nombre: "Mateo Vitale", goles: 4 },
            { nombre: "Bautista Fauret", goles: 3 },
            { nombre: "Emilio Parrás", goles: 2 },
            { nombre: `<span class="bold">Total</span>`, goles: 27 },
        ]
    },
    {
        title: `Copa cosa de Serranos`,
        periodo: `Clausura 2023, categoria "D"`,
        desc: "Subcampeones",
        photo: "./images/equipoS3.jpeg",
        summary: `<p>"Ayer Salimos" pasaría a ser historia después de haber debutado en el reacomodo de la categoría "E" de la copa bajo el nombre que todos conocemos.</p>
        <p>Gracias a los buenos resultados en el reacomodo, La Guillo ascendía a la categoría "D" del torneo, en esta ocasión el héroe sin capa para La Guillotina fue Mateo Mangano, el goleador del torneo.</p>
        <p>La final se jugaba un 23 de diciembre, un día antes de Nochebuena. Ese día conocimos nuestra mayor debilidad: ser extranjeros de la ciudad serrana. Las ganas de jugar ese partido nos obligó a viajar rumbo a Tandil. Los apenas 10 jugadores que pudieron decir presente ese día en el sintético de Independiente defendieron a muerte el escudo. Lamentablemente, no alcanzó. Fue derrota por 3 a 2 contra Los Ángeles FC.</p>
        <p>La mención se la lleva Nicolás "Chulo" Leone, el jugador más experimentado del equipo, el oriundo de Barker aportó su granito de arena jugando lesionado en esa fecha tan complicada.</p>
        <p>La Guillotina durante la segunda mitad del año 2023 compitió en 3 torneos distintos al mismo tiempo alcanzando la final en cada uno de ellos.</p>`,
        goleadores: [
            { nombre: "Mateo Mangano", goles: 20 },
            { nombre: "Martín Melo", goles: 8 },
            { nombre: "Bautista Pérez", goles: 4 },
            { nombre: "Tomás Genco", goles: 4 },
            { nombre: "Mateo Tordelli", goles: 3 },
            { nombre: "Jonás Maletti", goles: 3 },
            { nombre: "Fermín Robledo", goles: 3 },
            { nombre: "Lautaro González", goles: 2 },
            { nombre: "Mateo Vitale", goles: 1 },
            { nombre: "Emilio Parrás", goles: 1 },
            { nombre: "Nicolás Miccio", goles: 1 },
            { nombre: "Nicolás Leone", goles: 1 },
            { nombre: `<span class="bold">Total</span>`, goles: 48 },
        ]
    },
    {
        title: `Liga Universitaria de Futbol 11`,
        periodo: `Apertura 2024, categoria "A"`,
        desc: "Cuartos de final",
        photo: "./images/equipoLU1.jpeg",
        summary: `<p>Con un equipo ya consolidado, La Guillo buscaba defender el título más preciado de la universidad. Para este torneo las incorporaciones fueron Leonel Casamayou, Luca Gorosito y el segundo colorado del equipo Lautaro Lario, todos oriundos de la ciudad cementera.</p>
        <p>Asumía como DT uno de los miembros fundadores del club Ramiro Álvarez. Opacada por las lesiones y la innombrable localía, La Guillotina no logró demostrar el nivel que nos tiene acostumbrados, pero hay que destacar que siempre dio la cara, llegando a jugar los cuartos de final con 12 jugadores y muchas bajas importantes. Los huevos no faltaron, lamentablemente para La Guillotina no alcanzó, fue derrota 2 a 0 quedando eliminados por los nuevos campeones de la liga.</p>
        <p>Otra de las incorporaciones en este torneo fue Lautaro Andrés, camarógrafo oficial de La Guillotina, aportando a la venta de humo que tanto nos gusta.</p>`,
        goleadores: [
            { nombre: "Martín Melo", goles: 2 },
            { nombre: "Mateo Vitale", goles: 1 },
            { nombre: "Tomás Armendariz", goles: 1 },
            { nombre: "Mateo Tordelli", goles: 1 },
            { nombre: "Mateo Mangano", goles: 1 },
            { nombre: "Leonel Casamayou", goles: 1 },
            { nombre: "Nicolás Miccio", goles: 1 },
            { nombre: "Lautaro González", goles: 1 },
            { nombre: `<span class="bold">Total</span>`, goles: 9 },
        ]
    },
    {
        title: `Copa cosa de Serranos`,
        periodo: `Apertura 2024, categoria "C"`,
        desc: "Cuartos de final",
        photo: "./images/equipoS1.jpeg",
        summary: `<p>No fue el mejor comienzo de año para La Guillotina en la copa, empezaba perdiendo los dos partidos del reacomodo manteniéndose en la categoría.</p>
        <p>Ya en la fase campeonato, La Guillo volvió a dar destellos de magia de la mano del "Chapi" Melo, partícipe del momento más recordado del torneo: la remontada vs esGatorei. La Guillotina estaba 5 a 3 abajo en el marcador, corría el minuto 22 del segundo tiempo (tiempos de 25), el Chapi marcaba su segundo gol en el partido, el cuarto para los de negro y gris. Ingresaba Fermín Robledo a la cancha y en una salida de abajo comandada por el lateral el equipo lograba empatar el partido con el tercer gol para la falsa figura del encuentro, sí, falsa figura ya que a pesar de los 3 goles convertidos y de que el equipo haya recibido 5 tantos, el DT eligió como figura al arquero guillotense. El árbitro adicionaba 2 más y las situaciones eran nulas, en una contra dirigida por Tomás "El motorcito" Genco, la pelota le llega al "Pupi" y con más huevos que habilidad, sin que ni siquiera él mismo se lo espere, suelta un remate de afuera del área ajustando la pelota contra el ángulo derecho del arco dejando desparramado al arquero y dándole la victoria al equipo.</p>
        <p>La Guillotina necesitaba ganar para clasificar a la copa de oro, el equipo siguió empujando hasta el final, como lo hizo siempre.</p>
        <p>Los cuartos de final de la copa se jugaron el Día del Padre, otra vez, la famosa localía volvió a estar presente, sumada a las incontables lesiones. Nos tocó elegir entre la familia y La Guillotina, los pocos que pudieron viajar para jugar dejaron la vida por el escudo, nuevamente, no alcanzó. La derrota fue dura, el rival, Liga Lazio.</p>`,
        goleadores: [
            { nombre: "Mateo Mangano", goles: 9 },
            { nombre: "Martín Melo", goles: 8 },
            { nombre: "Mateo Vitale", goles: 5 },
            { nombre: "Fermín Roledo", goles: 5 },
            { nombre: "Tomás Genco", goles: 4 },
            { nombre: "Mateo Tordelli", goles: 3 },
            { nombre: "Leonel Casamayou", goles: 1 },
            { nombre: "Bautista Pérez", goles: 1 },
            { nombre: "Lautaro González", goles: 1 },
            { nombre: `<span class="bold">Total</span>`, goles: 37 },
        ]
    },
    {
        title: `Liga Universitaria de Futsal`,
        periodo: `Apertura 2024`,
        desc: "Subcampeones",
        photo: "./images/equipoFutsal2.jpeg",
        summary: `<p>Segunda participación en la liga de Futsal. La Guillotina volvió con más ganas en busca de sumar otra estrella, las incorporaciones para este torneo fueron varias: Marín La Spina, Lautaro Silva, Ramiro Long, Francisco Arrouy y la vuelta del primer arquero histórico de La Guillo, Ramiro Álvarez.</p>
        <p>De la mano de la dupla técnica Durán-Robledo, el equipo alcanzó nuevamente la final del torneo, brindando partidos de altísimo nivel, como contra Defensa Futsal en la final. Un partido de ida y vuelta en el que La Guillo supo jugarle de igual a igual e incluso ser superior a un equipo tan experimentado como lo es el "Rojiblanco". Fue derrota por 5 tantos contra 3 a favor del campeón.</p>
        <p>Mención especial para Mateo Tordelli, El Diablo. Es el jugador con más partidos en la historia de la institución, pieza clave en ambas finales alcanzadas en esta disciplina y de los pocos jugadores inmunes a la localía.</p>
        <p>La Guillotina se mantuvo con la frente en alto pese a las adversidades, los jugadores y el cuerpo técnico demostraron que nunca van a tirar la toalla ante nada ni nadie, la historia sigue, cada vez son más los que la cuentan.</p>`,
        goleadores: [
            { nombre: "Martín Melo", goles: 7 },
            { nombre: "Lautaro González", goles: 6 },
            { nombre: "Mateo Tordelli", goles: 6 },
            { nombre: "Francisco Arrouy", goles: 5 },
            { nombre: "Mateo Mangano", goles: 4 },
            { nombre: "Martín La Spina", goles: 4 },
            { nombre: "Lucas Hernández", goles: 1 },
            { nombre: `<span class="bold">Total</span>`, goles: 34 },
        ]
    },
    // Add more card data here as needed
];

function generateCard(cardData) {
    const cardHTML = `
        <img src="${cardData.photo}" alt="Foto del torneo">
        <section class="tarjetaHistoria">
            <div class="tarjeta-header">
                <div class="tarjeta-titulo">
                    <h2>${cardData.title}</h2>
                    <h3>${cardData.periodo}</h3>
                </div>
                <h3>${cardData.desc}</h3>
            </div>
                
            <div class="tarjeta-body">
                <div class="goles">

                    <h2>Goleadores</h2>

                    <table class="tablaHistoria">
                        <tbody>
                            ${cardData.goleadores.map(goleador => `
                                <tr>
                                    <td>${goleador.nombre}</td>
                                    <td>${goleador.goles}</td>
                                </tr>
                            `).join('')}
                        </tbody>
                    </table>
                </div>

                <div class="resumenHistoria">${cardData.summary}</div>
            </div>
        </section>
    `;

    return cardHTML;
}

const cardsContainer = document.querySelector('.containerHistoria');

data.forEach(cardData => {
    const cardHTML = generateCard(cardData);
    cardsContainer.innerHTML += cardHTML;
});