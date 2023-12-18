<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artists</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f0f0f0;
        }

        header {
            text-align: center;
            background-color: #333;
            color: white;
            padding: 10px;
        }

        section {
            margin: 20px 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }
        .navbar{
           
            justify-items: right;
            background-color: #333;
            padding: 20px;
        }
        .navbar a{
         
            text-decoration: none;
            color: white;
            margin: 10px;
        }
        a.hover-on{
            color: #4e8bff;

        }
        a:hover{
            color: #4e8bff;
        }
        .title{
            display: flex;
            margin-left: 10px;
            
        }
        .add-btn{
            background-color: #0d823b;
            border: none;
            margin: auto 10px;
            padding: 10px;
            color: white;
        }
        .add-btn:hover{
            background-color: #24b95e;
        }
        .add-btn-link{
            border: none;
            margin: auto 10px;
            color: white;
        }

        .edit-btn{
            background-color: #0d823b;
            border: none;
            padding: 8px;
            color: white;
            cursor: pointer;
            margin-right: 5px;
        }
        
        .delete-btn {
            background-color: #ca5252;
            border: none;
            padding: 8px;
            color: white;
            cursor: pointer;
            margin-right: 5px;
        }

        .edit-btn:hover{
            background-color: #45a049;

        }
        
        .delete-btn:hover {
            background-color: #d28d8d;
        }
    </style>
    <title>Songs Information</title>
</head>
<body>

<div class="navbar">
        <a href="{{url('/songs')}}" class="hover-off">Songs</a>
        <a href="{{url('/artists')}}" class="hover-on">Artists</a>
        <a href="{{url('/albums')}}" class="hover-off">Albums</a>  
    </div>
<div class="title">
        <h2>Artists</h2>
        <a href="{{url('/createArtist')}}" class="add-btn-link">
        <button class="add-btn">+</button>
    </a>
    </div>
        <table>
            <thead>
                <tr>
                    <th>Artist Name </th>
                    <th>Address</th>
                    <th>Date Started</th>
                    <th>Actions</th>
                   
                </tr>
            </thead>
            <tbody>
            @foreach ($artists as $artist)
            <tr>
                <td>{{ $artist->artist_name }}</td>
                <td>{{ $artist->address }}</td>
                <td>{{ $artist->date_started }}</td>

            <td>

            <a href="{{url('/artist/edit',$artist->id)}}">
                        <button class="edit-btn">Edit</button>
                    </a>
                    <a href="{{url('/artist/delete',$artist->id)}}">
                     
                    <button class="delete-btn">Delete</button>
                    </a>
            </td>
            </tr>
        @endforeach
    </tbody>
</table>


</body>
</html>
