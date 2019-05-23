<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BookStore</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('font_end/dist/css/bootstrap.min.css')}}">
    <script src="{{asset('font_end/dist/js/bootstrap.min.js')}}"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('font_end/fontawesome/css/all.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .containers{
            max-width: 85%;
            margin: 0 auto;
            padding: 0;
        }
        #header{
            /*margin-bottom: 1em;*/
        }
        .content_header{
            background-color: #1a87f4;
            padding: 0.5em;
        }
        .form-search{
        }
        .total{
            border-radius: 50%;
            background: red;
            padding: 0 0.4em;
            color: white;
        }
        /*.cart{*/
            /*margin-top: 4%;*/
        /*}*/
        .nav_sidebar{
            border: 2px solid #1a87f4;
        }
        #slide_top{
            margin-left: 0.5em;
            z-index: 0;
        }
        .side_bar{
            margin-bottom: 0.5em;
            margin-top: 1em;
        }
        #footer{
            background-color: #1a87f4;
            color: #ffffff;
            margin-top: 1em;
        }
        /*.cart-list a:hover{*/
            /*text-decoration: none;*/
            /*color: #000000;*/
        /*}*/
        /*.cart-list a{*/
            /*color: #000;*/
        /*}*/
    </style>
</head>
<body>