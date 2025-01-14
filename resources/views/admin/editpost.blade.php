<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    @include('admin.css')
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
                    <form action="{{ url('updatePost', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Title Field -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Enter title" value="{{ $post->title }}">
                        </div>

                        <!-- Description Field -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description">{{ $post->description }}</textarea>
                        </div>

                        <!-- Image Field -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Update Image</label>
                            <img src="/images/{{ $post->image }}" width="100px">
                            <input type="file" class="form-control" id="image" name="image"
                                value="{{ $post->image }}">
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            @include('admin.footer')
</body>

</html>
