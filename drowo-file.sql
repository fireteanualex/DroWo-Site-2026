-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mart. 26, 2026 la 06:49 PM
-- Versiune server: 10.4.32-MariaDB
-- Versiune PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `euroavia-drowotest`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `stage` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `opt_a` varchar(255) NOT NULL,
  `opt_b` varchar(255) NOT NULL,
  `opt_c` varchar(255) NOT NULL,
  `opt_d` varchar(255) NOT NULL,
  `correct_opt` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `questions`
--

INSERT INTO `questions` (`id`, `stage`, `question_text`, `image_url`, `opt_a`, `opt_b`, `opt_c`, `opt_d`, `correct_opt`) VALUES
(5, 1, 'Dronele echipate cu camere și senzori optici se utilizează doar în domenii precum:', NULL, 'Agriculturale, Militare, Cinematografice, Situațiilor de Urgență, Geodezice', 'Cinematografice, De transport, Agriculturale, Militare, Geodezice', 'Cinematografice, Situațiilor de Urgență, Geodezice, Alimentare, Militare', 'Agriculturale, Militare, Cinematografice, Situațiilor de Urgență, De transport', 'a'),
(6, 1, 'Dintre componentele de bază ale dronei noastre se enumeră:', NULL, 'Camera, Cadrul(Frame), Motorul, PDB, Bateria(Li-PO)', 'Motorul, ESC, PDB, Cadrul, Amplificatorul', 'Bateria(Ni-Cd), Elice, Motor, Cadrul, ESC', 'Motorul, Cadrul, ESC, PDB, FC', 'd'),
(7, 1, 'Operarea dronelor se face prin:', NULL, 'Ghidare prin fir', 'Telepatie', 'Teleghidare prin telecomandă', 'Intervenție divină', 'c'),
(8, 1, 'Pe ce forță ne bazăm pentru a o contracara pe cea de greutate?', NULL, 'De tracțiune', 'De portanță', 'De frecare', 'Galactică', 'b'),
(9, 1, 'Ce configurație a motoarelor vom utiliza la drona noastră?', NULL, 'Oct-X', 'Hex-V', 'Quad-X', 'Oct-V', 'c'),
(10, 1, 'Care sunt instituțiile de interes care reglementează zborul cu drone?', NULL, 'EASA și AACR', 'CFR', 'AGENȚIA DRONELOR ROMÂNIEI', 'Guvernul', 'a'),
(11, 1, 'La câți metri înălțime față de sol este legal să operezi drone?', NULL, '120 m', '50 m', '100 m', 'Fără limite', 'a'),
(12, 1, 'Unde găsești harta oficială a zonelor în care poți pilota sisteme de zbor?', NULL, 'Pe site-ul oficial ROMATSA', 'Pe spatele dronei', 'Pe cutia dronei', 'Nu există', 'a'),
(13, 1, 'Câți ani trebuie să ai minim pentru a obține licența de pilot de Drone?', NULL, '16 ani', '21 ani', '14 ani', '30 ani', 'a'),
(14, 1, 'Poți pilota drone deasupra mulțimilor în cazul în care:', NULL, 'Drona are sub 250 g', 'Ai autorizație', 'Nu plouă', 'Drona are peste 250 g', 'a'),
(15, 1, 'La ce temperatură se încălzește vârful metalic al letconului conform prezentării?', NULL, '100 °C', '250 °C', '350 °C', '500 °C', 'c'),
(16, 1, 'Ce avertisment este menționat în legătură cu Soldering Flux în timpul utilizării?', NULL, 'Este lipicios și distruge hainele', 'Fumul scos la contactul cu temperatura ridicată este toxic', 'Trebuie aplicat doar pe firele de plastic', 'Nu trebuie folosit niciodată împreună cu letconul', 'b'),
(17, 1, 'Care este regula de aur pentru conectarea și deconectarea bateriei?', NULL, 'Se conectează prima înainte de zbor și se deconectează ultima', 'Se conectează ultima înainte de zbor și se deconectează prima după zbor', 'Se lasă conectată permanent pentru a menține calibrarea', 'Se conectează doar când drona este în aer', 'b'),
(18, 1, 'Conform codului de culori pentru baterie menționat în document, cum sunt identificate firele?', NULL, 'Firul roșu este Negativ (-), Firul negru este Pozitiv (+)', 'Firul verde este Pozitiv (+), Firul galben este Negativ (-)', 'Firul albastru este Neutru, Firul maro este Fază', 'Firul roșu este Pozitiv (+), Firul negru este Negativ (-)', 'd'),
(19, 1, 'Care dintre următoarele afirmații despre siguranța uneltelor este adevărată?', NULL, 'Letconul poate fi lăsat oriunde pe masă după utilizare', 'Cutterul și cleștele pot tăia ușor degetele dacă nu sunt folosite cu atenție', 'Pompita se folosește pentru a umfla roțile dronei', 'Putem atinge tubul HeatShrink imediat după ce l-am încălzit cu HeatGun-ul', 'b'),
(20, 2, 'Din ce este compusă partea fixă a unui motor Brushless?', NULL, 'Magneți permanenți dispuși într-un clopot metalic', 'Ansamblul de bobine prin care trece curentul electric', 'Perii de carbon care ating axul central', 'Elicea și piulița de fixare', 'b'),
(21, 2, 'Ce reprezintă valoarea KV a unui motor?', NULL, 'Consumul maxim de curent în kilovolți', 'Greutatea motorului raportată la puterea sa', 'Numărul de rotații pe minut per volt', 'Capacitatea bateriei necesare pentru a porni motorul', 'c'),
(22, 2, 'Cum trebuie montate elicele pe un quadcopter pentru a asigura stabilitatea?', NULL, 'Toate cele 4 elice trebuie să se rotească în sens orar', 'Toate cele 4 elice trebuie să se rotească în sens trigonometric', 'Pe diagonală trebuie să avem elice care se rotesc în același sens', 'Elicele de pe partea stângă trebuie să fie identice cu cele de pe dreapta', 'c'),
(23, 2, 'Forța de portanță, care ajută drona să zboare, este generată de:', NULL, 'Frecarea periilor de carbon în interiorul motorului', 'Câmpul magnetic creat de magneții permanenți', 'Diferența de presiune de pe extradosul și intradosul elicei', 'Viteza mare de rotație a rotorului de tip Inrunner', 'c'),
(24, 2, 'Ce condiție esențială trebuie să îndeplinească ESC-ul ales pentru un anumit motor?', NULL, 'Să aibă exact aceeași dimensiune ca motorul', 'Să suporte un curent mai mare decât consumul maxim al motorului', 'Să fie obligatoriu de tipul 4 în 1', 'Să aibă un KV mai mic decât al motorului', 'b'),
(25, 2, 'Ce tip de baterii folosim?', NULL, 'Li-Ion', 'Alcaline', 'Plumb-Acid', 'Li-Po', 'd'),
(26, 2, 'Care sunt tensiunile minimă si maximă prezentate pentru baterie?', NULL, '10V și 12V', '2,6V și 4,4V', '3,4V și 4,2V', '3,6V și 5,2V', 'c'),
(27, 2, 'La ce componenta se conecteaza bateria?', NULL, 'FC (Flight Controller)', 'ESC 4in1', 'RX-receiver', 'Motoare', 'b'),
(28, 2, 'Care este rolul principal al ESCului 4in1?', NULL, 'Sa amortizeze caderea dronei', 'Sa indice directia de zbor a dronei si sa proceseze pozitia', 'Sa furnizeze amperajul corespunzator fiecarei componente', 'Sa genereze portanta necesara pentru decolare', 'c'),
(29, 2, 'Care este traseul energiei in drona?', NULL, 'De la baterie spre motoare', 'De la receiver spre telecomanda', 'De la motoare spre FC', 'De la o elice la cealalta', 'a'),
(30, 2, 'Care este rolul principal al receiverului (RX) și cum comunică acesta cu restul dronei?', NULL, 'Să genereze curent electric pentru motoare folosind antenele', 'Ascultă semnalele radio de la telecomandă și le traduce în date către FC', 'Verifică semnalele primite pentru a nu apărea probleme în zbor', 'Este doar o piesă de legătură ce transmite date către telecomandă', 'b'),
(31, 2, 'În montajul real al unei drone, ce reprezintă fiecare dintre cele trei fire (Negru, Roșu, Alb) de la RX la FC?', NULL, 'Negru=Semnal, Roșu=GND, Alb=5V', 'Se conectează la ESC, nu la FC', 'Toate cele trei fire au același rol și pot fi inversate', 'Negru=GND, Roșu=Plus (5V), Alb=Semnal (Sbus)', 'd'),
(32, 2, 'De ce este nevoie de un minim de 4 canale pe telecomandă pentru a zbura o dronă?', NULL, 'Pentru a controla cele 4 mișcări de bază', 'Pentru că fiecare motor are nevoie de canalul lui direct', 'Pentru a putea comunica din 4 părți diferite cu drona', 'Pentru că fiecare elice are nevoie de o frecvență separată', 'a'),
(33, 2, 'Ce reprezintă raportul T/G și cum ne asigurăm că drona zboară stabil?', NULL, 'Raportul dintre lungimea antenei și greutate (trebuie să fie 1)', 'Timpul de zbor raportat la greutate (minim 10)', 'Viteza maximă a dronei (trebuie să fie >= 2)', 'Forța totală a motoarelor împărțită la greutate (trebuie să fie >= 2)', 'd'),
(34, 2, 'De ce este esențial să verificăm valoarea „Load Currency\" din tabelul de date la 100% Throttle?', NULL, 'Pentru a știi unde să lipim fiecare fir la RX', 'Nu este esențială dacă nu folosim 100% throttle', 'Pentru a alege un ESC care poate suporta acel curent fără să se ardă', 'Ajută doar să știm cât de tare se va auzi motorul', 'c'),
(35, 3, 'Ce componentă a imprimantei 3D are rolul de a topi filamentul?', NULL, 'Extruder-ul', 'Motoarele', 'Hotend-ul', 'Nozzle-ul', 'c'),
(36, 3, 'Ce tipuri de fișiere utilizează imprimanta 3D pentru realizarea pieselor?', NULL, 'STL', 'G-CODE', 'OBJ', 'STEP', 'b'),
(37, 3, 'Ce rol au suporții în printarea 3D?', NULL, 'Sunt straturi de protecție ale filamentului', 'Elemente decorative', 'Structuri temporare ce susțin zonele suspendate', 'Îmbunătățesc rezistența pieselor', 'c'),
(38, 3, 'Care este principala consecință a creșterii procentajului de infill?', NULL, 'Crește rezistența piesei, dar o îngreunează și mărește timpul de printare', 'Elimină complet necesitatea suporților', 'Ranforsările locale sunt adăugate automat', 'Piesa finală are aceleași proprietăți indiferent de filament', 'a'),
(39, 3, 'Toleranțele cu strângere:', NULL, 'Apar când distanța dintre un arbore și un alezaj este mare', 'Apar când distanța dintre un arbore și un alezaj este mică', 'Cresc rezistența mecanică a pieselor', 'Reprezintă tipul de toleranțe neutilizate în proiect', 'b'),
(40, 3, 'Care dintre următoarele materiale prezintă cele mai bune proprietăți de elasticitate?', NULL, 'PETG', 'TPU', 'PLA', 'Rășina', 'b'),
(41, 3, 'Doriți să printați piesa din imagine. Ce problemă poate fi evitată prin utilizarea suporților?', './design7.png', 'Bridging', 'Layering', 'Apariția fisurilor în zonele fragile', 'Overhang', 'd'),
(42, 3, 'Cum se montează capacul?', NULL, 'Se prinde cu șuruburi de corpul dronei', 'Printr-o mișcare de slide', 'Se lipește cu adeziv', 'Cu ajutorul unor clipsuri', 'b'),
(43, 3, 'Unde vin montate FC-ul & ESC-ul?', NULL, 'Sub corpul dronei', 'Pe capacul dronei', 'În interiorul corpului dronei', 'Sub trenul de aterizare', 'c'),
(44, 3, 'Ce unealtă este necesară la asamblarea trenului de aterizare?', NULL, 'Ciocan', 'Imbus', 'Cheie franceză', 'Niciuna din cele de mai sus', 'd'),
(45, 3, 'Cum sunt fixate șuruburile motoarelor?', NULL, 'În sens orar', 'Aleator', 'În sens trigonometric', 'Pe diagonală', 'd'),
(46, 3, 'Când se montează & conectează bateria?', NULL, 'După montarea trenului de aterizare', 'După montarea FC&ESC', 'După finalizarea dronei', 'După montarea motoarelor', 'c'),
(47, 3, 'Ce se folosește la conectarea trenului de aterizare & a corpului dronei?', NULL, 'Adeziv', 'Șuruburi', 'Fludor', 'Scotch', 'b'),
(48, 3, 'Cum se fixează brațele pe corp?', NULL, 'Corpul vine deja cu ele atașate', 'Se împing cu putere în sloturi', 'Se potrivesc încastrările brațelor și se împing ușor în jos', 'Se lipesc cu adeziv special', 'c'),
(49, 3, 'În funcție de ce se montează elicile?', NULL, 'De sensul de rotație al motoarelor', 'Aleator', 'De fața dronei', 'De culoarea lor', 'a'),
(50, 4, 'Ce se întâmplă dacă bifezi din greșeală „MSP” pe portul USB VCP în tab-ul Ports?', NULL, 'Drona va zbura mult mai lin', 'Vei pierde conexiunea și va trebui să folosești butonul de Boot', 'Telecomanda se va conecta mai repede', 'Nu se întâmplă nimic, MSP este activat oricum pe USB', 'd'),
(51, 4, 'Care este unghiul de armare recomandat la care trebuie setat FC pe modelul nostru?', NULL, '0°', '180°', '30°', '90°', 'c'),
(52, 4, 'Care este voltajul recomandat pentru „Minimum Cell Voltage” la o baterie LiPo?', NULL, '3.2-3.3V', '3.4-3.5V', '4.2-4.3V', '3.7-3.8V', 'b'),
(53, 4, 'Ce este firmware-ul unei drone?', NULL, 'O piesă metalică din interiorul motorului', 'Un tip de software scris direct pe hardware, ca un sistem de operare', 'Un accesoriu de protecție pentru placa de zbor', 'Cablul USB special de conectare', 'b'),
(54, 4, 'Care este cea mai sigură procedură atunci când drona pierde semnalul?', NULL, 'Drona coboară controlat (LAND)', 'Oprirea motoarelor (DROP)', 'Drona activează automat GPS Rescue', 'Drona rămâne în hover până la epuizarea bateriei', 'b'),
(55, 4, 'Ce face butonul „Reset Settings” din tab-ul Setup?', NULL, 'Repornește drona fără să modifice nimic', 'Șterge tot firmware-ul și lasă placa goală', 'Aduce toate setările la valorile de fabrică ale versiunii actuale', 'Calibrează giroscopul și accelerometrul simultan', 'c'),
(56, 4, 'Ce este un „Beacon”?', NULL, 'Becul mic de lumină de pe FC', 'Un semnal radio special către telecomandă', 'Un sunet scos de motoare pentru a ajuta la localizarea dronei', 'O setare care mărește puterea semnalului', 'c'),
(57, 4, 'Ce se întâmplă dacă creștem prea mult valoarea P din tab-ul PID tuning?', NULL, 'Drona se simte leneșă și imprecisă', 'Motoarele se vor încălzi mai tare în zbor', 'Drona va consuma mai multă baterie', 'Drona începe să tremure în hover', 'd'),
(58, 4, 'La ce valoare va fi limitat Throttle-ul și ce fel de limită va fi folosită?', NULL, 'Nu avem Throttle limit', '50% & Scale', '70% & la alegere', '70% & Clip', 'c'),
(59, 4, 'În caz că valoarea YAW-ului variază rapid lângă 1500 (drift), în ce chenar schimbăm valoarea?', './betaflight.png', 'Yaw Deadband', 'RC Deadband', 'Stick Center', 'Modificăm din setările telecomenzii', 'a'),
(60, 4, 'Ce reprezintă modul Angle?', NULL, 'Permite zborul stabilizat, unghiul maxim fiind setat la 30°', 'Zbor stabilizat cu unghi maxim aproape de 90°', 'Drona își va păstra poziția GPS', 'Armează motoarele automat', 'a'),
(61, 4, 'Ce ESC/Motor protocol folosim?', NULL, 'DSHOT650', 'DSHOT325', 'DSHOT600', 'ONESHOT125', 'c'),
(62, 4, 'Ce trebuie să facem înainte să testăm motoarele?', NULL, 'Deconectăm bateria', 'Scoatem elicile', 'Dezactivăm MOTOR_STOP', 'Asigurăm elicile conform sensului de rotire', 'b'),
(63, 4, 'Ce face butonul de wizard de la Motor Direction?', NULL, 'Resetează sensurile de rotire și ne lasă să verificăm/schimbăm sensul', 'Ne permite schimbarea sensului de rotație a elicilor', 'Resetează tot tab-ul de Motoare', 'Învârte încet motoarele pentru a determina sensul', 'a'),
(64, 4, 'După ce scriem „status” în consolă, ce reprezintă eroarea CLI?', NULL, 'Nu am bifat \"I understand the risk\"', 'Nu avem baterie conectată', 'Consola este deschisă', 'Telecomanda nu este conectată', 'c');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `schedule`
--

