<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap 5 404 Error Page</title>
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <h1 class="display-1 fw-bold">500</h1>
            <p class="fs-3"> <span class="text-danger">Opps!</span> Something went wrong.</p>
            <p class="lead">
                Internal server errors.
                </p>
            <button type="button" onclick="history.back()" class="btn btn-primary">Go Back</button>
        </div>
    </div>
</body>
</html>