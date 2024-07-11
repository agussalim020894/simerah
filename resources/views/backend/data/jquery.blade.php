$(document).on("click",".tambah",function() {
    ojisatrianiLoadingFadeIn();
    $.loadmodal({
        url: "{{ url($url_admin.'/'.$kode.'/create/'.$id) }}",
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

$(document).on("click",".ubah",function() {
    ojisatrianiLoadingFadeIn();
        var id = $(this).attr("{{$kode.'-id'}}");
		$.loadmodal({
			url: "{{ url($url_admin.'/'.$kode) }}/"+ id +"/edit",
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
                    ojisatrianiLoadingFadeOut();
				},
			},
        });
	});

  	$(document).on("click",".hapus",function() {
		ojisatrianiLoadingFadeIn();
        var id = $(this).attr("{{$kode.'-id'}}");
		$.loadmodal({
			url: "{{ url($url_admin.'/'.$kode) }}/hapus/"+ id,
      id: 'responsive',
			dlgClass: 'fade',
			bgClass: 'danger',
			title: 'Hapus',
			width: 'whatever',
			modal: {
				keyboard: true,
				// any other options from the regular $().modal call (see Bootstrap docs)
				//$('#uraian').val(id),
				},
          ajax: {
				dataType: 'html',
				method: 'GET',
				success: function(data, status, xhr){
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