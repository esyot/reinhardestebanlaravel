<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Song</title>
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
@if ($song)
<h2>Edit Song</h2>
        <form action="{{ route('updateSong', ['id' => $song->id]) }}" method="post">
        @csrf 
        @method('PUT')
            <label for="title">Title:</label>
            <input type="text" id="title" value="{{$song->title}}" name="title">

            <label for="artist_id">Artist:</label>
            <select name="artist_id" id="artist_id" value="{{$song->artist_id}}">

                <option value="{{$song->artist_id}}">{{$song->artist->artist_name}}</option>

                @foreach ($artists as $artist)
                <option value="{{$artist->id}}">{{$artist->artist_name}}</option>
                @endforeach

            </select>

            <label for="album_id">Album:</label>
            <select name="album_id" id="album_id" value="{{$song->album->album_title}}">

                <option value="{{$song->album_id}}">{{$song->album->album_title}}</option>
                @foreach ($albums as $album)
                <option value="{{$album->id}}"> {{$album->album_title}}</option>
                @endforeach
            </select>

            <input type="submit" value="Submit">
            <a href="{{url('/songs')}}">
            <button type="button">Cancel</button>
            </a>
        </form>
        @else
    <p>Course not found.</p>
@endif
    </div>

</body>
</html>
