@if($errors->any() && isset($show) && $show)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible" role="alert">
            <div class="icon"><span class="mdi mdi-block-alt"></span></div>
            <div class="message">{{ $error }}</div>
        </div>
    @endforeach
@endif

@isset(app()->session->all()['flash_notification'])
@foreach(app()->session->all()['flash_notification'] as $flash)
    <div class="alert alert-{{ $flash->level }} alert-dismissible" role="alert">
        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span class="mdi mdi-close" aria-hidden="true"></span>
        </button>
        <div class="icon"><span class="mdi mdi-check"></span></div>
        <div class="message"><strong>{{ ucfirst($flash->level) }}!</strong> {{ $flash->message }}</div>
    </div>
@endforeach
@endisset

<div class="alert alert-danger alert-dismissible ajax-error-div" style="display: none" role="alert">
    <div class="icon"><span class="mdi mdi-block-alt"></span></div>
    <div class="message ajax-error-msg"></div>
</div>
