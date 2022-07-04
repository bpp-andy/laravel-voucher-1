
import swal from 'sweetalert2';

export const swalError = (msg = 'Operation Failed!') => {
    setTimeout(() => {
        swal.fire({
            title: msg,
            icon: 'error',
            confirmButtonText: '',
            timer: 2000,
            showCancelButton: false,
            showConfirmButton: false
        });
    }, 100);
}

export const swalConfirm = (
    title = 'Do you want to save?',
    button = 'Save',
    on_confirm,
    color = "#1e40af"
) => {
    swal.fire({
        title: title,
        showCancelButton: true,
        confirmButtonText: button,
        confirmButtonColor: color,
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            on_confirm ? on_confirm() : null
        }
    })
}



export const swalSuccess = (msg = 'Saved Successfully') => {
    setTimeout(() => {
        swal.fire({
            title: msg,
            icon: 'success',
            confirmButtonText: '',
            timer: 2000,
            showCancelButton: false,
            showConfirmButton: false,
            reverseButtons: true,
        });
    }, 100);
}

export const swalLoading = (message = 'Loading...') => {
    swal.fire({
        title: message,
        allowOutsideClick: false,
        showCancelButton: false,
        showConfirmButton: false,
        showLoading: true,
        reverseButtons: true,
        didOpen: () => {
            swal.showLoading();
        },
    });
}


export const Toaster = (message = '', icon = 'success') => {
    let toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        reverseButtons: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', swal.stopTimer)
            toast.addEventListener('mouseleave', swal.resumeTimer)
        }
    });
    toast.fire({
        title: message,
        icon: icon
    });
};
