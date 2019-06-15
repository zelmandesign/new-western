@php
  // check if the flexible content field has rows of data
  if( have_rows('menu', 'options') ):

    // loop through the rows of data
      while ( have_rows('menu', 'options') ) : the_row(); @endphp

        @php 
        // Menu Section
        if( get_row_layout() == 'section' ): 
        @endphp

        <div class="row mt-5">
          <div class="col-lg">
            @php 
              $menu_title = get_sub_field('title');
              $menu_description = get_sub_field('description');
              $menu_image = get_sub_field('menu_image');
            @endphp
  
          
            <h2>{{$menu_title}}</h2>
            <p class="menu-description">{{$menu_description}}</p>
  
            @php
            // check if the nested repeater field has rows of data
            if( have_rows('menu_item') ): 
            @endphp
  
              @php   
              // loop through the rows of data
              while ( have_rows('menu_item') ) : the_row(); 
              @endphp
  
                @php 
                  $name = get_sub_field('name');
                  $price = get_sub_field('price');
                @endphp
  
                <div class="menu-item">
                {{$name}} <strong>${{$price}}</strong>
                </div>
  
              @php endwhile; @endphp
  
            @endif 
          </div>
          @if ($menu_image)
            <div class="col-lg d-none d-lg-block">
              <img src="{{$menu_image['url']}}" alt="" class="img-fluid img-thumbnail">
            </div>   
          @endif
        </div>
        <hr>
      @php endif;
    endwhile;

  else :
      // no layouts found
  endif;
@endphp
