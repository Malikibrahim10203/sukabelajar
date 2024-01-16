<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboardstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    <div class="menu-top">
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
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="#">Pricing</a>
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
    <div class="menu-mid mt-5">
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
        <div class="course-list">
            <div class="course-head">
                <h5>Menjadi Developer Handal</h5>
                <h1>Kelas Belajar Android Online</h1>
                <p>SUKABELAJAR, Menyediakan kursus pelatihan Android Basic <br>yang dapat dimengerti oleh programer pemula.</p>
            </div>
            <div class="course-content mt-5">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('img/course_dummy.png') }}" class="card-img-top" alt="...">
                    <div class="card-body content-items">
                        <p class="card-text">Android FLutter Basic</p>
                        <button type="button" class="btn btn-success"><i class="bi bi-bag"></i></button>
                    </div>
                </div>
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('img/course_dummy.png') }}" class="card-img-top" alt="...">
                    <div class="card-body content-items">
                        <p class="card-text">Android FLutter Basic</p>
                        <button type="button" class="btn btn-success"><i class="bi bi-bag"></i></button>
                    </div>
                </div>
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('img/course_dummy.png') }}" class="card-img-top" alt="...">
                    <div class="card-body content-items">
                        <p class="card-text">Android FLutter Basic</p>
                        <button type="button" class="btn btn-success"><i class="bi bi-bag"></i></button>
                    </div>
                </div>
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('img/course_dummy.png') }}" class="card-img-top" alt="...">
                    <div class="card-body content-items">
                        <p class="card-text">Android FLutter Basic</p>
                        <button type="button" class="btn btn-success"><i class="bi bi-bag"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>