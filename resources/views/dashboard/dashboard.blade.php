<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboardstyle.css">
    @notifyCss
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    @if( Auth::User()->level == "pengajar")
        @if(session('alert-success'))
            <x-notify::notify />
            @notifyJs
        @elseif(session('add-success'))
            <x-notify::notify />
            @notifyJs
        @elseif(session('hapus-success'))
            <x-notify::notify />
            @notifyJs
        @elseif(session('edit'))
            <x-notify::notify />
            @notifyJs
        @endif
        <div class="menu-top-pengajar">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="nav-link" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item px-3">
                                <a class="nav-link" style="background-color:transparent" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link" href="#pricing">Pricing</a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link" href="#mycourse">My Course</a>
                            </li>
                            <li class="nav-item px-3 dropdown setting">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Setting
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item disabled" href="#">{{ Auth::User()->nama_lengkap }}</a></li>
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/logout')}}"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <br>
            <br>
            <div class="banner">
                <div class="flex-item">
                    <h5 class="">WELCOME TO SUKABELAJAR</h5>
                    <h1 class="mt-4">BEST PRIVATE TUTORING CLASS 1#</h1>
                    <p class="mt-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    <br>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    <br>when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <button type="button" class="btn btn-outline-light lihat" style="color: white; border-radius: 30px;">Lihat Selengkapnya..</button>
                </div>
                <div class="flex-item">
                    <img src="{{ asset('img/model-2.png') }}" style="width: 670px; height: 450px; left: 20px;" alt="">
                </div>
            </div>

            <div class="square-card1 shadow">
                <button class="btn btn-primary custom-button btn-circle btn-xl">
                    <i class="bi bi-database-check" style="font-size: 50px;"></i>
                    <p class="mt-4" style="color: black;">Database</p>
                </button>
            </div>

            <div class="square-card2 shadow">
                <button class="btn btn-primary custom-button btn-circle btn-xl">
                    <i class="bi bi-filetype-html" style="font-size: 50px;"></i>
                    <p class="mt-4" style="color: black;">HTML</p>
                </button>
            </div>

            <div class="square-card3 shadow">
                <button class="btn btn-primary custom-button btn-circle btn-xl">
                    <i class="bi bi-filetype-sql" style="font-size: 50px;"></i>
                    <p class="mt-4" style="color: black;">SQL</p>
                </button>
            </div>

            <!--
            <?php 
                $image = Auth::User()->img;
                $imageName = "kursi.jpg";

                echo '<img src="' . asset("data_file/{$image}") . '" alt="Your Image Alt Text">';
            ?>
            -->
        </div>
        <div class="menu-mid-pengajar mt-5 table-mid">
            <div class="materi">
                <a href="/tambah" class="btn btn-primary"><i class="bi bi-plus"></i></a>
                <table class="table table-hover shadow-sm mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Materi</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Pemateri</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materi as $m)
                        <tr>
                            <th scope="row">{{ $m->id_materi }}</th>
                            <td>{{ $m->nama_materi }}</td>
                            <td>{{ $m->deskripsi }}</td>
                            <td>{{ $m->nama_lengkap }}</td>
                            <td>
                                <a href="/edit/{{ $m->id_materi }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                |
                                <a href="/hapus/{{ $m->id_materi }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    @elseif (Auth::User()->level == "pelajar")

        @if(session('alert-success'))
            <x-notify::notify />
            @notifyJs
        @elseif(session('add-success'))
            <x-notify::notify />
            @notifyJs
        @elseif(session('hapus-success'))
            <x-notify::notify />
            @notifyJs
        @elseif(session('edit'))
            <x-notify::notify />
            @notifyJs
        @endif
        <div class="menu-top" data-bs-spy="scroll">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="nav-link" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item px-3">
                                <a class="nav-link" style="background-color:transparent" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link" href="#pricing">Pricing</a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link" href="#mycourse">My Course</a>
                            </li>
                            <li class="nav-item px-3 dropdown setting">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Setting
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item disabled" href="#">{{ Auth::User()->nama_lengkap }}</a></li>
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/logout')}}"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <br>
            <br>
            <div class="banner">
                <div class="flex-item">
                    <h5 class="">WELCOME TO SUKABELAJAR</h5>
                    <h1 class="mt-4">BEST PRIVATE TUTORING CLASS 1#</h1>
                    <p class="mt-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    <br>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    <br>when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <button type="button" class="btn btn-outline-light lihat" style="color: white; border-radius: 30px;">Lihat Selengkapnya..</button>
                </div>
                <div class="flex-item">
                    <img src="{{ asset('img/model.png') }}" style="width: 600px; height: 450px;" alt="">
                </div>
            </div>

            <div class="square-card1 shadow">
                <button class="btn btn-primary custom-button btn-circle btn-xl">
                    <i class="bi bi-database-check" style="font-size: 50px;"></i>
                    <p class="mt-4" style="color: black;">Database</p>
                </button>
            </div>

            <div class="square-card2 shadow">
                <button class="btn btn-primary custom-button btn-circle btn-xl">
                    <i class="bi bi-filetype-html" style="font-size: 50px;"></i>
                    <p class="mt-4" style="color: black;">HTML</p>
                </button>
            </div>

            <div class="square-card3 shadow">
                <button class="btn btn-primary custom-button btn-circle btn-xl">
                    <i class="bi bi-filetype-sql" style="font-size: 50px;"></i>
                    <p class="mt-4" style="color: black;">SQL</p>
                </button>
            </div>

            <!--
            <?php 
                $image = Auth::User()->img;
                $imageName = "kursi.jpg";

                echo '<img src="' . asset("data_file/{$image}") . '" alt="Your Image Alt Text">';
            ?>
            -->
        </div>
        <div class="menu-mid">
            <div class="course-list mt-5">
            <div class="course-head" id="pricing">
                    <h5>Menjadi Developer Handal</h5>
                    <h1>Kelas Belajar Android Online</h1>
                    <p>SUKABELAJAR, Menyediakan kursus pelatihan Android Basic <br>yang dapat dimengerti oleh programer pemula.</p>
                </div>
                <div class="course-content mt-4">
                    @foreach($materi as $content)
                        <div class="card mx-2 shadow" style="width: 250px; height: 270px;">
                            <?php
                                echo '<img src="' . asset("data_file/{$content->img_catalog}") . '" class="card-img-top catalog" style="height: 150px;">';
                                //echo "<img src='. asset(`data_file/{$content->img}`) .' class='card-img-top' alt='...'>";
                            ?>
                            <div class="card-body content-items">
                                <?php
                                    echo "<p class='card-text'>$content->nama_materi</p>";
                                ?>
                            </div>
                            <div class="card-buy">
                                    <button type="button" class="btn btn-buy"  data-bs-toggle="modal" data-bs-target="#<?php echo $content->modal?>" ><i class="bi bi-bag" style="font-size: 15px;"></i></button>

                                    <div class="modal fade" id="<?php echo $content->modal?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $content->nama_materi }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                        echo '<img src="' . asset("data_file/{$content->img_catalog}") . '" class="card-img-top catalog" >';
                                                        //echo "<img src='. asset(`data_file/{$content->img}`) .' class='card-img-top' alt='...'>";
                                                    ?>
                                                    <h3 class="mt-3">{{ $content->nama_lengkap }}</h3>
                                                    <p>{{ $content->deskripsi }}</p>
                                                    <p>Rp.{{ $content->harga }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="/payment" method="GET" style="width: 100%;">
                                                        <input type="hidden" name="id_materi" value="<?php echo $content->id_materi?>">
                                                        <input type="hidden" name="nama_materi" value="<?php echo $content->nama_materi?>">
                                                        <input type="hidden" name="harga" value="<?php echo $content->harga?>">
                                                        <button type="submit" class="btn btn-success">Buy</button>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    @endforeach
                </div>
                <div class="course-head mt-5" id="mycourse">
                    <h5>Ayo Tingkatkan Belajar Anda di, SUKABELAJAR</h5>
                    <h1>Kelas Belajar Yang Anda Ikuti</h1>
                </div>
                <div class="course-content mt-4">
                    @foreach($transaksi as $content)
                        <div class="card mx-2 shadow course-card" style="width: 250px; height: 270px;">
                            <?php
                                echo '<img src="' . asset("data_file/{$content->img_catalog}") . '" class="card-img-top catalog" style="height: 150px;">';
                                //echo "<img src='. asset(`data_file/{$content->img}`) .' class='card-img-top' alt='...'>";
                            ?>
                            <div class="card-body content-items">
                                <?php
                                    echo "<p class='card-text'>$content->nama_materi</p>";
                                ?>
                                <br>
                            </div>
                            <div class="chat">
                                <button type="button" class="btn btn-chat"  data-bs-toggle="modal" data-bs-target="#<?php echo $content->modal_transaksi?>" ><i class="bi bi-chat-left-text" style="font-size: 15px;"></i></button>

                                <div class="modal fade" id="<?php echo $content->modal_transaksi?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Chat</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                    echo '<img src="' . asset("data_file/{$content->img_catalog}") . '" class="card-img-top catalog">';
                                                    //echo "<img src='. asset(`data_file/{$content->img}`) .' class='card-img-top' alt='...'>";
                                                ?>
                                                <h3 class="mt-3">p</h3>
                                                <p>{{ $content->harga }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="/proses_beli" method="post">
                                                {{ csrf_field() }}  
                                                    <input type="hidden" name="id_materi" value="<?php echo $content->id_materi?>">
                                                    <input type="hidden" name="id" value="<?php echo $content->harga?>">
                                                    <input type="hidden" name="id" value="<?php echo $content->id?>">
                                                    <!--<button type="submit" class="btn btn-primary">Beli</button>-->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</body>
</html>