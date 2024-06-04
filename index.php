<!-- Connect DB -->
<?php
$servername = "13.215.144.61";
$username = "root";
$password = "";
$database = "kad_kahwin";

$connection = mysqli_connect($servername, $username, $password);

if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Check if Database Not Exists Then Create The Database, But If Exists Then Proceed
if (!mysqli_fetch_row(mysqli_query($connection, "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$database'"))) {
    mysqli_query($connection, "CREATE DATABASE " . $database);
}

// New Connection If Database is Created
$connection = mysqli_connect($servername, $username, $password, $database);

$query1 = mysqli_query($connection, "SHOW TABLES LIKE 'ucapan_kahwin'");

// Create Table if Does Not Exists
if (mysqli_num_rows($query1) == 0) {
    $table_ucapan = "CREATE TABLE `ucapan_kahwin` (
    `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `nama_tetamu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `ucapan_tetamu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    mysqli_query($connection, $table_ucapan);
}

$query2 = mysqli_query($connection, "SHOW TABLES LIKE 'kehadiran'");

// Create Table if Does Not Exists
if (mysqli_num_rows($query2) == 0) {
    $table_kehadiran = "CREATE TABLE `kehadiran` (
    `id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
    `jumlah_kehadiran` int UNSIGNED NOT NULL,
    `jumlah_tidak_hadir` int UNSIGNED NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    mysqli_query($connection, $table_kehadiran);

    // Insert Data
    $seeder = "INSERT INTO kehadiran (id, jumlah_kehadiran, jumlah_tidak_hadir) VALUES (1, 0, 0)";
    mysqli_query($connection, $seeder);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Css Vendor -->
    <link rel="stylesheet" href="./css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Hayat dan ekin</title>
</head>

<body>
    <div class="wrapper">
        <div id="overlay" class="overlay">
            <div class="overlay-content">
                <button id="toggle-content" class="toggle-button">
                    <p>Hayat</p>
                    <p>Ashikin</p>
                    <p class="buka">Buka</p>
                </button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="petal-container"></div>
        <!-- Intro Section -->
        <section class="intro">
            <div class="content">
                <img src="./images/bismillah.png" alt="" class="fade-top-1">
                <p class="title fade-top-2">Majlis Kesyukuran Perkahwinan</p>
                <h2 class="fade-top-3">Hayat</h2>
                <h2 class="fade-top-3">&</h2>
                <h2 class="fade-top-3">Ashikin</h2>
                <p class="date fade-top-4">
                    <span>ISNIN</span>
                    <span>|</span>
                    <span>16 September 2024</span>
                </p>
            </div>
        </section>

        <!-- Event Info Section -->
        <section class="info">
            <img src="./images/assalamualaikum-3.png" alt="" class="assalamualaikum reveal fade-bottom">
            <div class="event-info reveal fade-bottom">
                <div class="one">
                    <p>Dengan penuh kesyukuran</p>
                    <p>kami</p>
                    <div class="parent">
                        <p>AB RASHID BIN IBRAHIM</p>
                        <p>&</p>
                        <p>ZUNAIDAH BINTI AB.RAHMAN</p>
                    </div>
                    <p>Menjemput</p>
                    <p>Dato' | Datin | Tuan | Puan | Encik | Cik</p>
                    <p>seisi keluarga hadir ke</p>
                    <p>majlis perkahwinan putera kami</p>
                </div>
                <div class="two">
                    <p>MUHAMMAD FAKHRUHAYAT BIN AB RASHID</p>
                    <p>&</p>
                    <p>NOR ASHIKIN BINTI DARUS </p>
                </div>
                <div class="three">
                    <p class="title">Tempat</p>
                    <p>LOT 233-A, KAMPUNG GONG TENGAH, BELAKANG TMN.SERI</p>
                    <p>PENGKALAN CHEPA, 16100</p>
                    <p>KOTA BHARU, KELANTAN.</p>
                </div>
                <div class="four">
                    <p class="title">Tarikh</p>
                    <p>ISNIN, 16 SEPTEMBER 2024</p>
                    <p>Bersamaan 13 RabiulAwal 1446H</p>
                </div>
                <div class="five">
                    <p class="title">Masa</p>
                    <p>11:00 AM - 5:30 PM</p>
                </div>
            </div>
            <!-- Aturcara & Countdown Section -->
            <div class="countdown reveal fade-bottom">
                <!-- Countdown Timer -->
                <div class="hero connect-page">
                    <div class="container">
                        <div class="hero-body">
                            <div class="campaign campaign-0">
                                <div class="counter timer">
                                    <span class="title">Menghitung hari</span>
                                    <div class="counter-boxes">
                                        <div class="count-box">
                                            <h1 class="value day">0</h1>
                                            <span>Hari</span>
                                        </div>
                                        <div class="count-box">
                                            <h1 class="value hour">0</h1>
                                            <span>Jam</span>
                                        </div>
                                        <div class="count-box">
                                            <h1 class="value minute">0</h1>
                                            <span>Minit</span>
                                        </div>
                                        <div class="count-box">
                                            <h1 class="value second">0</h1>
                                            <span>Saat</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Aturcara -->
            <div class="aturcara reveal fade-bottom">
                <p class="title">aturcara majlis</p>
                <div class="one">
                    <p>Kehadiran Tetamu</p>
                    <p>11:00 Pagi</p>
                </div>
                <div class="two">
                    <p>Ketibaan Pengantin</p>
                    <p>11:30 Petang</p>
                </div>
                <div class="three">
                    <p>Makan Beradab</p>
                    <p>12:00 Tengah Hari</p>
                </div>
                <div class="four">
                    <p>Majlis Bersurai</p>
                    <p>5:30 Petang</p>
                </div>
            </div>
            <div class="ucapan reveal fade-bottom">
                <div class="container">
                    <img src="./images/ucapan-bg.png" alt="">
                    <div class="content">
                        <p>رَبَّنَا هَبْ لَنَا مِنْ أَزْوَاجِنَا وَذُرِّيَّاتِنَا قُرَّةَ أَعْيُنٍ وَاجْعَلْنَا لِلْمُتَّقِينَ إِمَامًا</p>
                        <p>
                            "Wahai Tuhan kami, anugerahkanlah kepada kami istri-istri dan keturunan kami sebagai penyenang hati,
                            dan jadikanlah kami imam (pemimpin) bagi orang-orang yang bertakwa.” (QS. Al-Furqon: 74)"
                        </p>
                        <p>
                                Ya Allah, berkatilah majlis perkahwinan ini, limpahkan baraqah dan rahmat kepada kedua
                            mempelai ini,
                            Kurniakanlah mereka
                            zuriat yang soleh dan solehah. Kekalkanlah jodoh mereka di dunia dan di akhirat dan
                            sempurnakanlah
                            agama mereka dengan
                            berkat ikatan ini.
                        </p>
                    </div>
                </div>
            </div>
            <img src="./images/divider.png" alt="" class="divider reveal fade-bottom">
            <div class="rsvp">
                <h2 class="reveal fade-bottom">Ucapan</h2>
                <div class="container-message reveal fade-bottom">
                    <div class="content">
                        <p class="name">Anonymous</p>
                        <p class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin auctor velit
                            in tincidunt vehicula. Nam fermentum
                            finibus
                            purus, id vulputate nibh rhoncus vel.</p>
                    </div>
                    <div class="content">
                        <p class="name">Anonymous</p>
                        <p class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin auctor velit
                            in tincidunt vehicula. Nam fermentum
                            finibus
                            purus, id vulputate nibh rhoncus vel.</p>
                    </div>
                    <div class="content">
                        <p class="name">Anonymous</p>
                        <p class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin auctor velit
                            in tincidunt vehicula. Nam fermentum
                            finibus
                            purus, id vulputate nibh rhoncus vel.</p>
                    </div>
                    <div class="content">
                        <p class="name">Anonymous</p>
                        <p class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin auctor velit
                            in tincidunt vehicula. Nam fermentum
                            finibus
                            purus, id vulputate nibh rhoncus vel.</p>
                    </div>
                    <div class="content">
                        <p class="name">Anonymous</p>
                        <p class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin auctor velit
                            in tincidunt vehicula. Nam fermentum
                            finibus
                            purus, id vulputate nibh rhoncus vel.</p>
                    </div>
                    <div class="content">
                        <p class="name">Anonymous</p>
                        <p class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin auctor velit
                            in tincidunt vehicula. Nam fermentum
                            finibus
                            purus, id vulputate nibh rhoncus vel.</p>
                    </div>
                    <div class="content">
                        <p class="name">Anonymous</p>
                        <p class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin auctor velit
                            in tincidunt vehicula. Nam fermentum
                            finibus
                            purus, id vulputate nibh rhoncus vel.</p>
                    </div>
                    <div class="content">
                        <p class="name">Anonymous</p>
                        <p class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin auctor velit
                            in tincidunt vehicula. Nam fermentum
                            finibus
                            purus, id vulputate nibh rhoncus vel.</p>
                    </div>
                </div>
                <div class="beri-ucapan-button reveal fade-bottom">
                    <button id="kehadiran-btn">
                        <i class='bx bxs-check-square'></i>
                        <span>Sahkan Kehadiran</span>
                    </button>
                    <button id="ucapan-btn">
                        <i class='bx bxs-pen'></i>
                        <span>Berikan Ucapan Anda</span>
                    </button>
                </div>
            </div>
        </section>
        <section class="footer">
            <ul class="menu">
                <li id="calendar-btn"><i class='bx bx-calendar'></i></li>
                <li id="location-btn"><i class='bx bx-map'></i></li>
                <li id="music-btn"><i class='bx bx-music'></i></li>
                <li id="rsvp-btn"><i class='bx bx-envelope'></i></li>
                <li id="contact-btn"><i class='bx bx-phone'></i></li>
            </ul>
        </section>
    </div>

    <!-- Bottom Modal -->
    <div id="calendar-menu" class="toggle-menu">
        <div class="calendar">
            <h1>Calendar</h1>
            <p>
                <span>16 September 2024</span>
                <span>|</span>
                <span>13 RabiulAwal 1446H</span>
            </p>
            <div class="button">
                <button class="google" onclick="addGoogleCalendar()">
                    <i class='bx bxl-google'></i>
                    <span>Add to Calendar</span>
                </button>
                <button class="apple" onclick="addAppleCalendar()">
                    <i class='bx bxl-apple'></i>
                    <span>Add to Calendar</span>
                </button>
            </div>
        </div>
    </div>

    <div id="location-menu" class="toggle-menu">
        <div class="location">
            <h1>Lokasi</h1>
            <p>LOT 233-A, KAMPUNG GONG TENGAH, BELAKANG TMN.SRI</p>
            <p>PENGKALAN CHEPA, 16100</p>
            <p>KOTA BHARU, KELANTAN.</p>
            <div class="button" onclick="openGoogleMaps()">
                <button class="google">
                    <i class='bx bxl-google'></i>
                    <span>Maps</span>
                </button>
                <button class="waze" onclick="openWaze()">
                    <i class="fa-brands fa-waze"></i>
                    <span>Waze</span>
                </button>
            </div>
        </div>
    </div>

    <div id="music-menu" class="toggle-menu">
        <div class="music">
            <h1>Lagu</h1>
            <p>Beautiful in White x Canon in D</p>
            <p>(Piano Cover by Riyandi Kusuma)</p>
            <audio id="audio-player" controls autoplay loop>
                <source type="audio/mp3"
                    src="./music/Beautiful in White x Canon in D (Piano Cover by Riyandi Kusuma).mp3">
            </audio>
        </div>
    </div>

    <div id="rsvp-menu" class="toggle-menu">
        <div class="rsvp">
            <h1>Kehadiran</h1>
            <div class="button">
                <button type="button" id="btn-hadir">
                    <i class='bx bx-check'></i>
                    <span>Hadir</span>
                </button>
                <button type="button" id="btn-tidak-hadir">
                    <i class='bx bx-x'></i>
                    <span>Tidak Hadir</span>
                </button>
            </div>
        </div>
    </div>

    <div id="contact-menu" class="toggle-menu">
        <div class="contact">
            <h1>Hubungi</h1>
            <div class="content">
                <div class="person">
                    <div class="first-section">
                        <i class='bx bxs-user-circle'></i>
                        <div class="name">
                            <span>AB RASHID</span>
                            <span>Bapa Pengantin Lelaki</span>
                        </div>
                    </div>
                    <div class="second-section">
                        <button onclick="makePhoneCall('+60149891499')"><i class='bx bx-phone'></i></button>
                        <button onclick="openWhatsApp('+60149891499')"><i class='bx bxl-whatsapp'></i></button>
                    </div>
                </div>
                <div class="person">
                    <div class="first-section">
                        <i class='bx bxs-user-circle'></i>
                        <div class="name">
                            <span>ZUNAIDAH RAHMAN</span>
                            <span>Ibu Pengantin Lelaki</span>
                        </div>
                    </div>
                    <div class="second-section">
                        <button onclick="makePhoneCall('+601121435474')"><i class='bx bx-phone'></i></button>
                        <button onclick="openWhatsApp('+601121435474')"><i class='bx bxl-whatsapp'></i></button>
                    </div>
                </div>
                <div class="person">
                    <div class="first-section">
                        <i class='bx bxs-user-circle'></i>
                        <div class="name">
                            <span>FAQRUL HAKIM</span>
                            <span>ABANG Pengantin Lelaki</span>
                        </div>
                    </div>
                    <div class="second-section">
                        <button onclick="makePhoneCall('+60109898699')"><i class='bx bx-phone'></i></button>
                        <button onclick="openWhatsApp('+60109898699')"><i class='bx bxl-whatsapp'></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="ucapan-menu" class="toggle-menu">
        <div class="ucapan-tetamu">
            <h1>Sampaikan Ucapan</h1>
            <form id="form-ucapan" class="form-ucapan" action="insert_message.php" method="POST">
                <label for="name">Nama Anda</label>
                <input type="text" name="name" placeholder="Are_pizz" required>

                <label for="ucapan">Ucapan</label>
                <textarea name="message" id="ucapan" cols="30" rows="10" placeholder="Selemat pengantin baru..."
                    required></textarea>

                <div class="button">
                    <button type="submit" class="hantar" id="hantar">
                        <i class='bx bxs-paper-plane'></i>
                        <span>Hantar</span>
                    </button>
                    <button class="tutup">
                        <i class='bx bx-x'></i>
                        <span>Tutup</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- This container will hold the success message and will be dynamically populated -->
    <div id="success-menu" class="toggle-menu"></div>


    <!-- Js Vendor -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tsparticles/1.18.11/tsparticles.min.js"> </script>

    <!-- Custom Js -->
    <script src="./js/main.js"></script>
</body>

</html>
