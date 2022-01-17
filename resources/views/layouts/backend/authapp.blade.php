<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ Settings()->website_name }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend') }}/assets/img/favicon.png">

    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/feathericon.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/morris/morris.css">

    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/datatables/datatables.min.css">

    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/style.css">
</head>

<body>


    @yield("auth_content")


    <script src="{{ asset('backend') }}/assets/js/jquery-3.2.1.min.js"></script>

    <script src="{{ asset('backend') }}/assets/js/popper.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/bootstrap.min.js"></script>

    <script src="{{ asset('backend') }}/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="{{ asset('backend') }}/assets/js/form-validation.js"></script>

    <script src="{{ asset('backend') }}/assets/js/jquery.maskedinput.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/mask.js"></script>

    <script src="{{ asset('backend') }}/assets/plugins/select2/js/select2.min.js"></script>

    <script src="{{ asset('backend') }}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/datatables/datatables.min.js"></script>

    <script src="{{ asset('backend') }}/assets/js/script.js"></script>

</body>

</html>
