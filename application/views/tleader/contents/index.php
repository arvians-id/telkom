<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Beranda</h1>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-user-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Pelanggan</h4>
						</div>
						<div class="card-body">
							<?= $countPelanggan ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="fas fa-exclamation-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Pelanggan (Kendala)</h4>
						</div>
						<div class="card-body">
							<?= $countKendala ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="fas fa-spinner"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Pelanggan (On Progress)</h4>
						</div>
						<div class="card-body">
							<?= $countOnProgress ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="far fa-check-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Pelanggan (Done)</h4>
						</div>
						<div class="card-body">
							<?= $countDone ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-info">
						<i class="fas fa-user-slash"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Cabut</h4>
						</div>
						<div class="card-body">
							<?= $countCabut ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-secondary">
						<i class="fas fa-user-lock"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Putus Sementara</h4>
						</div>
						<div class="card-body">
							<?= $countPutus ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section-body">
			<div class="card">
				<div class="card-header">
					<h4>Sejarah Telkom Indonesia</h4>
				</div>
				<div class="card-body">
					<div class="text-center">
						<img src="<?= base_url('assets/layout/sejarah-telkom.jpg') ?>" class="img-fluid" width="400" alt="">
					</div>
					<p>
						<b>TENTANG TELKOMGROUP</b>
						<br></br>
						PT Telkom Indonesia (Persero) Tbk (Telkom) adalah Badan Usaha Milik Negara (BUMN) yang bergerak di bidang jasa layanan teknologi informasi dan komunikasi (TIK) dan jaringan telekomunikasi di Indonesia. Pemegang saham mayoritas Telkom adalah Pemerintah Republik Indonesia sebesar 52.09%, sedangkan 47.91% sisanya dikuasai oleh publik. Saham Telkom diperdagangkan di Bursa Efek Indonesia (BEI) dengan kode “TLKM” dan New York Stock Exchange (NYSE) dengan kode “TLK”.
						<br><br>
						Dalam upaya bertransformasi menjadi digital telecommunication company, TelkomGroup mengimplementasikan strategi bisnis dan operasional perusahaan yang berorientasi kepada pelanggan (customer-oriented). Transformasi tersebut akan membuat organisasi TelkomGroup menjadi lebih lean (ramping) dan agile (lincah) dalam beradaptasi dengan perubahan industri telekomunikasi yang berlangsung sangat cepat. Organisasi yang baru juga diharapkan dapat meningkatkan efisiensi dan efektivitas dalam menciptakan customer experience yang berkualitas.
						<br><br>
						Kegiatan usaha TelkomGroup bertumbuh dan berubah seiring dengan perkembangan teknologi, informasi dan digitalisasi, namun masih dalam koridor industri telekomunikasi dan informasi. Hal ini terlihat dari lini bisnis yang terus berkembang melengkapi legacy yang sudah ada sebelumnya.
						<br><br>
						Telkom mulai saat ini membagi bisnisnya menjadi 3 Digital Business Domain:
						<br><br>
						Digital Connectivity: Fiber to the x (FTTx), 5G, Software Defined Networking (SDN)/ Network Function Virtualization (NFV)/ Satellite
						Digital Platform: Data Center, Cloud, Internet of Things (IoT), Big Data/ Artificial Intelligence (AI), Cybersecurity
						Digital Services: Enterprise, Consumer
						<br><br>
						<b>PURPOSE, VISI DAN MISI</b>
						<br>
						Untuk menjawab tantangan industri digital, mendukung digitisasi nasional dan untuk menginternalisasi agenda transformasi, maka Telkom telah menajamkan kembali Purpose, Visi, dan Misi nya.
						<br>
						<b>PURPOSE</b>
						<br>
						Mewujudkan bangsa yang lebih sejahtera dan berdaya saing serta memberikan nilai tambah yang terbaik bagi para pemangku kepentingan.
						<br>
						<b>VISI</b>
						<br>
						Menjadi digital telco pilihan utama untuk memajukan masyarakat
						<br>
						<b>MISI</b>
						<br>
						Mempercepat pembangunan Infrastruktur dan platform digital cerdas yang berkelanjutan, ekonomis, dan dapat diakses oleh seluruh masyarakat.
						Mengembangkan talenta digital unggulan yang membantu mendorong kemampuan digital dan tingkat adopsi digital bangsa.
						Mengorkestrasi ekosistem digital untuk memberikan pengalaman digital pelanggan terbaik
					</p>
				</div>
			</div>
		</div>
	</section>
</div>
