<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registerstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
    @if($level == 1)
        <div class="card">
            <div class="title">
                <div class="back mb-3">
                    <a href="{{ url('/') }}"><i class="bi bi-arrow-left" style="font-size: 20px; color: #6B728E;"></i></a>
                </div>
                <form action="{{ url('proses_register_pelajar')}}" method="post">
                    {{ csrf_field() }}  
                    <h2>Register Account</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <div class="mb-3 row text-center">
                            <label for="name" class="col-sm-2 col-form-label"><i class="bi bi-person" style="font-size: 20px; color: #6B728E;"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="input" name="name" id="name" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="mb-3 row text-center">
                            <label for="email" class="col-sm-2 col-form-label"><i class="bi bi-envelope-at" style="font-size: 20px; color: #6B728E;"></i></label>
                            <div class="col-sm-10">
                                <input type="email" class="input" name="email" id="email" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="mb-3 row text-center">
                            <label for="username" class="col-sm-2 col-form-label"><i class="bi bi-person" style="font-size: 20px; color: #6B728E;"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="input" name="username" id="username" placeholder="username">
                            </div>
                        </div>
                        <div class="mb-3 row text-center">
                            <label for="password" class="col-sm-2 col-form-label"><i class="bi bi-lock " style="font-size: 20px; color: #6B728E;"></i></i></label>
                            <div class="col-sm-10">
                                <input type="password" class="input" name="password" id="password" placeholder="password">
                            </div>
                        </div>
                        <button type="submit" class="mt-3 btn-kirim">Register</button>
                </form>
            </div>
        </div>
    @elseif($level == 2)  
    <div class="cards">
            <div class="title">
                <div class="back mb-3">
                    <a href="{{ url('/') }}"><i class="bi bi-arrow-left" style="font-size: 20px; color: #6B728E;"></i></a>
                </div>
                <form action="{{ url('proses_register_pengajar')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}  
                    <h2>Register Account Pengajar</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <div class="mb-3 row text-center">
                            <label for="Nama Lengkap" class="col-sm-2 col-form-label"><i class="bi bi-person" style="font-size: 20px; color: #6B728E;"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="input" name="name" id="Nama Lengkap" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="mb-3 row text-center">
                            <label for="email" class="col-sm-2 col-form-label"><i class="bi bi-envelope-at" style="font-size: 20px; color: #6B728E;"></i></label>
                            <div class="col-sm-10">
                                <input type="email" class="input" name="email" id="email" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="mb-3 row text-center">
                            <label for="username" class="col-sm-2 col-form-label"><i class="bi bi-person" style="font-size: 20px; color: #6B728E;"></i></label>
                            <div class="col-sm-10">
                                <input type="text" class="input" name="username" id="username" placeholder="username">
                            </div>
                        </div>
                        <div class="mb-3 row text-center">
                            <label for="password" class="col-sm-2 col-form-label"><i class="bi bi-lock " style="font-size: 20px; color: #6B728E;"></i></i></label>
                            <div class="col-sm-10">
                                <input type="password" class="input" name="password" id="password" placeholder="password">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Small file input example</label>
                            <input class="form-control form-control-sm" id="formFileSm" name="file" type="file">
                        </div>
                        <button type="submit" class="mt-3 btn-kirim">Register</button>
                </form>
            </div>
        </div>
    @endif   
</body>
</html>