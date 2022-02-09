<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File View</title>
    @include('admin.static.css')
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8 col-lx-8 mx-auto">
                        <embed  src="{{ '/'.$file }}" style="width:800px; height:800px;" frameborder="0">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.static.js')
</body>
</html>
