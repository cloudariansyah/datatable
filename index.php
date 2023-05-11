<?php
date_default_timezone_set('Asia/Jakarta');    
$password = ""; 
$database = ""; 
$host = "";
$user = "";
 
// membuat koneksi ke database
$mysqli = new mysqli($host, $user, $password, $database);

// cek koneksi
if ($mysqli->connect_error) {
    die("Koneksi ke database gagal: " . $mysqli->connect_error);
}

// query untuk mengambil data dari tabel
$query = "SELECT * FROM `daftarinformasipublik`";

// menjalankan query dan menyimpan hasilnya dalam variabel $result
$result = $mysqli->query($query);

// mengambil jumlah baris data yang ditemukan
$num_rows = $result->num_rows;

// menyiapkan data untuk dikirim dalam format JSON
$data = array();
while ($row = $result->fetch_assoc()) {
    $row_index = count($data) + 1;
    $row['index'] = $row_index;
    $data[] = $row;
}
?>
<!DOCTYPE html>
<html data-style-switcher-options="{'changeLogo': false, 'borderRadius': 0, 'colorPrimary': '#099CF4', 'colorSecondary': '#0C61E0', 'colorTertiary': '#2baab1', 'colorQuaternary': '#383f48'}">
	
 <head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Data Informasi Publik - PPID KOTA JAKARTA TIMUR</title>	

		<meta name="keywords" content="ppid" />
		<meta name="description" content="PPID KOTA JAKARTA TIMUR">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="http://timur.jakarta.go.id/v19/assets/images/favicon.ico" type="image/x-icon" /> 
		<link rel="apple-touch-icon" href="http://timur.jakarta.go.id/v19/assets/images/ico/apple-touch-icon-144-precomposed.png"> 
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=yes">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">		
		<link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">		
		<link rel="stylesheet" href="vendor/animate/animate.min.css">		
		<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">		
		<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">		
		<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">		
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css">
		<link rel="stylesheet" href="css/theme-elements.css">
		<link rel="stylesheet" href="css/theme-blog.css">
		<link rel="stylesheet" href="css/theme-shop.css">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="vendor/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="vendor/rs-plugin/css/layers.css">
		<link rel="stylesheet" href="vendor/rs-plugin/css/navigation.css">
		
		<!-- Demo CSS -->


		<!-- Skin CSS -->
		<link rel="stylesheet" href="css/skins/skin-corporate-8.css">		
		<script src="master/style-switcher/style.switcher.localstorage.js"></script> 

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css"/>

<style type="text/css">
		/* CSS untuk membuat tabel responsif */
		.table-responsive {
			min-width: 100%;
			overflow-x: auto;
			-webkit-overflow-scrolling: touch;
		}
	</style>
	</head>

<?php //include('view/ppid-popup.php')?>


	<body>

		<div class="body">
		<?php include('header.php');?>

<div role="main" class="main">

<div class="container">
					

			<div role="main" class="main">

				<section class="page-header page-header-modern page-header-background page-header-background-sm overlay overlay-color-primary overlay-show overlay-op-8 mb-5" style="background-image: url('');padding:0 5px">
					<div class="container">
						<div class="row">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1>PPID Kota Jakarta Timur</h1>

							</div>
							<div class="col-md-12 align-self-center order-1">
								<ul class="breadcrumb breadcrumb-light d-block text-center">
									<li><a href="index.php">Beranda</a></li>
									<li class="active">Data Informasi Publik</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container py-2">
                <h2>Data Informasi Publik</h2>
					<div class="row">
    

    <div class="table-responsive">
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
	     <thead>
            <tr>
            <th>Tahun</th>
			<th>Informasi</th>
			<th>PPID SKPD/UKPD</th>
                <th>Judul</th>
               
				<th>Tipe File</th>
				
                <th>Tautan</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

	</div>

</div>


</div>

<?php include('view/ppid-footer.php');?>



</div>

<!-- Vendor -->
<script src="vendor/jquery/jquery.min.js"></script>		<script src="vendor/jquery.appear/jquery.appear.min.js"></script>		<script src="vendor/jquery.easing/jquery.easing.min.js"></script>		<script src="vendor/jquery.cookie/jquery.cookie.min.js"></script>		<script src="master/style-switcher/style.switcher.js" id="styleSwitcherScript" data-base-path="" data-skin-src=""></script>		<script src="vendor/popper/umd/popper.min.js"></script>		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>		<script src="vendor/common/common.min.js"></script>		<script src="vendor/jquery.validation/jquery.validate.min.js"></script>		<script src="vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>		<script src="vendor/jquery.gmap/jquery.gmap.min.js"></script>		<script src="vendor/jquery.lazyload/jquery.lazyload.min.js"></script>		<script src="vendor/isotope/jquery.isotope.min.js"></script>		<script src="vendor/owl.carousel/owl.carousel.min.js"></script>		<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>		<script src="vendor/vide/jquery.vide.min.js"></script>		<script src="vendor/vivus/vivus.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>

