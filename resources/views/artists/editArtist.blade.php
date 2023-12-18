<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artist</title>
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
 
@if ($artist)
        <form action="{{ route('updateArtist', ['id' => $artist->id]) }}" method="post">
        @csrf 
        @method('PUT')
        <h2>Edit Artist</h2>

        <label for="artist_name">Artist Name:</label>
        <input type="text" id="artist_name" name="artist_name" value="{{ $artist->artist_name }}" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="{{ $artist->address }}" required>

        <label for="date_started">Date Started:</label>
        <input type="date" id="date_started" name="date_started" value="{{ $artist->date_started }}" required>

     


       
        <div class="footer">
            <input type="submit" class="submit" value="Update">
            <button type="button" class="cancel" onclick="javascript:window.location='{{ route('artists') }}';">Cancel</button>
        </div>
    </form>
@else
    <p>Course not found.</p>
@endif
    </div>
</body>
</html>
