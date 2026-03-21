<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Participant - DroWo 2026</title>
    <link rel="stylesheet" href="stil.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<body style="display: flex; align-items: center; justify-content: center; height: 100vh; padding-top: 0;">
    
    <div class="glass-card" style="width: 100%; max-width: 400px; padding: 50px 30px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <img src="images/Logo.svg" alt="Logo" style="height: 80px; margin-bottom: 20px;">
            <h1 class="neon-title" style="font-size: 40px; margin: 0;">LOGIN</h1>
        </div>

        <form action="auth.php" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
            <div class="input-group" style="text-align: left;">
                <label style="font-family: 'Orbitron', sans-serif; font-size: 12px; color: var(--neon-blue); letter-spacing: 2px;">USER</label>
                <input type="text" name="user" required style="width: 100%; background: rgba(255,255,255,0.05); border: 1px solid var(--glass-border); padding: 12px; border-radius: 8px; color: white; margin-top: 5px; font-family: 'Montserrat', sans-serif;">
            </div>

            <div class="input-group" style="text-align: left;">
                <label style="font-family: 'Orbitron', sans-serif; font-size: 12px; color: var(--neon-pink); letter-spacing: 2px;">PAROLA</label>
                <input type="password" name="pass" required style="width: 100%; background: rgba(255,255,255,0.05); border: 1px solid var(--glass-border); padding: 12px; border-radius: 8px; color: white; margin-top: 5px;">
            </div>

            <button type="submit" class="btn-neon" style="width: 100%; margin-top: 10px;">LOGIN</button>
        </form>
        
        <div style="margin-top: 15px;">
            <a href="index.html" style="font-size: 11px; color: rgba(255,255,255,0.3); text-decoration: none; text-transform: uppercase;">← Înapoi la pagina principală</a>
        </div>
    </div>

</body>
</html>