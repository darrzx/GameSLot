@extends('layout.master')

@section('title', 'Add Game')

@section('content')
    <style>
        body {
            background-color: #f9fafb;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
            padding-right: calc(15rem * 0.5);
            padding-left: calc(15rem * 0.5);
        }

        h1 {
            margin: 40px 0;
        }

        .game-image {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 30%;
        }

        .form-control {
            width: 100%;
            height: 40px;
            font-size: 18px;

            outline: none;
            border-radius: 7.5px;
            border: 2px solid #c2c2c2;

            font-family: 'Poppins', sans-serif;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .label-custom {
            width: 23% !important;
        }

        .form-label {
            width: 30%;
        }

        .form-control:focus {
            outline: none;
            border: 2px solid black;
        }

        select {
            width: 100%;
            height: 40px;
            font-size: 18px;

            font-family: 'Poppins', sans-serif;
            border-radius: 7.5px;
            padding-left: 10px;
        }

        option {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }

        .update {
            text-align: center;
            background-color: #8d5ef4;
            border: none;
            border-radius: 10px;
            text-decoration: none;
            padding: 8px;
            margin-left: 10px;
            margin-right: 10px;
            color: white;
            float: right;
            cursor: pointer;
        }

        textarea {
            resize: vertical;
            padding-left: 10px;
        }
    </style>
    <div class="container">
        <h1>Add Game</h1>
        <form action="/addGame" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title" class="form-label">Game Title</label>
                <input type="text" class="form-control" id="title" name="title" value="">
            </div>
            <div class="form-group file">
                <label for="photo" class="form-label label-custom">Photo</label>
                <img src="" alt="image" class="game-image">
                <input type="file" name="photo" id="photo">
            </div>
            <div class="form-group">
                <label for="desc" class="form-label">Game Description</label>
                <textarea class="form-control" id="desc" name="desc"></textarea>
            </div>
            <div class="form-group">
                <label for="price" class="form-label">Game Price</label>
                <input type="text" class="form-control" id="price" name="price" value="">
            </div>
            <div class="form-group genre-group">
                <label for="genre" class="form-label">Game Genre</label>
                <select name="genre" id="genre">
                    <option value="0">Add new genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ $genre->id == '1' ? 'selected' : '' }}>
                            {{ $genre->genre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="rating" class="form-label">PEGI Rating</label>
                <select name="rating" id="rating">
                    <option value="0" {{ 'selected' }}>0</option>
                    <option value="3">3</option>
                    <option value="7">7</option>
                    <option value="12">12</option>
                    <option value="16">16</option>
                    <option value="18">18</option>
                </select>
            </div>
            <button type="submit" class="btn update">Add</button>
            @if ($errors->any())
                <div style="color:red">{{ $errors->first() }}</div>
            @endif
        </form>
    </div>

    <script>
        document.getElementById("genre").addEventListener("change", function() {
            if (this.value == 0) {
                if (!document.getElementById("new_genre")) {
                    var newDiv = document.createElement("div");
                    newDiv.className = "form-group";
                    newDiv.id = "new_genre-group";

                    var newLabel = document.createElement("label");
                    newLabel.className = "form-label";
                    newLabel.htmlFor = "new_genre";
                    newLabel.innerHTML = "New Game Genre";
                    newDiv.appendChild(newLabel);

                    var newInput = document.createElement("input");
                    newInput.type = "text";
                    newInput.className = "form-control";
                    newInput.id = "new_genre";
                    newInput.name = "new_genre";
                    newDiv.appendChild(newInput);

                    var genreGroupDiv = document.querySelector(".genre-group");
                    genreGroupDiv.insertAdjacentElement('afterend', newDiv);
                }
            } else {
                var existingElement = document.getElementById("new_genre-group");
                if (existingElement) {
                    existingElement.parentNode.removeChild(existingElement);
                }
            }
        });
    </script>
@endsection
