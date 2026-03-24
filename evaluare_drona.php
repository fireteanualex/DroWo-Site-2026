<?php
session_start();

if (!isset($_SESSION['trainer_logged_in']) || $_SESSION['trainer_logged_in'] !== true) {
    header("Location: orga.php");
    exit;
}

require '../db.php';

// --- LOGICA PENTRU ACTUALIZARE PROGRAM ---
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_schedule'])) {
    foreach ($_POST['start_time'] as $stage => $start) {
        $end = $_POST['end_time'][$stage];
        
        // Formatam din 'YYYY-MM-DDThh:mm' in 'YYYY-MM-DD hh:mm:ss'
        $start_formatted = date('Y-m-d H:i:s', strtotime($start));
        $end_formatted = date('Y-m-d H:i:s', strtotime($end));
        
        $stmt = $pdo->prepare("UPDATE schedule SET start_time=?, end_time=? WHERE stage=?");
        $stmt->execute([$start_formatted, $end_formatted, $stage]);
    }
    $mesaj_program = "Programul etapelor a fost actualizat cu succes!";
}

// Extragem programul curent
$stmt_sch = $pdo->query("SELECT * FROM schedule ORDER BY stage ASC");
$schedule_data = $stmt_sch->fetchAll(PDO::FETCH_ASSOC);
// ------------------------------------------

