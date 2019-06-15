<div class="social-media">
  @if ($facebook)
    <a href="{{$facebook}}" target="_blank" class="text-danger mr-2">
      <i class="fab fa-facebook"></i>
    </a>
  @endif
  @if ($twitter)
    <a href="{{$twitter}}" target="_blank" class="text-danger mr-2">
      <i class="fab fa-twitter"></i>
    </a>
  @endif
  @if ($instagram)
    <a href="{{$instagram}}" target="_blank" class="text-danger mr-2">
      <i class="fab fa-instagram"></i>
    </a>
  @endif
  @if ($linkedin)
    <a href="{{$linkedin}}" target="_blank" class="text-danger mr-2">
      <i class="fab fa-linkedin"></i>
    </a>
  @endif
  @if ($yelp)
    <a href="{{$yelp}}" target="_blank" class="text-danger mr-2">
      <i class="fab fa-yelp"></i>
    </a>
  @endif
  @if ($trip_advisor)
    <a href="{{$trip_advisor}}" target="_blank" class="text-danger mr-2">
      <i class="fab fa-tripadvisor"></i>
    </a>
  @endif
</div>