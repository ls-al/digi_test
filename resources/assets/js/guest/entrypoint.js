/* Auto-Inject CSRF to AJAX requests */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

import * as bootstrap from 'bootstrap'