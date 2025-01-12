<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <!-- Ensure you include Bootstrap if not already included -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
            <!-- Sidebar Header-->
            @include('admin.sidebar')
            <!-- Sidebar Navigation end-->
            <div class="page-content">


                <!-- Form Container -->
                <div class="container mt-5">
                    <h2 class="text-center mb-4">Create New Post</h2>
                    <form action="{{ url('add_post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Title Field -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Enter title">
                        </div>

                        <!-- Description Field -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description"></textarea>
                        </div>

                        <!-- Image Field -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            @include('admin.footer')
        </nav>
    </div>


</body>

</html>
