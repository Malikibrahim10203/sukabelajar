<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
    <div class="card">
        <div class="title">
            <form action="{{ url('proses_tambah')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}  

                <h2>Tambah </h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <input type="hidden" class="input" name="id" id="id" value="{{ Auth::User()->id }}">
                    <div class="mb-3 row text-center">
                        <label for="username" class="col-sm-2 col-form-label"><i class="bi bi-person-fill" style="font-size: 20px; color: #6B728E;"></i></label>
                        <div class="col-sm-10">
                            <input type="text" class="input" name="nama_materi" id="username" placeholder="Nama Materi">
                        </div>
                    </div>
                    <div class="mb-3 row text-center">
                        <label for="password" class="col-sm-2 col-form-label"><i class="bi bi-body-text" style="font-size: 20px; color: #6B728E;"></i></i></label>
                        <div class="col-sm-10">
                            <input type="text" class="input" name="deskripsi" id="password" placeholder="Deskripsi">
                        </div>
                    </div>

                    <div class="mb-3 row text-center">
                        <label for="harga" class="col-sm-2 col-form-label"><i class="bi bi-currency-dollar" style="font-size: 20px; color: #6B728E;"></i></i></label>
                        <div class="col-sm-10">
                            <input type="number" class="input" name="harga" id="harga" placeholder="harga">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Small file input example</label>
                        <input class="form-control form-control-sm" id="formFileSm" name="file" type="file">
                    </div>
                    <button type="submit" class="mt-3 btn-kirim">Tambah</button>
            </form>
        </div>
    </div>
</body>
</html>