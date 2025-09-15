<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <p>こんにちは！{{ $name }}さん！</p>
  <ul>
    @foreach ( $languages as $language)
      <li>{{ $language }}</li>
    @endforeach
  </ul>
</body>
</html>