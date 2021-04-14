<div class="card mt-3">
  <div class="card-body">
    <h5 class="card-title">
      {{ $item->name }}
    </h5>

    <p class="card-text">
      {{ $item->message }}
    </p>

    <small class="text-muted">
      {{ $item->created_at->diffForHumans() }}
    </small>
  </div>
</div>
