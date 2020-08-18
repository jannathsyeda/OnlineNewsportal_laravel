<footer>
    <section id="footer">
    <div class="container">
        <div class="row">
          <div class="col-md-3">
           
             <div class="row">
               <div class="col-md-4">
                <img style="width: 65px;height:65px;" src="{{ asset('storage/post/covid-chart_2.jpg') }}" alt="222">
               </div>
               
               <div class="col-md-4">
                <img style="width: 65px;height:65px;" src="{{ asset('storage/post/deer-sundarbans-raw-hasan-600-gtm.jpg') }}" alt="222">
               </div> 
               <div class="col-md-4">
                
               </div> 
               
             </div>
             <hr>
             <div class="row">
              <div class="col-md-4">
               <img style="width: 65px;height:65px;" src="{{ asset('storage/post/rohingya_crisis_a_concern_for_the_region.jpg') }}" alt="222">
              </div>
              
              <div class="col-md-4">
               <img style="width: 65px;height:65px;" src="{{ asset('storage/post/india-national-cricket-team-2020-06-09-5edfb43df3356.jpg') }}" alt="222">
              </div> 
              <div class="col-md-4">
               
              </div> 
              
            </div>
            <hr>
            <div class="row">
              <div class="col-md-4">
               <img style="width: 65px;height:65px;" src="{{ asset('storage/post/yyy-2020-06-09-5ee00129d88f2.jpg') }}" alt="222">
              </div>
              
              <div class="col-md-4">
               <img style="width: 65px;height:65px;" src="{{ asset('storage/post/metro_rail_construction_0.jpg') }}" alt="222">
              </div> 
              <div class="col-md-4">
               
              </div> 
              
            </div>
             
               
           
             

          </div>
          <div class="col-md-3">
            <h2 class="head">We Provide</h2>
            <p><i class="fas fa-check"> </i> 100% Satisfaction</p>
             <p><i class="fas fa-check"> </i> 24/7 Support</p>
             <p><i class="fas fa-check"> </i> Highly Reliable</p>
          </div>

          <div class="col-md-3">
            <h2 class="head">Most Wanted</h2>
            <div class="row">
              @foreach ($posts as $post)
                <div class="col-sm-4" >
                   <a target="_blank" href="{{ route('post.details', $post->slug) }}"> <img class="img-fluid mb-3" style="height: 65px; width:65px;"
                          src="{{ asset('storage/post/'.$post->image) }}" alt=""></a>
                     
                </div>
                @endforeach
            </div>
          
          </div>
          <div class="col-md-3">
            <h2 class="head">Contact us</h2>
            <p> <i class="fas fa-map-marker-alt"></i> Alhamra Zindabazar, Sylhet</p>
            <p><i class="fas fa-phone"></i> +88 01612345678</p>
            <p><i class="fas fa-envelope"></i> jannathsyeda@gmail.com</p>
          </div>
        </div>
        <hr style="background-color: white;" class="pb-0">
        <p class="text-center p-3 mb-0"> &copy;Star News<b></b></p>
      </div>
    </section>
</footer>