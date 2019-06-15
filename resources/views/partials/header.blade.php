<header class="banner navbar navbar-expand-lg fixed-top">
  <a class="brand" href="{{ home_url('/') }}"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png"></a>
  <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
    <i class="fas fa-bars" style="color: #fff; font-size: 2rem"></i>
  </button>
  <nav class="nav-primary navbar-collapse collapse justify-content-end" id="navbarCollapse">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav mr-auto']) !!}
    @endif
    <span class="navbar-text">
      {!! $social_media !!}
    </span>
  </nav>
</header>

<div class="scroll">
  <a href="#" class="scrollup"><i class="fas fa-angle-up" style="font-size: 1.5rem;"></i></a>
</div>
