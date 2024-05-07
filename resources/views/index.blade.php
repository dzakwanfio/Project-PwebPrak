<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
</head>
<body>
    
    <header class="header">
        <img src="{{asset('assets/images/logo.png')}}" id="logo" alt="">
    
        <nav class="navbar">
            <a href="{{route('home')}}">Home</a>
            <a href="{{route('services')}}">Services</a> 
            <a href="#about">About</a>
            <a href="#contact" id="contact-link">Contact</a>
        </nav>
    
        <div class="icons">
            <div id="menubar" class="fas fa-bars"></div>
            <a href="{{route('login')}}">Login</a>
        </div>
    </header>
    
    <div class="background-image">
        <div class="background-content">
            <h1>Segera Temukan Bantuan Medis yang Anda Butuhkan <br> Temu Dokter sebagai Penyelamat Kesehatan Anda!</h1>
        <a href="{{route('login')}}">Booking</a>
        </div>
    </div>
    
    <section id="about" class="about-section">
        <div class="container">
            <h2>About Us</h2>
            <p>Website Temu Dokter ini memudahkan proses konsultasi medis dan akses terhadap layanan kesehatan. Ini tidak hanya memberikan kemudahan dalam mencari dan membuat janji dengan dokter, tetapi juga meningkatkan aksesibilitas layanan kesehatan bagi masyarakat umum. Teknologi ini membuat proses konsultasi medis lebih efisien dan praktis, menjadikan kesehatan lebih mudah dijangkau untuk semua orang.</p>
        </div>
    </section>
    
    <footer id="contact" class="footer">
        <div class="container">

            <div class="row">
                <div class="footer-col">
                    <h4>Temu Dokter</h4>
                    <ul>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">privacypolicy</a></li>
                    </ul>
                </div>
    
                <div class="footer-col">
                    <h4>Kontak</h4>
                    <ul>
                        <li><a href="#">email</a></li>
                        <li><a href="#">instagram</a></li>
                        <li><a href="#">twitter</a></li>
                    </ul>
                </div>
    
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
    
                <div class="footer-col map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31663.262276581805!2d112.7483182356204!3d-7.251335520789907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f99315bd0d83%3A0x55b75f0ab9a2bce9!2sMitra%20Keluarga%20Kenjeran!5e0!3m2!1sid!2sid!4v1712327345485!5m2!1sid!2sid" width="100%" height="200" style="border:0;" allowfullscreen="" loading="eager" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
        </div>
    </footer>
    

    <script>
        document.getElementById('contact-link').addEventListener('click', function() {
            document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
        });
    </script>

    
