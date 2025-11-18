<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage Bisnis Anda | [Nama Perusahaan]</title>
    <link rel="stylesheet" href="style.css"> </head>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .main-header {
            background-color: #0044cc;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .main-nav ul {
            list-style-type: none;
            padding: 0;
        }
        .main-nav ul li {
            display: inline;
            margin-right: 20px;
        }
        .main-nav ul li a {
            color: white;
            text-decoration: none;
        }
        .hero-section {
            background-image: url('hero-bg.jpg');
            background-size: cover;
            color: white;
            padding: 100px 20px;
            text-align: center;
        }
        .cta-button {
            background-color: #ff6600;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
        }
        .feature-section, .cta-section {
            padding: 50px 20px;
        }
        .features-grid {
            display: flex;
            justify-content: space-around;
        }
        .feature-item {
            width: 30%;
        }
        .main-footer {
            background-color: #222;
            color: white;
            text-align: center;
            padding: 20px 0;
        }
<body>
    
    <header class="main-header">
        <div class="logo">LOGO PERUSAHAAN</div>
        <nav class="main-nav">
            <ul>
                <li><a href="#beranda">Beranda</a></li>
                <li><a href="#layanan">Layanan</a></li>
                <li><a href="#tentang">Tentang Kami</a></li>
                <li><a href="#kontak" class="cta-button">Hubungi Kami</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero-section" id="beranda">
        <div class="hero-content">
            <h1>Solusi Cepat & Terbaik untuk Kebutuhan Bisnis Anda.</h1>
            <p>Kami membantu Anda mencapai tujuan melalui layanan profesional yang teruji dan terpercaya.</p>
            <a href="#layanan" class="cta-primary">Lihat Layanan Kami</a>
        </div>
    </section>

    <section class="feature-section" id="layanan">
        <h2>Mengapa Memilih Kami?</h2>
        <div class="features-grid">
            <div class="feature-item">
                <h3>Kualitas Terjamin</h3>
                <p>Setiap proyek dikerjakan dengan standar tertinggi dan perhatian terhadap detail.</p>
            </div>
            <div class="feature-item">
                <h3>Dukungan Penuh</h3>
                <p>Tim kami siap memberikan bantuan dan dukungan pasca-proyek 24/7.</p>
            </div>
            <div class="feature-item">
                <h3>Harga Kompetitif</h3>
                <p>Dapatkan kualitas terbaik dengan penawaran harga yang transparan dan adil.</p>
            </div>
        </div>
    </section>

    <section class="cta-section" id="kontak">
        <h2>Siap Memulai Proyek Anda?</h2>
        <p>Hubungi kami hari ini untuk konsultasi gratis dan penawaran terbaik.</p>
        <a href="mailto:email@contoh.com" class="cta-secondary">Kirim Email Sekarang</a>
    </section>

    <footer class="main-footer">
        <p>&copy; 2025 Nama Perusahaan Anda. Hak Cipta Dilindungi.</p>
        <div class="social-links">
            <a href="#">Facebook</a> | 
            <a href="#">Instagram</a> | 
            <a href="#">LinkedIn</a>
        </div>
    </footer>

</body>
</html>