<!-- Current Page Vendor and Views -->
<script src="vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>		<script src="vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<!-- Theme Custom -->
<script src="js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="js/theme.init.js"></script>

     <!-- jQuery -->
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- DataTables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
<!-- DataTables Button -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<!-- DataTables Responsive -->

<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                "searching": true,
                "lengthMenu": [5, 10, 20,50, 100],
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "json-dip.php",
                    "type": "POST",
                    "dataType": "json"
                },
                "columns": [
                    { "data": "tahun" },
					{ "data": "labelkategori" },
					{ "data": "nama" },
                    { "data": "judul" },
					{ "data": "judultipe" },
					
                    {
        "data": "file",
        "render": function ( data, type, row, meta ) {
            return '<a href="files/'+data+'">buka</a>';
        }
    }
                ]
            });
        });

	

		</script>
<button id="speak-btn">Bicarakan</button>
<div class="language-popup" id="language-popup">
  <button class="language-option" id="indonesia-btn">Indonesia</button>
  <button class="language-option" id="english-btn">English</button>
</div>
		<script>
				const navLinks = document.querySelectorAll('nav ul li a');

// Mengecek apakah browser mendukung fitur Web Speech API
if ('speechSynthesis' in window) {
  // Inisialisasi objek sintesis suara
  const speechSynth = window.speechSynthesis;

  let speaking = false;

  // Fungsi untuk memulai atau menghentikan sintesis suara
  function toggleSpeak(text) {
    if (!speaking) {
      if (speechSynth.speaking) {
        speechSynth.resume();
      } else {
        const speakText = new SpeechSynthesisUtterance(text);

        speakText.onend = e => {
          console.log('Sintesis suara selesai...');
          speaking = false;
        };

        speakText.onerror = e => {
          console.error('Terjadi kesalahan pada sintesis suara:', e);
          speaking = false;
        };

        speechSynth.speak(speakText);
        speaking = true;
      }
    } else {
      speechSynth.pause();
      speaking = false;
    }
  }

  // Event listener untuk memainkan suara saat mouseover
  navLinks.forEach(link => {
    link.addEventListener('mouseover', () => {
      if (!speaking) {
        toggleSpeak(link.innerText);
      }
    });
  });
} else {
  console.error('Browser tidak mendukung fitur Web Speech API');
}
    </script>


<style>
	button {
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}

.language-popup {
  position: absolute;
  display: none;
  z-index: 999;
}

.language-option {
  display: block;
  padding: 10px;
  background-color: white;
  border: 1px solid black;
  cursor: pointer;
}

.language-option:hover {
  background-color: gray;
  color: white;
}
#speak-btn {
  position: relative;
}
#language-popup {
  position: absolute;
  display: none;
  z-index: 999;
  top: 40px;
  left: 0;
}
	</style>

	<script>
		const speakButton = document.querySelector('#speak-btn');
const languagePopup = document.querySelector('#language-popup');
const indonesiaButton = document.querySelector('#indonesia-btn');
const englishButton = document.querySelector('#english-btn');

// Mengecek apakah browser mendukung fitur Web Speech API
if ('speechSynthesis' in window) {
  // Inisialisasi objek sintesis suara
  const speechSynth = window.speechSynthesis;

  // Mengatur konfigurasi sintesis suara
  const voices = {
    indonesia: { name: 'Google Bahasa Indonesia', lang: 'id-ID' },
    english: { name: 'Google US English', lang: 'en-US' }
  };
  let selectedVoice = voices.indonesia;

  function setLanguage(lang) {
    selectedVoice = voices[lang];
  }

  // Fungsi untuk memulai sintesis suara
  function speak(text) {
    const speakText = new SpeechSynthesisUtterance(text);

    speakText.onend = e => {
      console.log('Sintesis suara selesai...');
    };

    speakText.onerror = e => {
      console.error('Terjadi kesalahan pada sintesis suara:', e);
    };

    speakText.voice = speechSynth.getVoices().find(voice => voice.name === selectedVoice.name && voice.lang === selectedVoice.lang);

    speechSynth.speak(speakText);
  }

  // Event listener untuk tombol bicara
  speakButton.addEventListener('click', () => {
    languagePopup.style.display = 'block';
  });

  // Event listener untuk opsi bahasa Indonesia
  indonesiaButton.addEventListener('click', () => {
    setLanguage('indonesia');
    speak('Anda memilih bahasa Indonesia');
    languagePopup.style.display = 'none';
  });

  // Event listener untuk opsi bahasa Inggris
  englishButton.addEventListener('click', () => {
    setLanguage('english');
    speak('You have selected English language');
    languagePopup.style.display = 'none';
  });
} else {
  console.error('Browser tidak mendukung fitur Web Speech API');
}
			</script>
</body>

</html>


