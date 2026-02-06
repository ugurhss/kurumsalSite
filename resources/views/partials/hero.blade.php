<div id="container">
  <ul id="slides">
    @foreach($slides as $slide)
      <li class="slide">
        <div class="slide-partial slide-left">
          <img src="{{ $slide->image_left_url }}" alt="{{ $slide->title }} - Sol Görsel" />
        </div>

        <div class="slide-partial slide-right">
          <img src="{{ $slide->image_right_url }}" alt="{{ $slide->title }} - Sağ Görsel" />
        </div>

        <h1 class="title">
          <!-- <span class="title-text">{{ $slide->title }}</span> -->
        </h1>
      </li>
    @endforeach
  </ul>
</div>
