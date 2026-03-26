<?php
session_start();

if (!isset($_SESSION['team_name']) || strtolower($_SESSION['team_name']) !== 'admin') {
    header("Location: ../login");
    exit;
}

require '../db.php';

// --- LOGICA PENTRU ACTUALIZARE PROGRAM ---
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_schedule'])) {
    foreach ($_POST['start_time'] as $stage => $start) {
        $end = $_POST['end_time'][$stage];
        $start_formatted = date('Y-m-d H:i:s', strtotime($start));
        $end_formatted = date('Y-m-d H:i:s', strtotime($end));
        $stmt = $pdo->prepare("UPDATE schedule SET start_time=?, end_time=? WHERE stage=?");
        $stmt->execute([$start_formatted, $end_formatted, $stage]);
    }
    $mesaj_program = "Programul etapelor a fost actualizat!";
}

$stmt_sch = $pdo->query("SELECT * FROM schedule ORDER BY stage ASC");
$schedule_data = $stmt_sch->fetchAll(PDO::FETCH_ASSOC);

// --- LOGICA PENTRU EVALUARE DRONA ---
$stmt = $pdo->query("SELECT * FROM teams WHERE name != 'admin' ORDER BY name ASC");
$teams = $stmt->fetchAll();
$json_teams = json_encode($teams);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['team_id'])) {
    $team_id = $_POST['team_id'];
    $frumusete = (int)$_POST['cea_mai_frumoasa'];
    $prezentare = (int)$_POST['prezentare'];
    $prezenta = isset($_POST['prezenta']) ? (int)$_POST['prezenta'] : 0;
    $puncte_extra = isset($_POST['puncte_extra']) ? (int)$_POST['puncte_extra'] : 0;
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
    $zm_prabusire = (int)$_POST['zm_prabusire'];

    $scor_plus = $frumusete + ($prezentare * 5) + $prezenta + $puncte_extra + 
                 ($c_motor * 20) + ($c_asamblare * 50) + ($c_fire_esc * 15) + ($c_fir_fir * 20) + ($c_fire_bat * 25) + ($c_rotatie * 20) +
                 ($b_calibrare * 10) + ($b_axa * 5) + ($b_port * 5) + ($b_arming * 5) + ($b_airmode * 5) + ($b_voltage * 5) + ($b_failsafe * 5) + ($b_protocol * 5) + ($b_pid * 15) + ($b_modes * 5) + ($b_rx * 10) + ($b_fara_greseala * 20) +
                 ($z_obstacol_peste * 20) + ($z_obstacol_sub * 25) + ($z_slalom * 30) + ($z_cerc_trecut * 40) + ($z_cerc_aterizare * 50);

    $scor_minus = ($cm_motor * 100) + ($cm_esc * 500) + ($cm_fc * 500) + ($cm_brat * 50) + ($cm_platforma * 50) + ($cm_picior * 50) + ($cm_capac * 50) + ($cm_elice * 25) + ($cm_frame * 100) + ($cm_scurt * 25) + ($cm_surub * 5) + ($cm_piulita * 5) + ($cm_cauciuc * 10) + ($cm_unelte * 100) +
                  ($bm_flash * 500) +
                  ($zm_pamant * 5) + ($zm_obstacol * 10) + ($zm_prabusire * 25);

    $scor_drona_final = $scor_plus - $scor_minus;

    $sql = "UPDATE teams SET 
            cea_mai_frumoasa=?, prezentare=?, prezenta=?, puncte_extra=?, c_motor=?, c_asamblare=?, c_fire_esc=?, c_fir_fir=?, c_fire_bat=?, c_rotatie=?,
            cm_motor=?, cm_esc=?, cm_fc=?, cm_brat=?, cm_platforma=?, cm_picior=?, cm_capac=?, cm_elice=?, cm_frame=?, cm_scurt=?, cm_surub=?, cm_piulita=?, cm_cauciuc=?, cm_unelte=?,
            b_calibrare=?, b_axa=?, b_port=?, b_arming=?, b_airmode=?, b_voltage=?, b_failsafe=?, b_protocol=?, b_pid=?, b_modes=?, b_rx=?, b_fara_greseala=?,
            bm_flash=?,
            z_obstacol_peste=?, z_obstacol_sub=?, z_slalom=?, z_cerc_trecut=?, z_cerc_aterizare=?,
            zm_pamant=?, zm_obstacol=?, zm_prabusire=?,
            scor_total_drona = ?, total_score = score_stage_1 + score_stage_2 + score_stage_3 + score_stage_4 + ?
            WHERE id=?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $frumusete, $prezentare, $prezenta, $puncte_extra, $c_motor, $c_asamblare, $c_fire_esc, $c_fir_fir, $c_fire_bat, $c_rotatie,
        $cm_motor, $cm_esc, $cm_fc, $cm_brat, $cm_platforma, $cm_picior, $cm_capac, $cm_elice, $cm_frame, $cm_scurt, $cm_surub, $cm_piulita, $cm_cauciuc, $cm_unelte,
        $b_calibrare, $b_axa, $b_port, $b_arming, $b_airmode, $b_voltage, $b_failsafe, $b_protocol, $b_pid, $b_modes, $b_rx, $b_fara_greseala,
        $bm_flash,
        $z_obstacol_peste, $z_obstacol_sub, $z_slalom, $z_cerc_trecut, $z_cerc_aterizare,
        $zm_pamant, $zm_obstacol, $zm_prabusire,
        $scor_drona_final, $scor_drona_final, $team_id
    ]);

    $mesaj_succes = "Scor salvat: " . $scor_drona_final . " puncte.";
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Dashboard | Drone Workshop 2026</title>
    <link rel="icon" type="image/png" href="../images/Logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../stil.css">
    <style>
        /* Ajustări specifice pentru Dashboard-ul de Trainer */
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: rgba(0, 0, 0, 0.2);
        }
        .admin-table th, .admin-table td {
            padding: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            text-align: left;
            color: #fff;
        }
        .admin-table th {
            background: rgba(0, 229, 255, 0.1);
            font-family: 'Orbitron';
            font-size: 13px;
        }
        .eval-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .plus-col { border-left: 4px solid var(--neon-blue); padding-left: 20px; }
        .minus-col { border-left: 4px solid var(--neon-pink); padding-left: 20px; }
        
        input[type="number"], input[type="datetime-local"], select {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            padding: 8px;
            border-radius: 5px;
            margin: 5px 0;
            font-family: 'Montserrat';
        }
        label { display: block; margin-top: 10px; font-weight: 600; color: #b0bac5; }
        .eval-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; }
        select option { background-color: #0a0a14; color: #ffffff; }
    </style>
</head>
<body>

    <header class="header-fix">
        <div class="container-header">
            <a href="../index.php" class="logo-link">
                <img src="../images/Logo.svg" alt="logo" class="logo-img">
            </a>
            <nav class="nav-container nav-right">
                <a href="trainer_logout.php" class="btn-logout" title="Logout">
                    <span style="color: var(--neon-gold); font-family: 'Montserrat', sans-serif; font-weight: 600; text-shadow: 0 0 8px var(--neon-gold); margin-right: 0; letter-spacing: 1px;">TRAINER MODE</span>
                    <i class="fa-solid fa-right-from-bracket" style="margin-left: 10px;"></i>
                </a>
            </nav>
        </div>
    </header>

    <main class="content-wrapper" style="padding-top: 120px;">

        <!-- 1. SETARI PROGRAM -->
        <section class="section glass-card">
            <h1 class="neon-title" style="font-size: 40px; text-align: left;">Global Schedule</h1>
            <?php if(isset($mesaj_program)): ?>
                <p style="color: var(--neon-blue); font-weight: bold;"><?php echo $mesaj_program; ?></p>
            <?php endif; ?>
            
            <form method="POST">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ETAPA</th>
                            <th>START TIME</th>
                            <th>END TIME</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($schedule_data as $row): ?>
                        <tr>
                            <td style="font-family: 'Orbitron'; color: var(--neon-blue);">Etapa <?php echo $row['stage']; ?></td>
                            <td><input type="datetime-local" name="start_time[<?php echo $row['stage']; ?>]" value="<?php echo date('Y-m-d\TH:i', strtotime($row['start_time'])); ?>"></td>
                            <td><input type="datetime-local" name="end_time[<?php echo $row['stage']; ?>]" value="<?php echo date('Y-m-d\TH:i', strtotime($row['end_time'])); ?>"></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button type="submit" name="update_schedule" class="btn-neon" style="font-size: 13px;">UPDATE SCHEDULE</button>
            </form>
        </section>

        <!-- 2. EVALUARE DRONA -->
        <section class="section glass-card">
            <h1 class="neon-title" style="font-size: 40px; text-align: left;">Drone Evaluation</h1>
            <?php if(isset($mesaj_succes)): ?>
                <div class="glass-pod" style="padding: 15px; margin-bottom: 20px; border-color: var(--neon-blue);">
                    <p style="color: var(--neon-blue); margin: 0; font-weight: bold;"><i class="fa-solid fa-check"></i> <?php echo $mesaj_succes; ?></p>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="glass-pod" style="padding: 20px; margin-bottom: 30px;">
                    <label>ECHIPA EVALUATĂ:</label>
                    <select name="team_id" required style="width: 100%; font-size: 18px; padding: 12px;">
                        <option value="">-- Alege o echipa --</option>
                        <?php foreach($teams as $t): ?>
                            <option value="<?php echo $t['id']; ?>"><?php echo htmlspecialchars($t['name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="eval-section">
                    <!-- Bonus & Prezentare -->
                    <div class="glass-pod" style="padding: 20px;">
                        <h3 style="color: var(--neon-gold); font-family: 'Orbitron';">Estetică & Soft Skills</h3>
                        <label>Cea mai frumoasă dronă (Bonus):</label>
                        <select name="cea_mai_frumoasa" style="width: 100%;">
                            <option value="0">0 puncte</option>
                            <option value="50">50 puncte</option>
                            <option value="75">75 puncte</option>
                            <option value="100">100 puncte</option>
                        </select>
                        <label>Răspunsuri prezentare (5pt/buc):</label>
                        <input type="number" name="prezentare" value="0" style="width: 100%;">
                        <label>Prezență (puncte):</label>
                        <input type="number" name="prezenta" value="0" style="width: 100%;">
                        <label>Puncte Extra:</label>
                        <input type="number" name="puncte_extra" value="0" style="width: 100%;">
                    </div>

                    <!-- Betaflight -->
                    <div class="glass-pod plus-col" style="padding: 20px;">
                        <h3 style="color: var(--neon-blue); font-family: 'Orbitron';">Configurare Beta</h3>
                        <div class="eval-row"><label><input type="checkbox" name="b_calibrare" value="1"> Calibrare (10)</label></div>
                        <div class="eval-row"><label><input type="checkbox" name="b_axa" value="1"> Reset Axă (5)</label></div>
                        <div class="eval-row"><label><input type="checkbox" name="b_pid" value="1"> PID (15)</label></div>
                        <div class="eval-row"><span>Voltage (3x5):</span> <input type="number" name="b_voltage" max="3" value="0" style="width: 60px;"></div>
                        <div class="eval-row"><label><input type="checkbox" name="b_fara_greseala" value="1"> Fără greșeală (20)</label></div>
                        <div class="eval-row"><span>Flash greșit (-500):</span> <input type="number" name="bm_flash" value="0" style="width: 60px;"></div>
                    </div>
                </div>

                <br>

                <!-- Constructie -->
                <div class="section glass-pod">
                    <h3 style="color: #fff; font-family: 'Orbitron'; margin-bottom: 20px;">Hardware & Construcție</h3>
                    <div class="eval-section">
                        <div class="plus-col">
                            <h4 style="color: var(--neon-blue);">PLUS</h4>
                            <div class="eval-row"><span>Motoare (x20):</span> <input type="number" name="c_motor" max="4" value="0"></div>
                            <div class="eval-row"><span>Asamblare (50):</span> <input type="number" name="c_asamblare" max="1" value="0"></div>
                            <div class="eval-row"><span>Fire ESC (x15):</span> <input type="number" name="c_fire_esc" max="15" value="0"></div>
                            <div class="eval-row"><span>Fir cu Fir (x20):</span> <input type="number" name="c_fir_fir" max="12" value="0"></div>
                        </div>
                        <div class="minus-col">
                            <h4 style="color: var(--neon-pink);">PENALIZĂRI</h4>
                            <div class="eval-row"><span>Motor stricat (100):</span> <input type="number" name="cm_motor" value="0"></div>
                            <div class="eval-row"><span>FC/ESC stricat (500):</span> <input type="number" name="cm_fc" value="0"></div>
                            <div class="eval-row"><span>Frame rupt (100):</span> <input type="number" name="cm_frame" value="0"></div>
                            <div class="eval-row"><span>Unelte rupte (100):</span> <input type="number" name="cm_unelte" value="0"></div>
                        </div>
                    </div>
                </div>

                <!-- Zbor -->
                <div class="section glass-pod" style="border-color: var(--neon-gold);">
                    <h3 style="color: var(--neon-gold); font-family: 'Orbitron'; margin-bottom: 20px;">Misiune de Zbor</h3>
                    <div class="eval-section">
                        <div class="plus-col" style="border-left-color: var(--neon-gold);">
                            <div class="eval-row"><span>Peste obstacol (20):</span> <input type="number" name="z_obstacol_peste" value="0"></div>
                            <div class="eval-row"><span>Sub obstacol (25):</span> <input type="number" name="z_obstacol_sub" value="0"></div>
                            <div class="eval-row"><span>Slalom (30):</span> <input type="number" name="z_slalom" max="6" value="0"></div>
                            <div class="eval-row"><span>Cerc trecere (40):</span> <input type="number" name="z_cerc_trecut" value="0"></div>
                            <div class="eval-row"><span>Aterizare (50):</span> <input type="number" name="z_cerc_aterizare" value="0"></div>
                        </div>
                        <div class="minus-col">
                            <div class="eval-row"><span>Atingere pământ (5):</span> <input type="number" name="zm_pamant" value="0"></div>
                            <div class="eval-row"><span>Atingere obstacol (10):</span> <input type="number" name="zm_obstacol" value="0"></div>
                            <div class="eval-row"><span>Prăbușire (25):</span> <input type="number" name="zm_prabusire" value="0"></div>
                        </div>
                    </div>
                </div>

                <div style="text-align: center; margin-top: 40px;">
                    <button type="submit" class="btn-neon" style="padding: 20px 80px; font-size: 20px;">
                        <i class="fa-solid fa-floppy-disk"></i> SAVE EVALUATION
                    </button>
                </div>
            </form>
        </section>
    </main>

    <script>
        const allTeams = <?php echo isset($json_teams) ? $json_teams : '[]'; ?>;
        document.querySelector('select[name="team_id"]').addEventListener('change', function() {
            const tId = this.value;
            if(!tId) { document.querySelector('form').reset(); return; }
            const t = allTeams.find(team => team.id == tId);
            if(t) {
                document.querySelector('[name="cea_mai_frumoasa"]').value = t.cea_mai_frumoasa || 0;
                document.querySelector('[name="prezentare"]').value = t.prezentare || 0;
                document.querySelector('[name="prezenta"]').value = t.prezenta || 0;
                document.querySelector('[name="puncte_extra"]').value = t.puncte_extra || 0;
                document.querySelector('[name="c_motor"]').value = t.c_motor || 0;
                document.querySelector('[name="c_asamblare"]').value = t.c_asamblare || 0;
                document.querySelector('[name="c_fire_esc"]').value = t.c_fire_esc || 0;
                document.querySelector('[name="c_fir_fir"]').value = t.c_fir_fir || 0;
                document.querySelector('[name="c_fire_bat"]').value = t.c_fire_bat || 0;
                document.querySelector('[name="c_rotatie"]').value = t.c_rotatie || 0;
                document.querySelector('[name="cm_motor"]').value = t.cm_motor || 0;
                document.querySelector('[name="cm_esc"]').value = t.cm_esc || 0;
                document.querySelector('[name="cm_fc"]').value = t.cm_fc || 0;
                document.querySelector('[name="cm_brat"]').value = t.cm_brat || 0;
                document.querySelector('[name="cm_platforma"]').value = t.cm_platforma || 0;
                document.querySelector('[name="cm_picior"]').value = t.cm_picior || 0;
                document.querySelector('[name="cm_capac"]').value = t.cm_capac || 0;
                document.querySelector('[name="cm_elice"]').value = t.cm_elice || 0;
                document.querySelector('[name="cm_frame"]').value = t.cm_frame || 0;
                document.querySelector('[name="cm_scurt"]').value = t.cm_scurt || 0;
                document.querySelector('[name="cm_surub"]').value = t.cm_surub || 0;
                document.querySelector('[name="cm_piulita"]').value = t.cm_piulita || 0;
                document.querySelector('[name="cm_cauciuc"]').value = t.cm_cauciuc || 0;
                document.querySelector('[name="cm_unelte"]').value = t.cm_unelte || 0;
                
                document.querySelector('[name="b_voltage"]').value = t.b_voltage || 0;
                document.querySelector('[name="bm_flash"]').value = t.bm_flash || 0;
                
                document.querySelector('[name="z_obstacol_peste"]').value = t.z_obstacol_peste || 0;
                document.querySelector('[name="z_obstacol_sub"]').value = t.z_obstacol_sub || 0;
                document.querySelector('[name="z_slalom"]').value = t.z_slalom || 0;
                document.querySelector('[name="z_cerc_trecut"]').value = t.z_cerc_trecut || 0;
                document.querySelector('[name="z_cerc_aterizare"]').value = t.z_cerc_aterizare || 0;
                document.querySelector('[name="zm_pamant"]').value = t.zm_pamant || 0;
                document.querySelector('[name="zm_obstacol"]').value = t.zm_obstacol || 0;
                document.querySelector('[name="zm_prabusire"]').value = t.zm_prabusire || 0;

                // Checkboxes
                document.querySelector('[name="b_calibrare"]').checked = t.b_calibrare == 1;
                document.querySelector('[name="b_axa"]').checked = t.b_axa == 1;
                document.querySelector('[name="b_pid"]').checked = t.b_pid == 1;
                document.querySelector('[name="b_fara_greseala"]').checked = t.b_fara_greseala == 1;
                document.querySelector('[name="b_port"]').checked = t.b_port == 1;
                document.querySelector('[name="b_arming"]').checked = t.b_arming == 1;
                document.querySelector('[name="b_airmode"]').checked = t.b_airmode == 1;
                document.querySelector('[name="b_failsafe"]').checked = t.b_failsafe == 1;
                document.querySelector('[name="b_protocol"]').checked = t.b_protocol == 1;
                document.querySelector('[name="b_rx"]').checked = t.b_rx == 1;

                alert('Atenție: Valorile curente au fost încărcate din baza de date pentru echipa selectată. Orice modificare nouă va actualiza scorul acestei echipe!');
            }
        });
    </script>
    <footer class="footer-glass">
        <p>&copy; 2026 Euroavia București | Trainer Administration Panel</p>
    </footer>

</body>
</html>