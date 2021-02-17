<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Wijaya Las Homepage</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><img src="images/logoo3.png" alt="Sanza theme logo"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#header">Beranda</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Visi Misi</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">Struktur Perusahaan</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ route('adminLogin') }}">Admin</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ route('sekertarisLogin') }}">Sekertaris</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ route('ownerLogin') }}">Owner</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- Header -->
    <header>
        <section id="header">
            <div class="container">
                <div class="slider-container">
                    <div class="intro-text">
                        <!-- <div class="intro-heading">WIJAYA LAS</div> -->
                        <div class="intro-heading"> WIJAYA<a href="https://inventori.kuy.web.id/"><span> LAS</span></a>
                            <div class="col-lg-12 text-center">
                                <p class="banner_txt">Perusahaan ini awal mula berdiri pada 10 April 2014 dan perusahaan ini bergerak dibidang jasa pembuatan maupun service berbagai macam mebel serta kebutuhan rumah tangga</p>
                                <!-- <div class="section-title">
                                    <div class="intro-lead-in">Perusahaan ini awal mula berdiri pada 10 April 2014 dan perusahaan ini bergerak dibidang jasa pembuatan maupun service berbagai macam mebel serta kebutuhan rumah tangga.</div> -->
                                <!-- <a href="#about" class="page-scroll btn btn-xl">Tell Me More</a> -->
                            </div>
                        </div>
                    </div>
    </header>
    <!-- <section id="about">
        <section class="light-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>TENTANG KAMI</h2>
                            <p>WIJAYA LAS adalah Perusahaan yang melayani berbagai kebutuhan besi sesuai keinginan pelanggan, layanan kami terdiri dari berbagai macam pilihan untuk membantu kebutuhan dan memberikan kepuasan pada pelanggan</p>
                        </div>

                        <section id="features">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 col-xs-12 block">
                                        <div class="col-md-10 col-xs-10">
                                            <i class="fa fa-camera-retro ot-circle"></i>
                                            <h3>Servis Perabotan Mebel</h3>
                                            <p>Memperbaiki Segala Macam Perabotan Rumah tangga mebel yang berbahan dasar besi, aluminium dan baja </p>
                                            {{-- <a href="#" class="readmore">Read More <i class="fa fa-caret-right"></i></a> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12 block">
                                        <div class="col-md-10 col-xs-10">
                                            <i class="fa fa-camera-retro ot-circle"></i>
                                            <h3>Pembuatan Perabotan Mebel</h3>
                                            <p>Melayani pembuatan Mebel berbahan dasar seperti besi, aluminum dan baja .</p>
                                            {{-- <a href="#" class="readmore">Read More <i class="fa fa-caret-right"></i></a> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12 block">
                                        <div class="col-md-10 col-xs-10">
                                            <i class="fa fa-camera-retro ot-circle"></i>
                                            <h3>Custom Mebel</h3>
                                            <p>Melyani pembuatan suatu mebel dengan desain sesuai keinginan pelanggan dengan bentuk dan kriteria tertentu yang
                                                sesuai dengan kebutuhan pelanggan.
                                            </p>
                                            {{-- <a href="#" class="readmore">Read More <i class="fa fa-caret-right"></i></a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- end about module -->
    <!-- </div>
                </div> -->
    <!-- /.container -->
    <section id="about" class="light-bg">
        <div class="section-heading text-center" style="padding-top: 50px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="section-text">
                            <h3>VISI PERUSAHAAN </h3>
                            <!-- <p>Berikut Visi Perusahaan Wijaya Las :</p> -->
                            <ul>
                                <ol style="text-align:left">
                                    <li>Menciptakan lapangan kerja yang luas.</li>
                                    <li>Mengarahkan pola pikir SDM yang lebih maju.</li>
                                    <li>Bisa mengenal IPTEK yang lebih canggih.</li>
                                    <li>Mengajarkan kedisiplinan dan tepat waktu dalam bekerja.</li>
                                    <li>Mengarahkan pemahaman dalam melakukan kegaiatan kerja sehari-hari.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="section-text">
                            <h3>MISI PERUSAHAAN </h3>
                            <!-- <p>Berikut Misi Perusahaan Wijaya Las :</p> -->
                            <ul>
                                <ol style="text-align:left">
                                    <li>Membuat ide kreatifitas di lingkungan masyarakat</li>
                                    <li>Mendidik SDM yang lebih maju.</li>
                                    <li>Bisa mengenal IPTEK yang lebih canggih.</li>
                                    <li>Untuk meningkatkan perkenomian dalam masyarakat</li>
                                    <li>Mengajarkan kedisiplinan dan tepat waktu dalam bekerja.</li>
                            </ul>
                        </div>

                        <!-- <div class="owl-portfolio owl-carousel">
                            <div class="item">
                                <div class="owl-portfolio-item"><img src="images/demo/portfolio-88.jpg" class="img-responsive" alt="portfolio"></div>
                            </div>
                            <div class="item">
                                <div class="owl-portfolio-item"><img src="images/demo/portfolio-99.jpg" class="img-responsive" alt="portfolio"></div>
                            </div> -->
                        <!-- <div class="item">
                                <div class="owl-portfolio-item"><img src="images/demo/portfolio-9.jpg" class="img-responsive" alt="portfolio"></div>
                            </div> -->
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Portfolio</h2>
                        <p>Our portfolio is the best way to show our work, you can see here a big range of our work. Check them all and you will find what you are looking for.</p>
                    </div>
                </div>
            </div>
            <div class="row row-0-gutter">
                <!-- start portfolio item -->
    <!-- <div class="col-md-4 col-0-gutter">
        <div class="ot-portfolio-item">
            <figure class="effect-bubba">
                <img src="images/demo/portfolio-1.jpg" alt="img02" class="img-responsive" />
                <figcaption>
                    <h2>Dean & Letter</h2>
                    <p>Branding, Design</p>
                    <a href="#" data-toggle="modal" data-target="#Modal-1">View more</a>
                </figcaption>
            </figure>
        </div>
    </div> -->
    <!-- end portfolio item -->
    <!-- start portfolio item -->
    <!-- <div class="col-md-4 col-0-gutter">
        <div class="ot-portfolio-item">
            <figure class="effect-bubba">
                <img src="images/demo/portfolio-2.jpg" alt="img02" class="img-responsive" />
                <figcaption>
                    <h2>Startup Framework</h2>
                    <p>Branding, Web Design</p>
                    <a href="#" data-toggle="modal" data-target="#Modal-2">View more</a>
                </figcaption>
            </figure>
        </div>
    </div> -->
    <!-- end portfolio item -->
    <!-- start portfolio item -->
    <!-- <div class="col-md-4 col-0-gutter">
        <div class="ot-portfolio-item">
            <figure class="effect-bubba">
                <img src="images/demo/portfolio-3.jpg" alt="img02" class="img-responsive" />
                <figcaption>
                    <h2>Lamp & Velvet</h2>
                    <p>Branding, Web Design</p>
                    <a href="#" data-toggle="modal" data-target="#Modal-3">View more</a>
                </figcaption>
            </figure>
        </div>
    </div> -->
    <!-- end portfolio item -->
    <!-- </div>
    <div class="row row-0-gutter">
       start portfolio item -->
    <!-- <div class="col-md-4 col-0-gutter">
            <div class="ot-portfolio-item">
                <figure class="effect-bubba">
                    <img src="images/demo/portfolio-4.jpg" alt="img02" class="img-responsive" />
                    <figcaption>
                        <h2>Smart Name</h2>
                        <p>Branding, Design</p>
                        <a href="#" data-toggle="modal" data-target="#Modal-4">View more</a>
                    </figcaption>
                </figure>
            </div>
        </div> -->
    <!-- end portfolio item -->
    <!-- start portfolio item -->
    <!-- <div class="col-md-4 col-0-gutter">
            <div class="ot-portfolio-item">
                <figure class="effect-bubba">
                    <img src="images/demo/portfolio-5.jpg" alt="img02" class="img-responsive" />
                    <figcaption>
                        <h2>Fast People</h2>
                        <p>Branding, Web Design</p>
                        <a href="#" data-toggle="modal" data-target="#Modal-5">View more</a>
                    </figcaption>
                </figure>
            </div>
        </div> -->
    <!-- end portfolio item -->
    <!-- start portfolio item -->
    <!-- <div class="col-md-4 col-0-gutter">
            <div class="ot-portfolio-item">
                <figure class="effect-bubba">
                    <img src="images/demo/portfolio-6.jpg" alt="img02" class="img-responsive" />
                    <figcaption>
                        <h2>Kites & Stars</h2>
                        <p>Branding, Web Design</p>
                        <a href="#" data-toggle="modal" data-target="#Modal-2">View more</a>
                    </figcaption>
                </figure>
            </div>
        </div> -->
    <!-- end portfolio item -->

    <!-- </div>
    </div>
    </section> -->

    <!-- end container -->

    <!-- <section class="dark-bg short-section stats-bar">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-3 mb-sm-30">
                    <div class="counter-item">
                        <h2 class="stat-number" data-n="9">0</h2>
                        <h6>awards</h6>
                    </div>
                </div>
                <div class="col-md-3 mb-sm-30">
                    <div class="counter-item">
                        <h2 class="stat-number" data-n="167">0</h2>
                        <h6>Clients</h6>
                    </div>
                </div>
                <div class="col-md-3 mb-sm-30">
                    <div class="counter-item">
                        <h2 class="stat-number" data-n="6">0</h2>
                        <h6>Team</h6>
                    </div>
                </div>
                <div class="col-md-3 mb-sm-30">
                    <div class="counter-item">
                        <h2 class="stat-number" data-n="34">0</h2>
                        <h6>Project</h6>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Our Partners</h2>
                        <p>Mida sit una namet, cons uectetur adipiscing adon elit.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="owl-partners owl-carousel">
                        <div class="item">
                            <div class="partner-logo"><img src="images/demo/partners-1.png" alt="partners"></div>
                        </div>
                        <div class="item">
                            <div class="partner-logo"><img src="images/demo/partners-2.png" alt="partners"></div>
                        </div>
                        <div class="item">
                            <div class="partner-logo"><img src="images/demo/partners-3.png" alt="partners"></div>
                        </div>
                        <div class="item">
                            <div class="partner-logo"><img src="images/demo/partners-4.png" alt="partners"></div>
                        </div>
                        <div class="item">
                            <div class="partner-logo"><img src="images/demo/partners-5.png" alt="partners"></div>
                        </div>
                        <div class="item">
                            <div class="partner-logo"><img src="images/demo/partners-6.png" alt="partners"></div>
                        </div>
                        <div class="item">
                            <div class="partner-logo"><img src="images/demo/partners-7.png" alt="partners"></div>
                        </div>
                        <div class="item">
                            <div class="partner-logo"><img src="images/demo/partners-8.png" alt="partners"></div>
                        </div>
                        <div class="item">
                            <div class="partner-logo"><img src="images/demo/partners-9.png" alt="partners"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section id="team" class="light-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>STRUKTUR PERUSAHAAN</h2>
                        <p>Berikut adalah daftar profil pendiri dan karyawan perusahaan WIJAYA LAS</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- team member item -->
                <div class="col-md-4">
                    <div class="team-item">
                        <div class="team-image">
                            <img src="images/demo/author-x.jpg" class="img-responsive" alt="author">
                        </div>
                        <div class="team-text">
                            <h3>KHANDI</h3>
                            <div class="team-position">Pendiri Wijaya Las</div>
                            <p>Pemilik sekaligus pendiri dari perusahaan WIJAYA LAS</p>
                        </div>
                    </div>
                </div>
                <!-- end team member item -->
                <!-- team member item -->
                <div class="col-md-4">
                    <div class="team-item">
                        <div class="team-image">
                            <img src="images/demo/author-x.jpg" class="img-responsive" alt="author">
                        </div>
                        <div class="team-text">
                            <h3>ERNA PUSPITA SARI</h3>
                            <div class="team-position">karyawan </div>
                            <p>Karyawan pengatur keluar masuk barang.</p>
                        </div>
                    </div>
                </div>
                <!-- end team member item -->
                <!-- team member item -->
                <div class="col-md-4">
                    <div class="team-item">
                        <div class="team-image">
                            <img src="images/demo/author-x.jpg" class="img-responsive" alt="author">
                        </div>
                        <div class="team-text">
                            <h3>RIZAL ARIANTO</h3>
                            <div class="team-position">Karyawan</div>
                            <p>Karyawan Pengatur Penyimpanan</p>
                        </div>
                    </div>
                </div>
                <!-- end team member item -->
            </div>
        </div>
    </section>
    <!-- <section id="contact" class="dark-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Contact Us</h2>
                        <p>If you have some Questions or need Help! Please Contact Us!<br>We make Cool and Clean Design for your Business</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="section-text">
                        <h4>Our Business Office</h4>
                        <p>3422 Street, Barcelona 432, Spain, New Building North, 15th Floor</p>
                        <p><i class="fa fa-phone"></i> +101 377 655 22125</p>
                        <p><i class="fa fa-envelope"></i> mail@yourcompany.com</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="section-text">
                        <h4>Business Hours</h4>
                        <p><i class="fa fa-clock-o"></i> <span class="day">Weekdays:</span><span>9am to 8pm</span></p>
                        <p><i class="fa fa-clock-o"></i> <span class="day">Saturday:</span><span>9am to 2pm</span></p>
                        <p><i class="fa fa-clock-o"></i> <span class="day">Sunday:</span><span>Closed</span></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <form name="sentMessage" id="contactForm" novalidate="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required="" data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div>
                                    <button type="submit" class="btn">Send Message</button>
                                </div>
                            </div> -->

    <!-- </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required="" data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn">Send Message</button>
                            </div> -->
    </div>
    </form>
    </div>
    </div>
    </div>
    </section>
    <p id="back-top">
        <a href="#top"><i class="fa fa-angle-up"></i></a>
    </p>
    <footer>
        <div class="container text-center">
            <p>Designed by anam from <a href="https://inventori.kuy.web.id/"><span>WIJAYA</span> LAS</a></p>
        </div>
    </footer>

    <!-- Modal for portfolio item 1 -->
    <div class="modal fade" id="Modal-1" tabindex="-1" role="dialog" aria-labelledby="Modal-label-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="Modal-label-1">Dean & Letter</h4>
                </div>
                <div class="modal-body">
                    <img src="images/demo/portfolio-1.jpg" alt="img01" class="img-responsive" />
                    <div class="modal-works"><span>Branding</span><span>Web Design</span></div>
                    <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for portfolio item 2 -->
    <div class="modal fade" id="Modal-2" tabindex="-1" role="dialog" aria-labelledby="Modal-label-2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="Modal-label-2">Startup Framework</h4>
                </div>
                <div class="modal-body">
                    <img src="images/demo/portfolio-2.jpg" alt="img01" class="img-responsive" />
                    <div class="modal-works"><span>Branding</span><span>Web Design</span></div>
                    <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for portfolio item 3 -->
    <div class="modal fade" id="Modal-3" tabindex="-1" role="dialog" aria-labelledby="Modal-label-3">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="Modal-label-3">Lamp & Velvet</h4>
                </div>
                <div class="modal-body">
                    <img src="images/demo/portfolio-3.jpg" alt="img01" class="img-responsive" />
                    <div class="modal-works"><span>Branding</span><span>Web Design</span></div>
                    <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for portfolio item 4 -->
    <div class="modal fade" id="Modal-4" tabindex="-1" role="dialog" aria-labelledby="Modal-label-4">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="Modal-label-4">Smart Name</h4>
                </div>
                <div class="modal-body">
                    <img src="images/demo/portfolio-4.jpg" alt="img01" class="img-responsive" />
                    <div class="modal-works"><span>Branding</span><span>Web Design</span></div>
                    <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for portfolio item 5 -->
    <div class="modal fade" id="Modal-5" tabindex="-1" role="dialog" aria-labelledby="Modal-label-5">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="Modal-label-5">Fast People</h4>
                </div>
                <div class="modal-body">
                    <img src="images/demo/portfolio-5.jpg" alt="img01" class="img-responsive" />
                    <div class="modal-works"><span>Branding</span><span>Web Design</span></div>
                    <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
			================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/SmoothScroll.min.js"></script>
    <script src="js/mooz.themes.scripts.js"></script>
</body>

</html>