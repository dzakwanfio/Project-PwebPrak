<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    <link rel="stylesheet" href="{{asset('assets/css/services.css')}}"> 
    <style>

    </style>
</head>
<body>

    <header class="header">
        <h1>Our Services</h1>
    </header>

    <div class="container">
        <div class="services">
            <a href="{{route('eye_specialist')}}" >
                <section class="service">
                    <h2>Spesialis Mata</h2>
                    <img src="{{asset('assets/images/doktermata.jpg')}}" alt="Eye Specialist">
                    <p>Spesialis mata kami memberikan perawatan komprehensif untuk masalah terkait mata seperti koreksi penglihatan, penyakit mata, dan operasi mata.</p>
                </section>
            </a>
            
            <a href="{{route('tht_specialist')}}" >
            <section class="service">
                <h2>Spesialis THT</h2>
                <img src="{{asset('assets/images/tht.jpg')}}" alt="THT Specialist">

                <p>Spesialis THT kami menawarkan diagnosis dan pengobatan untuk kondisi telinga, hidung, dan tenggorokan termasuk sinusitis, gangguan pendengaran, dan radang amandel.</p>
            </section>
        </a>

            <a href="{{route('kulitkelamin')}}" >
            <section class="service">
                <h2>Spesialis Kulit & Kelamin</h2>
                <img src="{{asset('assets/images/kulit.png')}}" alt="Dermatology">
                <p>Dokter kulit kami berspesialisasi dalam mendiagnosis dan mengobati kelainan kulit, rambut, dan kuku, serta menawarkan layanan dermatologi kosmetik.</p>
            </section>
        </a>


            <a href="{{route('penyakitdalam')}}" >
            <section class="service">
                <h2>Spesialis Penyakit Dalam</h2>
                <img src="{{asset('assets/images/penyakitdalam.png')}}" alt="Internal Medicine">
                <p>Spesialis penyakit dalam kami fokus pada pencegahan, diagnosis, dan pengobatan penyakit orang dewasa, memberikan perawatan komprehensif untuk berbagai kondisi kesehatan.</p>
            </section>
        </div>
    </div>
</a>

</body>
</html>
