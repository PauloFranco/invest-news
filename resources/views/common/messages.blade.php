<script>
    +(function ( $, undefined ) {
        'use strict';

        if ( $ === undefined ) {
            return;
        }

        $( function () {
            @if($hasOldInput)
                setTimeout( function () { window._APP && (window._APP.hasChanges = true); }, 150 );
            @endif

                toastr.options.progressBar = true;
            toastr.options.newestOnTop = true;
            toastr.options.closeButton = true;
            toastr.options.positionClass = 'toast-top-right';
            toastr.options.timeOut = 3500;
            toastr.options.extendedTimeOut = 3500;

            @if(session()->has('error') && session('error')->any())
                @foreach (session('error')->all() as $message)
                toastr[ 'error' ]( '{!! preg_replace('/(\r|\n)/', '<br>', e( $message ) ) !!}' );
            @endforeach
                @endif

                @if($errors->any())
                @foreach ($errors->all() as $message)
                toastr[ 'error' ]( '{!! preg_replace('/(\r|\n)/', '<br>', e( $message ) ) !!}' );
            @endforeach
                @endif

                @if(session()->has('warning') && session('warning')->any())
                @foreach (session('warning')->all() as $message)
                toastr[ 'warning' ]( '{!! preg_replace('/(\r|\n)/', '<br>', e( $message ) ) !!}' );
            @endforeach
                @endif

                @if(session()->has('success') && session('success')->any())
                @foreach (session('success')->all() as $message)
                toastr[ 'success' ]( '{!! preg_replace('/(\r|\n)/', '<br>', e( $message ) ) !!}' );
            @endforeach
                @endif

                @if(session()->has('info') && session('info')->any())
                @foreach (session('info')->all() as $message)
                toastr[ 'info' ]( '{!! preg_replace('/(\r|\n)/', '<br>', e( $message ) ) !!}' );
            @endforeach
                @endif

                @if($message = session('status', false))
                toastr[ 'info' ]( '{!! preg_replace('/(\r|\n)/', '<br>', e( $message ) ) !!}' );
            @endif
        } );
    }( window.jQuery ));
</script>
