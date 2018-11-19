<!-- Modal -->

<div class="modal fade" id="{{ $modal }}" tabindex="-1" role="dialog" aria-labelledby="{{ $modal }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <div style="display:block; padding-left: 20px; margin-bottom: 0 !important; padding-bottom: 0 !important;">
              <h5 class="modal-title">{{ $title }}</h5>
              @isset($edit)
                {{ $edit }}
              @endisset
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      <div class="modal-body">
        {{ $content }}
      </div>
      <div class="modal-footer">
          @isset($save)
            {{ $save }}
          @endisset
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