// --- LOGICA PENTRU EVALUARE DRONA ---
$stmt = $pdo->query("SELECT id, name FROM teams ORDER BY name ASC");
$teams = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['team_id'])) {
    $team_id = $_POST['team_id'];
    $frumusete = (int)$_POST['cea_mai_frumoasa'];
    $prezentare = (int)$_POST['prezentare'];

    $c_motor = (int)$_POST['c_motor'];
    $c_asamblare = (int)$_POST['c_asamblare'];
    $c_fire_esc = (int)$_POST['c_fire_esc'];
    $c_fir_fir = (int)$_POST['c_fir_fir'];
    $c_fire_bat = (int)$_POST['c_fire_bat'];
    $c_rotatie = (int)$_POST['c_rotatie'];

    $cm_motor = (int)$_POST['cm_motor'];
    $cm_esc = (int)$_POST['cm_esc'];
    $cm_fc = (int)$_POST['cm_fc'];
    $cm_brat = (int)$_POST['cm_brat'];
    $cm_platforma = (int)$_POST['cm_platforma'];
    $cm_picior = (int)$_POST['cm_picior'];
    $cm_capac = (int)$_POST['cm_capac'];
    $cm_elice = (int)$_POST['cm_elice'];
    $cm_frame = (int)$_POST['cm_frame'];
    $cm_scurt = (int)$_POST['cm_scurt'];
    $cm_surub = (int)$_POST['cm_surub'];
    $cm_piulita = (int)$_POST['cm_piulita'];
    $cm_cauciuc = (int)$_POST['cm_cauciuc'];
    $cm_unelte = (int)$_POST['cm_unelte'];

    $b_calibrare = (isset($_POST['b_calibrare']) ? 1 : 0);
    $b_axa = (isset($_POST['b_axa']) ? 1 : 0);
    $b_port = (isset($_POST['b_port']) ? 1 : 0);
    $b_arming = (isset($_POST['b_arming']) ? 1 : 0);
    $b_airmode = (isset($_POST['b_airmode']) ? 1 : 0);
    $b_voltage = (int)$_POST['b_voltage'];
    $b_failsafe = (isset($_POST['b_failsafe']) ? 1 : 0);
    $b_protocol = (isset($_POST['b_protocol']) ? 1 : 0);
    $b_pid = (isset($_POST['b_pid']) ? 1 : 0);
    $b_modes = (int)$_POST['b_modes'];
    $b_rx = (isset($_POST['b_rx']) ? 1 : 0);
    $b_fara_greseala = (isset($_POST['b_fara_greseala']) ? 1 : 0);

    $bm_flash = (int)$_POST['bm_flash'];

    $z_obstacol_peste = (int)$_POST['z_obstacol_peste'];
    $z_obstacol_sub = (int)$_POST['z_obstacol_sub'];
    $z_slalom = (int)$_POST['z_slalom'];
    $z_cerc_trecut = (int)$_POST['z_cerc_trecut'];
    $z_cerc_aterizare = (int)$_POST['z_cerc_aterizare'];

    $zm_pamant = (int)$_POST['zm_pamant'];
    $zm_obstacol = (int)$_POST['zm_obstacol'];
    $zm_prabusire = (int)$_POST['zm_prabusire']; // <-- Variabila noua unificata

    $scor_plus = $frumusete + ($prezentare * 5) + 
                 ($c_motor * 20) + ($c_asamblare * 50) + ($c_fire_esc * 15) + ($c_fir_fir * 20) + ($c_fire_bat * 25) + ($c_rotatie * 20) +
                 ($b_calibrare * 10) + ($b_axa * 5) + ($b_port * 5) + ($b_arming * 5) + ($b_airmode * 5) + ($b_voltage * 5) + ($b_failsafe * 5) + ($b_protocol * 5) + ($b_pid * 15) + ($b_modes * 5) + ($b_rx * 10) + ($b_fara_greseala * 20) +
                 ($z_obstacol_peste * 20) + ($z_obstacol_sub * 25) + ($z_slalom * 30) + ($z_cerc_trecut * 40) + ($z_cerc_aterizare * 50);

    $scor_minus = ($cm_motor * 100) + ($cm_esc * 500) + ($cm_fc * 500) + ($cm_brat * 50) + ($cm_platforma * 50) + ($cm_picior * 50) + ($cm_capac * 50) + ($cm_elice * 25) + ($cm_frame * 100) + ($cm_scurt * 25) + ($cm_surub * 5) + ($cm_piulita * 5) + ($cm_cauciuc * 10) + ($cm_unelte * 100) +
                  ($bm_flash * 500) +
                  ($zm_pamant * 5) + ($zm_obstacol * 10) + ($zm_prabusire * 25); // <-- Calcul actualizat

    $scor_drona_final = $scor_plus - $scor_minus;

    $sql = "UPDATE teams SET 
            cea_mai_frumoasa=?, prezentare=?, c_motor=?, c_asamblare=?, c_fire_esc=?, c_fir_fir=?, c_fire_bat=?, c_rotatie=?,
            cm_motor=?, cm_esc=?, cm_fc=?, cm_brat=?, cm_platforma=?, cm_picior=?, cm_capac=?, cm_elice=?, cm_frame=?, cm_scurt=?, cm_surub=?, cm_piulita=?, cm_cauciuc=?, cm_unelte=?,
            b_calibrare=?, b_axa=?, b_port=?, b_arming=?, b_airmode=?, b_voltage=?, b_failsafe=?, b_protocol=?, b_pid=?, b_modes=?, b_rx=?, b_fara_greseala=?,
            bm_flash=?,
            z_obstacol_peste=?, z_obstacol_sub=?, z_slalom=?, z_cerc_trecut=?, z_cerc_aterizare=?,
            zm_pamant=?, zm_obstacol=?, zm_prabusire=?,
            scor_total_drona = ?, total_score = total_score + ?
            WHERE id=?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $frumusete, $prezentare, $c_motor, $c_asamblare, $c_fire_esc, $c_fir_fir, $c_fire_bat, $c_rotatie,
        $cm_motor, $cm_esc, $cm_fc, $cm_brat, $cm_platforma, $cm_picior, $cm_capac, $cm_elice, $cm_frame, $cm_scurt, $cm_surub, $cm_piulita, $cm_cauciuc, $cm_unelte,
        $b_calibrare, $b_axa, $b_port, $b_arming, $b_airmode, $b_voltage, $b_failsafe, $b_protocol, $b_pid, $b_modes, $b_rx, $b_fara_greseala,
        $bm_flash,
        $z_obstacol_peste, $z_obstacol_sub, $z_slalom, $z_cerc_trecut, $z_cerc_aterizare,
        $zm_pamant, $zm_obstacol, $zm_prabusire, // <-- Parametru actualizat
        $scor_drona_final, $scor_drona_final, $team_id
    ]);

    $mesaj_succes = "Punctajul dronei a fost salvat! Scor obtinut: " . $scor_drona_final . " puncte.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Evaluare Task Drona</title>
