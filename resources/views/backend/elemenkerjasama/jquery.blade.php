$(document).on("click",".create",function() {
    ojisatrianiLoadingFadeIn();
    var id = $(this).attr("{{$kode.'-id'}}");
    $.loadmodal({
        url: "{{ url($url_admin.'/'.$kode) }}/save/"+ id,
    id: 'responsive',
        dlgClass: 'fade',
        bgClass: 'warning',
        title: 'Ubah',
        width: 'whatever',
        modal: {
            keyboard: true,
            // any other options from the regular $().modal call (see Bootstrap docs)
            },
        ajax: {
            dataType: 'html',
            method: 'GET',
            success: function(data, status, xhr){
                $('.modal-footer').remove();
                ojisatrianiLoadingFadeOut();
            },
        },
    });
});

$(document).on("click",".kelengkapan",function() {
    ojisatrianiLoadingFadeIn();
    var id = $(this).attr("{{$kode.'-id'}}");
    $.loadmodal({
        url: "{{ url($url_admin.'/'.$kode) }}/kelengkapan/"+ id,
    id: 'responsive',
        dlgClass: 'fade',
        bgClass: 'warning',
        title: 'Ubah',
        width: 'whatever',
        modal: {
            keyboard: true,
            // any other options from the regular $().modal call (see Bootstrap docs)
            },
        ajax: {
            dataType: 'html',
            method: 'GET',
            success: function(data, status, xhr){
                $('.modal-footer').remove();
                ojisatrianiLoadingFadeOut();
            },
        },
    });
});