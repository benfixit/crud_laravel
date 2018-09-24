
<h4 class="border-bottom border-gray pb-2 mb-0">{{ $film->name }}</h4>
<div class="media text-muted pt-3">
    <img src="{{ asset('storage/films/'.$film->photo) }}" alt="" class="mr-2 rounded">
</div>
<br>

<h6 class="border-bottom border-gray pb-2 mb-0">Description</h6>
<div class="media text-muted pt-3">
    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">{{ $film->description }}</p>
</div>
<br>