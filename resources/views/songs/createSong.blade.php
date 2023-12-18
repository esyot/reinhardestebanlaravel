<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Song</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
            font-family: 'Arial', sans-serif;
        }

        .container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        .container label {
            font-size: 14px;
            color: #333;
            margin-bottom: 6px;
            display: block;
        }

        .container input, .container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .container input[type="submit"], .container button {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
            border: none;
            padding: 10px;
            border-radius: 4px;
            font-size: 14px;
            margin-right: 5px;
        }

        .container input[type="submit"]:hover, .container button:hover {
            background-color: #45a049;
        }

        .container button[type="button"] {
            background-color: #ca5252;
            width: 100%;
        }

        .container button[type="button"]:hover {
            background-color: #d28d8d;
            
        }
    </style>
</head>
<body>
   <div class="container">
    <h2>Add a song</h2>
    <form action="{{ route('storeSong') }}" method="POST">
            @csrf
            <label for="title">Title:</label>
            <input type="text" id="tit  le" name="title" placeholder="Enter Title">

            <label for="artist_id">Artist:</label>
            <select name="artist_id" id="artist_id">
                @foreach ($artists as $artist)
                <option value="{{$artist->id}}">{{$artist->artist_name}}</option>
                @endforeach
            </select>

            <label for="album_id">Album:</label>
            <select name="album_id" id="album-id">
            @foreach ($albums as $album)
                <option value="{{$album->id}}">{{$album->album_title}}</option>
                @endforeach
            </select>

            <input type="submit" value="Submit">
            <a href="{{url('/songs')}}">
            <button type="button">Cancel</button>
            </a>
        </form>
    </div>
</body>
</html>
