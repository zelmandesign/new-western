<div id="testimonial-carousel" class="carousel slide" data-ride="carousel">
  @php if( have_rows('testimonials', 'options')): $i = 0; @endphp
    <ol class="carousel-indicators">
      @php while ( have_rows('testimonials', 'options') ): the_row(); @endphp
      <li data-target="#testimonial-carousel" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0) echo 'active'; ?>"></li>
      @php $i++; endwhile; @endphp  
    </ol>
  @endif

  <div class="carousel-inner">
    @foreach($testimonials as $testimonials_item)
      @include('partials.testimonials-item', $testimonials_item)
    @endforeach
  </div>

  <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>