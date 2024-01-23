<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Product</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        form {
            max-width: 600px;
            margin: 0;
        }
        label {
            margin-top: 10px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #218838;
        }
        .custom-select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    height: auto; 
}

.custom-select option {
    padding: 8px;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>Create New Product</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Validation errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('products.store') }}" method="post">
            @csrf
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>

            <label for="price">Price:</label>
            <input type="text" name="price" value="{{ old('price') }}" required>

            <label for="quantity">Quantity:</label>
            <input type="text" name="quantity" value="{{ old('quantity') }}" required>

            <label for="description">Description:</label>
            <input type="text" name="description" value="{{ old('description') }}">

<label for="categories">Categories:</label>
<select name="categories[]" multiple class="form-control">
    @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>

            <button type="submit" class="btn btn-success">Create Product</button>
        </form>

   
        <a href="{{ route('products.index') }}" class="btn btn-secondary m-2">Back to Home</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>