CREATE TABLE `schedule` (
  `stage` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `schedule`
--

INSERT INTO `schedule` (`stage`, `start_time`, `end_time`) VALUES
(1, '2026-03-23 20:45:00', '2026-03-23 23:59:00'),
(2, '2026-03-22 20:00:00', '2026-03-24 23:59:00'),
(3, '2026-03-23 10:00:00', '2026-03-23 20:00:00'),
(4, '2026-03-24 10:00:00', '2026-03-24 20:00:00');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `current_stage` int(11) DEFAULT 1,
  `time_stage_1` int(11) DEFAULT 0,
  `time_stage_2` int(11) DEFAULT 0,
  `time_stage_3` int(11) DEFAULT 0,
  `time_stage_4` int(11) DEFAULT 0,
  `score_stage_1` float DEFAULT 0,
  `score_stage_2` float DEFAULT 0,
  `score_stage_3` float DEFAULT 0,
  `score_stage_4` float DEFAULT 0,
  `total_score` float DEFAULT 0,
  `cea_mai_frumoasa` int(11) DEFAULT 0,
  `c_motor` int(11) DEFAULT 0,
  `c_asamblare` int(11) DEFAULT 0,
  `c_fire_esc` int(11) DEFAULT 0,
  `c_fir_fir` int(11) DEFAULT 0,
  `c_fire_bat` int(11) DEFAULT 0,
  `c_rotatie` int(11) DEFAULT 0,
  `cm_motor` int(11) DEFAULT 0,
  `cm_esc` int(11) DEFAULT 0,
  `cm_fc` int(11) DEFAULT 0,
  `cm_brat` int(11) DEFAULT 0,
  `cm_platforma` int(11) DEFAULT 0,
  `cm_picior` int(11) DEFAULT 0,
  `cm_capac` int(11) DEFAULT 0,
  `cm_elice` int(11) DEFAULT 0,
  `cm_frame` int(11) DEFAULT 0,
  `cm_scurt` int(11) DEFAULT 0,
  `cm_surub` int(11) DEFAULT 0,
  `cm_piulita` int(11) DEFAULT 0,
  `cm_cauciuc` int(11) DEFAULT 0,
  `cm_unelte` int(11) DEFAULT 0,
  `b_calibrare` int(11) DEFAULT 0,
  `b_axa` int(11) DEFAULT 0,
  `b_port` int(11) DEFAULT 0,
  `b_arming` int(11) DEFAULT 0,
  `b_airmode` int(11) DEFAULT 0,
  `b_voltage` int(11) DEFAULT 0,
  `b_failsafe` int(11) DEFAULT 0,
  `b_protocol` int(11) DEFAULT 0,
  `b_pid` int(11) DEFAULT 0,
  `b_modes` int(11) DEFAULT 0,
  `b_rx` int(11) DEFAULT 0,
  `b_fara_greseala` int(11) DEFAULT 0,
  `bm_flash` int(11) DEFAULT 0,
  `z_obstacol_peste` int(11) DEFAULT 0,
  `z_obstacol_sub` int(11) DEFAULT 0,
  `z_slalom` int(11) DEFAULT 0,
  `z_cerc_trecut` int(11) DEFAULT 0,
  `z_cerc_aterizare` int(11) DEFAULT 0,
  `zm_pamant` int(11) DEFAULT 0,
  `zm_obstacol` int(11) DEFAULT 0,
  `scor_total_drona` float DEFAULT 0,
  `prezentare` int(11) NOT NULL DEFAULT 0,
  `prezenta` int(11) DEFAULT 0,
  `puncte_extra` int(11) DEFAULT 0,
  `zm_prabusire` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `teams`
--

INSERT INTO `teams` (`id`, `name`, `password`, `current_stage`, `time_stage_1`, `time_stage_2`, `time_stage_3`, `time_stage_4`, `score_stage_1`, `score_stage_2`, `score_stage_3`, `score_stage_4`, `total_score`, `cea_mai_frumoasa`, `c_motor`, `c_asamblare`, `c_fire_esc`, `c_fir_fir`, `c_fire_bat`, `c_rotatie`, `cm_motor`, `cm_esc`, `cm_fc`, `cm_brat`, `cm_platforma`, `cm_picior`, `cm_capac`, `cm_elice`, `cm_frame`, `cm_scurt`, `cm_surub`, `cm_piulita`, `cm_cauciuc`, `cm_unelte`, `b_calibrare`, `b_axa`, `b_port`, `b_arming`, `b_airmode`, `b_voltage`, `b_failsafe`, `b_protocol`, `b_pid`, `b_modes`, `b_rx`, `b_fara_greseala`, `bm_flash`, `z_obstacol_peste`, `z_obstacol_sub`, `z_slalom`, `z_cerc_trecut`, `z_cerc_aterizare`, `zm_pamant`, `zm_obstacol`, `scor_total_drona`, `prezentare`, `prezenta`, `puncte_extra`, `zm_prabusire`) VALUES
(2, 'admin', 'A721', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'Echipa1', 'E1X9', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Echipa2', 'E2B4', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Echipa3', 'E3K7', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'Echipa4', 'E4M2', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'Echipa5', 'E5P8', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'Echipa6', 'E6S3', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 'Echipa7', 'E7T1', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'Echipa8', 'E8V5', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 'Echipa9', 'E9W0', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 'Echipa10', 'E10Z', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 'Echipa11', 'E11Q', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`stage`);

--
-- Indexuri pentru tabele `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pentru tabele `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
