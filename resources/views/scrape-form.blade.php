<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scrape Form</title>
</head>
<body>
    <h1>Enter URL to Scrape</h1>
    <form action="/scrape" method="post">
        @csrf
        <label for="url">URL:</label>
        <input type="text" id="url" name="url" required>
        <button type="submit">Scrape</button>
    </form>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
