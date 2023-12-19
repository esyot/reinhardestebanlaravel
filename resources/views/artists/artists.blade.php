<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artists</title>
    <style>
            body {
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                display: flex;
                background-color: #969696;
            }

            header {
                text-align: center;
                background-color: #333;
                color: white;
                padding: 10px;
                width: 100%;
            }

            .container {
                display: flex;
                width: 100%;
            }
            .sidebar {
        width: 0;
        overflow-x: hidden;
        transition: 0.5s;
        background-color: #333;
        color: white;
        padding: 0px;
        display: flex;
        flex-direction: column;
        align-items: center;
        position: fixed;
        top: 0;
        bottom: 0;
        height: 100%;
        z-index: 1;
    }

    .sidebar.open {
        width: 200px;
    }

    .sidebar a {
        text-decoration: none;
        color: white;
        margin: 10px;
        text-align: center;
        padding: 10px;
        width: 100%;
        box-sizing: border-box;
        display: none;
    }

    .sidebar.open a {
        display: block;
    }


            .sidebar a:hover {
                background-color: #4e8bff;
                color: #fff;
                transition: background-color 0.3s, color 0.3s;
            }

            .content {
                flex-grow: 1;
                padding: 20px;
                transition: margin-left 0.5s;
                margin-left: 0px;
            }

            table {
                border-collapse: collapse;
                width: 100%;
                margin-bottom: 20px;
                cursor: pointer;
                background-color: #fff;
            }

            tr:hover {
                background-color: #dfdfdf;
            }

            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #8f3b3b;
                color: white;
            }

            .title {
                display: flex;
                margin-left: 10px;
            }

            .add-btn {
                background-color: #0d823b;
                border: none;
                margin: auto 10px;
                padding: 10px;
                color: white;
            }

            .add-btn:hover {
                background-color: #24b95e;
            }

            .add-btn-link {
                border: none;
                margin: auto 10px;
                color: white;
            }

            .edit-btn {
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

            .edit-btn:hover {
                background-color: #45a049;
            }

            .delete-btn:hover {
                background-color: #d28d8d;
            }

            .toggle-btn {
                background-color: #333;
                color: white;
                border: none;
                padding: 10px;
                cursor: pointer;
            }

            .toggle-btn:hover {
                background-color: #4e8bff;
            }
    </style>
</head>
<body>

<div class="container">
    <div class="sidebar" id="sidebar">
        <a href="{{url('/songs')}}" class="hover-off">Songs</a>
        <a href="{{url('/artists')}}" class="hover-on">Artists</a>
        <a href="{{url('/albums')}}" class="hover-off">Albums</a>
    </div>

    <div class="content">
        <button class="toggle-btn" onclick="toggleSidebar()">I I I</button>
        <div class="title">
            <h2>Artists</h2>
            <a href="{{url('/createArtist')}}" class="add-btn-link">
                <button class="add-btn">+</button>
            </a>
        </div>

        <table>
            <thead>
            <tr>
                <th>Artist Name</th>
                <th>Address</th>
                <th>Date Started</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($artists as $artist)
                <tr onclick="window.location='{{url('/artist/edit',$artist->id)}}';">
                    <td>{{ $artist->artist_name }}</td>
                    <td>{{ $artist->address }}</td>
                    <td>{{ $artist->date_started }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const content = document.querySelector('.content');
    sidebar.classList.toggle('open');
    content.style.marginLeft = sidebar.classList.contains('open') ? '200px' : '0';
}
</script>

</body>
</html>
