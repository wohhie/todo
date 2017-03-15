@if (session()->has('flash_notification'))
    <div class="alert alert-{{ session('flash_notification.level') }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        {{ session('flash_notification.message') }}
    </div>
@endif
