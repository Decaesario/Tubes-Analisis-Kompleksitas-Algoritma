<?php
// ITERATIF
function geometriIteratif($a, $r, $n) {
    $hasil = 0;
    $suku = $a;
    for ($i = 1; $i <= $n; $i++) {
        $hasil += $suku;
        $suku *= $r;
    }
    return $hasil;
}

// REKURSIF
function geometriRekursif($suku, $r, $n) {
    if ($n == 0) {
        return 0;
    }
    return $suku + geometriRekursif($suku * $r, $r, $n - 1);
}

// MAIN
$ulang = 100000;
$hasilIter = null;
$hasilRek = null;
$waktuIter = 0;
$waktuRek = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $a = intval($_POST['a']);
    $r = intval($_POST['r']);
    $n = intval($_POST['n']);
    
    // Iteratif
    $startIter = microtime(true);
    for ($i = 0; $i < $ulang; $i++) {
        $hasilIter = geometriIteratif($a, $r, $n);
    }
    $endIter = microtime(true);
    $waktuIter = round(($endIter - $startIter) * 1000, 2);
    
    // Rekursif
    $startRek = microtime(true);
    for ($i = 0; $i < $ulang; $i++) {
        $hasilRek = geometriRekursif($a, $r, $n);
    }
    $endRek = microtime(true);
    $waktuRek = round(($endRek - $startRek) * 1000, 2);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Deret Geometri - Iteratif vs Rekursif</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        
        h1 {
            text-align: center;
            color: #667eea;
            margin-bottom: 20px;
            font-size: 2.5em;
        }
        
        .team-info {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 30px;
            color: white;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }
        
        .team-title {
            text-align: center;
            font-size: 1.3em;
            font-weight: 600;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .team-members {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .member {
            background: rgba(255, 255, 255, 0.15);
            padding: 12px 20px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(10px);
            transition: transform 0.2s, background 0.2s;
        }
        
        .member:hover {
            transform: translateX(5px);
            background: rgba(255, 255, 255, 0.25);
        }
        
        .member-name {
            font-weight: 500;
            font-size: 1.05em;
        }
        
        .member-nim {
            font-size: 0.95em;
            opacity: 0.9;
            font-family: 'Courier New', monospace;
        }
        
        .form-section {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }
        
        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        input:focus {
            outline: none;
            border-color: #667eea;
        }
        
        button {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: 600;
            transition: transform 0.2s;
        }
        
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .results-section {
            margin-top: 40px;
        }
        
        .comparison-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .method-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 25px;
            border-radius: 15px;
            color: white;
            position: relative;
            overflow: hidden;
            animation: slideIn 0.5s ease-out;
        }
        
        .method-card.iterative {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        }
        
        .method-card.recursive {
            background: linear-gradient(135deg, #ee0979 0%, #ff6a00 100%);
        }
        
        .method-card h3 {
            margin-bottom: 15px;
            font-size: 1.5em;
        }
        
        .result-value {
            font-size: 1.8em;
            font-weight: bold;
            margin: 10px 0;
        }
        
        .time-value {
            font-size: 1.2em;
            opacity: 0.9;
        }
        
        .speed-bar-container {
            margin-top: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 15px;
        }
        
        .speed-bar-title {
            text-align: center;
            font-size: 1.3em;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }
        
        .speed-bars {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .speed-bar-item {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .speed-label {
            min-width: 100px;
            font-weight: 600;
            color: #333;
        }
        
        .speed-bar {
            flex: 1;
            height: 40px;
            background: #e0e0e0;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
        }
        
        .speed-bar-fill {
            height: 100%;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 15px;
            color: white;
            font-weight: 600;
            transition: width 1.5s ease-out;
            width: 0;
        }
        
        .speed-bar-fill.iterative {
            background: linear-gradient(90deg, #11998e 0%, #38ef7d 100%);
        }
        
        .speed-bar-fill.recursive {
            background: linear-gradient(90deg, #ee0979 0%, #ff6a00 100%);
        }
        
        .winner-badge {
            display: inline-block;
            background: #ffd700;
            color: #333;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 600;
            margin-top: 10px;
            animation: bounce 0.5s ease-out;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        
        .stat-box {
            background: white;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            border: 2px solid #667eea;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9em;
            margin-bottom: 5px;
        }
        
        .stat-value {
            color: #667eea;
            font-size: 1.5em;
            font-weight: bold;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        
        .loading {
            display: none;
            text-align: center;
            padding: 20px;
        }
        
        .loading.active {
            display: block;
        }
        
        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #667eea;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        @media (max-width: 768px) {
            .comparison-container {
                grid-template-columns: 1fr;
            }
            
            h1 {
                font-size: 1.8em;
            }
            
            .member {
                flex-direction: column;
                gap: 5px;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>⚡ Deret Geometri - Iteratif vs Rekursif</h1>
        
        <div class="team-info">
            <div class="team-title">👥 Kelompok</div>
            <div class="team-members">
                <div class="member">
                    <span class="member-name">Pangeran Clevario Decaesario</span>
                    <span class="member-nim">103012400148</span>
                </div>
                <div class="member">
                    <span class="member-name">Raihan Wendra Baswara</span>
                    <span class="member-nim">103012400330</span>
                </div>
                <div class="member">
                    <span class="member-name">Achmad Raffa Adhiyaksa</span>
                    <span class="member-nim">103012400200</span>
                </div>
            </div>
        </div>
        
        <div class="form-section">
            <form method="POST" id="calcForm">
                <div class="form-group">
                    <label>Masukkan suku pertama (a):</label>
                    <input type="number" name="a" required value="<?= isset($_POST['a']) ? $_POST['a'] : '2' ?>">
                </div>
                
                <div class="form-group">
                    <label>Masukkan rasio (r):</label>
                    <input type="number" name="r" required value="<?= isset($_POST['r']) ? $_POST['r'] : '3' ?>">
                </div>
                
                <div class="form-group">
                    <label>Masukkan jumlah suku (n):</label>
                    <input type="number" name="n" required value="<?= isset($_POST['n']) ? $_POST['n'] : '5' ?>">
                </div>
                
                <button type="submit">🚀 Hitung Sekarang</button>
            </form>
        </div>
        
        <div class="loading" id="loading">
            <div class="spinner"></div>
            <p style="margin-top: 10px; color: #666;">Menghitung...</p>
        </div>
        
        <?php if ($hasilIter !== null): ?>
        <div class="results-section" id="results">
            <div class="comparison-container">
                <div class="method-card iterative">
                    <h3>🔄 ITERATIF</h3>
                    <div class="result-value">Hasil: <?= number_format($hasilIter) ?></div>
                    <div class="time-value">⏱️ Waktu: <?= $waktuIter ?> ms</div>
                    <?php if ($waktuIter < $waktuRek): ?>
                        <span class="winner-badge">🏆 PEMENANG!</span>
                    <?php endif; ?>
                </div>
                
                <div class="method-card recursive">
                    <h3>🔁 REKURSIF</h3>
                    <div class="result-value">Hasil: <?= number_format($hasilRek) ?></div>
                    <div class="time-value">⏱️ Waktu: <?= $waktuRek ?> ms</div>
                    <?php if ($waktuRek < $waktuIter): ?>
                        <span class="winner-badge">🏆 PEMENANG!</span>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="speed-bar-container">
                <div class="speed-bar-title">📊 Perbandingan Kecepatan Eksekusi</div>
                
                <div class="speed-bars">
                    <div class="speed-bar-item">
                        <div class="speed-label">Iteratif</div>
                        <div class="speed-bar">
                            <div class="speed-bar-fill iterative" id="iterBar">
                                <?= $waktuIter ?> ms
                            </div>
                        </div>
                    </div>
                    
                    <div class="speed-bar-item">
                        <div class="speed-label">Rekursif</div>
                        <div class="speed-bar">
                            <div class="speed-bar-fill recursive" id="rekBar">
                                <?= $waktuRek ?> ms
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="stats-grid">
                    <div class="stat-box">
                        <div class="stat-label">Selisih Waktu</div>
                        <div class="stat-value"><?= abs($waktuIter - $waktuRek) ?> ms</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-label">Iterasi</div>
                        <div class="stat-value"><?= number_format($ulang) ?>x</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-label">Metode Tercepat</div>
                        <div class="stat-value"><?= $waktuIter < $waktuRek ? 'Iteratif' : 'Rekursif' ?></div>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            // Animate bars on load
            window.addEventListener('load', function() {
                <?php if ($hasilIter !== null): ?>
                const maxTime = Math.max(<?= $waktuIter ?>, <?= $waktuRek ?>);
                const iterWidth = (<?= $waktuIter ?> / maxTime) * 100;
                const rekWidth = (<?= $waktuRek ?> / maxTime) * 100;
                
                setTimeout(() => {
                    document.getElementById('iterBar').style.width = iterWidth + '%';
                    document.getElementById('rekBar').style.width = rekWidth + '%';
                }, 100);
                
                // Auto scroll to results with smooth animation
                setTimeout(() => {
                    document.getElementById('results').scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'start' 
                    });
                }, 200);
                <?php endif; ?>
            });
        </script>
        <?php endif; ?>
    </div>
    
    <script>
        document.getElementById('calcForm').addEventListener('submit', function() {
            document.getElementById('loading').classList.add('active');
        });
    </script>
</body>
</html>