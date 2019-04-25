<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Activation</title>
</head>
<body>
<p>Welcome, <b>{{ $TenND }}</b> </p>
<p>Click to active your account:</p>
<a href="{{ url('nguoidung/activation', $link)}}">{{ url('nguoidung/activation', $link)}}</a>
<p>Thanks!</p>
</body>
</html>