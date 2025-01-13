<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <!-- Include Bootstrap for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
            /* Dark background */
            color: white;
            /* White text color */
        }

        .page-content {
            padding: 20px;
        }

        /* Styling for the page header */
        h1 {
            text-align: center;
            /* Center align the header */
            font-size: 2rem;
            /* Default font size */
            margin-bottom: 30px;
            /* Spacing below the header */
            color: white;
            font-weight: 600;
        }

        /* Responsive adjustments for different screen sizes */
        @media (min-width: 768px) {
            h1 {
                font-size: 2.5rem;
                /* Increase font size on medium to large screens */
            }
        }

        @media (min-width: 992px) {
            h1 {
                font-size: 3rem;
                /* Increase font size further on large screens */
            }
        }

        table th,
        table td {
            text-align: center;
            vertical-align: middle;
        }

        .table {
            background-color: #495057;
            /* Slightly lighter background for the table */
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .container {
            max-width: 100%;
            /* Allow the table to be full width */
            overflow-x: auto;
        }

        th,
        td {
            color: white;
            /* White text in table headers and cells */
        }

        .sidebar {
            background-color: #212529;
            /* Dark sidebar */
            color: white;
        }

        .sidebar a {
            color: #dcdcdc;
            /* Light color links */
        }

        .sidebar a:hover {
            color: #ffffff;
        }
    </style>
</head>

<body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar" class="sidebar">
            <!-- Sidebar Header-->
            @include('admin.sidebar')
            <!-- Sidebar Navigation end-->
            <div class="page-content">
                <h1>All Posts</h1>

                <!-- Table to display posts -->
                <div class="container mt-4">
                    @if ($posts->isEmpty())
                        <p>No posts found.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <!-- Displaying Title -->
                                        <td>{{ $post->title }}</td>

                                        <!-- Displaying Description (with limit) -->
                                        <td>{{ Str::limit($post->description, 150) }}</td>

                                        <!-- Displaying Image -->
                                        <td>
                                            @if ($post->image)
                                                <img src="{{ asset('images/' . $post->image) }}" alt="Post Image"
                                                    width="100">
                                            @else
                                                No image
                                            @endif
                                        </td>

                                        <!-- Displaying Status -->
                                        <td>{{ $post->post_status }}</td>

                                        <!-- Displaying Created By (User Name) -->
                                        <td>{{ $post->name }}</td>

                                        <!-- Actions: Edit and Delete -->
                                        <td>
                                            <!-- Edit button (route to edit page) -->
                                            <a href="#" class="btn btn-primary btn-sm">Edit</a>

                                            <!-- Delete form (submitting DELETE request) -->
                                            <form action="#" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

            </div>
            @include('admin.footer')
        </nav>
    </div>

    <!-- Include Bootstrap JS and other dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
