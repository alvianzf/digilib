function validateNumber(data, field) {
if (/^\d+$/.test(data)) {
    return (true);
} else {
    toastr.error("Silahkan masukkan format angka!", `${field} error!` );
    return (false);
    }
}

function validateData(data, field) {
    if (data.length > 1) {
        return (true);
    } else {
        toastr.error("Silahkan isi data dengan benar minimum 2 karakter!", `${field} error!`);
        return (false);
    }
}