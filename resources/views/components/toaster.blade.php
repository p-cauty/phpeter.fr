<div class="toast-container position-absolute top-0 end-0 p-3" id="toaster">
    @if (session('status'))
        <x-toast theme="success" :message="session('status')" />
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-toast theme="danger" :message="$error" />
        @endforeach
    @endif
    @if (isset($alerts))
        @foreach ($alerts as $alert)
            <x-toast :theme="$alert['theme']" :message="$alert['message']" />
        @endforeach
    @endif
</div>
