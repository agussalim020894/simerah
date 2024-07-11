$(document).on("click",".tambah-profil",function() {
    ojisatrianiLoadingFadeIn();
    $.loadmodal({
        url: "{{ url($url_admin.'/'.$kode.'/create_child/'.$id) }}",
        id: 'responsive',
        dlgClass: 'fade',
        bgClass: 'primary',
        title: 'Simpan',
        width: 'whatever',
        modal: {
            keyboard: true,
            },
        ajax: {
            dataType: 'html',
            method: 'GET',
            success: function(data, status, xhr){
                $('.submit-surat').hide();
                ojisatrianiLoadingFadeOut();
            },
        },
    });
});