</head>
<body>
    <div style="float: right;">
        <a href="trainer_logout.php"><button>Deconectare</button></a>
    </div>

    <h1>Evaluare Drona si Zbor (Trainer)</h1>
    
    <hr>
    <h2>Setari Program Etape (Global)</h2>
    <?php if(isset($mesaj_program)) echo "<h3 style='color:blue;'>$mesaj_program</h3>"; ?>
    <form method="POST" action="">
        <table border="1" cellpadding="5">
            <tr>
                <th>Etapa</th>
                <th>Data si Ora Inceput</th>
                <th>Data si Ora Sfarsit</th>
            </tr>
            <?php foreach($schedule_data as $row): ?>
            <tr>
                <td>Etapa <?php echo $row['stage']; ?></td>
                <td>
                    <input type="datetime-local" name="start_time[<?php echo $row['stage']; ?>]" value="<?php echo date('Y-m-d\TH:i', strtotime($row['start_time'])); ?>" required>
                </td>
                <td>
                    <input type="datetime-local" name="end_time[<?php echo $row['stage']; ?>]" value="<?php echo date('Y-m-d\TH:i', strtotime($row['end_time'])); ?>" required>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <button type="submit" name="update_schedule" style="font-weight: bold; padding: 5px 10px;">Salveaza Program</button>
    </form>
    <hr>

    <?php if(isset($mesaj_succes)) echo "<h2 style='color:green;'>$mesaj_succes</h2>"; ?>

    <form method="POST" action="">
        <label><strong>Selecteaza Echipa:</strong></label>
        <select name="team_id" required>
            <option value="">-- Alege o echipa --</option>
            <?php foreach($teams as $t): ?>
                <option value="<?php echo $t['id']; ?>"><?php echo htmlspecialchars($t['name']); ?></option>
            <?php endforeach; ?>
        </select>
        
        <hr>
        <h2>1. Cea mai frumoasa drona (Bonus)</h2>
        <select name="cea_mai_frumoasa">
            <option value="0">0 puncte</option>
            <option value="50">50 puncte</option>
            <option value="75">75 puncte</option>
            <option value="100">100 puncte</option>
        </select>

        <hr>
        <h2>2. Prezentare Drona</h2>
        Raspunsuri corecte la prezentare (5 pct/buc): <input type="number" name="prezentare" min="0" value="0">

        <hr>
        <h2>3. Constructie (Completeaza cu cifre cantitatea)</h2>
        <table border="1" cellpadding="5">
            <tr>
                <th>PLUS (Puncte adaugate)</th>
                <th>MINUS (Puncte scazute)</th>
            </tr>
            <tr>
                <td valign="top">
                    Montare motor (4x20): <input type="number" name="c_motor" min="0" max="4" value="0"><br>
                    Asamblare drona (50): <input type="number" name="c_asamblare" min="0" max="1" value="0"><br>
                    Lipituri fire ESC (15x15): <input type="number" name="c_fire_esc" min="0" max="15" value="0"><br>
                    Lipituri fir cu fir (12x20): <input type="number" name="c_fir_fir" min="0" max="12" value="0"><br>
                    Lipituri fire baterie (2x25): <input type="number" name="c_fire_bat" min="0" max="2" value="0"><br>
                    Rotatia motoarelor (4x20): <input type="number" name="c_rotatie" min="0" max="4" value="0"><br>
                </td>
                <td valign="top">
                    Motor stricat (100): <input type="number" name="cm_motor" min="0" value="0"><br>
                    ESC stricat (500): <input type="number" name="cm_esc" min="0" value="0"><br>
                    FC stricat (500): <input type="number" name="cm_fc" min="0" value="0"><br>
                    Brat rupt (50): <input type="number" name="cm_brat" min="0" value="0"><br>
                    Platforma rupta (50): <input type="number" name="cm_platforma" min="0" value="0"><br>
                    Picior rupt (50): <input type="number" name="cm_picior" min="0" value="0"><br>
                    Capac rupt (50): <input type="number" name="cm_capac" min="0" value="0"><br>
                    Elice rupta (25): <input type="number" name="cm_elice" min="0" value="0"><br>
                    Frame rupt (100): <input type="number" name="cm_frame" min="0" value="0"><br>
                    Scurtcircuit (25): <input type="number" name="cm_scurt" min="0" value="0"><br>
                    Surub (5/buc): <input type="number" name="cm_surub" min="0" value="0"><br>
                    Piulita (5/buc): <input type="number" name="cm_piulita" min="0" value="0"><br>
                    Cauciuc stack (10/buc): <input type="number" name="cm_cauciuc" min="0" value="0"><br>
                    Unelte rupte (100): <input type="number" name="cm_unelte" min="0" value="0"><br>
                </td>
            </tr>
        </table>

        <hr>
        <h2>4. Beta</h2>
        <table border="1" cellpadding="5">
            <tr>
                <th>PLUS (Bifeaza / Completeaza)</th>
                <th>MINUS</th>
            </tr>
            <tr>
                <td valign="top">
                    <input type="checkbox" name="b_calibrare" value="1"> Calibrare accelerometru (10)<br>
                    <input type="checkbox" name="b_axa" value="1"> Resetare axa (5)<br>
                    <input type="checkbox" name="b_port" value="1"> Configurare port (5)<br>
                    <input type="checkbox" name="b_arming" value="1"> Arming (5)<br>
                    <input type="checkbox" name="b_airmode" value="1"> Airmode (5)<br>
                    Min/Max/Warn Voltage (3x5): <input type="number" name="b_voltage" min="0" max="3" value="0"><br>
                    <input type="checkbox" name="b_failsafe" value="1"> FailSafe (5)<br>
                    <input type="checkbox" name="b_protocol" value="1"> Protocol motoare (5)<br>
                    <input type="checkbox" name="b_pid" value="1"> PID (15)<br>
                    Modes (2x5): <input type="number" name="b_modes" min="0" max="2" value="0"><br>
                    <input type="checkbox" name="b_rx" value="1"> RX (10)<br>
                    <input type="checkbox" name="b_fara_greseala" value="1"> Fara greseala (20)<br>
                </td>
                <td valign="top">
                    Flash gresit (500): <input type="number" name="bm_flash" min="0" value="0"><br>
                </td>
            </tr>
        </table>

        <hr>
        <h2>5. Zbor (Se zboara de 2 ori - Completeaza numarul de reusite/greseli)</h2>
        <table border="1" cellpadding="5">
            <tr>
                <th>PLUS</th>
                <th>MINUS</th>
            </tr>
            <tr>
                <td valign="top">
                    Trecut peste obstacol (20/buc): <input type="number" name="z_obstacol_peste" min="0" value="0"><br>
                    Trecut sub obstacol (25/buc): <input type="number" name="z_obstacol_sub" min="0" value="0"><br>
                    Slalom 3 conuri (30/con): <input type="number" name="z_slalom" min="0" max="6" value="0"> (max 6 pt 2 zboruri)<br>
                    Trecut prin cerc (40/buc): <input type="number" name="z_cerc_trecut" min="0" value="0"><br>
                    Aterizare in cerc (50/buc): <input type="number" name="z_cerc_aterizare" min="0" value="0"><br>
                </td>
                <td valign="top">
                    Drona atinge pamantul (5/buc): <input type="number" name="zm_pamant" min="0" value="0"><br>
                    Drona atinge obstacol (10/buc): <input type="number" name="zm_obstacol" min="0" value="0"><br>
                    Prabusire (25/buc): <input type="number" name="zm_prabusire" min="0" value="0"><br>
                </td>
            </tr>
        </table>

        <br>
        <button type="submit" style="font-size: 20px; padding: 10px 20px;">Salveaza Punctaj Drona</button>
    </form>
</body>
</html>