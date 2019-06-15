@extends('layouts.app')

@section('content')

  @php 
    //Blade Controller
    
    //Top Section
    $top_bg = get_field('background_image_top');
    $top_slogan = get_field('slogan_top');
    $top_sub_slogan = get_field('slogan_sub_top');

    //Menu
    $section_title_menu = get_field('section_title_menu');
    $background_image_menu = get_field('background_image_menu');
    $verbiage_menu = get_field('verbiage_menu');

    //Specials
    $section_title_specials = get_field('section_title_specials');
    $background_image_specials = get_field('background_image_specials');
    $verbiage_specials = get_field('verbiage_specials');

    //Catering
    $section_title_catering = get_field('section_title_catering');
    $background_image_catering = get_field('background_image_catering');
    $verbiage_catering = get_field('verbiage_catering');

    //Banquet
    $section_title_banquet = get_field('section_title_banquet');
    $background_image_banquet = get_field('background_image_banquet');
    $verbiage_banquet = get_field('verbiage_banquet');

    //Contact us 
    $section_title_contact = get_field('section_title_contact');
    $verbiage_contact = get_field('verbiage_contact');
  @endphp
  
  @if ($top_bg or $top_slogan or $top_sub_slogan)
    <section id="main" style="background-image: url('{{$top_bg}}');">
      <div class="flex-wrapper text-center">
        <h1>{{$top_slogan}}</h1>
        <p>{{$top_sub_slogan}}</p>
      </div>
    </section>
  @endif

  @if ($background_image_menu or $section_title_menu or $verbiage_menu)
    <section id="menu" style="background-image: url('{{$background_image_menu}}');">
      <div class="container">
        <h2 class="heading text-center text-white">{{$section_title_menu}}</h2>
        <div class="row">
          <div class="col-lg-6">
              @php echo $verbiage_menu @endphp
            <br><br>
            <a href="" class="btn btn-lg btn-outline-danger" data-toggle="modal" data-target=".full-menu-modal">Our Menu</a>
          </div>		
        </div>
      </div>
    </section>
  @endif

  @if ($background_image_specials or $section_title_specials or $verbiage_specials)
    <section id="specials" style="background-image: url('{{$background_image_specials}}');">
      <div class="container">
        <h2 class="heading text-center text-white">{{$section_title_specials}}</h2>
        <div class="row">
          <div class="col-lg-6 offset-lg-6">
            @php echo $verbiage_specials @endphp
          </div>		
        </div>
      </div>
    </section>
  @endif

  @if ($background_image_catering or $section_title_catering or $verbiage_catering)
    <section id="catering" style="background-image: url('{{$background_image_catering}}');">
      <div class="container">
        <h2 class="heading text-center text-white">{{$section_title_catering}}</h2>
        <div class="row">
          <div class="col-lg-6">
            @php echo $verbiage_catering @endphp
          </div>		
        </div>
      </div>
    </section>
  @endif

  @if ($background_image_banquet or $section_title_banquet or $verbiage_banquet)
    <section id="banquet" style="background-image: url('{{$background_image_banquet}}');">
      <div class="container">
        <h2 class="heading text-center text-white">{{$section_title_banquet}}</h2>
        <div class="row">
          <div class="col-lg-6 offset-lg-6">
            @php echo $verbiage_banquet @endphp
          </div>		
        </div>
      </div>
    </section>
  @endif

  <section id="testimonials" class="bg-dark">
    <div class="container">
      <h3 class="text-center">What customers say:</h3>
      @if($testimonials)
        @include('partials.testimonials')
      @else
       <h2 class="text-white text-center">There are no testimonials to display</h2>
      @endif

      <div class="row mt-5">
        @if ($section_title_contact or $verbiage_contact)
          <div class="col-lg mb-5">
            <h2>{{$section_title_contact}}</h2>
            <div class="line"></div>
            @php echo $verbiage_contact @endphp
            <div class="line"></div>
            {!! $social_media !!}
          </div>
        @endif
        <div class="col-lg">
          <h2>Let's Get in Touch</h2>
          @php echo do_shortcode('[gravityform id="1" title="false" description="false"]') @endphp
        </div>
      </div>
    </div>
    
  </section>
  <div class="copy text-center pt-2 pb-2 text-white w-100">
      Copyright @php echo get_bloginfo('name'); @endphp 2019
  </div>
  @include('partials.modals')
@endsection
