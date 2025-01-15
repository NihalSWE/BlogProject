<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">Blog Posts</h1>
        <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority
            have suffered alteration</p>
        <div class="services_section_2">
            <div class="row">
                @foreach ($post as $p)
                    
                
                <div class="col-md-4">
                    <div><img src="{{ asset('images/' . $p->image) }}" class="services_img"></div>
                    <!-- Displaying Title -->
                    <h4>{{ $p->title }}</h4>
                    <!-- Displaying Created By (User Name) -->
                    <p>This is Posted by <b>{{ $p->name }}</b></p>


            



                    <div class="btn_main"><a href="#">Read More</a></div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
